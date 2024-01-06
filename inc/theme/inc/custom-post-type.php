<?php
/**
 * Custom post types and taxonomies.
 *
 * @package London
 */

/**
 * Register custom post type job.
 *
 * @return void
 */
function ln_register_post_type() {
	register_extended_post_type(
		'job',
		array(
			'show_in_rest'        => true,
			'block_editor'        => true,
			'exclude_from_search' => true,
			'menu_icon'           => 'dashicons-hammer',
			'capability_type'     => 'page',
			'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
			'publicly_queryable'  => true,
			'admin_cols'          => array(
				'title'         => array(
					'title' => 'Company',
				),
				'job_type'      => array(
					'title'    => 'Type',
					'taxonomy' => 'job_type',
					'link'     => 'edit',
				),
				'job_role'      => array(
					'title'    => 'Job Role',
					'taxonomy' => 'job_role',
					'link'     => 'edit',
				),
				'order'         => array(
					'title'      => 'Order',
					'post_field' => 'menu_order',
				),
				'last_modified' => array(
					'title'       => 'Last Modified',
					'post_field'  => 'post_modified',
					'date_format' => 'd/m/Y h:i',
				),
				'status'        => array(
					'title'      => 'Status',
					'post_field' => 'post_status',
				),
			),
			'admin_filters'       => array(
				'job_role' => array(
					'title'    => 'Role',
					'taxonomy' => 'job_role',
				),
				'job_type' => array(
					'title'    => 'Type',
					'taxonomy' => 'job_type',
				),
			),
			'site_sortables'      => array(
				'order' => array(
					'post_field' => 'menu_order',
				),
			),
		)
	);

	register_extended_taxonomy(
		'job_type',
		'job',
		array(
			'show_ui'  => true,
			'meta_box' => 'dropdown',
			'required' => true,
		)
	);

	register_extended_taxonomy(
		'job_role',
		'job',
		array(
			'show_ui'  => true,
			'meta_box' => 'dropdown',
			'required' => true,
		)
	);

}

add_action( 'init', 'ln_register_post_type' );
