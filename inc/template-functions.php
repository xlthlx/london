<?php
function ln_tinymce_enqueue_admin_script() {
	wp_deregister_script( 'wp-tinymce' );
	wp_enqueue_script( 'wp-tinymce-root', '/wp-includes/js/tinymce/tinymce.min.js', [] );
	wp_enqueue_script( 'wp-tinymce', '/wp-includes/js/tinymce/plugins/compat3x/plugin.min.js',
		[ 'wp-tinymce-root' ] );
}

add_action( 'admin_enqueue_scripts', 'ln_tinymce_enqueue_admin_script' );