<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage London
 */

if ( ! function_exists( 'ln_get_jobs' ) ) {
	/**
	 * @param string $type
	 *
	 * @return array
	 */
	function ln_get_jobs( $type ) {

		$args = array(
			'post_type' => 'job',
			'nopaging'  => true,
			'tax_query' => array(
				array(
					'taxonomy' => 'job_type',
					'field'    => 'slug',
					'terms'    => $type,
				),
			),
			'orderby'   => 'menu_order',
			'order'     => 'DESC',
		);

		$the_query = new WP_Query( $args );
		$results   = [];

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$post_id = get_the_ID();
				$index   = $the_query->current_post;

				$results[ $index ]['ID']        = $post_id;
				$results[ $index ]['title']     = get_the_title();
				$results[ $index ]['item_slug'] = ln_get_item_slug( $post_id );
				$results[ $index ]['item_id']   = ln_get_item_id( $post_id );
				$results[ $index ]['content']   = apply_filters( 'the_content', get_the_content() );

				if ( $type === 'job' ) {
					$results[ $index ]['start_date'] = date( 'm/Y', strtotime( get_post_meta( $post_id, 'job_fields_start_date', true ) ) );
					$results[ $index ]['end_date']   = ( empty( get_post_meta( $post_id, 'job_fields_end_date', true ) ) ) ? 'present' : date( 'm/Y', strtotime( get_post_meta( $post_id, 'job_fields_end_date', true ) ) );
					$results[ $index ]['location']   = get_post_meta( $post_id, 'job_fields_location', true );
					$results[ $index ]['job_title']  = get_post_meta( $post_id, 'job_fields_job_title', true );
					$results[ $index ]['tech']       = get_post_meta( $post_id, 'job_fields_tech', true );
					$results[ $index ]['about']      = get_post_meta( $post_id, 'job_fields_about', true );
					$results[ $index ]['logo']       = get_post_meta( $post_id, 'job_fields_logo', true );
					$results[ $index ]['images']     = get_post_meta( $post_id, 'job_fields_images', true );
				}

				if ( $type === 'work' ) {
					$results[ $index ]['text_date'] = date( 'F Y', strtotime( get_post_meta( $post_id, 'work_fields_text_date', true ) ) );
					$results[ $index ]['logo']      = get_post_meta( $post_id, 'work_fields_logo', true );
					$results[ $index ]['images']    = get_post_meta( $post_id, 'work_fields_images', true );
				}

				if ( $type === 'themes-and-plugins' ) {
					$results[ $index ]['wp_url']      = get_post_meta( $post_id, 'themes_fields_wp_url', true );
					$results[ $index ]['down_url']    = get_post_meta( $post_id, 'themes_fields_down_url', true );
					$results[ $index ]['github_url']  = get_post_meta( $post_id, 'themes_fields_github_url', true );
					$results[ $index ]['logo']        = get_post_meta( $post_id, 'themes_fields_logo', true );
					$results[ $index ]['description'] = get_post_meta( $post_id, 'themes_fields_description', true );
				}

				if ( ! empty( $results[ $index ]['images'] ) ) {
					$key                                  = array_key_first( $results[ $index ]['images'] );
					$first_image                          = wp_get_attachment_image_src( $key, 'medium' );
					$results[ $index ]['first_image']     = $first_image[0];
					$image_id                             = get_post( $key );
					$results[ $index ]['first_image_alt'] = $image_id->post_title;
				}
			}
		}

		wp_reset_postdata();

		return $results;
	}
}

if ( ! function_exists( 'ln_get_item_id' ) ) {
	/**
	 * @param $post_id
	 *
	 * @return string
	 */
	function ln_get_item_id( $post_id ) {
		$return = '';
		$item   = get_post( $post_id );
		$array  = explode( '-', $item->post_name );

		foreach ( $array as $piece ) {
			$return .= ucfirst( $piece );
		}

		return $return;
	}
}

if ( ! function_exists( 'ln_get_item_slug' ) ) {
	/**
	 * @param $post_id
	 *
	 * @return string
	 */
	function ln_get_item_slug( $post_id ) {
		$item = get_post( $post_id );

		return sanitize_title( $item->post_name );;
	}
}

if ( ! function_exists( 'ln_get_file_content' ) ) {
	/**
	 * This method gets the content of a given file.
	 *
	 * @param string $file_path
	 *
	 * @return  string Content of $file_path
	 */
	function ln_get_file_content( $file_path ) {

		global $wp_filesystem;
		require_once( ABSPATH . '/wp-admin/includes/file.php' );

		WP_Filesystem();
		$content = '';

		if ( $wp_filesystem->exists( $file_path ) ) {
			$content = $wp_filesystem->get_contents( $file_path );
		}

		return $content;

	}
}
