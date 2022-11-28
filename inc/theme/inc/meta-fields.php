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
			'show_in_rest' => WP_REST_Server::ALLMETHODS,
		) 
	);

	$job_fields->add_field(
		array(
			'name'        => 'Start date',
			'id'          => 'job_fields_start_date',
			'type'        => 'text_date',
			'date_format' => 'd-m-Y',
		) 
	);

	$job_fields->add_field(
		array(
			'name'        => 'End date',
			'id'          => 'job_fields_end_date',
			'type'        => 'text_date',
			'date_format' => 'd-m-Y',
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
			'name'             => 'Job title',
			'id'               => 'job_fields_job_title',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => array(
				'Chief Technical Officer'             => 'Chief Technical Officer',
				'Contractor'                          => 'Contractor',
				'Developer'                           => 'Developer',
				'e-Learning Designer'                 => 'e-Learning Designer',
				'e-Learning Developer'                => 'e-Learning Developer',
				'Information Architect'               => 'Information Architect',
				'Online Engineer'                     => 'Online Engineer',
				'PHP Developer'                       => 'PHP Developer',
				'PHP Programmer'                      => 'PHP Programmer',
				'Senior Developer'                    => 'Senior Developer',
				'Senior PHP Developer'                => 'Senior PHP Developer',
				'Senior WordPress Developer'          => 'Senior WordPress Developer',
				'Web Area Coordinator and Programmer' => 'Web Area Coordinator and Programmer',
				'Web Developer'                       => 'Web Developer',
				'Web Developer Senior'                => 'Web Developer Senior',
				'Web Master'                          => 'Web Master',
				'Website Developer'                   => 'Website Developer',
				'WordPress Developer'                 => 'WordPress Developer',
				'WordPress/PHP Web Developer'         => 'WordPress/PHP Web Developer',
			),
		) 
	);

	$job_fields->add_field(
		array(
			'name'    => 'About the company',
			'id'      => 'job_fields_about',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 8,
			),
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

add_action( 'cmb2_init', 'ln_register_job_fields' );

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
			'show_in_rest' => WP_REST_Server::ALLMETHODS,
		) 
	);

	$work_fields->add_field(
		array(
			'name'        => 'Date',
			'id'          => 'work_fields_text_date',
			'type'        => 'text_date',
			'date_format' => 'd-m-Y',
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

add_action( 'cmb2_init', 'ln_register_work_fields' );

/**
 * Register themes fields.
 *
 * @return void
 */
function ln_register_themes_fields() { 
	$themes_fields = new_cmb2_box(
		array(
			'id'           => 'themes_fields',
			'title'        => 'Theme/Plugin details',
			'object_types' => array( 'job' ),
			'show_on'      => array(
				'key'   => 'taxonomy',
				'value' => array(
					'job_type' => 'themes-and-plugins',
				),
			),
			'context'      => 'normal',
			'priority'     => 'high',
			'show_in_rest' => WP_REST_Server::ALLMETHODS,
		) 
	);

	$themes_fields->add_field(
		array(
			'name'         => 'Logo',
			'id'           => 'themes_fields_logo',
			'type'         => 'file',
			'text'         => array(
				'add_upload_file_text' => 'Add logo',
			),
			'preview_size' => array( 100, 100 ),
		) 
	);

	$themes_fields->add_field(
		array(
			'name' => 'WordPress URL',
			'id'   => 'themes_fields_wp_url',
			'type' => 'text_url',
		) 
	);

	$themes_fields->add_field(
		array(
			'name' => 'Download URL',
			'id'   => 'themes_fields_down_url',
			'type' => 'text_url',
		) 
	);

	$themes_fields->add_field(
		array(
			'name' => 'GitHub URL',
			'id'   => 'themes_fields_github_url',
			'type' => 'text_url',
		) 
	);

	$themes_fields->add_field(
		array(
			'name'    => 'Description',
			'id'      => 'themes_fields_description',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 15,
			),
		) 
	);

}

add_action( 'cmb2_init', 'ln_register_themes_fields' );

/**
 * Register home fields.
 *
 * @return void
 */
function ln_register_home_fields() { 
	$home_fields = new_cmb2_box(
		array(
			'id'           => 'home_fields',
			'title'        => 'Sections',
			'object_types' => array( 'page' ),
			'context'      => 'normal',
			'priority'     => 'high',
			'show_in_rest' => WP_REST_Server::ALLMETHODS,
		) 
	);

	$home_fields->add_field(
		array(
			'name'    => 'Skills',
			'id'      => 'home_fields_skills',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 10,
			),
		) 
	);

	$home_fields->add_field(
		array(
			'name'    => 'Education',
			'id'      => 'home_fields_edu',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 15,
			),
		) 
	);

	$home_fields->add_field(
		array(
			'name'    => 'Teaching and publications',
			'id'      => 'home_fields_teach',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 15,
			),
		) 
	);

}

add_action( 'cmb2_init', 'ln_register_home_fields' );

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
