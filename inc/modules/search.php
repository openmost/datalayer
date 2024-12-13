<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

function omdl_get_search_page_details()
{

    global $wp;

    return array(
        'type' => 'search',
        'url' => home_url(add_query_arg(array(), $wp->request)),
        'path' => add_query_arg(array(), $wp->request),
        'title' => wp_get_document_title(),
        'locale' => get_locale(),
    );
}

function omdl_get_search_details()
{

    global $wp_query;

    $data = array(
        // Matomo default
        'search' => get_search_query(),
        'search_cat' => apply_filters('omdl_set_search_cat', $search_cat = ''),
        'search_count' => $wp_query->found_posts,

        // Wordpress default
        'query' => get_search_query(),
        'found_posts' => $wp_query->found_posts,
        'post_count' => $wp_query->post_count,
    );

    return apply_filters("omdl_get_search_details", $data);
}

add_action('wp_enqueue_scripts', 'omdl_get_searchform_event', 10);
function omdl_get_searchform_event()
{
        wp_enqueue_script('omdl-search',
            plugins_url('assets/js/modules/search.min.js', OMDL_PLUGIN_DIR . '/datalayer'),
            array(),
            OMDL_VERSION,
            array(
                'in_footer' => true,
                'strategy' => 'async',
            )
        );
}
