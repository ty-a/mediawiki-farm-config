<?php
$wgConf->settings['wgGroupPermissions'] =  array(
	'default' => array(
		'*' => array(
			'createaccount' => true,
			'read' => true,
			'edit' => true,
			'createpage' => true,
			'createtalk' => true,
			'writeapi' => true,
			'editmyusercss' => true,
			'editmyuserjs' => true,
			'viewmywatchlist' => true,
			'editmywatchlist' => true,
			'viewmyprivateinfo' => true,
			'editmyprivateinfo' => true,
			'editmyoptions' => true,
		),
		
		'user' => array(
			'move' => true,
			'move-subpages' => true,
			'move-rootuserpages' => true,
			'move-categorypages' => true,
			'movefile' => true,
			'read' => true,
			'edit' => true,
			'createpage' => true,
			'createtalk' => true,
			'writeapi' => true,
			'upload' => true,
			'reupload' => true,
			'reupload-shared' => true,
			'minoredit' => true,
			'purge' => true,
			'sendemail' => true,
		),
		
		'autoconfirmed' => array(
			'autoconfirmed' => true,
			'editsemiprotected' => true
		),
		
		'bot' => array(
			'bot' => true,
			'autoconfirmed' => true,
			'editsemiprotected' => true,
			'nominornewtalk' => true,
			'autopatrol' => true,
			'suppressredirect' => true,
			'apihighlimits' => true,
			'writeapi' => true,
		),
		
		'sysop' => array(
			'block' => true,
			'createaccount' => true,
			'delete' => true,
			'bigdelete' => true,
			'deletedhistory' => true,
			'deletedtext' => true,
			'undelete' => true,
			'editinterface' => true,
			'editusercss' => true,
			'edituserjs' => true,
			'import' => true,
			'importupload' => true,
			'move' => true,
			'move-subpages' => true,
			'move-rootuserpages' => true,
			'move-categorypages' => true,
			'patrol' => true,
			'autopatrol' => true,
			'protect' => true,
			'editprotected' => true,
			'proxyunbannable' => true,
			'rollback' => true,
			'upload' => true,
			'reupload' => true,
			'reupload-shared' => true,
			'unwatchedpages' => true,
			'autoconfirmed' => true,
			'editsemiprotected' => true,
			'ipblock-exempt' => true,
			'blockemail' => true,
			'markbotedits' => true,
			'apihighlimits' => true,
			'browsearchive' => true,
			'noratelimit' => true,
			'movefile' => true,
			'unblockself' => true,
			'suppressredirect' => true,
			'mergehistory' => true,
			
			# extension rights
			'globalblock-whitelist' => true,
		),

		'staff' => array(
			# basic admin rights
			'block' => true,
			'createaccount' => true,
			'delete' => true,
			'bigdelete' => true,
			'deletedhistory' => true,
			'deletedtext' => true,
			'undelete' => true,
			'editinterface' => true,
			'editusercss' => true,
			'edituserjs' => true,
			'import' => true,
			'importupload' => true,
			'move' => true,
			'move-subpages' => true,
			'move-rootuserpages' => true,
			'move-categorypages' => true,
			'patrol' => true,
			'autopatrol' => true,
			'protect' => true,
			'editprotected' => true,
			'proxyunbannable' => true,
			'rollback' => true,
			'upload' => true,
			'reupload' => true,
			'reupload-shared' => true,
			'unwatchedpages' => true,
			'autoconfirmed' => true,
			'editsemiprotected' => true,
			'ipblock-exempt' => true,
			'blockemail' => true,
			'markbotedits' => true,
			'apihighlimits' => true,
			'browsearchive' => true,
			'noratelimit' => true,
			'movefile' => true,
			'unblockself' => true,
			'suppressredirect' => true,
			'mergehistory' => true,
			
			'userrights' => true,
			
			'checkuser' => true,
			'checkuser-log' => true,
			
			'wikifactory' => true,
			
			#global rights
			'globalblock-exempt' => true,
			'globalblock-whitelist' => true,
		),
		
		'checkuser' => array(
			'checkuser' => true,
			'checkuser-log' => true
		), 
		
		'bureaucrat' => array(
			'userrights' => false
		),
	),
	'+metawiki' => array(
		'staff' => array(
			'globalblock' => true,
			'userrights-global' => true, # want all global right changes on meta
		),
	),
);