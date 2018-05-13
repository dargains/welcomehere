<?php
function numbat_child_scripts() {
    wp_enqueue_style( 'numbat-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'numbat_child_scripts' );
 
// Your php code goes here
?>