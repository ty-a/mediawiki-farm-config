<?php

$extensions = array(
$IP . '/extensions/GlobalUserrights/GlobalUserrights.php',
$IP . '/extensions/GlobalBlocking/GlobalBlocking.php'
);

foreach ( $extensions as $extension ) {
	require_once( $extension );
}