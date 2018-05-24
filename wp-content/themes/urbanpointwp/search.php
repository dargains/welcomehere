<?php
/**
 * The template for displaying search results pages.
 */

get_header(); 


$class = "col-md-12";

if ( urbanpointwp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( urbanpointwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or urbanpointwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-9";
}
?>

<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo urbanpointwp_header_title_breadcrumbs(); ?>


<?php if (urbanpointwp_plugin_active('modeltheme-framework/modeltheme-framework.php')) { ?>
    <?php if ( have_posts() ) : ?>
        <div class="row">

            <!-- MAP PINS ON ARCHIVE -->
            <?php if(urbanpointwp_plugin_active('modeltheme-framework/modeltheme-framework.php')){ ?>
                <!-- MAP LOCATION -->
                <div class="mt_listings_page mt_listing_map_location">
                <?php 

                    $gmap_pin = '';
                    // Start Map
                    $gmap_pin .= '[sbvcgmap map_width="100" map_height="600" mapstyles="style-55" zoom="18" scrollwheel="no" searchradius="500" sbvcgmap_title="Google Maps"]';
                        while ( have_posts() ) : the_post();
                            // Get the current category ID, e.g. if we're on a category archive page
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
                        endwhile;
                    // End Map
                    $gmap_pin .= '[/sbvcgmap]';
                    echo do_shortcode($gmap_pin);
                ?>
                </div>
            <?php } ?>

        </div>
    <?php endif; ?>
<?php } ?>


<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
        <div class="row">
            <div class="col-md-12 main-content">
                <?php if ( have_posts() ) : ?>
                    <div class="row">
                        <?php /* Start the Loop */ ?>

                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php if (urbanpointwp_plugin_active('modeltheme-framework/modeltheme-framework.php')) { ?>
                                <?php get_template_part( 'content', 'housesearch' ); ?>
                            <?php }else{ ?>
                                <?php get_template_part( 'content', 'right' ); ?>
                            <?php } ?>
                        <?php endwhile; ?>

                        <div class="modeltheme-pagination-holder col-md-12">             
                            <div class="modeltheme-pagination pagination">             
                                <?php urbanpointwp_pagination(); ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </div>
       </div>
    </div>
</div>

<?php get_footer(); ?>