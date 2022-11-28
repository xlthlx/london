<?php
/**
 * Functions and definitions.
 *
 * @package London
 */

add_filter( 'login_display_language_dropdown', '__return_false' );

/**
 *  Enqueue core scripts and core styles.
 *
 * @return void
 */
function ln_core_scripts() { 
	wp_dequeue_style( 'wp-block-library' );

	if ( 'http://localhost' !== home_url() && ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'wp-polyfill' );
	}

}

add_action( 'wp_enqueue_scripts', 'ln_core_scripts', 20 );

/**
 * Enqueue admin style.
 *
 * @return void
 */
function ln_admin_theme_style() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin/admin.min.css', array(), '1.0' );
}

add_action( 'admin_enqueue_scripts', 'ln_admin_theme_style' );

/**
 * Enqueue editor scripts.
 *
 * @return void
 */
function ln_enqueue_editor_scripts() {
	wp_enqueue_script(
		'theme-editor',
		get_template_directory_uri() . '/assets/js/admin/editor.min.js',
		array( 'wp-blocks', 'wp-dom' ),
		filemtime( get_template_directory() . '/assets/js/admin/editor.min.js' ),
		true
	);
}

add_action( 'enqueue_block_editor_assets', 'ln_enqueue_editor_scripts' );

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
 * Adds the plausible scripts to header.
 *
 * @return void
 */
function ln_add_to_header() {   ?>
	<?php // @codingStandardsIgnoreStart ?>
    <script id="stats" defer data-domain="piccioni.london" src="https://plausible.io/js/script.outbound-links.file-downloads.hash.js"></script>
    <script>
        window.plausible = window.plausible || function () {
            (window.plausible.q = window.plausible.q || []).push(arguments)
        }
    </script>
	<?php // @codingStandardsIgnoreEnd ?>
	<?php
}

add_action( 'wp_head', 'ln_add_to_header' );

/**
 * Adds to wp_footer.
 *
 * @return void
 */
function ln_add_to_footer() { 	// @codingStandardsIgnoreStart ?>
	<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap" rel="stylesheet">
	<?php // @codingStandardsIgnoreEnd
}

add_action( 'wp_footer', 'ln_add_to_footer', 100 );

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
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		) 
	);

	remove_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'widgets-block-editor' );
	remove_theme_support( 'core-block-patterns' );
}

add_action( 'after_setup_theme', 'ln_theme_supports' );

require_once 'vendor.phar';

if ( file_exists( dirname( __FILE__ ) . '/inc/cmb2/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/inc/cmb2/cmb2/init.php';
}

require_once dirname( __FILE__ ) . '/inc/theme/index.php';
require_once dirname( __FILE__ ) . '/inc/toolkit/index.php';
