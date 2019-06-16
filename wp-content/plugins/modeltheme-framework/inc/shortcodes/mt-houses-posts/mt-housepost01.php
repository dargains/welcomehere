<?php


/**

||-> Shortcode: Cars

*/
function modeltheme_shortcode_housepost01($params, $content) {
    extract( shortcode_atts(
        array(
            'number'              =>'',
            'columns'             =>'',
            'scope'               =>''
        ), $params ) );


    $html = '';
    $html .= '<div class="house-posts blog-posts car-posts blog-posts-shortcode">';
    $html .= '<div class="row">';
    $args_blogposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'mt_house',
            'tax_query' => array(
                array(
                    'taxonomy' => 'mt-house-category',
                    'field' => 'slug',
                    'terms' => $scope
                )

            ),
            'post_status'      => 'publish'
            );
    $blogposts = get_posts($args_blogposts);

    foreach ($blogposts as $blogpost) {

        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'urbanpointwp_listing_archive_featured' );

        $content_post   = get_post($blogpost->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);


        $house_location = get_the_term_list( $blogpost->ID, 'mt-house-location', '', ' ' );
        $house_scope = get_the_term_list( $blogpost->ID, 'mt-house-category', '', ' ' );

        $house_bedrooms = get_post_meta( $blogpost->ID, 'mt_bedrooms', true );
        $house_bathrooms = get_post_meta( $blogpost->ID, 'mt_bathrooms', true );
        $house_capacity = get_post_meta( $blogpost->ID, 'mt_house_people', true );
        $house_area = get_post_meta( $blogpost->ID, 'mt_square_areas', true);
        $mt_house_price_day = get_post_meta( $blogpost->ID, 'mt_house_price_day', true );
        $mt_house_price_month = get_post_meta( $blogpost->ID, 'mt_house_price_month', true );

        if ($thumbnail_src) {
            $post_img = '<div class="grid">
                          <figure class="effect-apollo">
                            <img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />
                            <div>
                              <h2>'.$blogpost->post_title.'</h2>
                              <p>'.$house_bedrooms.' '.pll__('Quartos').'</p>
                              <p>'.$house_capacity.' '.pll__('Lotação').'</p>
                              <p>'.$house_area.'m<sup>2</sup></p>
                            </div>
                          </figure>
                        </div>';
            $post_col = 'col-md-12';
        }else{
            $post_col = 'col-md-12 no-featured-image';
            $post_img = '';
        }

          $html.='<div class="'.esc_attr($columns). ' vc_col-sm-6 vc_col-xs-12">
                      <article class="single-post single-property-listing list-view">
                        <div class="blog_custom">

                          <!-- POST THUMBNAIL -->
                          <div class="col-md-12 post-thumbnail">
                              <a class="relative" href="'.get_permalink($blogpost->ID).'">'.$post_img.'</a>
                          </div>

                          <!-- POST DETAILS -->
                          <div class="post-details '.$post_col.'">

                            <div class="row">

                              <div class="text-left col-md-6 vc_col-sm-6 vc_col-xs-6">';
                                #location
                                $html .= '<p class="house_display_posts">'.$house_location.'</p>';
                              $html .= '</div>

                              <div class="text-right col-md-6 vc_col-sm-6 vc_col-xs-6">';

                                #prices
                                if(!empty($mt_house_price_day)) {
                                  $html .= '<p class="house_display_posts">'.pll__('desde').' '.$mt_house_price_day.urbanpointwp_get_currency_symbol().'</p>';

                                }

                              $html .= '</div>

                            </div>

                          </div>

                        </div>
                      </article>
                    </div>';

      }


    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('housepost01', 'modeltheme_shortcode_housepost01');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    add_action('init', 'my_get_woo_cats');
    function my_get_woo_cats() {


        $post_scope_tax = get_terms( array( 'taxonomy' => 'mt-house-category','hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0) );
        $post_scope = array();
        foreach ( $post_scope_tax as $term ) {
           $post_scope[$term->name] = $term->slug;
        }



        vc_map( array(
         "name" => esc_attr__("MT - House Posts", 'modeltheme'),
         "base" => "housepost01",
         "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
         "icon" => "smartowl_shortcode",
         "params" => array(
            array(
              "group" => "Options",
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Number of posts", 'modeltheme' ),
              "param_name" => "number",
              "value" => "",
              "description" => esc_attr__( "Enter number of blog post to show.", 'modeltheme' )
            ),
            array(
               "group" => "Options",
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Columns"),
               "param_name" => "columns",
               "std" => '',
               "description" => esc_attr__(""),
               "value" => array(
                esc_attr__('2 columns')     => 'vc_col-sm-6',
                esc_attr__('3 columns')     => 'vc_col-sm-4'
               )
            ),
            array(
                 "group" => "Options",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Houses Scope", 'modeltheme'),
                 "param_name" => "scope",
                 "description" => esc_attr__("Please select houses scope", 'modeltheme'),
                 "std" => '',
                 "value" => $post_scope
            )
          )
      ));


    }

}

?>
