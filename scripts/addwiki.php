<?php
/**
 * @defgroup Wikimedia Wikimedia
 */

/**
 * Add a new wiki
 * Wikimedia specific!
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Maintenance
 * @ingroup Wikimedia
 */

require_once( dirname( __FILE__ ) . '/Maintenance.php' );

class AddWiki extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Add a new wiki to the family. Wikimedia specific!";
		$this->addArg( 'language', 'Language code of new site, e.g. en' );
		$this->addArg( 'site', 'Type of site, e.g. wikipedia' );
		$this->addArg( 'dbname', 'Name of database to create, e.g. enwiki' );
		$this->addArg( 'domain', 'Domain name of the wiki, e.g. en.wikipedia.org' );
	}

	public function getDbType() {
		return Maintenance::DB_ADMIN;
	}

	public function execute() {
		global $IP, $wgDefaultExternalStore, $wgNoDBParam;

		$wgNoDBParam = true;
		$lang = $this->getArg( 0 );
		$site = $this->getArg( 1 );
		$dbName = $this->getArg( 2 );
		$domain = $this->getArg( 3 );
		$languageNames = Language::getLanguageNames();

		if ( !isset( $languageNames[$lang] ) ) {
			$this->error( "Language $lang not found in \$wgLanguageNames", true );
		}
		$name = $languageNames[$lang];

		$dbw = wfGetDB( DB_MASTER );
		$common = "/home/wikipedia/common";

		$this->output( "Creating database $dbName for $lang.$site ($name)\n" );

		# Set up the database
		$dbw->query( "CREATE DATABASE $dbName" );
		$dbw->selectDB( $dbName );

		$this->output( "Initialising tables\n" );
		$dbw->sourceFile( $this->getDir() . '/tables.sql' );
		$dbw->sourceFile( $IP . '/extensions/GlobalBlocking/localdb_patches/setup-global_block_whitelist.sql' );
		$dbw->sourceFile( $IP . '/extensions/CheckUser/cu_changes.sql' );
		$dbw->sourceFile( $IP . '/extensions/CheckUser/cu_log.sql' );

		//$dbw->query( "INSERT INTO site_stats(ss_row_id) VALUES (1)" );

		$title = Title::newFromText( "Main Page" );
        $this->output( "Writing main page to " . $title->getPrefixedDBkey() . "\n" );
        $article = WikiPage::factory( $title );
        $ucsite = ucfirst( $site );

		$article->doEdit( $this->getFirstArticle( $ucsite, $name ), '', EDIT_NEW | EDIT_AUTOSUMMARY );

		$this->output( "Adding to dblists\n" );

		# Add to dblist
		$file = fopen( "/var/www/config/all.dblist", "a" );
		fwrite( $file, "$dbName\n" );
		fclose( $file );

		# print "Constructing interwiki SQL\n";
		# Rebuild interwiki tables
		# passthru( '/home/wikipedia/conf/interwiki/update' );

		$this->output( "Script ended. You still have to:
	* Add any required settings in InitialiseSettings.php" );
	}

	private function getFirstArticle( $ucsite, $name ) {
		return <<<EOT
This is a brand new FaceySpacies Wiki. 

EOT;
	}
}

$maintClass = "AddWiki";
require_once( RUN_MAINTENANCE_IF_MAIN );
