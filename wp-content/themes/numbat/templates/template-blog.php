<?php
/*
* Template Name: Blog
*/
get_header(); 


#Redux global variable
global $numbat_redux;

$class = "";

if ( $numbat_redux['numbat_blog_layout'] == 'numbat_blog_fullwidth' ) {
    $class = "row";
}elseif ( $numbat_redux['numbat_blog_layout'] == 'numbat_blog_right_sidebar' or $numbat_redux['numbat_blog_layout'] == 'numbat_blog_left_sidebar') {
    $class = "col-md-9";
}
$sidebar = $numbat_redux['numbat_blog_layout_sidebar'];
$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off',            true );
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

<!-- Page content -->
<div class="high-padding">
    <!-- Sticky posts -->
    <?php if ( get_option( 'sticky_posts' ) && $numbat_redux['numbat-enable-sticky'] ) { ?>

    <div class="container sticky-posts">
        <div class="row">
            <?php
            $args_sticky_posts = array(
                'posts_per_page'        => 4,
                'post__in'              => get_option( 'sticky_posts' ),
                'post_type'             => 'post',
                'post_status'           => 'publish' 
            );
            $sticky_posts = get_posts($args_sticky_posts);

            foreach ($sticky_posts as $post) { 
                $excerpt = get_post_field('post_content', $post->ID);
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'numbat_post_pic700x450' );
                $author_id = $post->post_author;
            ?>
            <div class="col-md-3 post">
                <a href="<?php echo get_permalink($post->ID); ?>" class="relative">
                    <?php if($thumbnail_src) { echo '<img src="'. esc_html($thumbnail_src[0]) . '" alt="'. esc_html($post->post_title) .'" />';
                    } ?>
                    <div class="thumbnail-overlay absolute">
                        <i class="fa fa-plus absolute"></i>
                    </div>
                </a>
                <h3 class="post-name">
                <?php if( is_sticky() ) { echo '<i class="fa fa-bookmark" aria-hidden="true"></i>'; } ?><a href="<?php echo get_permalink($post->ID); ?>"><?php echo esc_attr($post->post_title); ?></a>
                </h3>
                <div class="post-author">by <?php echo the_author_meta( 'display_name', $author_id ); ?></div>
                <div class="post-excerpt"><?php echo numbat_excerpt_limit($excerpt,14); ?></div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php } ?>

    <?php
    wp_reset_postdata();
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'paged'            => $paged,
    );
    $posts = new WP_Query( $args );
    ?>
    <!-- Blog content -->
    <div class="container blog-posts high-padding">
        <div class="row">
            <?php if ( $numbat_redux['numbat_blog_layout'] == 'numbat_blog_left_sidebar' && is_active_sidebar( 'footer_column_3')) { ?>
            <div class="col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">
                <div class="row">
                <?php if ( $posts->have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php
                    while ( $posts->have_posts() ) : $posts->the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                    ?>

                    <?php endwhile; ?>
                    <?php echo '<div class="clearfix"></div>'; ?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>

                <div class="clearfix"></div>

                <?php 
                query_posts($args);
                global $wp_query;
                if ($wp_query->max_num_pages != 1) { ?>                
                <div class="numbat-pagination pagination col-md-12">             
                    <?php numbat_pagination(); ?>
                </div>
                <?php } ?>
                </div>
            </div>

            <?php if ( $numbat_redux['numbat_blog_layout'] == 'numbat_blog_right_sidebar' && is_active_sidebar( 'footer_column_3')) { ?>
            <div class="col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php
get_footer();
?>