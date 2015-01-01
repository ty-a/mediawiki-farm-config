<?php

global $wikiname;
global $wgCityId;
// default language is english
global $lang;
$lang = 'en';

if( !wgCommandLine ) {
if ( preg_match( '/^(.*)\.faceyspacies.com$/', $_SERVER['HTTP_HOST'], $matches ) ) {
     $wikiname = $matches[1];
} else {
     die( "Invalid host name, can't determine wiki name" );
     // You could also redirect to a nicer "No such wiki" page.
}
}

$wgConf = new SiteConfiguration;
 
require_once( "wgConf.php" );

$wgExternalSharedDB = "wikifactory";
$wgWikiFactoryCacheType = CACHE_MEMCACHED;
$wgNotAValidWikia = "http://meta.faceyspacies.com/wiki/Invalid_Wiki";

require_once( "CommonExtensions.php" );

$WFL = new WikiFactoryLoader();
$wgCityId = $WFL->execute();

$wgDBname = WikiFactory::IDtoDB( $wgCityId );

if( $wikiname == "meta" ) {
	require_once($IP . '/extensions/WikiFactory/SpecialWikiFactory.php');
}

$wgGroupPermissions = array();

require_once( "InitialiseSettings.php" );
require_once( "wgGroupPermissions.php" );

$wgConf->extractAllGlobals( $wgDBname );

$wgCookieDomain = '.faceyspacies.com';

function faceyGetSiteParams( $conf, $wiki ) {
// I don't know if the callback is ever used, just following the example on MW.org
	
	$site = null;
	$lang = null;
	foreach( $conf->suffixes as $suffix ) {
		if ( substr( $wiki, -strlen( $suffix ) ) == $suffix ) {
			$site = $suffix;
			$lang = substr( $wiki, 0, -strlen( $suffix ) );
			if ( len($lang) == 0 ) {
				$lang = 'en';
			}
			break;
		}
	}
	
	return array(
		'suffix' => $site,
		'lang' => $lang,
		'params' => array(
			'lang' => $lang,
			'site' => $site,
			'wiki' => $wiki,
		),
		'tags' => array(),
	);
}