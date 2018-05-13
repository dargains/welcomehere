<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package numbat
 */
$excerpt = get_post_field('post_content', get_the_ID());
$thumbnail_src      = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'numbat_related_post_pic500x300' );
$author_id = $post->post_author;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row single-post'); ?>>

    <?php 
    global $numbat_redux;

    $post_icon = $numbat_redux['post-text-format-icon']; 
    
    if (get_post_format() == 'image') {
        $post_icon = $numbat_redux['post-image-format-icon'];
    }elseif (get_post_format() == 'video') {
        $post_icon = $numbat_redux['post-video-format-icon'];
    }elseif (get_post_format() == 'quote') {
        $post_icon = $numbat_redux['post-quote-format-icon'];
    }elseif (get_post_format() == 'link') {
        $post_icon = $numbat_redux['post-link-format-icon'];
    }
    ?>


    <div class="col-md-4 post-thumbnail">
        <a href="<?php the_permalink(); ?>" class="relative">
            <?php if($thumbnail_src) { 
                echo '<img src="'. esc_html($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
            } ?>
            <div class="thumbnail-overlay absolute">
                <i class="fa fa-plus absolute"></i>
            </div>
        </a>
    </div>
    <div class="col-md-8 post-details">
        <h3 class="post-name row"> <?php if( is_sticky() ) { echo '<i class="fa fa-bookmark" aria-hidden="true"></i>'; } ?>
            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                <span class="post-type">
                    <i class="fa <?php echo esc_attr($post_icon); ?>"></i>
                </span><?php the_title() ?>
            </a>
        </h3>
        <div class="post-category-comment-date row">
            <span class="post-author"><?php echo esc_html__('by ', 'numbat') . get_the_author(); ?></span>   /   
            <span class="post-comments"><a href="<?php the_permalink(); ?>"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a></span>   /   
            <span class="post-date"><?php echo get_the_date(); ?></span>
        </div>
        <div class="post-excerpt row">
        <?php
            /* translators: %s: Name of current post */
            the_content( sprintf(
                esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'numbat' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
        ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'numbat' ),
                'after'  => '</div>',
            ) );
        ?>
        </div>
    </div>
</article>