<?php

// Logo Source
function numbat_logo_source(){
    
    // REDUX VARIABLE
    global $numbat_redux;

    // html VARIABLE
    $html = '';

    // Metaboxes
    $mt_custom_header_options_status = get_post_meta( get_the_ID(), 'mt_custom_header_options_status', true );
    $mt_metabox_header_logo = get_post_meta( get_the_ID(), 'mt_metabox_header_logo', true );

    if (is_page()) {
        if (isset($mt_custom_header_options_status) && isset($mt_metabox_header_logo) && $mt_custom_header_options_status == 'yes') {
            $html .='<img src="'.esc_attr($mt_metabox_header_logo).'" alt="'.esc_attr(get_bloginfo()).'" />';
        }else{
            if(!empty($numbat_redux['numbat_logo']['url'])){
                $html .='<img src="'.esc_attr($numbat_redux['numbat_logo']['url']).'" alt="'.esc_attr(get_bloginfo()).'" />';
            }else{ 
                $html .= $numbat_redux['numbat_logo_text'];
            }
        }
    }else{
        if(!empty($numbat_redux['numbat_logo']['url'])){
            $html .='<img src="'.esc_attr($numbat_redux['numbat_logo']['url']).'" alt="'.esc_attr(get_bloginfo()).'" />';
        }elseif(isset($numbat_redux['numbat_logo_text'])){ 
            $html .= $numbat_redux['numbat_logo_text'];
        }else{
            $html .= esc_attr(get_bloginfo());
        }
    }

    return $html; 
}



// Logo Area
function numbat_logo(){
if (numbat_plugin_active('redux-framework/redux-framework.php')){

    global $numbat_redux;

    // html VARIABLE
    $html = '';

    $html .='<h1 class="logo logo-image">';
        $html .='<a href="'.get_site_url().'">';
            $html .= numbat_logo_source();
        $html .='</a>';
    $html .='</h1>';

    return $html;

    // REDUX VARIABLE

 } else {

    global $numbat_redux;

    // html VARIABLE
    $html = '';

    $html .='<h1 class="logo logo-h">';
        $html .='<a href="'.get_site_url().'">';
            $html .= get_bloginfo();
        $html .='</a>';
    $html .='</h1>';

    return $html;

 } 
    

}




