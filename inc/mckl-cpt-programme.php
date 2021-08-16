<?php

// /**
//  * restapi_posts_register_rest_field
//  *
//  * @since 1.0.0 add rest_field for posts
//  */
// /* function restapi_posts_register_rest_field()
// {
//     register_rest_field(
//         array('project'),
//         'featured_media_url',
//         array(
//             'get_callback' => 'get_restapi_data_featured_image',
//             'update_callback' => null,
//             'schema' => null,
//         )
//     );
// }
// function get_restapi_data_featured_image($object, $field_name, $request)
// {
//     if ($object['featured_media']) {
//         $img = wp_get_attachment_image_src($object['featured_media'], 'medium_large');
//         return $img[0];
//     }
//     return false;
// } */
// // add_action('rest_api_init', 'restapi_posts_register_rest_field');

// //cmb2-cpt-project
// function cmb_cpt_programme()
// {
//     $prefix = 'mckl_';

//     $cmb_fishemen_project = new_cmb2_box(array(
//         'id' => $prefix . 'project',
//         'title' => esc_html__('Programme Metabox', 'cmb2'),
//         'object_types' => array('programme'), // Post type
//         'show_in_rest' => WP_REST_Server::READABLE,
//     ));
//     /* $cmb_fishemen_project->add_field(array(
// 		'name' => esc_html__('Client Name', 'cmb2'),
// 		'id' => $prefix . 'client',
// 		'type' => 'text',
// 	)); */
// }
// // add_action('cmb2_init', 'cmb_cpt_programme);


// sorting CTP_PROGRAMME
// https://wordpress.stackexchange.com/questions/43970/adding-menu-order-column-to-custom-post-type-admin-screen

// $cpt_programme = "programme";

// // the basic support (menu_order is included in the page-attributes)
// // add_post_type_support($cpt_programme, 'page-attributes');

// // add a column to the post type's admin
// // basically registers the column and sets it's title
// add_filter('manage_' . $cpt_programme . '_posts_columns', function ($columns) {
//   $columns['menu_order'] = "Order"; //column key => title
//   return $columns;
// });

// // display the column value
// add_action( 'manage_' . $cpt_programme . '_posts_custom_column', function ($column_name, $post_id){
//   if ($column_name == 'menu_order') {
//      echo get_post($post_id)->menu_order;
//   }
// }, 10, 2); // priority, number of args - MANDATORY HERE! 

// // make it sortable
// $menu_order_sortable_on_screen = 'edit-' . $cpt_programme; // screen name of LIST page of posts
// add_filter('manage_' . $menu_order_sortable_on_screen . '_sortable_columns', function ($columns){
//   // column key => Query variable
//   // menu_order is in Query by default so we can just set it
//   $columns['menu_order'] = 'menu_order';
//   return $columns;
// });

