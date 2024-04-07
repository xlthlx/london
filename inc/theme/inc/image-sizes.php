<?php
/**
 * Image sizes.
 *
 * @package London
 */

/**
 * Disable all images sizes but the full.
 *
 * @param array $sizes The image sizes.
 *
 * @return array
 */
function ln_disable_media_sizes( $sizes ) {
	unset( $sizes['small'], $sizes['medium'], $sizes['large'], $sizes['medium_large'] );

	return $sizes;
}

add_filter( 'intermediate_image_sizes_advanced', 'ln_disable_media_sizes' );