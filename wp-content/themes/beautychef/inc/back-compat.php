<?php
/**
 * Beauty Chef back compat functionality
 *
 * Prevents Beauty Chef from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since Beauty Chef 1.0
 */

/**
 * Prevent switching to Beauty Chef on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Beauty Chef 1.0
 */
function beautychef_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'beautychef_upgrade_notice' );
}
add_action( 'after_switch_theme', 'beautychef_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Beauty Chef on WordPress versions prior to 4.7.
 *
 * @since Beauty Chef 1.0
 *
 * @global string $wp_version WordPress version.
 */
function beautychef_upgrade_notice() {
	$message = sprintf( __( 'Beauty Chef requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'beautychef' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Beauty Chef 1.0
 *
 * @global string $wp_version WordPress version.
 */
function beautychef_customize() {
	wp_die( sprintf( __( 'Beauty Chef requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'beautychef' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'beautychef_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Beauty Chef 1.0
 *
 * @global string $wp_version WordPress version.
 */
function beautychef_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Beauty Chef requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'beautychef' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'beautychef_preview' );
