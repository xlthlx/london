<?php
/**
 * Custom template tags for this theme.
 *
 * @package London
 */

if ( ! function_exists( 'ln_get_jobs' ) ) {
	/**
	 * Gets jobs list.
	 *
	 * @return array
	 */
	function ln_get_jobs() {

		$args = array(
			'post_type' => 'job',
			'nopaging'  => true,
			'orderby'   => 'menu_order',
			'order'     => 'DESC',
		);

		$the_query = new WP_Query( $args );
		$results   = array();

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$post_id = get_the_ID();
				$index   = $the_query->current_post;

				$job_types                 = get_the_terms( $post_id, 'job_type' );
				$type                      = '';
				$results[ $index ]['type'] = '';
				if ( $job_types && ! is_wp_error( $job_types ) ) {
					$type                      = $job_types[0]->slug;
					$results[ $index ]['type'] = $type;
				}

				$results[ $index ]['ID']        = $post_id;
				$results[ $index ]['title']     = get_the_title();
				$results[ $index ]['item_slug'] = ln_get_item_slug( $post_id );
				$results[ $index ]['item_id']   = ln_get_item_id( $post_id );
				$results[ $index ]['content']   = apply_filters( 'the_content', get_the_content() );

				if ( 'job' === $type ) {
					$terms                          = get_the_terms( get_the_ID(), 'job_role' );
					$results[ $index ]['job_title'] = '';
					if ( $terms && ! is_wp_error( $terms ) ) {
						$results[ $index ]['job_title'] = $terms[0]->name;
					}

					$results[ $index ]['start_date'] = date( 'm/Y', (int) get_post_meta( $post_id, 'job_fields_start_date', true ) );
					$results[ $index ]['end_date']   = ( '' === get_post_meta( $post_id, 'job_fields_end_date', true ) ) ? 'present' : date( 'm/Y', (int) get_post_meta( $post_id, 'job_fields_end_date', true ) );
					$results[ $index ]['location']   = get_post_meta( $post_id, 'job_fields_location', true );
					$results[ $index ]['tech']       = get_post_meta( $post_id, 'job_fields_tech', true );
					$results[ $index ]['about']      = get_post_meta( $post_id, 'job_fields_about', true );
					$results[ $index ]['logo']       = get_post_meta( $post_id, 'job_fields_logo', true );
					$results[ $index ]['images']     = get_post_meta( $post_id, 'job_fields_images', true );
				}

				if ( 'work' === $type ) {
					$results[ $index ]['text_date'] = date( 'F Y', (int) get_post_meta( $post_id, 'work_fields_text_date', true ) );
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
	 * Gets the item ID.
	 *
	 * @param int $post_id The post ID.
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
	 * Gets item slug.
	 *
	 * @param int $post_id The post ID.
	 *
	 * @return string
	 */
	function ln_get_item_slug( $post_id ) {
		$item = get_post( $post_id );

		return sanitize_title( $item->post_name );

	}
}

if ( ! function_exists( 'ln_get_file_content' ) ) {
	/**
	 * This method gets the content of a given file.
	 *
	 * @param string $file_path The file path.
	 *
	 * @return string
	 */
	function ln_get_file_content( $file_path ) {

		global $wp_filesystem;
		include_once ABSPATH . '/wp-admin/includes/file.php';

		WP_Filesystem();
		$content = '';

		if ( $wp_filesystem->exists( $file_path ) ) {
			$content = $wp_filesystem->get_contents( $file_path );
		}

		return $content;

	}
}
