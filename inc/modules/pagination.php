<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function omdl_get_pagination_details() {

	global $wp_query;

	$data = array(
		'posts_per_page' => $wp_query->query_vars['posts_per_page'],
		'post_count'     => $wp_query->post_count,
		'paged'          => is_paged(),
		'page_number'    => get_query_var( 'paged' ) ?? 1,
		'max_num_pages'  => $wp_query->max_num_pages,
	);

    return apply_filters("omdl_get_pagination_details_data", $data);
}
