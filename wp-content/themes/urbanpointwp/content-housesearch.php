<?php 
/**
* Template for House Listings
* Used in: taxonomy-mt-car-category.php, taxonomy-mt-car-features.php, taxonomy-mt-car-type.php, search.php
**/


// CAR THUMBNAIL
$post_img = '';
$thumbnail_src_featured = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'urbanpointwp_listing_archive_featured_square' );
$thumbnail_src_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'urbanpointwp_listing_archive_thumbnail' );

    if ($thumbnail_src_featured) {
        $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src_featured[0]) . '" alt="'.get_the_title().'" />';
        $post_col = 'col-md-6';
    } else {
        $post_col = 'col-md-12 no-featured-image';
    }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post list-view col-md-12'); ?> > 
    <div class="blog_custom row">

        <div class="col-md-12 post-details">
            <div class="row description_container">
                

                <div class="col-md-6 mt_cars--features-description">
                    
                    <?php 
                        $house_location = get_the_term_list( get_the_ID(), 'mt-house-location', '', ' ' );
                        $content_post   = get_post(get_the_ID());
                        $content        = $content_post->post_content;
                        $content        = apply_filters('the_content', $content);
                        $content        = str_replace(']]>', ']]&gt;', $content);
                        $house_address = get_post_meta( get_the_ID(), 'mt_address', true );
                        $house_video_tour = get_post_meta( get_the_ID(), 'mt_video_tour', true );
                    ?>
                    <h1 class="house_title post-name">
                        <a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                    </h1>

                    <h3 class="house_location post-name">
                    	<?php echo wp_kses_post($house_location); ?>
                    </h3>

                    <h3 class="house_address post-name">
	                    <?php
		                    if (!empty($house_address)) {
		                    	echo ', ' . esc_attr($house_address);
		                    }
		                ?>
                    </h3>

                    

                    <?php 
                        // Price per day - meta
                        $mt_house_price_day = get_post_meta( get_the_ID(), 'mt_house_price_day', true );
                        $mt_house_price_for_sale = get_post_meta( get_the_ID(), 'mt_house_price_for_sale', true );
                        
                        // Price per day
                        if(!empty($mt_house_price_day)){
                            echo '<div class="mt_car--price-day mt_car--price">';
                                if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left') {
                                    ?><span class="car_currency"><?php echo urbanpointwp_get_currency_symbol();?></span><?php
                                }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left_with_space') {
                                    ?><span class="car_currency"><?php echo urbanpointwp_get_currency_symbol() . ' ';?></span><?php
                                }
                                ?>
                                <span class="car_price"><?php echo esc_attr($mt_house_price_day); ?></span>
                                <span class="car_per"><?php echo esc_html__(' Por dia', 'urbanpointwp');?></span><?php
                                if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right') {
                                    ?><span class="car_currency"><?php echo urbanpointwp_get_currency_symbol(); ?></span><?php
                                }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right_with_space') {
                                    ?><span class="car_currency"><?php echo ' ' . urbanpointwp_get_currency_symbol(); ?></span><?php
                                }
                            echo '</div>';
                        } else {
                            echo '<div class="mt_car--price-day mt_car--price">';
                                if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left') {
                                    ?><span class="car_currency"><?php echo urbanpointwp_get_currency_symbol();?></span><?php
                                }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'left_with_space') {
                                    ?><span class="car_currency"><?php echo urbanpointwp_get_currency_symbol() . ' ';?></span><?php
                                }
                                ?>
                                <span class="car_price"><?php echo esc_attr($mt_house_price_for_sale); ?></span>
                                <span class="car_per"><?php echo esc_html__(' for Sale', 'urbanpointwp');?></span><?php
                                if (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right') {
                                    ?><span class="car_currency"><?php echo urbanpointwp_get_currency_symbol(); ?></span><?php
                                }elseif (urbanpointwp_redux('mt_cars_settings_currency_position') == 'right_with_space') {
                                    ?><span class="car_currency"><?php echo ' ' . urbanpointwp_get_currency_symbol(); ?></span><?php
                                }
                            echo '</div>';
                        }
                    ?>

                    <div class="house_description">
                        <?php
                            /* translators: %s: Name of current post */
                            the_content( sprintf(__( '', 'urbanpointwp' ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ) );
                        ?>
                    </div>

                    

                    <?php 
                        // Square areas - meta
                        $mt_square_areas = get_post_meta( get_the_ID(), 'mt_square_areas', true );

                        // Bedrooms - meta
                        $mt_bedrooms = get_post_meta( get_the_ID(), 'mt_bedrooms', true );

                        // Bathrooms - meta
                        $mt_bathrooms = get_post_meta( get_the_ID(), 'mt_bathrooms', true );

                        // Square areas - icon
                        $square_area_icon = get_template_directory_uri() . '/images/theme_urbanpoint_icon1.png';

                        // Bedrooms - icon
                        $bedrooms_icon = get_template_directory_uri() . '/images/theme_urbanpoint_icon2.png';

                        // Bathrooms - icon
                        $bathrooms_icon = get_template_directory_uri() . '/images/theme_urbanpoint_icon3.png';

                        
                    ?>

                    <div class="mt_car--important-features col-md-12">
                        <!-- POST IMPORTANT FEATURES -->
                        <?php

	                        if(!empty($mt_square_areas)) {
	                        	echo '<span class="col-md-4 text-center car_number_passengers">';
		                        	echo '<img src="'.esc_url($square_area_icon).'" alt="passengers" height="25" width="25">';
		                        		echo '<span class="car_number_passengers_value">'.esc_attr($mt_square_areas).' m<sup>2</sup></span>';
	                        	echo '</span>';

	                        }

	                        if(!empty($mt_bedrooms)) {
	                        	echo '<span class="col-md-4 text-center car_luggage">';
		                        	echo '<img src="'.esc_url($bedrooms_icon).'" alt="luggage" height=25" width="25">';
		                        		echo '<span class="car_luggage_value">'.esc_attr($mt_bedrooms).' Bedrooms</span>';
	                        	echo '</span>';

	                        }

	                        if(!empty($mt_bathrooms)) {
	                        	echo '<span class="col-md-4 text-center car_gearbox">';
		                        	echo '<img src="'.esc_url($bathrooms_icon).'" alt="gearbox" height="25" width="25">';
		                        		echo '<span class="car_gearbox_value">'.esc_attr($mt_bathrooms).' Bathrooms</span>';
	                        	echo '</span>';

	                        }


                        ?>

                    </div>

                </div>

                <?php if ($post_img) { ?>
                <div class="col-md-6 mt_cars--main-pic">

                    <a href="<?php the_permalink(); ?>" class="relative">
                        <div class="absolute gradient-holder-category"></div>  
                        <?php echo wp_kses_post($post_img); ?>
                        <?php

                        	$house_video_tour_image_button = get_template_directory_uri() . '/images/theme_urbanpoint_play.png';

                        	if(!empty($house_video_tour)) {
		                        echo '<a href="'.esc_url($house_video_tour).'" class="play_tour_href relative popup-vimeo-youtube">';
									echo '<img class="play_tour buton_image_class" src="'.esc_url($house_video_tour_image_button).'" data-src="'.esc_url($house_video_tour_image_button).'" height="50" width="50">';
								echo '</a>';
                        	}
                        ?>
                    </a>
                </div>
                <?php } ?>



            </div>
        </div>
    </div>
    <div class="car_separator"></div>
</article>