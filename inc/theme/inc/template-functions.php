<?php
/**
 * Custom functions for this theme.
 *
 * @package London
 */

/**
 * Insert minified CSS into header.
 *
 * @return void
 */
function ln_insert_css() {
	$file  = get_template_directory() . '/assets/css/main.min.css';
	$style = ln_get_file_content( $file );

	echo '<style id="all-styles-inline">' . $style . '</style>';
}

add_action( 'wp_head', 'ln_insert_css' );

/**
 * Insert minified JS into footer.
 *
 * @return void
 */
function ln_insert_scripts() {
	$file   = get_template_directory() . '/assets/js/main.min.js';
	$script = ln_get_file_content( $file );

	echo '<script id="all-scripts-inline" type="text/javascript">' . $script . '</script>';
}

add_action( 'wp_footer', 'ln_insert_scripts' );

/**
 * Removes WP Logo and comments in the admin bar.
 *
 * @return void
 */
function ln_remove_admin_bar_wp_logo() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'comments' );
}

add_action( 'wp_before_admin_bar_render', 'ln_remove_admin_bar_wp_logo', 20 );

/**
 * Change the title separator.
 *
 * @return string
 */
function ln_document_title_separator() {
	return '|';
}

add_filter( 'document_title_separator', 'ln_document_title_separator' );
