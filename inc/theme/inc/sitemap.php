<?php
/**
 * Sitemap.
 *
 * @package London
 */

/**
 * Remove users from wp-sitemap.xml.
 *
 * @param string $provider Provider.
 * @param string $name Provider name.
 *
 * @return false|string
 */
function ln_remove_users_from_wp_sitemap( $provider, $name ) {
	return ( 'users' === $name ) ? false : $provider;
}

add_filter( 'wp_sitemaps_add_provider', 'ln_remove_users_from_wp_sitemap', 10, 2 );

/**
 * Remove taxonomies from wp-sitemap.xml.
 *
 * @param array $taxonomies Taxonomies.
 *
 * @return array
 */
function ln_remove_taxonomies_from_wp_sitemap( $taxonomies ) {
	unset( $taxonomies['job_type'], $taxonomies['job_role'] );

	return $taxonomies;
}

add_filter( 'wp_sitemaps_taxonomies', 'ln_remove_taxonomies_from_wp_sitemap' );

/**
 * Remove job post type from wp-sitemap.xml.
 *
 * @param array $post_types Post types.
 *
 * @return array
 */
function ln_remove_job_from_wp_sitemap( $post_types ) {
	unset( $post_types['job'] );

	return $post_types;
}

add_filter( 'wp_sitemaps_post_types', 'ln_remove_job_from_wp_sitemap' );
