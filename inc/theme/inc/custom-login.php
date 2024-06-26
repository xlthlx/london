<?php
/**
 * Custom login
 *
 * @package London
 */

/**
 * Enqueue login CSS and JS.
 *
 * @return void
 */
function ln_enqueue_login() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/admin/login.min.css', array(), filemtime( get_template_directory() . '/assets/css/admin/login.min.css' ) );
	wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/assets/js/admin/login.min.js', array(), filemtime( get_template_directory() . '/assets/js/admin/login.min.js' ), true );
}

add_action( 'login_enqueue_scripts', 'ln_enqueue_login', 10 );

/**
 * Change the header url into login.
 *
 * @return string
 */
function ln_login_url() {
	return get_home_url();
}

add_filter( 'login_headerurl', 'ln_login_url' );

/**
 * Changes the login name and url.
 *
 * @return string
 */
function ln_login_title() {
	 return strtoupper( get_bloginfo( 'name' ) ) . '</a></h1><p class="desc"><em>' . get_bloginfo( 'description' ) . '</em></p><h1 style="display:none"><a>';
}

add_filter( 'login_headertitle', 'ln_login_title' );

/**
 * Change some text strings into login.
 *
 * @param string $translation Translated text.
 * @param string $text Text to translate.
 *
 * @return string
 */
function ln_gettext( $translation, $text ) {
	// Login Main Page.
	if ( 'Username or Email Address' === $text ) {
		return 'Email';
	} // Username Label.
	if ( 'Log In' === $text ) {
		return 'Login';
	} // Login Button.
	if ( 'Lost your password?' === $text ) {
		return 'I forgot my password';
	} // Lost Password Link.
	if ( 'Get New Password' === $text ) {
		return 'Send';
	} // Button.
	if ( 'Reset Password' === $text ) {
		return 'Change';
	} // Button.

	return $translation;

}

/**
 * Init filter strings and add fonts.
 *
 * @return void
 */
function ln_login_head() {
	add_filter( 'gettext', 'ln_gettext', 20, 3 );
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php // @codingStandardsIgnoreStart ?>
	<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap" rel="stylesheet">
	<?php // @codingStandardsIgnoreEnd ?>
	<?php
}

add_action( 'login_head', 'ln_login_head' );

/**
 * Change login title.
 *
 * @return string
 */
function ln_login_page_title() {
	return 'Login | ' . get_bloginfo( 'name' );
}

add_filter( 'login_title', 'ln_login_page_title', 99 );

/**
 * Force the login with email.
 *
 * @param null|WP_User|WP_Error $user WP_User if the user is authenticated. WP_Error or null otherwise.
 * @param string                $username Username or email address.
 * @param string                $password User password.
 *
 * @return bool|WP_Error|WP_User
 */
function ln_authenticate( $user, $username, $password ) {
	if ( $user instanceof WP_User ) {
		return $user;
	}

	if ( ! empty( $username ) && is_email( $username ) ) {
		$user = get_user_by( 'email', $username );
		if ( isset( $user, $user->user_login, $user->user_status ) && 0 === (int) $user->user_status ) {
			$username = $user->user_login;

			return wp_authenticate_username_password(
				null,
				$username,
				$password 
			);
		}
	}

	if ( ! empty( $username ) || ! empty( $password ) ) {
		return false;
	}

	return wp_authenticate_username_password( null, '', '' );
}

remove_filter( 'authenticate', 'wp_authenticate_username_password', 20 );
add_filter( 'authenticate', 'ln_authenticate', 20, 3 );
