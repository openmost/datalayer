<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function omdl_get_post_type_details($post_type)
{
    $type = get_post_type_object($post_type);

    $data = array(
        'name' => $type->name,
        'label' => $type->label,
        'label_singular' => $type->labels->singular_name,
        'label_plural' => $type->labels->name,
        'description' => $type->description,
    );

    return apply_filters("omdl_get_post_type_details", $data, $type, $post_type);
}
