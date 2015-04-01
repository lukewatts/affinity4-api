<?php
/**
 * Affinity4API Plugin
 *
 * Helpers for developing clients websites.
 *
 * @link        http://affinity4.ie
 * @since       1.0.0
 * @package		Affinity4API
 *
 * Plugin Name:       Affinity4API
 * Plugin URI:        http://affinity4.ie/
 * Description:       Helpers for developing clients websites.
 * Version:           1.0.0
 * Author:            Luke Watts
 * Author URI:        http://luke-watts.com/
 * License:           Proprietary
 * License URI:       http://affinity4.ie
 * Text Domain:       affinity4-api
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined( 'WPINC' )) {
	die;
}

// This is to hide Contact Form 7 Admin Page from all bit Admin role
if (is_file(plugin_dir_path(__FILE__) . '../contact-form-7/wp-contact-form-7.php')) {
	define('WPCF7_ADMIN_READ_CAPABILITY', 'manage_options');
	define('WPCF7_ADMIN_READ_WRITE_CAPABILITY', 'manage_options');
}

// Set path constants
define('API_BASE', plugin_dir_path(__FILE__));
define('API_LIBS', API_BASE . 'libs/');

// require Class
// TODO: Use PSR-4 Autoloader with SPL Autoloader fallback
require_once(API_LIBS . 'Asset.php');
require_once(API_LIBS . 'Shortcode.php');
require_once(API_LIBS . 'QuickTag.php');
