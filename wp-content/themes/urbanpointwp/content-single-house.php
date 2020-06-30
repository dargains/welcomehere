<?php
/**
* Content Single
*/
?>


<!-- LISTING FEATURED IMAGE -->

<?php
$thumbnail_src_featured = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'urbanpointwp_listing_single_featured' );
$thumbnail_src_featured_full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );


if($thumbnail_src_featured) { ?>
    <!-- ARTICLE THUMBNAIL -->
    <div class="mt_cars--single-main-pic row">
        <div class="absolute gradient-holder flex">
            <div class="container relative flex">
                <div class="post-name">


                    <!-- GALLERY -->
                    <div class="mt_car--gallery pull-left">
                        <?php
                            global  $dynamic_featured_image;
                            $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID() );

                            $photos_number = '0';
                            if( !is_null($featured_images) ){
                                $photos_number = count($featured_images);
                            }
                            $final_photos_number = $photos_number + 1;
                        ?>

                        <!-- FEATURED IMAGE -->
                        <a class="mt_car--single-gallery mt_car--featured-single-gallery" href="<?php echo esc_url($thumbnail_src_featured_full[0]); ?>">
                            <i class="fa fa-camera-retro" aria-hidden="true"></i>
                            <?php echo pll__('ver galeria'); ?>
                            <?php echo ' - '.esc_attr($final_photos_number); ?>
                            <?php echo pll__('fotos'); ?>
                        </a>
                        <!-- EXTRA POST IMAGES -->
                        <?php
                            //Loop through the image to display your image
                            if( !is_null($featured_images) ){

                                $medias = array();

                                foreach($featured_images as $images){
                                    $attachment_id = $images['attachment_id'];
                                    $medias[] = $attachment_id;
                                }

                                $ids = '';
                                $len = count($medias);
                                $i = 0;
                                foreach($medias as $media){
                                    $multiple_featured_image1 = wp_get_attachment_url( $media, 'full' );
                                    echo '<a class="mt_car--single-gallery" href="'.esc_url($multiple_featured_image1).'"></a>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php the_post_thumbnail( 'urbanpointwp_listing_single_featured', array('class' => 'class_name')); ?>
    </div>

<?php } ?>
<div class="clearfix"></div>






<!-- SLIDER -->






<!-- ARTICLE CONTENT -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
       <div class="row">

            <?php if ( urbanpointwp_redux('mt_single_blog_layout') == 'mt_single_blog_left_sidebar' && is_active_sidebar( urbanpointwp_redux('mt_single_blog_layout_sidebar') )) { ?>
                <div class="col-md-3 sidebar-content">
                    <?php dynamic_sidebar( urbanpointwp_redux('mt_single_blog_layout_sidebar') ); ?>
                </div>
            <?php } ?>


            <?php if ( urbanpointwp_redux('mt_single_blog_layout') == 'mt_single_blog_fullwidth') {
                $cols = 'col-md-12';
            }else{
                $cols = 'col-md-8';
            } ?>


            <!-- POST CONTENT -->
            <div class="<?php echo esc_attr($cols); ?> main_stickit main-content">
<h1 class="post-title" style="margin-bottom:20px;margin-top:0;">
                        <?php echo get_the_title(); ?>
                    </h1>


                <!-- HEADER -->
                <div class="article-header">
                    <div class="article-details">
                        <?php if (get_the_tags()) { ?>
                            <div class="single-post-tags">
                                <i class="icon-tag"></i> <?php echo get_the_term_list( get_the_ID(), 'post_tag', '', ' ' ); ?>
                            </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- CONTENT -->
                <div class="article-content">

                    <!-- POST CONTENT -->
                    <?php the_content(); ?>
                    <div class="clearfix"></div>

                    <div class="mt_car--features-group post-specifications">

                        <!-- POST Specifications -->
                        <h4 class="content-car-heading"><?php echo pll_e('Especificações') ?></h4>
                        <div class="row">
                            <?php
                            $mt_car_parking = get_post_meta( get_the_ID(), 'mt_car_parking', true );
                            $mt_built_year = get_post_meta( get_the_ID(), 'mt_built_year', true );
                            $mt_living_rooms = get_post_meta( get_the_ID(), 'mt_living_rooms', true );
                            $mt_car_price = get_post_meta( get_the_ID(), 'mt_car_price', true );
                            $mt_bedrooms = get_post_meta( get_the_ID(), 'mt_bedrooms', true );
                            $mt_balcony = get_post_meta( get_the_ID(), 'mt_balcony', true );
                            $mt_square_areas = get_post_meta( get_the_ID(), 'mt_square_areas', true );
                            $mt_bathrooms = get_post_meta( get_the_ID(), 'mt_bathrooms', true );
                            $mt_total_floors = get_post_meta( get_the_ID(), 'mt_total_floors', true );
                            $mt_kitchens = get_post_meta( get_the_ID(), 'mt_kitchens', true );
                            $mt_garages = get_post_meta( get_the_ID(), 'mt_garages', true );
                            $mt_pools = get_post_meta( get_the_ID(), 'mt_pools', true );
                            $mt_insurance = get_post_meta( get_the_ID(), 'mt_insurance', true );
                            $mt_people = get_post_meta( get_the_ID(), 'mt_house_people', true );


                            if(isset($mt_built_year)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Ano de construção').': <strong>'.esc_attr($mt_built_year).'</strong></p></div>';
                            }
                            if(isset($mt_square_areas)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Área útil').': <strong>'.esc_attr($mt_square_areas).'m<sup>2</sup></strong></p></div>';
                            }
                            if(isset($mt_living_rooms)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Salas').': <strong>'.esc_attr($mt_living_rooms).'</strong></p></div>';
                            }
                            if(isset($mt_bathrooms)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Casas de banho').': <strong>'.esc_attr($mt_bathrooms).'</strong></p></div>';
                            }
                            if(isset($mt_bedrooms)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Quartos').': <strong>'.esc_attr($mt_bedrooms).'</strong></p></div>';
                            }
                            if(isset($mt_balcony)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Varandas').': <strong>'.esc_attr($mt_balcony).'</strong></p></div>';
                            }
                            if(isset($mt_car_parking)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Lugares de parque').': <strong>'.esc_attr($mt_car_parking).'</strong></p></div>';
                            }
                            // if(isset($mt_total_floors)){
                            //     echo '<div class="col-md-4 features_items"><p>'.esc_html__('Total Floors: ','urbanpointwp').'<strong>'.esc_attr($mt_total_floors).'</strong></p></div>';
                            // }
                            if(isset($mt_kitchens)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Cozinhas').': <strong>'.esc_attr($mt_kitchens).'</strong></p></div>';
                            }
                            //if(isset($mt_garages)){
                                //echo '<div class="col-md-4 features_items"><p>'.esc_html__('Garagens: ','urbanpointwp').'<strong>'.esc_attr($mt_garages).'</strong></p></div>';
                            //}
                            // if(isset($mt_pools)){
                            //     echo '<div class="col-md-4 features_items"><p>'.esc_html__('Pools: ','urbanpointwp').'<strong>'.esc_attr($mt_pools).'</strong></p></div>';
                            // }
                            if(isset($mt_people)){
                                echo '<div class="col-md-4 features_items"><p>'.pll__('Lotação').': <strong>'.esc_attr($mt_people).'</strong></p></div>';
                            }
                        ?>
                        </div>
                    </div>


                    <div class="mt_car--features-group post-features">
                        <!-- POST FEATURES -->
                        <h4 class="content-car-heading"><?php echo esc_html__(pll_e('Facilidades'),'urbanpointwp'); ?></h4>
                        <?php echo get_the_term_list(
                          get_the_ID(),
                          'mt-house-features',
                          '<div class="single-post-tags row"><div class="col-md-4 features_items"><i class="fa fa-check-square-o"></i> ',
                          '</div><div class="col-md-4 features_items"><i class="fa fa-check-square-o"></i> ',
                          '</div></div>'
                        ); ?>
                    </div>

                    <?php if(urbanpointwp_plugin_active('modeltheme-framework/modeltheme-framework.php')){ ?>

                    <!-- MAP LOCATION -->
                    <div class="mt_listing_map_location">
                        <h4 class="content-car-heading"><?php pll_e('Localização') ?></h4>
                        <?php
                            $mt_map_coordinates = get_post_meta( get_the_ID(), 'mt_map_coordinates', true );
                            if (isset($mt_map_coordinates) && !empty($mt_map_coordinates)) {
                                $gmap_pin = '';
                                $gmap_pin .= '[sbvcgmap map_width="100" map_height="400" mapstyles="style-55" zoom="18" scrollwheel="no" searchradius="500" sbvcgmap_title="Google Maps"]';

                                    $categories = wp_get_post_terms(get_the_ID(), 'mt-house-type', array("fields" => "all"));
                                    foreach($categories as $category) {
                                        if ($category) {
                                            $image_id = get_term_meta ( $category->term_id, 'category-image-id', true );
                                            $mt_map_coordinates = get_post_meta( get_the_ID(), 'mt_map_coordinates', true );
                                            if (isset($mt_map_coordinates) && !empty($mt_map_coordinates)) {
                                                $gmap_pin .= '[sbvcgmap_marker animation="DROP" address="'.esc_attr($mt_map_coordinates).'" icon="'.esc_attr($image_id).'"]<a href="'.get_the_permalink().'">'.get_the_title().'</a>[/sbvcgmap_marker]';
                                            }
                                        }
                                    }

                                $gmap_pin .= '[/sbvcgmap]';
                            }
                            echo do_shortcode($gmap_pin);
                        ?>
                    </div>
                <?php } ?>

                    <?php
                    $house_video_tour = get_post_meta( get_the_ID(), 'mt_video_tour', true );

                    if (!empty($house_video_tour)) { ?>
                        <div class="mt_car--youtube_video">
                            <h4 class="content-car-heading"><?php echo esc_html__('Virtual Tour','urbanpointwp'); ?></h4>
                            <?php echo wp_oembed_get($house_video_tour); ?>
                        </div>

                    <?php } ?>

                    <div class="clearfix"></div>

                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanpointwp' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                    <div class="clearfix"></div>

                    <?php if (get_the_tags()) { ?>
                        <div class="single-post-tags">
                            <span><?php echo esc_html__('Tags:','urbanpointwp'); ?></span> <?php echo get_the_term_list( get_the_ID(), 'post_tag', '', ' ' ); ?>
                        </div>
                    <?php } ?>

                    <div class="clearfix"></div>

                    <!-- ÉPOCAS -->
                    <div class="mt_car--features-group post-features">
                        <!-- POST FEATURES -->
                        <h4 class="content-car-heading"><?php echo esc_html__(pll_e('Épocas'),'urbanpointwp'); ?></h4>
                        <p><?php echo esc_html__(pll_e('Época alta'),'urbanpointwp'); ?></p>
                        <ul class="article-content">
                          <li><?php echo esc_html__(pll_e('Época alta 1'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Época alta 2'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Época alta 3'),'urbanpointwp'); ?></li>
                        </ul>
                        <p><?php echo esc_html__(pll_e('Época baixa'),'urbanpointwp'); ?></p>
                        <ul class="article-content">
                          <li><?php echo esc_html__(pll_e('Época baixa 1'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Época baixa 2'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Época baixa 3'),'urbanpointwp'); ?></li>
                        </ul>
                    </div>

                    <!-- CONDIÇÕES -->
                    <div class="mt_car--features-group post-features">
                        <!-- POST FEATURES -->
                        <h4 class="content-car-heading"><?php echo esc_html__(pll_e('Condições'),'urbanpointwp'); ?></h4>
                        <ul class="article-content">
                          <li><?php echo esc_html__(pll_e('Condição 1'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Condição 2'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Condição 3'),'urbanpointwp'); ?></li>
                          <li><?php echo esc_html__(pll_e('Condição 4'),'urbanpointwp'); ?></li>
                        </ul>
                    </div>

                    <!-- COMMENTS -->
                    <?php

                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div>
            </div>

            <div class="col-md-4 sidebar-content">
                <?php //dynamic_sidebar( urbanpointwp_redux('mt_single_blog_layout_sidebar') ); ?>
                <div class="mt_car--pricings">
                    <div class="">
                        <div class="mt_house--price-container">
                            <?php
                                $mt_house_price_day = get_post_meta( get_the_ID(), 'mt_house_price_day', true );
                                $mt_house_price_month = get_post_meta( get_the_ID(), 'mt_house_price_month', true );
                                $mt_house_price_medium = get_post_meta( get_the_ID(), 'mt_house_price_medium', true );
                                $mt_house_price_summer = get_post_meta( get_the_ID(), 'mt_house_price_summer', true );

                                // Price high season
                                if(isset($mt_house_price_day) && !empty($mt_house_price_day)){
                                    echo '<div class="mt_car--price-day mt_car--single-price">';
                                        echo '<div class="mt_car--single-price-inner mt_car--single-price-inner-day">';
                                            echo '<span class="priceval">';
                                            echo '<small>' . pll__('Época alta') . ': </small>';
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left_with_space') {
                                                echo urbanpointwp_get_currency_symbol() . ' ';
                                            }
                                            echo esc_attr($mt_house_price_day) . '</span> ' . pll__('por dia');
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right_with_space') {
                                                echo ' ' . urbanpointwp_get_currency_symbol();
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                // Price meidum season
                                if(isset($mt_house_price_medium) && !empty($mt_house_price_medium)){
                                    echo '<div class="mt_car--price-hour mt_car--single-price mt_car--single-price-inner-month">';
                                        echo '<div class="mt_car--single-price-inner">';
                                            echo '<span class="priceval">';
                                            echo '<small>' . pll__('Época média') . ': </small>';
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left_with_space') {
                                                echo urbanpointwp_get_currency_symbol() . ' ';
                                            }
                                            echo esc_attr($mt_house_price_medium) . '</span> ' . pll__('por dia');
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right_with_space') {
                                                echo ' ' . urbanpointwp_get_currency_symbol();
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                // Price low season
                                if(isset($mt_house_price_month) && !empty($mt_house_price_month)){
                                    echo '<div class="mt_car--price-hour mt_car--single-price mt_car--single-price-inner-month">';
                                        echo '<div class="mt_car--single-price-inner">';
                                            echo '<span class="priceval">';
                                            echo '<small>' . pll__('Época baixa') . ': </small>';
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left_with_space') {
                                                echo urbanpointwp_get_currency_symbol() . ' ';
                                            }
                                            echo esc_attr($mt_house_price_month) . '</span> ' . pll__('por dia');
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right_with_space') {
                                                echo ' ' . urbanpointwp_get_currency_symbol();
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                // Price summer season
                                if(isset($mt_house_price_summer) && !empty($mt_house_price_summer)){
                                    echo '<div class="mt_car--price-hour mt_car--single-price mt_car--single-price-inner-month">';
                                        echo '<div class="mt_car--single-price-inner">';
                                            echo '<span class="priceval">';
                                            echo '<small>' . pll__('Época verão') . ': </small>';
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left_with_space') {
                                                echo urbanpointwp_get_currency_symbol() . ' ';
                                            }
                                            echo esc_attr($mt_house_price_summer) . '</span> ' . pll__('por dia');
                                            if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right') {
                                                echo urbanpointwp_get_currency_symbol();
                                            }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right_with_space') {
                                                echo ' ' . urbanpointwp_get_currency_symbol();
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="mt_car--booking-form">
                    <?php
                        if(!empty($mt_house_price_day) or !empty($mt_house_price_month) ){
                          // echo get_user_locale();
                          if (get_user_locale() == 'pt_PT') {
                            echo do_shortcode('[contact-form-7 id="8516" title="Rent Booking Form" html_class="rent_contact_form"]'); //pt
                          } else if (get_user_locale() == 'en_GB') {
                            echo do_shortcode('[contact-form-7 id="8515" title="Rent Booking Form" html_class="rent_contact_form"]'); //en
                          } else if (get_user_locale() == 'es_ES') {
                            echo do_shortcode('[contact-form-7 id="8517" title="Rent Booking Form" html_class="rent_contact_form"]'); //es
                          }
                        }
                        // else {
                        //     echo do_shortcode('[contact-form-7 id="7954" title="Sale Booking Form" html_class="sale_contact_form"]');
                        // }
                    ?>
                </div>
            </div>

        </div>
    </div>
</article>
<script type="text/javascript">
  window.onload = function() {
    var aptName = document.querySelector('.post-title').innerText;
    var inputEl = document.querySelector('input[name="apartamento"]')
    inputEl.value = aptName;
    inputEl.closest('.container').style.display = 'none';
  }
</script>

<div class="row post-details-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( urbanpointwp_redux('mt_enable_related_cars') ) { ?>

                <div class="clearfix"></div>
                <div class="related-posts sticky-posts">
                    <?php
                    global  $post;
                    $orig_post = $post;
                    ?>

                    <h2 class="heading-bottom"><?php pll_e('outros apartamentos'); ?></h2>
                    <div class="row">
                        <?php
                        $args=array(
                            'post__not_in'          => array($post->ID),
                            'posts_per_page'        => 3, // Number of related posts to display.
                            'post_type'             => 'mt_house',
                            'post_status'           => 'publish',
                            'ignore_sticky_posts'   => 1
                        );

                        $my_query = new wp_query( $args );

                        while( $my_query->have_posts() ) {
                            $my_query->the_post();

                        ?>
                            <div class="col-md-4 post">
                                <div class="related_blog_custom">
                                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'urbanpointwp_related_post_pic500x300' ); ?>
                                    <?php if($thumbnail_src){ ?>
                                    <a href="<?php the_permalink(); ?>" class="relative">
                                        <?php if($thumbnail_src) { ?>
                                            <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </a>
                                    <?php } ?>
                                    <div class="related_blog_details">
                                        <h4 class="post-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } ?>
                    </div>
                </div>
                    <?php
                    $post = $orig_post;
                    wp_reset_postdata();
                    ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
