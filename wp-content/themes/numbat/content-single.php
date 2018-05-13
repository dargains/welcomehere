<?php
/**
 * @package numbat
 */

#Redux global variable
global $numbat_redux;


$class = "col-md-12";

if ( $numbat_redux['numbat_single_blog_layout'] == 'numbat_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( $numbat_redux['numbat_single_blog_layout'] == 'numbat_blog_right_sidebar' or $numbat_redux['numbat_single_blog_layout'] == 'numbat_blog_left_sidebar') {
    $class = "col-md-9";
}
$sidebar = $numbat_redux['numbat_single_blog_sidebar'];


$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<div class="numbat-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               	<ol class="breadcrumb pull-left">
                    <?php numbat_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
       <div class="row">

            <?php if ( $numbat_redux['numbat_single_blog_layout'] == 'numbat_blog_left_sidebar' && is_active_sidebar( $sidebar )) { ?>
            <div class="col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">
                <div class="article-header">
                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'numbat_single_post_pic900x300' ); 
                    if($thumbnail_src) { ?>
                        <?php the_post_thumbnail( 'numbat_single_post_pic900x300' ); ?>
                    <?php } ?>
                    <div class="clearfix"></div>
                    <div class="article-details">
                        <h3 class="post-name"><?php echo get_the_title(); ?></h3>
                        <div class="post-author">by <?php echo get_the_author(); ?>
                             <?php echo get_the_date(); ?> | <a href="<?php echo the_permalink().'#comments'; ?>">  <i class="fa fa-comments-o"></i> <?php comments_number( '0', '1', '%' ); ?></a> 
                                <?php if(get_the_tags()) { ?>
                                    | <i class="fa fa-tag"></i>
                                    <?php foreach( ( get_the_tags() ) as $tag) {
                                        $tag_link = get_term_link( $tag );
                                        echo "<a class='single_tax' href='". esc_url( $tag_link ) ."'>" . $tag->name . "</a> "; 
                                    } ?>
                                <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="article-content">
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'numbat' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>

                <div class="article-footer">
                    <?php if (get_the_category()) { ?>
                    <div class="article-categories">
                        <h3><i class="fa fa-pencil"></i><?php echo esc_html('Categories :') ?></h3>
                        <div class="categories">
                        <?php foreach((get_the_category()) as $category) {
                            $category_link = get_term_link( $category );
                            echo "<a class='single_tax' href='". esc_url( $category_link ) ."'>" . $category->cat_name . "</a> "; 
                        } ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php 
                        if (function_exists('mt_post_sharer')) {
                            echo mt_post_sharer();
                        }
                    ?>
                </div>

                <?php if ( $numbat_redux['numbat-enable-authorbio'] ) { ?>

                <?php   
                    $avatar = get_avatar( get_the_author_meta('email'), '80', get_the_author() );
                    $has_image = '';
                    if( $avatar !== false ) {
                        $has_image .= 'no-author-pic';
                    }
                ?>
                
                <div class="author-bio relative <?php echo esc_attr($has_image); ?>">
                    <?php
                        if( $avatar !== false ) {
                            echo  '<div class="author-thumbnail col-md-2">sadad'; 
                                echo  esc_html($avatar); 
                            echo  '</div>'; 
                        }
                    ?>                    
                    <div class="author-thumbnail col-md-10">
                        <div class="author-name"><?php echo get_the_author(); ?></div>
                        <div class="author-biography"><?php the_author_meta('description'); ?></div>
                    </div>
                </div>

                <?php } ?>

                <?php if ( $numbat_redux['numbat-enable-related-posts'] ) { ?>
 
                <div class="related-posts sticky-posts">
                    <?php
                    $orig_post = $post;  
                    global $post;  
                    $tags = wp_get_post_tags($post->ID);  
                    ?>

                    <?php  
                    if ($tags) { ?>
                    <h2 class="heading-bottom"><?php esc_html_e('Related Posts', 'numbat'); ?></h2>
                        <div class="row">
                        <?php $tag_ids = array();  
                        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                        $args=array(  
                            'tag__in'               => $tag_ids,  
                            'post__not_in'          => array($post->ID),  
                            'posts_per_page'        => 3, // Number of related posts to display.  
                            'ignore_sticky_posts'   => 1  
                        );  

                        $my_query = new wp_query( $args );  

                        while( $my_query->have_posts() ) {  
                            $my_query->the_post();  
                        ?>  
                            <div class="col-md-4 post">
                                <a href="<?php the_permalink(); ?>" class="relative">
                                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'numbat_related_post_pic500x300' ); 
                                    if($thumbnail_src) { ?>
                                        <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                    <div class="thumbnail-overlay absolute">
                                        <i class="fa fa-plus absolute"></i>
                                    </div>
                                </a>
                                <h3 class="post-name">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="post-author">by <?php echo get_the_author(); ?> / <?php echo get_the_date('j M'); ?></div>
                                <div class="post-excerpt">
                                    <?php
                                        $excerpt = get_post_field('post_content', $post->ID);
                                        echo wp_strip_all_tags( numbat_excerpt_limit($excerpt,20) ).'...';
                                    ?>
                                </div>
                            </div>

                        <?php 
                        } ?>
                    </div>
                    <?php } ?>
                </div>
                    <?php 
                    $post = $orig_post;  
                    wp_reset_postdata();  
                    ?>  

                <?php } ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>


                <div class="clearfix"></div>

                <?php if ( $numbat_redux['numbat-enable-post-navigation'] ) { ?>

                <div class="prev-next-post">
                    <?php if($prev_post){ ?>
                    <div class="col-md-6 prev-post">
                        <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                            <div class="pull-left rotate45">                            
                                <i class="fa fa-angle-left"></i>                            
                            </div>
                            <div class="pull-left prev-text"><?php echo esc_html__('Previous Post','numbat'); ?></div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($next_post){ ?>
                    <div class="col-md-6 next-post">
                        <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                            <div class="pull-right rotate45">                            
                                <i class="fa fa-angle-right"></i>                            
                            </div>
                            <div class="pull-right next-text"><?php echo esc_html__('Next Post','numbat'); ?></div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>

            <?php if ( $numbat_redux['numbat_single_blog_layout'] == 'numbat_blog_right_sidebar' && is_active_sidebar( $sidebar )) { ?>
            <div class="col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</article>