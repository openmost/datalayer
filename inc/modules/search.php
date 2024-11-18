<?php

function wpdl_get_search_page_details() {

	global $wp;

	return array(
		'type'           => 'search',
		'url'              => home_url( add_query_arg( array(), $wp->request ) ),
		'path'             => add_query_arg( array(), $wp->request ),
		'title'            => wp_get_document_title(),
		'locale' => get_locale(),
	);
}

function wpdl_get_search_details() {

	global $wp_query;

	$data = array(
		// Matomo default
		'search'       => get_search_query(),
		'search_cat'   => null,
		'search_count' => $wp_query->found_posts,

		// Wordpress default
		'query'        => get_search_query(),
		'found_posts'  => $wp_query->found_posts,
		'post_count'   => $wp_query->post_count,
	);

    return apply_filters("wpdl_get_search_details", $data);
}
