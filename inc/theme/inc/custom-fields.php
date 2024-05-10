<?php
/**
 * Custom fields.
 *
 * @package London
 */

/**
 * Register job fields.
 *
 * @return void
 */
function ln_register_job_fields() { 
	$job_fields = new_cmb2_box(
		array(
			'id'           => 'job_fields',
			'title'        => 'Job details',
			'object_types' => array( 'job' ),
			'show_on'      => array(
				'key'   => 'taxonomy',
				'value' => array(
					'job_type' => 'job',
				),
			),
			'context'      => 'normal',
			'priority'     => 'high',
			'show_in_rest' => true,
		) 
	);

	$job_fields->add_field(
		array(
			'name'        => 'Start date',
			'id'          => 'job_fields_start_date',
			'type'        => 'text_date_timestamp',
			'date_format' => 'd/m/Y',
		) 
	);

	$job_fields->add_field(
		array(
			'name'        => 'End date',
			'id'          => 'job_fields_end_date',
			'type'        => 'text_date_timestamp',
			'date_format' => 'd/m/Y',
		) 
	);

	$job_fields->add_field(
		array(
			'name'             => 'Location',
			'id'               => 'job_fields_location',
			'type'             => 'select',
			'show_option_none' => false,
			'options'          => array(
				'London, United Kingdom' => 'London, United Kingdom',
				'Milan, Italy'           => 'Milan, Italy',
			),
		) 
	);

	$job_fields->add_field(
		array(
			'name'    => 'About the company',
			'id'      => 'job_fields_about',
			'type'    => 'textarea',
		) 
	);

	$job_fields->add_field(
		array(
			'name' => 'Technologies used',
			'id'   => 'job_fields_tech',
			'type' => 'textarea_small',
		) 
	);

	$job_fields->add_field(
		array(
			'name'         => 'Logo',
			'id'           => 'job_fields_logo',
			'type'         => 'file',
			'text'         => array(
				'add_upload_file_text' => 'Add logo',
			),
			'preview_size' => array( 100, 100 ),
		) 
	);

	$job_fields->add_field(
		array(
			'name'         => 'Images',
			'id'           => 'job_fields_images',
			'type'         => 'file_list',
			'preview_size' => array( 100, 100 ),
		) 
	);
}

add_action( 'cmb2_admin_init', 'ln_register_job_fields' );

/**
 * Register work fields.
 *
 * @return void
 */
function ln_register_work_fields() { 
	$work_fields = new_cmb2_box(
		array(
			'id'           => 'work_fields',
			'title'        => 'Work details',
			'object_types' => array( 'job' ),
			'show_on'      => array(
				'key'   => 'taxonomy',
				'value' => array(
					'job_type' => 'work',
				),
			),
			'context'      => 'normal',
			'priority'     => 'high',
			'show_in_rest' => true,
		) 
	);

	$work_fields->add_field(
		array(
			'name'        => 'Date',
			'id'          => 'work_fields_text_date',
			'type'        => 'text_date_timestamp',
			'date_format' => 'd/m/Y',
		) 
	);

	$work_fields->add_field(
		array(
			'name'         => 'Logo',
			'id'           => 'work_fields_logo',
			'type'         => 'file',
			'text'         => array(
				'add_upload_file_text' => 'Add logo',
			),
			'preview_size' => array( 100, 100 ),
		) 
	);

	$work_fields->add_field(
		array(
			'name'         => 'Images',
			'id'           => 'work_fields_images',
			'type'         => 'file_list',
			'preview_size' => array( 100, 100 ),
		) 
	);

}

add_action( 'cmb2_admin_init', 'ln_register_work_fields' );

/**
 * Shows taxonomy on filter.
 * 
 * @param bool  $display Display.
 * @param array $meta_box The meta box.
 *
 * @return bool
 */
function ln_taxonomy_show_on_filter( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'taxonomy' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// @codingStandardsIgnoreStart
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	// @codingStandardsIgnoreEnd

	if ( ! $post_id ) {
		return $display;
	}

	foreach ( (array) $meta_box['show_on']['value'] as $taxonomy => $slugs ) {
		if ( ! is_array( $slugs ) ) {
			$slugs = array( $slugs );
		}

		$display = false;
		$terms   = wp_get_object_terms( $post_id, $taxonomy );
		foreach ( $terms as $term ) {
			if ( in_array( $term->slug, $slugs, true ) ) {
				$display = true;
				break;
			}
		}

		if ( $display ) {
			break;
		}
	}

	return $display;
}

add_filter( 'cmb2_show_on', 'ln_taxonomy_show_on_filter', 10, 2 );
