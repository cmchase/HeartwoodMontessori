<?php
/*
Plugin Name: HW Notification Bar
Plugin URI:
Description: Site-wide messages for promotion and emergency communication. Derived from Easy Sticky Notification Bar plugin.
Author:
Author URI:
Text Domain: hw-notification
Domain Path: /languages/
Version: 0.3
License: GPL v3
*/

/**
 * Constants
 */
if ( !defined( 'HW_NOTIFICATION_VERSION' ) ) {
	define( 'HW_NOTIFICATION_VERSION', '0.1' );
}

if ( !defined( 'HW_NOTIFICATION_DIR' ) ) {
	define( 'HW_NOTIFICATION_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( !defined( 'HW_NOTIFICATION_DIR_BASENAME' ) ) {
	define( 'HW_NOTIFICATION_DIR_BASENAME', trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );
}

if ( !defined( 'HW_NOTIFICATION_URI' ) ) {
	define( 'HW_NOTIFICATION_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}

/**
 * Load plugin textdomain.
 */
function hw_notification_load_textdomain() {
  load_plugin_textdomain( 'hw-notification', false, HW_NOTIFICATION_DIR_BASENAME. 'languages/' );
}
add_action( 'plugins_loaded', 'hw_notification_load_textdomain' );

/**
 * Enqueue scripts and styles.
 */
function hw_notification_scripts() {

	/**
	 * Enqueue CSS files
	 */

	// Google Fonts
	wp_enqueue_style( 'hw-notification-fonts', hw_notification_google_fonts_url(), array(), null );

	// Plugin Stylesheet
	if( 1 == hw_notification_option( 'enable' ) ) {
		wp_enqueue_style( 'hw-notification-style', HW_NOTIFICATION_URI . 'css/style.css' );
	}

	// Plugin Fonts
	$notification_font = hw_notification_option( 'notification_font' );
	$button_font       = hw_notification_option( 'button_font' );

	// Custom Inline Notification Font CSS
	if( hw_notification_option_default( 'notification_font' ) != $notification_font ) {
		wp_add_inline_style( 'hw-notification-style', hw_notification_notification_font() );
	}

	// Custom Inline Button Font CSS
	if( hw_notification_option_default( 'button_font' ) != $button_font ) {
		wp_add_inline_style( 'hw-notification-style', hw_notification_button_font() );
	}

}
add_action( 'wp_enqueue_scripts', 'hw_notification_scripts' );

/**
 * Custom functions.
 */
require HW_NOTIFICATION_DIR . 'inc/extras.php';

/**
 * Admin Page
 */
if( is_admin() ) {
	require HW_NOTIFICATION_DIR . 'inc/admin.php';
}
