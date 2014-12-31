<?php
require_once( dirname( __FILE__ ) . '/Maintenance.php' );

class addDBtable extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Adds a DB table to all of our databases";
		$this->addArg( 'source', 'File path to file holding DB table' );
	}
	
	public function execute() {
	
		$databases = array_map( 'trim', file( "/var/www/config/all.dblist" ) );
	
		$dbw = wfGetDB( DB_MASTER );

		foreach( $databases as $database ) {
	
		$this->output( "Inserting " . $this->getArg( 0 ) . " into " . $database . "!\n" );
		$dbw->selectDB( $database );
		$dbw->sourceFile( $this->getArg( 0 ) );

		}
	}
}

$maintClass = "AddDBtable";
require_once( RUN_MAINTENANCE_IF_MAIN );