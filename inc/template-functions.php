<?php
/**
 * Custom functions for this theme.
 *
 * @package WordPress
 * @subpackage London
 */

add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Add plugin to TinyMCE.
 *
 * @return void
 */
function ln_tinymce_enqueue_admin_script() {
	wp_deregister_script( 'wp-tinymce' );
	wp_enqueue_script( 'wp-tinymce-root', '/wp-includes/js/tinymce/tinymce.min.js', [] );
	wp_enqueue_script( 'wp-tinymce', '/wp-includes/js/tinymce/plugins/compat3x/plugin.min.js',
		[ 'wp-tinymce-root' ] );
}

add_action( 'admin_enqueue_scripts', 'ln_tinymce_enqueue_admin_script' );

/**
 * Replace youtube.com with the no cookie version.
 *
 * @param $html
 * @param $data
 * @param $url
 *
 * @return string
 */
function ln_youtube_oembed_filters( $html, $data, $url ) {
	if ( false === $html || ! in_array( $data->type, [ 'rich', 'video' ],
			true ) ) {
		return $html;
	}

	if ( false !== strpos( $html, 'youtube' ) || false !== strpos( $html,
			'youtu.be' ) ) {
		$html = str_replace( 'youtube.com/embed', 'youtube-nocookie.com/embed',
			$html );
	}

	return $html;
}

add_filter( 'oembed_dataparse', 'ln_youtube_oembed_filters', 99, 3 );

/**
 * Clean the oembed cache.
 *
 * @return int
 */
function ln_clean_oembed_cache() {
	$GLOBALS['wp_embed']->usecache = 0;
	do_action( 'wpse_do_cleanup' );

	return 0;
}

add_filter( 'oembed_ttl', 'ln_clean_oembed_cache' );

/**
 * Restore the oembed cache.
 *
 * @param $discover
 *
 * @return mixed
 */
function ln_restore_oembed_cache( $discover ) {
	if ( 1 === did_action( 'wpse_do_cleanup' ) ) {
		$GLOBALS['wp_embed']->usecache = 1;
	}

	return $discover;
}

add_filter( 'embed_oembed_discover', 'ln_restore_oembed_cache' );

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
	$file  = get_template_directory() . '/assets/js/main.min.js';
	$script = ln_get_file_content( $file );

	echo '<script type="text/javascript">' . $script . '</script>';
}

add_action( 'wp_footer', 'ln_insert_scripts' );

/**
 * @return void
 */
function ln_404_plausible() {
	if ( is_404() ) {
		?>
		<script>plausible("404", {props: {path: document.location.pathname}});</script>
		<?php
	}
}

add_action( 'wp_head', 'ln_404_plausible' );