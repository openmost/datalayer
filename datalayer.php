<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name: DataLayer
 * Plugin URI: https://openmost.io/products/datalayer
 * Description: Generate a contextual, complete and ready-to-use dataLayer for your Tag Manager.
 * Version: 1.0.0
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * Author: Openmost
 * Author URI: https://openmost.io/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Constant
define( 'OPENMOSTDATALAYER_VERSION', '1.0.0' );
define( 'OPENMOSTDATALAYER_PHP_MINIMUM', '7.2.0' );
define( 'OPENMOSTDATALAYER_WP_MINIMUM', '6.0.0' );
define( 'OPENMOSTDATALAYER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once OPENMOSTDATALAYER_PLUGIN_DIR . 'inc/datalayer.php';
