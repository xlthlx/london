<?php
/**
 * Sitemap.
 *
 * @package London
 */

// This removes the authors part of the sitemap
add_filter( 'wp_sitemaps_add_provider', function ($provider, $name) {
	return ( $name === 'users' ) ? false : $provider;
}, 10, 2);


// Here's how we can remove categories, post tags and custom taxonomies
add_filter(
	'wp_sitemaps_taxonomies',
	static function( $taxonomies ) {
		unset( $taxonomies['job_type'], $taxonomies['job_role'] );

		return $taxonomies;
	}
);

// Here's how we can remove post types
function remove_post_type_from_wp_sitemap( $post_types ) {
	unset( $post_types['job'] );
	return $post_types;
}
add_filter( 'wp_sitemaps_post_types', 'remove_post_type_from_wp_sitemap' );