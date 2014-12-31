<?php

$wgConf->suffixes = array(
	'wiki',
);

$wgConf->wikis = array_map( 'trim', file( "$IP/../config/all.dblist" ) );

$wgConf->localVHosts = array(
	'faceyspacies.com'
);

$wgConf->fullLoadCallback = 'faceyGetSiteParams';

$wgLocalDatabases =& $wgConf->getLocalDatabases();