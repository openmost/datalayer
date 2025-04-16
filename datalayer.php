<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name: DataLayer for GTM and Matomo
 * Plugin URI: https://github.com/openmost/datalayer
 * Description: Generate a contextual, complete and ready-to-use dataLayer for your Tag Manager.
 * Version: 1.0.2
 * Requires at least: 6.0
 * Requires PHP: 7.2
 * Author: Openmost
 * Author URI: https://openmost.io
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Constant
define( 'OMDL_VERSION', '1.0.3' );
define( 'OMDL_PHP_MINIMUM', '7.2.0' );
define( 'OMDL_WP_MINIMUM', '6.0.0' );
define( 'OMDL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once OMDL_PLUGIN_DIR . 'inc/datalayer.php';
