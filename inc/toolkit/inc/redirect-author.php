<?php
/**
 * Redirect author archive.
 *
 * @package  xlthlx
 */

/**
 * Redirect archives author.
 */
function ln_redirect_archives_author() {
	if ( is_author() ) {
		wp_redirect( home_url(), 301 );

		die();
	}
}

add_action( 'template_redirect', 'ln_redirect_archives_author' );
