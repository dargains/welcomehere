<?php

/**
 * Custom Post Type [Testimonial]
 */
function numbat_testimonial_custom_post() {
    register_post_type('Testimonial', array(
                        'label' => __('Testimonials','numbat'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'testimonial', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-format-status',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Testimonials','numbat'),
                            'singular_name' => __('Testimonial','numbat'),
                            'menu_name' => __('Testimonials','numbat'),
                            'add_new' => __('Add Testimonial','numbat'),
                            'add_new_item' => __('Add New Testimonial','numbat'),
                            'edit' => __('Edit','numbat'),
                            'edit_item' => __('Edit Testimonial','numbat'),
                            'new_item' => __('New Testimonial','numbat'),
                            'view' => __('View Testimonial','numbat'),
                            'view_item' => __('View Testimonial','numbat'),
                            'search_items' => __('Search Testimonials','numbat'),
                            'not_found' => __('No Testimonials Found','numbat'),
                            'not_found_in_trash' => __('No Testimonials Found in Trash','numbat'),
                            'parent' => __('Parent Testimonial','numbat'),
                            )
                        ) 
                    ); 
}
add_action('init', 'numbat_testimonial_custom_post');


/**
 * Custom Post Type [Clients]
 */
function numbat_client_custom_post() {
    register_post_type('client', array(
                        'label' => __('Clients','numbat'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'client', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-admin-users',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Clients','numbat'),
                            'singular_name' => __('Client','numbat'),
                            'menu_name' => __('Clients','numbat'),
                            'add_new' => __('Add Client','numbat'),
                            'add_new_item' => __('Add New Client','numbat'),
                            'edit' => __('Edit','numbat'),
                            'edit_item' => __('Edit Client','numbat'),
                            'new_item' => __('New Client','numbat'),
                            'view' => __('View Client','numbat'),
                            'view_item' => __('View Client','numbat'),
                            'search_items' => __('Search Clients','numbat'),
                            'not_found' => __('No Clients Found','numbat'),
                            'not_found_in_trash' => __('No Clients Found in Trash','numbat'),
                            'parent' => __('Parent Client','numbat'),
                            )
                        ) 
                    ); 
}
add_action('init', 'numbat_client_custom_post');

/**

||-> CPT - [member]

*/
function smartowl_members_custom_post() {

    register_post_type('member', array(
                        'label' => __('Members','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'member', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Members','modeltheme'),
                            'singular_name' => __('Member','modeltheme'),
                            'menu_name' => __('MT Members','modeltheme'),
                            'add_new' => __('Add Member','modeltheme'),
                            'add_new_item' => __('Add New Member','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Member','modeltheme'),
                            'new_item' => __('New Member','modeltheme'),
                            'view' => __('View Member','modeltheme'),
                            'view_item' => __('View Member','modeltheme'),
                            'search_items' => __('Search Members','modeltheme'),
                            'not_found' => __('No Members Found','modeltheme'),
                            'not_found_in_trash' => __('No Members Found in Trash','modeltheme'),
                            'parent' => __('Parent Member','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'smartowl_members_custom_post');


/**

||-> CPT - [member]

*/
function smartowl_members_category_custom_post() {
    
    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'modeltheme' ),
        'singular_name'              => _x( 'Members', 'Taxonomy Singular Name', 'modeltheme' ),
        'menu_name'                  => __( 'Members Categories', 'modeltheme' ),
        'all_items'                  => __( 'All Items', 'modeltheme' ),
        'parent_item'                => __( 'Parent Item', 'modeltheme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
        'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
        'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
        'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
        'update_item'                => __( 'Update Item', 'modeltheme' ),
        'view_item'                  => __( 'View Item', 'modeltheme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
        'popular_items'              => __( 'Popular Items', 'modeltheme' ),
        'search_items'               => __( 'Search Items', 'modeltheme' ),
        'not_found'                  => __( 'Not Found', 'modeltheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'mt-member-category', array( 'member' ), $args );
}
add_action( 'init', 'smartowl_members_category_custom_post' );


?>