<?php
global $wikiname;
global $lang;

$wgConf->settings = array(

'wgEnableUploads' => array(
	'default' => true,
),

'wgSharedDB' => array(
	'default' => 'metawiki'
),

'wgSharedTables' => array(
	'default' => array(
		'global_user_groups',
		'user'
	),
),

'wgDefaultSkin' => array(
	'default' => 'vector',
),

'wgAddGroups' => array(
	'default' => array(
		'bureaucrat' => array( 'sysop', 'bureaucrat', 'bot' ),
	),
),

'wgGroupsRemoveFromSelf' => array(
	'default' => array(
		'bureaucrat' => array( 'bureaucrat' ),
	),
),

'wgRemoveGroups' => array(
	'default' => array(
		'bureaucrat' => array( 'sysop', 'bot' ),
	),
),

);