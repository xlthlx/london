<?php
/**
 * Functions and definitions.
 *
 * @package London
 */

/**
 * Removes filters.
 *
 * @return void
 */
function ln_remove_filters() {
	add_filter( 'login_display_language_dropdown', '__return_false' );
	add_filter( 'enable_post_by_email_configuration', '__return_false' );
}

add_action( 'init', 'ln_remove_filters' );

/**
 *  Dequeue core styles.
 *
 * @return void
 */
function ln_core_styles() {

	wp_dequeue_style( 'classic-theme-styles' );
	wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'ln_core_styles', 20 );


/**
 * Remove Akismet Frontend js.
 *
 * @return void
 */
function ln_remove_akismet_frontend_js() {
	remove_action( 'comment_form', array( 'Akismet', 'load_form_js' ) );
	remove_action( 'comment_form', array( 'Akismet', 'output_custom_form_fields' ) );
	remove_action( 'do_shortcode_tag', array( 'Akismet', 'load_form_js_via_filter' ) );
}

add_action( 'init', 'ln_remove_akismet_frontend_js', 99 );

/**
 * Enqueue admin style.
 *
 * @return void
 */
function ln_admin_theme_style() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin/admin.min.css', array(), filemtime( get_template_directory() . '/assets/css/admin/admin.min.css' ) );
}

add_action( 'admin_enqueue_scripts', 'ln_admin_theme_style' );

/**
 * Add pages into feeds.
 *
 * @param array $query_vars The array of requested query variables.
 *
 * @return array
 */
function ln_feed_request( $query_vars ) {
	$rss_post_types = array( 'page' );
	if ( isset( $query_vars['feed'] ) && ! isset( $query_vars['post_type'] ) ) {
		$query_vars['post_type'] = $rss_post_types;
	}

	return $query_vars;
}

add_filter( 'request', 'ln_feed_request' );

/**
 * Remove Posts and Comments menu from admin.
 *
 * @return void
 */
function ln_remove_menus() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'ln_remove_menus' );

/**
 * Registers theme support.
 *
 * @return void
 */
function ln_theme_supports() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-spacing' );
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	remove_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'widgets-block-editor' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );

}

add_action( 'after_setup_theme', 'ln_theme_supports' );

require_once 'vendor.phar';

if ( file_exists( get_template_directory() . '/inc/cmb2/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/inc/cmb2/cmb2/init.php';
}

require_once get_template_directory() . '/inc/theme/index.php';
require_once get_template_directory() . '/inc/toolkit/index.php';
