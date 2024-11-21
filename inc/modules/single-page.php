<?php

function omdl_get_single_page_details()
{

    global $wp;

    $data = array(
        'type' => get_post_type_object(get_post_type())->name,
        'id' => get_the_ID(),
        'url' => home_url(add_query_arg(array(), $wp->request)),
        'path' => add_query_arg(array(), $wp->request) ?: '/',
        'title' => wp_get_document_title(),
        'locale' => get_locale(),

        'is_home' => is_home(),
        'is_front_page' => is_front_page(),
    );

    if ($object = get_queried_object()) {

        $post_type = omdl_get_post_type_details(get_post_type());
        $taxonomies = omdl_get_terms_per_tax();
        $tax_list = [];

        foreach ($taxonomies as $taxonomy) {
            $tax_list[$taxonomy['name']] = array_values(wp_list_pluck($taxonomy['terms'], 'name'));
        }

        $array = array(
            'post_name' => $object->post_name,
            'post_title' => $object->post_title,
            'post_excerpt' => $object->post_excerpt,
            'post_status' => $object->post_status,
            'post_date' => $object->post_date,
            'post_date_gmt' => $object->post_date_gmt,
            'post_modified' => $object->post_modified,
            'post_modified_gmt' => $object->post_modified_gmt,
            'post_type_name' => $post_type['name'],
            'post_type_label' => $post_type['label'],
            'post_type' => $post_type,
            'guid' => $object->guid,
            'post_mime_type' => $object->post_mime_type ?: false,

            'comment_status' => $object->comment_status,
            'comment_count' => $object->comment_count,

            'author' => omdl_get_author_details(),
            'taxonomies' => omdl_get_terms_per_tax(),
            ...$tax_list,

            'page_template' => esc_html(get_page_template_slug()),
        );

        $data = array_merge($data, $array);
    }

    return apply_filters("omdl_get_single_page_details_data", $data);
}
