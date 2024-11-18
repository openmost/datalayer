<?php

// Features
require_once plugin_dir_path(__FILE__) . 'modules/archive.php';
require_once plugin_dir_path(__FILE__) . 'modules/author.php';
require_once plugin_dir_path(__FILE__) . 'modules/error.php';
require_once plugin_dir_path(__FILE__) . 'modules/pagination.php';
require_once plugin_dir_path(__FILE__) . 'modules/search.php';
require_once plugin_dir_path(__FILE__) . 'modules/single-page.php';
require_once plugin_dir_path(__FILE__) . 'modules/term.php';
require_once plugin_dir_path(__FILE__) . 'modules/type.php';
require_once plugin_dir_path(__FILE__) . 'modules/user.php';

require_once plugin_dir_path(__FILE__) . 'modules/plugin-contact-form-7.php';


add_action('wp_head', 'wpdl_init', 2);
function wpdl_init()
{
    $dataLayer = array();

    if (is_front_page() && is_home()) {
        // Default homepage
        $dataLayer['event'] = 'view_front_home';
        $dataLayer['page'] = wpdl_get_single_page_details();

    } elseif (is_front_page()) {
        // static homepage
        $dataLayer['event'] = 'view_from_page';
        $dataLayer['page'] = wpdl_get_single_page_details();

    } elseif (is_home()) {
        // blog page
        $dataLayer['event'] = 'view_home';
        $dataLayer['page'] = wpdl_get_single_page_details();
    }

    if (is_page()) {
        $dataLayer['event'] = 'view_page';
        $dataLayer['page'] = wpdl_get_single_page_details();
    }

    if (is_single() && get_queried_object()) {
        $dataLayer['event'] = 'view_single_' . get_queried_object()->post_type;
        $dataLayer['page'] = wpdl_get_single_page_details();
    }

    if (is_attachment()) {
        $dataLayer['event'] = 'view_attachment';
        $dataLayer['page'] = wpdl_get_single_page_details();
    }

    if ((is_archive() && !is_author())) {
        $dataLayer['event'] = 'view_archive_' . get_queried_object()->taxonomy;
        $dataLayer['page'] = wpdl_get_archive_page_details();
    }

    if (is_author()) {
        $dataLayer['event'] = 'view_author';
        $dataLayer['page'] = wpdl_get_author_page_details();
    }

    if (is_search()) {
        $dataLayer['event'] = 'view_search_results';
        $dataLayer['page'] = wpdl_get_search_page_details();
    }

    if (is_404()) {
        $dataLayer['event'] = 'view_error_404';
        $dataLayer['page'] = wpdl_get_error_page_details();
    }

    if (is_user_logged_in()) {
        $dataLayer['user'] = wpdl_get_user_details();
    }

    if (get_search_query()) {
        $dataLayer['search'] = wpdl_get_search_details();
    }

    if (paginate_links()) {
        $dataLayer['pagination'] = wpdl_get_pagination_details();
    }

    if (!empty($dataLayer)) {
        $html = "\n" . '<!-- WP dataLayer by Openmost -->' . "\n";
        $html .= '<script id="wp-datalayer">window.dataLayer=window.dataLayer||[];window.dataLayer.push(' . json_encode($dataLayer) . ')</script>' . "\n";
        $html .= '<!-- End WP dataLayer -->' . "\n\n";

        do_action('wp_datalayer_after_init', $html);

        echo wp_kses($html, array('script' => array('id' => array())));
    }
}
