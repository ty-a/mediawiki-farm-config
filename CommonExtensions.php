<?php

$extensions = array(
$IP . '/extensions/GlobalUserrights/GlobalUserrights.php',
$IP . '/extensions/GlobalBlocking/GlobalBlocking.php',
$IP . '/extensions/CheckUser/CheckUser.php',
$IP . '/extensions/WikiFactory/Loader/WikiFactoryLoader.php',
$IP . '/extensions/EasyTemplate/EasyTemplate.php',
);

foreach ( $extensions as $extension ) {
	require_once( $extension );
}