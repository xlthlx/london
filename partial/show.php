<?php
/**
 * Show function.
 *
 * @package London
 */

header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST, GET' );
header( 'Access-Control-Allow-Credentials: true' );
header( 'Cache-Control: no-cache, no-store, must-revalidate' );
header( 'Pragma: no-cache' );
header( 'Expires: 0' );

//define( 'WP_USE_THEMES', false );
require str_replace( '/wp-content/themes/london/partial', '', dirname( __FILE__ ) ) . '/wp-load.php';
$actual_id = filter_var( $_REQUEST['id'], FILTER_SANITIZE_STRING );
include $actual_id . '.php';