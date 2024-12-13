<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function omdl_get_user_details() {

	$user = wp_get_current_user();

	$data = array(
		'id' => $user->ID,
		'user_login' => $user->user_login,
		'user_nicename' => $user->user_nicename,
		'user_email' => $user->user_email,
		'user_registered' => $user->user_registered,
		'display_name' => $user->display_name,
		'roles' => $user->roles,

        'sha256_id' => hash('sha256', $user->ID),
        'sha256_user_login' => hash('sha256', $user->user_login),
        'sha256_user_email' => hash('sha256', $user->user_email),
	);

    return apply_filters("omdl_get_user_details", $data, $user);
}
