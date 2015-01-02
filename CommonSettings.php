<?php

// Show debug info
$wgShowDBErrorBacktrace = true;
error_reporting( -1 );
ini_set( 'display_errors', 1 );
$wgShowExceptionDetails = true;
$wgShowSQLErrors = true;
$wgDebugDumpSql  = true;
// End debug info

$wgConf = new SiteConfiguration;
 
require_once( "wgConf.php" );

// Wikifactory configuration and an autoload for the Wikia class
$wgExternalSharedDB = "wikifactory";
$wgWikiFactoryCacheType = CACHE_MEMCACHED;
$wgNotAValidWikia = "http://meta.faceyspacies.com/wiki/Invalid_Wiki";

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
}

// Clear wgGroupPermissions, set below
$wgGroupPermissions = array();

// Load a few default settings
require_once( "InitialiseSettings.php" );

// Load our group permissions
require_once( "wgGroupPermissions.php" );

// Actually get our globals defined by our InitialiseSettings.php
$wgConf->extractAllGlobals( $wgDBname );

// These values maybe defined, or may not be. If they aren't, load from the central wiki (ID 1)
$wgArticlePath = WikiFactory::getVarValueByName("wgArticlePath", $wgCityId);
if( empty( $wgArticlePath ) ) {
	$wgArticlePath = WikiFactory::getVarValueByName( "wgArticlePath", 1 ); // load default from central wiki
}

// These are values every wiki should be defined in Wikifactory 
$wgSitename = WikiFactory::getVarValueByName( "wgSitename", $wgCityId );
$wgLanguageCode = WikiFactory::getVarValueByName( "wgLanguageCode", $wgCityId ); 
$wgMetaNamespace = WikiFactory::getVarValueByName( "wgMetaNamespace", $wgCityId );

// These settings depend on other globals loaded from Wikifactory
$wgUploadPath = '//images.faceyspacies.com/images/' . $wgDBname;
$wgUploadDirectory = '/var/www/html/images/' . $wgDBname;

// The domain our cookie is set to, allows for cross-wiki login
$wgCookieDomain = '.faceyspacies.com';