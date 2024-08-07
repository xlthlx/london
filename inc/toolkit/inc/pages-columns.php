<?php
/**
 * Page columns.
 *
 * @package  xlthlx
 */

/**
 * Remove comments column and adds Template column for pages
 *
 * @param array $columns The pages columns.
 *
 * @return array $columns
 */
function ln_page_column_views( $columns ) {
	unset( $columns['comments'], $columns['date'] );

	return array_merge(
		$columns,
		array(
			'page-layout' => __( 'Template', 'london' ),
			'modified'    => __( 'Data ultima modifica', 'london' ),
			'date'        => __( 'Date', 'london' ),
		)
	);

}

/**
 * Sets content for Template column and date
 *
 * @param string $column_name The column name.
 * @param int    $id The post ID.
 */
function ln_page_custom_column_views( $column_name, $id ) {
	if ( 'page-layout' === $column_name ) {
		$set_template = get_post_meta(
			get_the_ID(),
			'_wp_page_template',
			true
		);
		if ( ( 'default' === $set_template ) || ( '' === $set_template ) ) {
			$set_template = 'Default';
		}
		$templates = wp_get_theme()->get_page_templates();
		foreach ( $templates as $key => $value ) :
			if ( ( $set_template === $key ) && ( '' === $set_template ) ) {
				$set_template = $value;
			}
		endforeach;

		echo $set_template;
	}
	if ( 'modified' === $column_name ) {
		echo ucfirst( get_the_modified_time( 'd/m/Y', $id ) ) . ' alle ' . get_the_modified_time( 'H:i', $id );
	}
	if ( 'date' === $column_name ) {
		echo get_the_modified_time( 'D, d M Y H:i:s', $id );
	}
}

if ( is_admin() ) {
	add_filter( 'manage_pages_columns', 'ln_page_column_views', 9999 );
	add_action( 'manage_pages_custom_column', 'ln_page_custom_column_views', 9999, 2 );
}
