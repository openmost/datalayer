<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action('wp_enqueue_scripts', 'omdl_get_wp_forms_form_details', 10);
function omdl_get_wp_forms_form_details()
{
    if (function_exists('wpforms_decode')) {
        wp_enqueue_script('omdl-contact-form-7',
            plugins_url('assets/js/modules/plugin-wp-forms.min.js', OMDL_PLUGIN_DIR . '/datalayer'),
            array(),
            OMDL_VERSION,
            array(
                'in_footer' => true,
                'strategy' => 'async',
            )
        );
    }
}
