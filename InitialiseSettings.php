<?php
global $wikiname;
global $lang;

$wgConf->settings = array(

'wgLanguageCode' => array(
	'default' => $lang,
),

'wgEnableUploads' => array(
	'default' => true,
),

'wgSitename' => array(
	'default' => ucfirst($wikiname) . ' Wiki',
),

'wgMetaNamespace' => array(
	'default' => ucfirst($wikiname),
),

'wgServer' => array(
	'default' => '//' . $wikiname . '.faceyspacies.com',
),

'wgCanonicalServer' => array(
	'default' => 'http://' . $wikiname . '.faceyspacies.com',
),

'wgArticlePath' => array(
	'default' => '/index.php/$1',
),

'wgUploadDirectory' => array(
	'default' => '/var/www/html/images/' . $wikiname,
),

'wgUploadPath' => array(
	'default' => '//images.faceyspacies.com/images/' . $wikiname,
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