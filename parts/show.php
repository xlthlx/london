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

require str_replace( '/wp-content/themes/london/parts', '', dirname( __FILE__ ) ) . '/wp-load.php';
$actual_id = filter_var( $_REQUEST['id'] );
require $actual_id . '.php';
