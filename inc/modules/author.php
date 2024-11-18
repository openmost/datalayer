<?php

function omdl_get_author_details() {
	return array(
		'id'           => get_the_author_meta( 'ID' ),
		'nickname'     => get_the_author_meta( 'nickname' ),
		'display_name' => get_the_author_meta( 'display_name' ),
		'first_name'   => get_the_author_meta( 'first_name' ),
		'last_name'    => get_the_author_meta( 'last_name' ),
		'description'  => get_the_author_meta( 'description' ),
	);
}

function omdl_get_author_page_details() {

	global $wp;

	$details         = omdl_get_author_details();
	$details['type'] = 'author';
	$details['url']  = home_url( add_query_arg( array(), $wp->request ) );
	$details['path'] = add_query_arg( array(), $wp->request );
	$details['title'] = null;

	return apply_filters("omdl_get_author_page_details", $details);
}
