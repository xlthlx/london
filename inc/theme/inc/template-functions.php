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

	echo '<script type="text/javascript">' . $script . '</script>';
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

/**
 * Wrap the image with picture tag to support webp.
 *
 * @param string   $html HTML img element or empty string on failure.
 * @param int      $attachment_id Image attachment ID.
 * @param string   $size Requested image size.
 * @param bool     $icon Whether the image should be treated as an icon.
 * @param string[] $attr Attributes for the image markup.
 *
 * @return string
 */
function ln_wrap_image_with_picture( $html, $attachment_id, $size, $icon, $attr ) {
	if ( is_admin() ) {
		return $html;
	}

	$type = get_post_mime_type( $attachment_id );

	if ( ! $icon ) {
		$webp_src = preg_replace( '/(?:jpg|png|jpeg)$/i', 'webp', $attr['src'] );

		$html = '<picture>
			  <source srcset="' . $webp_src . '" type="image/webp">
			  <source srcset="' . $attr['src'] . '" type="' . $type . '">
			  ' . $html . '
			</picture>';
	}

	return $html;
}

add_filter( 'wp_get_attachment_image', 'ln_wrap_image_with_picture', 10, 5 );

/**
 * Wrap the image with picture tag to support webp.
 *
 * @param string $filtered_image Full img tag with attributes that will replace the source img tag.
 * @param string $context Additional context, like the current filter name or the function name from where this was called.
 * @param int    $attachment_id Image attachment ID.
 *
 * @return string
 */
function ln_image_with_picture( $filtered_image, $context, $attachment_id ) {
	if ( is_admin() ) {
		return $filtered_image;
	}

	$type = get_post_mime_type( $attachment_id );

	preg_match( '/width="([^"]+)/i', $filtered_image, $width, PREG_OFFSET_CAPTURE );
	preg_match( '/height="([^"]+)/i', $filtered_image, $height, PREG_OFFSET_CAPTURE );
	if ( isset( $width[1], $height[1] ) ) {
		$size = array( $width[1][0], $height[1][0] );
	} else {
		$size = 'full';
	}

	$img_src  = wp_get_attachment_image_url( $attachment_id, $size );
	$webp_src = preg_replace( '/(?:jpg|png|jpeg)$/i', 'webp', $img_src );

	$filtered_image = '<picture>
			  <source srcset="' . $webp_src . '" type="image/webp">
			  <source srcset="' . $img_src . '" type="' . $type . '">
			  ' . $filtered_image . '
			</picture>';

	return $filtered_image;
}

add_filter( 'wp_content_img_tag', 'ln_image_with_picture', 10, 3 );
