<?php

/**

* Plugin Name: ModelTheme Framework

* Plugin URI: http://modeltheme.com/

* Description: ModelTheme Framework required by numbat Theme.

* Version: 1.0

* Author: ModelTheme

* Author http://modeltheme.com/

* Last Plugin Update: 15-OCT-2016

*/



$plugin_dir = plugin_dir_path( __FILE__ );





// CMB METABOXES

function modeltheme_cmb_initialize_cmb_meta_boxes() {

    if ( ! class_exists( 'cmb_Meta_Box' ) )

        require_once ('init.php');

}

add_action( 'init', 'modeltheme_cmb_initialize_cmb_meta_boxes', 9999 );





/**

||-> Function: modeltheme_enqueue_admin_scripts()

*/

function modeltheme_enqueue_admin_scripts( $hook ) {

    // CSS

    wp_register_style( 'modelteme-framework-admin-style',  plugin_dir_url( __FILE__ ) . 'css/modelteme-framework-admin-style.css' );

    wp_enqueue_style( 'modelteme-framework-admin-style' );

    // JS

    wp_enqueue_script( 'js-modeltheme-admin-custom', plugin_dir_url( __FILE__ ) . 'js/modeltheme-custom-admin.js', array(), '1.0.0', true );

}

add_action('admin_enqueue_scripts', 'modeltheme_enqueue_admin_scripts');













// WIDGETS

require_once('inc/widgets/widgets.php');


// CUSTOM FUNCTIONS

require_once('inc/custom.functions.php');


// LOAD METABOXES

require_once('inc/metaboxes/metaboxes.php');

// LOAD POST TYPES

require_once('inc/post-types/post-types.php');

// LOAD SHORTCODES

require_once('inc/shortcodes/shortcodes.php');

// DEMO IMPORTER

// DEMO IMPORTER
// require_once('inc/demo-importer/redux.php');

// DEMO IMPORTER V2
require_once('inc/demo-importer-v2/wbc907-plugin-example.php');

// GOOGLE MAPS

require_once('inc/sb-google-maps-vc-addon/sb-google-maps-vc-addon.php'); // GMAPS





