<?php

$extensions = array(
$IP . '/extensions/GlobalUserrights/GlobalUserrights.php',
$IP . '/extensions/GlobalBlocking/GlobalBlocking.php',
$IP . '/extensions/CheckUser/CheckUser.php'
);

foreach ( $extensions as $extension ) {
	require_once( $extension );
}