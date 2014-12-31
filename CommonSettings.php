<?php

global $wikiname;
// default language is english
global $lang;
$lang = 'en';
if( $wgCommandLineMode ) {
	//$_SERVER['HTTP_HOST'] = 'meta.faceyspacies.com';
	$_SERVER['HTTP_HOST'] = readline("Wiki URL: ");
}

if ( preg_match( '/^(.*)\.faceyspacies.com$/', $_SERVER['HTTP_HOST'], $matches ) ) {
     $wikiname = $matches[1];
} else {
     die( "Invalid host name, can't determine wiki name" );
     // You could also redirect to a nicer "No such wiki" page.
}
 
if( $wikiname == "www"  || $wikiname == "images" ) {
     // Change this to your "main" wiki.
     $wikiname = "meta";
}

if( strpos( $wikiname, '.' ) !== false ) {
	$lang = substr( $wikiname, 0, 2 ); # lang codes are 2 chars
	$wgDBname = str_replace( ".", "", $wikiname ) . "wiki";
} else {
	$wgDBname = $wikiname . 'wiki';
}

$wgConf = new SiteConfiguration;
 
require_once( "wgConf.php" );

if (! in_array($wgDBname, $wgLocalDatabases)) {
	die("This wiki does not exist");
}

require_once( "InitialiseSettings.php" );

$wgConf->extractAllGlobals( $wgDBname );

$wgCookieDomain = '.faceyspacies.com';

require_once( "CommonExtensions.php" );

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