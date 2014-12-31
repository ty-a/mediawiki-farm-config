<?php

$extensions = array(
'/var/www/html/extensions/GlobalUserrights/GlobalUserrights.php',
);

foreach ( $extensions as $extension ) {
	require_once( $extension );
}