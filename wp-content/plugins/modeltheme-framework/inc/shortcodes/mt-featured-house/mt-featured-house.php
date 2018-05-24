<?php 


/**

||-> Shortcode: Featured Product

*/
function modeltheme_shortcode_featured_house($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'                         =>'',

            'room1_title'                       =>'',
            'room1_subtitle'                    =>'',
            'room2_title'                       =>'',
            'room2_subtitle'                    =>'',
            'room3_title'                       =>'',
            'room3_subtitle'                    =>'',
            'room4_title'                       =>'',
            'room4_subtitle'                    =>'',

            'titles_color'                      =>'',
            'subtitles_color'                   =>'',
            'navigation_color'                  =>'',

            'main_image_room1'                  =>'',
            'image1_room1'                      =>'',
            'image1_room1_position_left'        =>'',
            'image1_room1_position_top'         =>'',
            'image2_room1'                      =>'',
            'image2_room1_position_left'        =>'',
            'image2_room1_position_top'         =>'',
            'image3_room1'                      =>'',
            'image3_room1_position_left'        =>'',
            'image3_room1_position_top'         =>'',

            'main_image_room2'                  =>'',
            'image1_room2'                      =>'',
            'image1_room2_position_left'        =>'',
            'image1_room2_position_top'         =>'',
            'image2_room2'                      =>'',
            'image2_room2_position_left'        =>'',
            'image2_room2_position_top'         =>'',
            'image3_room2'                      =>'',
            'image3_room2_position_left'        =>'',
            'image3_room2_position_top'         =>'',

            'main_image_room3'                  =>'',
            'image1_room3'                      =>'',
            'image1_room3_position_left'        =>'',
            'image1_room3_position_top'         =>'',
            'image2_room3'                      =>'',
            'image2_room3_position_left'        =>'',
            'image2_room3_position_top'         =>'',
            'image3_room3'                      =>'',
            'image3_room3_position_left'        =>'',
            'image3_room3_position_top'         =>'',

            'main_image_room4'                  =>'',
            'image1_room4'                      =>'',
            'image1_room4_position_left'        =>'',
            'image1_room4_position_top'         =>'',
            'image2_room4'                      =>'',
            'image2_room4_position_left'        =>'',
            'image2_room4_position_top'         =>'',
            'image3_room4'                      =>'',
            'image3_room4_position_left'        =>'',
            'image3_room4_position_top'         =>''

        ), $params ) );
    

    // Room 1
    $main_image_room1      = wp_get_attachment_image_src($main_image_room1, "full");
    $main_image_room1_src  = $main_image_room1[0];

    $image1_room1      = wp_get_attachment_image_src($image1_room1, "full");
    $image1_room1_src  = $image1_room1[0];

    $image2_room1      = wp_get_attachment_image_src($image2_room1, "full");
    $image2_room1_src  = $image2_room1[0];

    $image3_room1      = wp_get_attachment_image_src($image3_room1, "full");
    $image3_room1_src  = $image3_room1[0];


    // Room 2
    $main_image_room2      = wp_get_attachment_image_src($main_image_room2, "full");
    $main_image_room2_src  = $main_image_room2[0];

    $image1_room2      = wp_get_attachment_image_src($image1_room2, "full");
    $image1_room2_src  = $image1_room2[0];

    $image2_room2      = wp_get_attachment_image_src($image2_room2, "full");
    $image2_room2_src  = $image2_room2[0];

    $image3_room2      = wp_get_attachment_image_src($image3_room2, "full");
    $image3_room2_src  = $image3_room2[0];


    // Room 3
    $main_image_room3      = wp_get_attachment_image_src($main_image_room3, "full");
    $main_image_room3_src  = $main_image_room3[0];

    $image1_room3      = wp_get_attachment_image_src($image1_room3, "full");
    $image1_room3_src  = $image1_room3[0];

    $image2_room3      = wp_get_attachment_image_src($image2_room3, "full");
    $image2_room3_src  = $image2_room3[0];

    $image3_room3      = wp_get_attachment_image_src($image3_room3, "full");
    $image3_room3_src  = $image3_room3[0];


    // Room 4
    $main_image_room4      = wp_get_attachment_image_src($main_image_room4, "full");
    $main_image_room4_src  = $main_image_room4[0];

    $image1_room4      = wp_get_attachment_image_src($image1_room4, "full");
    $image1_room4_src  = $image1_room4[0];

    $image2_room4      = wp_get_attachment_image_src($image2_room4, "full");
    $image2_room4_src  = $image2_room4[0];

    $image3_room4      = wp_get_attachment_image_src($image3_room4, "full");
    $image3_room4_src  = $image3_room4[0];



    $html = '';

    $html .= '<style type="text/css" scoped>
                .image1_room1 {
					top: '.$image1_room1_position_top.' !important;
					left: '.$image1_room1_position_left.' !important;
				}
				.image2_room1 {
					top: '.$image2_room1_position_top.' !important;
					left: '.$image2_room1_position_left.' !important;
				}
				.image3_room1 {
					top: '.$image3_room1_position_top.' !important;
					left: '.$image3_room1_position_left.' !important;
				}
				.image1_room2 {
					top: '.$image1_room2_position_top.' !important;
					left: '.$image1_room2_position_left.' !important;
				}
				.image2_room2 {
					top: '.$image2_room2_position_top.' !important;
					left: '.$image2_room2_position_left.' !important;
				}
				.image3_room2 {
					top: '.$image3_room2_position_top.' !important;
					left: '.$image3_room2_position_left.' !important;
				}
				.image3_room3 {
					top: '.$image3_room3_position_top.' !important;
					left: '.$image3_room3_position_left.' !important;
				}
				.image2_room3 {
					top: '.$image2_room3_position_top.' !important;
					left: '.$image2_room3_position_left.' !important;
				}
				.image1_room3 {
					top: '.$image1_room3_position_top.' !important;
					left: '.$image1_room3_position_left.' !important;
				}
				.image2_room4 {
					top: '.$image2_room4_position_top.' !important;
					left: '.$image2_room4_position_left.' !important;
				}
				.image3_room4 {
					top: '.$image3_room4_position_top.' !important;
					left: '.$image3_room4_position_left.' !important;
				}
				.image1_room4 {
					top: '.$image1_room4_position_top.' !important;
					left: '.$image1_room4_position_left.' !important;
				}
				.featured_house_shortcode .title {
					color: '.$titles_color.' !important;
				}
				.featured_house_shortcode .title__sub {
					color: '.$subtitles_color.' !important;
				}
				.nav__item::after {
				    background: '.$navigation_color.' none repeat scroll 0 0;
				}
				.nav__item {
				    border: 2px solid '.$navigation_color.';
				}
              </style>';


    $html .= '<div class="featured_house_shortcode col-md-12 wow '.$animation.'">';

          $html.='<div id="slideshow" class="slideshow_featured_house slideshow">
                    <div class="slide">
                      <div class="scene">
                        <div class="views">
                          <div class="view view--rotate view--rotate-left">
                            <img class="view__img" src="'.$main_image_room1_src.'" alt="main_image_room1" />
                            <div class="item image2_room1">
                              <img class="item__img" src="'.$image2_room1_src.'" alt="image2_room1" data-transform-z="90" />
                            </div>
                            <div class="item image3_room1">
                              <img class="item__img" src="'.$image3_room1_src.'" alt="image3_room1" data-transform-z="80" />
                            </div>
                            <div class="item image1_room1">
                              <img class="item__img" src="'.$image1_room1_src.'" alt="image1_room1" data-transform-z="70" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="scene">
                        <div class="views">
                          <div class="view view--rotate view--rotate-right">
                            <img class="view__img" src="'.$main_image_room2_src.'" alt="main_image_room2_src" />
                            <div class="item image1_room2">
                              <img class="item__img" src="'.$image1_room2_src.'" alt="image1_room2_src" data-transform-z="60" />
                            </div>
                            <div class="item image2_room2">
                              <img class="item__img" src="'.$image2_room2_src.'" alt="image2_room2_src" data-transform-z="60" />
                            </div>
                            <div class="item image3_room2">
                              <img class="item__img" src="'.$image3_room2_src.'" alt="image3_room2_src Vase" data-transform-z="60" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="scene">
                        <div class="views">
                          <div class="view view--rotate view--rotate-left">
                            <div class="item image1_room3">
                              <img class="item__img" src="'.$image1_room3_src.'" alt="image1_room3_src" data-transform-z="80" />
                            </div>
                            <div class="item image2_room3">
                              <img class="item__img" src="'.$image2_room3_src.'" alt="image2_room3_src" data-transform-z="60" />
                            </div>
                            <img class="view__img" src="'.$main_image_room3_src.'" alt="main_image_room3_src" />
                            <div class="item image3_room3">
                              <img class="item__img" src="'.$image3_room3_src.'" alt="image3_room3_src" data-transform-z="40" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="scene">
                        <div class="views">
                          <div class="view view--rotate view--rotate-left">
                            <div class="item image1_room4">
                              <img class="item__img" src="'.$image1_room4_src.'" alt="image1_room4_src" data-transform-z="40" />
                            </div>
                            <div class="item image2_room4">
                              <img class="item__img" src="'.$image2_room4_src.'" alt="image2_room4_src" data-transform-z="70" />
                            </div>
                            <img class="view__img" src="'.$main_image_room4_src.'" alt="Front" />
                            <div class="item image3_room4">
                              <img class="item__img" src="'.$image3_room4_src.'" alt="Bidet" data-transform-z="90" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    <nav class="featured_house nav">
                      <a href="#" class="nav__item"><span class="text-hidden">'.$room1_title.'</span></a>
                      <a href="#" class="nav__item"><span class="text-hidden">'.$room2_title.'</span></a>
                      <a href="#" class="nav__item"><span class="text-hidden">'.$room3_title.'</span></a>
                      <a href="#" class="nav__item"><span class="text-hidden">'.$room4_title.'</span></a>
                    </nav>
                    <div class="titles">
                      <h2 class="title">'.$room1_title.'<span class="title__sub">'.$room1_subtitle.'</span></h2>
                      <h2 class="title">'.$room2_title.'<span class="title__sub">'.$room2_subtitle.'</span></h2>
                      <h2 class="title">'.$room3_title.'<span class="title__sub">'.$room3_subtitle.'</span></h2>
                      <h2 class="title">'.$room4_title.'<span class="title__sub">'.$room4_subtitle.'</span></h2>
                    </div>
                  </div>';
    
    $html .= '</div>';
    
    return $html;
}
add_shortcode('featured_house', 'modeltheme_shortcode_featured_house');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("MT - Featured House", 'modeltheme'),
     "base" => "featured_house",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Titles color", 'modeltheme' ),
          "param_name" => "titles_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose titles color", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Subtitles color", 'modeltheme' ),
          "param_name" => "subtitles_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose subtitles color", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Navigation color", 'modeltheme' ),
          "param_name" => "navigation_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose navigation color", 'modeltheme' )
        ),
        ////////////////////////////////////////////////////////////////////////////////
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 1 title", 'modeltheme' ),
          "param_name" => "room1_title",
          "value" => "",
          "description" => esc_attr__( "Write room 1 title", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 1 subtitle", 'modeltheme' ),
          "param_name" => "room1_subtitle",
          "value" => "",
          "description" => esc_attr__( "Write room 1 subtitle", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "main_image_room1",
          "value" => "",
          "description" => esc_attr__( "Choose main image for room 1", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image1_room1",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 1 for room 1", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image1_room1_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 1 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image1_room1_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 1 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image2_room1",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 2 for room 1", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image2_room1_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 1 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image2_room1_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 1 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image3_room1",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 3 for room 1", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image3_room1_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 1 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 1",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image3_room1_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 1 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 2 title", 'modeltheme' ),
          "param_name" => "room2_title",
          "value" => "",
          "description" => esc_attr__( "Write room 2 title", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 2 subtitle", 'modeltheme' ),
          "param_name" => "room2_subtitle",
          "value" => "",
          "description" => esc_attr__( "Write room 2 subtitle", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "main_image_room2",
          "value" => "",
          "description" => esc_attr__( "Choose main image for room 2", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image1_room2",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 1 for room 2", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image1_room2_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 2 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image1_room2_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 2 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image2_room2",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 2 for room 2", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image2_room2_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 2 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image2_room2_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 2 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image3_room2",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 3 for room 2", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image3_room2_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 2 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 2",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image3_room2_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 2 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 3 title", 'modeltheme' ),
          "param_name" => "room3_title",
          "value" => "",
          "description" => esc_attr__( "Write room 3 title", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 3 subtitle", 'modeltheme' ),
          "param_name" => "room3_subtitle",
          "value" => "",
          "description" => esc_attr__( "Write room 3 subtitle", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "main_image_room3",
          "value" => "",
          "description" => esc_attr__( "Choose main image for room 3", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image1_room3",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 1 for room 3", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image1_room3_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 3 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image1_room3_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 3 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image2_room3",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 2 for room 3", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image2_room3_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 3 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image2_room3_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 3 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image3_room3",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 3 for room 3", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image3_room3_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 3 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 3",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image3_room3_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 3 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 4 title", 'modeltheme' ),
          "param_name" => "room4_title",
          "value" => "",
          "description" => esc_attr__( "Write room 4 title", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Room 4 subtitle", 'modeltheme' ),
          "param_name" => "room4_subtitle",
          "value" => "",
          "description" => esc_attr__( "Write room 4 subtitle", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "main_image_room4",
          "value" => "",
          "description" => esc_attr__( "Choose main image for room 4", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image1_room4",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 1 for room 4", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image1_room4_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 4 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image1_room4_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 1 / room 4 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image2_room4",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 2 for room 4", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image2_room4_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 4 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image2_room4_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 2 / room 4 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image3_room4",
          "value" => "",
          "description" => esc_attr__( "Choose cropped image 3 for room 4", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Left position by pixels", 'modeltheme' ),
          "param_name" => "image3_room4_position_left",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 4 enter value for left position (Example: 50px) ", 'modeltheme' )
        ),
        array(
          "group" => "Room 4",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Top position by pixels", 'modeltheme' ),
          "param_name" => "image3_room4_position_top",
          "value" => "",
          "description" => esc_attr__( "For image 3 / room 4 enter value for top position (Example: 50px) ", 'modeltheme' )
        ),
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}

?>