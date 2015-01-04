<?php

// Show debug info
$wgShowDBErrorBacktrace = true;
error_reporting( -1 );
ini_set( 'display_errors', 1 );
$wgShowExceptionDetails = true;
$wgShowSQLErrors = true;
$wgDebugDumpSql  = true;
// End debug info

// Wikifactory configuration and an autoload for the Wikia class
$wgExternalSharedDB = "wikifactory";
$wgWikiFactoryCacheType = CACHE_MEMCACHED;
$wgNotAValidWikia = "http://meta.faceyspacies.com/wiki/Invalid_Wiki";

$wgSharedDB = 'metawiki';
$wgSharedTables = array(
	'global_user_groups',
	'user'
);

// Load the extensions on all wikis
require_once( "CommonExtensions.php" );

// Loads Wikifactory and returns our $wgCityId
$WFL = new WikiFactoryLoader();
$wgCityId = $WFL->execute();

// Get our database name from the city_list
$wgDBname = WikiFactory::IDtoDB( $wgCityId );

// meta is our central wiki, so load the main WikiFactory there
if( $wgCityId == 1 ) {
	require_once($IP . '/extensions/WikiFactory/SpecialWikiFactory.php');
	require_once($IP . '/extensions/WikiFactory/Reporter/SpecialWikiFactoryReporter.php');
}

// These settings depend on other globals loaded from Wikifactory
$wgUploadPath = '//images.faceyspacies.com/images/' . $wgDBname;
$wgUploadDirectory = '/var/www/html/images/' . $wgDBname;

// The domain our cookie is set to, allows for cross-wiki login
$wgCookieDomain = '.faceyspacies.com';