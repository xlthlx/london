<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage London
 */

/**
 *  Enqueue core scripts and core styles
 */
function london_core_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css', false, [],
		'screen,print' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', false, [],
		'screen,print' );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.bundle.min.js', false, [], true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', false, [], true );

}

add_action( 'wp_enqueue_scripts', 'london_core_scripts', 20 );

/**
 * Enqueue admin style.
 */
function london_admin_theme_style() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin/admin.css' );
}

add_action( 'admin_enqueue_scripts', 'london_admin_theme_style' );

/**
 * Add pages into feeds
 *
 * @param $qv
 *
 * @return mixed
 */
function london_feed_request( $qv ) {
	$rss_post_types = [ 'page' ];
	if ( isset( $qv['feed'] ) && ! isset( $qv['post_type'] ) ) {
		$qv['post_type'] = $rss_post_types;
	}

	return $qv;
}

add_filter( 'request', 'london_feed_request' );

/**
 * Remove Posts and Comments menu from admin
 */
function london_remove_menus() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'london_remove_menus' );

require_once __DIR__ . '/vendor.phar';

if ( file_exists( __DIR__ . '/inc/cmb2/cmb2/init.php' ) ) {
	require_once __DIR__ . '/inc/cmb2/cmb2/init.php';
}

require_once __DIR__ . '/inc/custom-post-types.php';
require_once __DIR__ . '/inc/custom-fields.php';
require_once __DIR__ . '/inc/custom-login.php';
require_once __DIR__ . '/inc/toolkit/toolkit.php';
require_once __DIR__ . '/inc/template-tags.php';
