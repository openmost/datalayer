
<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name: WP DataLayer
 * Plugin URI: https://openmost.io/products/wp-datalayer
 * Description: Generate a contextual, complete and ready-to-use dataLayer for your Tag Manager.
 * Author: Openmost
 * Version: 1.0.0
 * Author URI: https://openmost.io
 */

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Constant
define( 'WPDATALAYER_VERSION', '1.0.0' );
define( 'WPDATALAYER_PHP_MINIMUM', '7.2.0' );
define( 'WPDATALAYER_WP_MINIMUM', '6.0.0' );
define( 'WPDATALAYER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once WPDATALAYER_PLUGIN_DIR . 'inc/datalayer.php';