// Add specific CSS class by filter
function numbat_body_classes( $classes ) {

    global  $numbat_redux;

    $plugin_redux_status = '';
    if (!numbat_plugin_active('redux-framework/redux-framework.php')) {
        $plugin_redux_status = 'missing-redux-framework';
    }
    $plugin_modeltheme_status = '';
    if (!numbat_plugin_active('modeltheme-framework/modeltheme-framework.php')) {
        $plugin_modeltheme_status = 'missing-modeltheme-framework';
    }


    // CHECK IF FEATURED IMAGE IS FALSE(Disabled)
    $post_featured_image = '';
    if (is_singular('post')) {
        if ($numbat_redux['post_featured_image'] == false) {
            $post_featured_image = 'hide_post_featured_image';
        }else{
            $post_featured_image = '';
        }
    }


    // CHECK IF THE NAV IS STICKY
    $is_nav_sticky = '';
    if ($numbat_redux['is_nav_sticky'] == true) {
        // If is sticky
        $is_nav_sticky = 'is_nav_sticky';
    }else{
        // If is not sticky
        $is_nav_sticky = '';
    }


    // CHECK IF ADD-TO-WISHLIST option is false
    $add_to_compare = '';
    if ($numbat_redux['is_add_to_compare_active'] == false) {
        // If is sticky
        $add_to_compare = 'hidden_compare_btn';
    }else{
        // If is not sticky
        $add_to_compare = '';
    }


    // CHECK IF ADD-TO-COMPARE option is true
    $add_to_wishlist = '';
    if ($numbat_redux['is_add_to_wishlist_active'] == false) {
        // If is sticky
        $add_to_wishlist = 'hidden_wishlist_btn';
    }else{
        // If is not sticky
        $add_to_wishlist = '';
    }


    // DIFFERENT HEADER LAYOUT TEMPLATES
    if (is_page()) {

        $mt_custom_header_options_status = get_post_meta( get_the_ID(), 'mt_custom_header_options_status', true );
        $mt_header_custom_variant = get_post_meta( get_the_ID(), 'mt_header_custom_variant', true );
        $header_version = 'first_header';

        if (isset($mt_custom_header_options_status) AND $mt_custom_header_options_status == 'yes') {
            if ($mt_header_custom_variant == '1') {
                // Header Layout #1
                $header_version = 'first_header';
            }elseif ($mt_header_custom_variant == '2') {
                // Header Layout #2
                $header_version = 'second_header';
            }elseif ($mt_header_custom_variant == '3') {
                // Header Layout #3
                $header_version = 'third_header';
            }elseif ($mt_header_custom_variant == '4') {
                // Header Layout #4
                $header_version = 'fourth_header';
            }elseif ($mt_header_custom_variant == '5') {
                // Header Layout #5
                $header_version = 'fifth_header';
            }elseif ($mt_header_custom_variant == '6') {
                // Header Layout #6
                $header_version = 'sixth_header';
            }elseif ($mt_header_custom_variant == '7') {
                // Header Layout #7
                $header_version = 'seventh_header';
            }elseif ($mt_header_custom_variant == '8') {
                // Header Layout #8
                $header_version = 'eighth_header';
            }else{
                // if no header layout selected show header layout #1
                $header_version = 'first_header';
            }
        }else{
            if ($numbat_redux['header_layout'] == 'first_header') {
                // Header Layout #1
                $header_version = 'first_header';
            }elseif ($numbat_redux['header_layout'] == 'second_header') {
                // Header Layout #2
                $header_version = 'second_header';
            }elseif ($numbat_redux['header_layout'] == 'third_header') {
                // Header Layout #3
                $header_version = 'third_header';
            }elseif ($numbat_redux['header_layout'] == 'fourth_header') {
                // Header Layout #4
                $header_version = 'fourth_header';
            }elseif ($numbat_redux['header_layout'] == 'fifth_header') {
                // Header Layout #5
                $header_version = 'fifth_header';
            }elseif ($numbat_redux['header_layout'] == 'sixth_header') {
                // Header Layout #6
                $header_version = 'sixth_header';
            }elseif ($numbat_redux['header_layout'] == 'seventh_header') {
                // Header Layout #7
                $header_version = 'seventh_header';
            }elseif ($numbat_redux['header_layout'] == 'eighth_header') {
                // Header Layout #8
                $header_version = 'eighth_header';
            }else{
                // if no header layout selected show header layout #1
                $header_version = 'first_header';
            }
        }
    }else{
        if ($numbat_redux['header_layout'] == 'first_header') {
            // Header Layout #1
            $header_version = 'first_header';
        }elseif ($numbat_redux['header_layout'] == 'second_header') {
            // Header Layout #2
            $header_version = 'second_header';
        }elseif ($numbat_redux['header_layout'] == 'third_header') {
            // Header Layout #3
            $header_version = 'third_header';
        }elseif ($numbat_redux['header_layout'] == 'fourth_header') {
            // Header Layout #4
            $header_version = 'fourth_header';
        }elseif ($numbat_redux['header_layout'] == 'fifth_header') {
            // Header Layout #5
            $header_version = 'fifth_header';
        }elseif ($numbat_redux['header_layout'] == 'sixth_header') {
            // Header Layout #6
            $header_version = 'sixth_header';
        }elseif ($numbat_redux['header_layout'] == 'seventh_header') {
            // Header Layout #7
            $header_version = 'seventh_header';
        }elseif ($numbat_redux['header_layout'] == 'eighth_header') {
            // Header Layout #8
            $header_version = 'eighth_header';
        }else{
            // if no header layout selected show header layout #1
            $header_version = 'first_header';
        }
    }


    // add 'class-name' to the $classes array
    $classes[] = esc_attr($plugin_modeltheme_status) . ' ' . esc_attr($plugin_redux_status) . ' ' . esc_attr($is_nav_sticky) . ' ' . esc_attr($add_to_compare) . ' ' . esc_attr($add_to_wishlist) . ' ' . esc_attr($header_version) . ' ' . esc_attr($post_featured_image) . ' ';
    // return the $classes array
    return $classes;

}
add_filter( 'body_class', 'numbat_body_classes' );



// CHECK IF PLUGIN ACTIVE OR NOT
function numbat_plugin_active( $plugin ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( $plugin ) ) {
        return true;
    }

    return false;
}

// numbat REDUX
function numbat_redux($redux_meta_name1,$redux_meta_name2 = ''){

    global  $numbat_redux;

    $html = '';
    if (isset($redux_meta_name1) && !empty($redux_meta_name2)) {
        $html = $numbat_redux[$redux_meta_name1][$redux_meta_name2];
    }elseif(isset($redux_meta_name1) && empty($redux_meta_name2)){
        $html = $numbat_redux[$redux_meta_name1];
    }
    
    return $html;
}

?>