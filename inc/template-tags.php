<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
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
				$slug    = get_post_field( 'post_name', $post_id );
				$index   = $the_query->current_post;

				$results[ $index ]['ID']        = $post_id;
				$results[ $index ]['title']     = get_the_title();
				$results[ $index ]['item_slug'] = $slug;
				$results[ $index ]['item_id']   = ln_get_item_id( $slug );
				$results[ $index ]['content']   = apply_filters( 'the_content', get_the_content() );

				if ( $type === 'job' ) {
					$results[ $index ]['start_date'] = date( 'm/Y', strtotime( get_post_meta( $post_id, 'job_fields_start_date', true ) ) );
					$results[ $index ]['end_date']   = ( empty( get_post_meta( $post_id, 'job_fields_end_date', true ) ) ) ? 'present' : date( 'm/Y', strtotime( get_post_meta( $post_id, 'job_fields_end_date', true ) ) );
					$results[ $index ]['location']   = get_post_meta( $post_id, 'job_fields_location', true );
					$results[ $index ]['job_title']  = get_post_meta( $post_id, 'job_fields_job_title', true );
					$results[ $index ]['tech']       = get_post_meta( $post_id, 'job_fields_tech', true );
					$results[ $index ]['about']      = get_post_meta( $post_id, 'job_fields_about', true );
					$results[ $index ]['logo']      = get_post_meta( $post_id, 'job_fields_logo', true );
					$results[ $index ]['images']    = get_post_meta( $post_id, 'job_fields_images', true );
				}

				if ( $type === 'work' ) {
					$results[ $index ]['text_date'] = date( 'F Y', strtotime( get_post_meta( $post_id, 'work_fields_text_date', true ) ) );
					$results[ $index ]['logo']      = get_post_meta( $post_id, 'work_fields_logo', true );
					$results[ $index ]['images']    = get_post_meta( $post_id, 'work_fields_images', true );
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
	 * @param $slug
	 *
	 * @return string
	 */
	function ln_get_item_id( $slug ) {
		$return = '';
		$array  = explode( '-', $slug );

		foreach ( $array as $piece ) {
			$return .= ucfirst( $piece );
		}

		return $return;
	}
}
