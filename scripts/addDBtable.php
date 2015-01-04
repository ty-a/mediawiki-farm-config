<?php
require_once( dirname( __FILE__ ) . '/Maintenance.php' );
// @TODO: Load DB list from Wikifactory

class addDBtable extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Adds a DB table to all of our databases";
		$this->addArg( 'source', 'File path to file holding DB table' );
	}
	
	public function execute() {
	
		$dbh = wfGetDB( DB_MASTER );
		$dbh->selectDB( 'wikifactory' );
		
		$res = $dbh->select(
			'city_list',
			'city_dbname'
		);
		
		foreach( $res as $database ) {
			
			$dbh->selectDB($database->city_dbname);
			$this->output( "Inserting " . $this->getArg( 0 ) . " into " . $database->city_dbname . "!\n" );
			$dbh->begin();
			$dbh->selectDB( $database );
			$dbh->sourceFile( $this->getArg( 0 ) );
			$dbh->commit();
			

		}
	}
}

$maintClass = "AddDBtable";
require_once( RUN_MAINTENANCE_IF_MAIN );