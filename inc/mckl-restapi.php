<?php

/**
 * restapi_posts_register_rest_field
 *
 * @since 1.0.0 add rest_field for posts
 */
function restapi_posts_register_rest_field()
{
    register_rest_field(
        array('post'),
        'featured_media_url',
        array(
            'get_callback' => 'get_restapi_data_featured_image',
            'update_callback' => null,
            'schema' => null,
        )
    );
}
function get_restapi_data_featured_image($object, $field_name, $request)
{
    if ($object['featured_media']) {
        $img = wp_get_attachment_image_src($object['featured_media'], 'medium_large');
        return $img[0];
    }
    return false;
}
add_action('rest_api_init', 'restapi_posts_register_rest_field');


/**
 * Ordering By Menu Order in the Wordpress REST API?
 * https://stackoverflow.com/questions/54260699/ordering-by-menu-order-in-the-wordpress-rest-api
 */
function my_prefix_add_rest_orderby_params($params)
{
    $params['orderby']['enum'][] = 'menu_order';

    return $params;
}
add_filter('rest_programme_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1);
