<?php
/**
 * Custom login
 *
 * @package WordPress
 * @subpackage London
 */

/**
 * Enqueue login CSS and JS.
 */
function london_enqueue_login() {
	wp_enqueue_style( 'custom-login',
		get_template_directory_uri() . '/assets/css/admin/login.min.css', [],
		filemtime( get_template_directory() . '/assets/css/admin/login.min.css' ) );
	wp_enqueue_script( 'custom-login',
		get_template_directory_uri() . '/assets/js/admin/login.min.js', [],
		filemtime( get_template_directory() . '/assets/js/admin/login.min.js' ),
		true );
}

add_action( 'login_enqueue_scripts', 'london_enqueue_login', 10 );

/**
 * Change the header url into login.
 *
 * @return string
 */
function london_login_url() {
	return get_home_url();
}

add_filter( 'login_headerurl', 'london_login_url' );

/**
 * Changes the login name and url.
 *
 * @param $title
 *
 * @return string
 */
function london_login_title( $title ) {
	return get_bloginfo( 'name' ) . '</a></h1><p class="desc"><em>' . get_bloginfo( 'description' ) . '</em></p><h1 style="display:none"><a>';
}

add_filter( 'login_headertitle', 'london_login_title' );

/**
 * Change some text strings into login.
 *
 * @param $translation
 * @param $login_texts
 * @param $domain
 *
 * @return string
 */
function london_gettext( $translation, $login_texts, $domain ) {

	// Login Main Page
	if ( 'Username or Email Address' === $login_texts ) {
		return 'Email';
	} // Username Label
	if ( 'Log In' === $login_texts ) {
		return 'Login';
	} // Login Button
	if ( 'Lost your password?' === $login_texts ) {
		return 'I forgot my password';
	} // Lost Password Link
	if ( 'Get New Password' === $login_texts ) {
		return 'Send';
	} // Button
	if ( 'Reset Password' === $login_texts ) {
		return 'Change';
	} // Button

	return $translation;

}

/**
 * Init filter strings.
 */
function london_login_head() {
	add_filter( 'gettext', 'london_gettext', 20, 3 );
}

add_action( 'login_head', 'london_login_head' );

/**
 * Change login title.
 *
 * @return string
 */
function london_login_page_title() {
	return 'Login | ' . get_bloginfo( 'name' );
}

add_filter( 'login_title', 'london_login_page_title', 99 );

/**
 * Force the login with email.
 *
 * @param $user
 * @param $username
 * @param $password
 *
 * @return bool|WP_Error|WP_User
 */
function london_authenticate( $user, $username, $password ) {
	if ( $user instanceof WP_User ) {
		return $user;
	}

	if ( ! empty( $username ) && is_email( $username ) ) {
		$user = get_user_by( 'email', $username );
		if ( isset( $user, $user->user_login, $user->user_status ) && 0 === (int) $user->user_status ) {
			$username = $user->user_login;

			return wp_authenticate_username_password( null, $username,
				$password );
		}
	}

	if ( ! empty( $username ) || ! empty( $password ) ) {
		return false;
	}

	return wp_authenticate_username_password( null, "", "" );
}

remove_filter( 'authenticate', 'wp_authenticate_username_password', 20 );
add_filter( 'authenticate', 'london_authenticate', 20, 3 );
