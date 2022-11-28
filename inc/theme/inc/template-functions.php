<?php
/**
 * Custom functions for this theme.
 *
 * @package London
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
	wp_enqueue_script( 'wp-tinymce-root', '/wp-includes/js/tinymce/tinymce.min.js', array(), '1.0' );
	wp_enqueue_script( 'wp-tinymce', '/wp-includes/js/tinymce/plugins/compat3x/plugin.min.js', array( 'wp-tinymce-root' ), '1.0' );
}

add_action( 'admin_enqueue_scripts', 'ln_tinymce_enqueue_admin_script' );

/**
 * Replace YouTube.com with the no cookie version.
 *
 * @param string $return The returned oEmbed HTML.
 * @param object $data A data object result from an oEmbed provider.
 *
 * @return string
 */
function ln_youtube_oembed_filters( $return, $data ) {
	if ( false === $return || ! in_array(
		$data->type,
		array( 'rich', 'video' ),
		true 
	) 
	) {
		return $return;
	}

	if ( false !== strpos( $return, 'youtube' ) || false !== strpos(
		$return,
		'youtu.be' 
	) 
	) {
		$return = str_replace(
			'youtube.com/embed',
			'youtube-nocookie.com/embed',
			$return
		);
	}

	return $return;
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
 * @param bool $enable Whether to enable <link> tag discovery. Default true.
 *
 * @return bool
 */
function ln_restore_oembed_cache( $enable ) {
	if ( 1 === did_action( 'wpse_do_cleanup' ) ) {
		$GLOBALS['wp_embed']->usecache = 1;
	}

	return $enable;
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
	$file   = get_template_directory() . '/assets/js/main.min.js';
	$script = ln_get_file_content( $file );

	echo '<script type="text/javascript">' . $script . '</script>';
}

add_action( 'wp_footer', 'ln_insert_scripts' );

/**
 * Send 404 to Plausible.
 *
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

/**
 * Add icons into admin.
 *
 * @return void
 */
function ln_add_admin_icons() {     
	?>
	<?php // @codingStandardsIgnoreStart ?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" sizes="any">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/icon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon.png">
	<?php // @codingStandardsIgnoreEnd ?>
	<?php 
}

add_action( 'login_head', 'ln_add_admin_icons' );
add_action( 'admin_head', 'ln_add_admin_icons' );
