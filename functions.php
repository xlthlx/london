<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage London
 */

add_filter( 'login_display_language_dropdown', '__return_false' );

/**
 *  Enqueue core scripts and core styles.
 */
function london_core_scripts() {

	wp_dequeue_style( 'wp-block-library' );

	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'wp-polyfill' );
	//wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', false, [], true );

}

add_action( 'wp_enqueue_scripts', 'london_core_scripts', 20 );

/**
 * Enqueue admin style.
 */
function london_admin_theme_style() {
	wp_enqueue_style( 'admin-style',
		get_template_directory_uri() . '/assets/css/admin/admin.min.css' );
}

add_action( 'admin_enqueue_scripts', 'london_admin_theme_style' );

/**
 * Enqueue editor scripts.
 *
 * @return void
 */
function enqueue_editor_scripts() {
	wp_enqueue_script( 'theme-editor',
		get_template_directory_uri() . '/assets/js/admin/editor.min.js',
		[ 'wp-blocks', 'wp-dom' ],
		filemtime( get_template_directory() . '/assets/js/admin/editor.min.js' ),
		true );
}

add_action( 'enqueue_block_editor_assets', 'ln_enqueue_editor_scripts' );

/**
 * Add pages into feeds.
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
 * Remove Posts and Comments menu from admin.
 */
function london_remove_menus() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'london_remove_menus' );

/**
 * Registers theme support.
 */
function ln_theme_supports() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption',
		'style',
		'script'
	) );

	remove_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'widgets-block-editor' );
	remove_theme_support( 'core-block-patterns' );
}

add_action( 'after_setup_theme', 'ln_theme_supports' );

require_once __DIR__ . '/vendor.phar';

if ( file_exists( __DIR__ . '/inc/cmb2/cmb2/init.php' ) ) {
	require_once __DIR__ . '/inc/cmb2/cmb2/init.php';
}

require_once __DIR__ . '/inc/custom-post-types.php';
require_once __DIR__ . '/inc/custom-fields.php';
require_once __DIR__ . '/inc/custom-login.php';
require_once __DIR__ . '/inc/toolkit/toolkit.php';
require_once __DIR__ . '/inc/template-functions.php';
require_once __DIR__ . '/inc/template-tags.php';
require_once __DIR__ . '/inc/minify-html.php';
