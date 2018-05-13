<?php
/**
 *
 * Template Name: Page - no sidebar
 *
 * @package numbat
 */

get_header(); 

global $numbat_redux;

$page_slider              = get_post_meta( get_the_ID(), 'select_revslider_shortcode', true );
$page_sidebar             = get_post_meta( get_the_ID(), 'select_page_sidebar',        true );
$breadcrumbs_on_off       = get_post_meta( get_the_ID(), 'breadcrumbs_on_off',         true );
$widgetized_before_footer = get_post_meta( get_the_ID(), 'widgetized_before_footer',   true );

?>

    <?php if ($breadcrumbs_on_off == 'yes') { ?>
    <!-- Breadcrumbs -->
    <div class="numbat-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2><?php echo get_the_title(); ?></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb pull-right">
                        <?php numbat_breadcrumb(); ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <!-- Revolution slider -->
    <?php 
    if (!empty($page_slider)) {
        echo '<div class="numbat_header_slider">';
        echo do_shortcode('[rev_slider '.esc_html($page_slider).']');
        echo '</div>';
    }
    ?>


    <!-- Page content -->
    <div id="primary" class="high-padding content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-md_12 site-main main-content">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>
                </main>
            </div>
        </div>
    </div>

    
    <?php if ($widgetized_before_footer == 'yes') { ?>
    <div class="before_footer row medium-padding">
        <div class="container">
            <div class="row">
            <?php if ( is_active_sidebar( 'before_footer_1' ) ) { ?>
                <div class="col-md-3"><?php  dynamic_sidebar( 'before_footer_1' ); ?></div>
            <?php } ?>
            <?php if ( is_active_sidebar( 'before_footer_2' ) ) { ?>
                <div class="col-md-3"><?php  dynamic_sidebar( 'before_footer_2' ); ?></div>
            <?php } ?>
            <?php if ( is_active_sidebar( 'before_footer_3' ) ) { ?>
                <div class="col-md-3"><?php  dynamic_sidebar( 'before_footer_3' ); ?></div>
            <?php } ?>
            <?php if ( is_active_sidebar( 'before_footer_4' ) ) { ?>
                <div class="col-md-3"><?php  dynamic_sidebar( 'before_footer_4' ); ?></div>
            <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>


<?php get_footer(); ?>