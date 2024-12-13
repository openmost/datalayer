<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function omdl_get_archive_page_details() {

	global $wp;

	return array(
		'type'         => 'archive',
		'title'        => wp_get_document_title(),
		'url'          => home_url( add_query_arg( array(), $wp->request ) ),
		'path'         => add_query_arg( array(), $wp->request ),
		'locale'       => get_locale(),
		'archive_type' => omdl_get_archive_type(),
		'taxonomy'     => omdl_get_archive_taxonomy(),
		'post_type'    => omdl_get_archive_post_type(),
		'date'         => omdl_get_archive_date(),
	);
}


function omdl_get_archive_type() {
	$object = get_queried_object();

	if ( $object instanceof WP_Term ) {
		return 'taxonomy';
	}

	if ( $object instanceof WP_Post_Type ) {
		return 'post_type';
	}

	if ( is_date() ) {
		return 'date';
	}

	return 'not supported';
}

function omdl_get_archive_taxonomy() {
	$object = get_queried_object();

	if ( $object instanceof WP_Term ) {
		return $object->taxonomy;
	}

	return false;
}

function omdl_get_archive_post_type() {
	$object = get_queried_object();

	if ( $object instanceof WP_Term ) {
		return $object->taxonomy;
	}

	if ( $object instanceof WP_Post_Type ) {
		return $object->name;
	}

	return false;
}


function omdl_get_archive_date() {

	$date = array(
		'year'  => get_query_var( 'year' ) ?: null,
		'month' => get_query_var( 'monthnum' ) ?: null,
		'day'   => get_query_var( 'day' ) ?: null,
	);

    return apply_filters('omdl_get_archive_date', $date);
}
