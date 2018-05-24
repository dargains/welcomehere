<?php 
$placeholder = '600x500';
$master_class = 'col-md-12';
$thumbnail_class = 'col-md-4';
$post_details_class = 'col-md-8';
$type_class = 'list-view';
$image_size = 'urbanpointwp_about_625x415';

if ( urbanpointwp_redux('mt_blog_display_type') == 'list' ) {
    $master_class = 'col-md-12';
    $thumbnail_class = 'col-md-4';
    $post_details_class = 'col-md-8';
    $type_class = 'list-view';
} else {
    if ( urbanpointwp_redux('mt_blog_grid_columns') == 1 ) {
        $master_class = 'col-md-12';
        $type_class .= ' grid-one-column';
        $placeholder = '900x500';
    }elseif ( urbanpointwp_redux('mt_blog_grid_columns') == 2 ) {
        $master_class = 'col-md-6';
        $type_class .= ' grid-two-columns';
        $placeholder = '900x500';
    }elseif ( urbanpointwp_redux('mt_blog_grid_columns') == 3 ) {
        $master_class = 'col-md-4';
        $type_class .= ' grid-three-columns';
        $placeholder = '600x500';
    }elseif ( urbanpointwp_redux('mt_blog_grid_columns') == 4 ) {
        $master_class = 'col-md-3';
        $type_class .= ' grid-four-columns';
        $placeholder = '600x500';
    }
    $thumbnail_class = 'full-width-part';
    $post_details_class = 'full-width-part';
} 


// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'urbanpointwp_about_625x415' );

    if ($thumbnail_src) {
    $post_img = '<div class="grid">
          <figure class="effect-apollo">
            <img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.get_the_title().'" />
            <figcaption></figcaption>
          </figure>
        </div>';
        $post_col = 'col-md-6';
    } else {
        $post_col = 'col-md-12 no-featured-image';
    }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post '.esc_attr($master_class).' '.esc_attr($type_class)); ?> > 
    <div class="blog_custom">

        <?php if(urbanpointwp_plugin_active('modeltheme-framework/modeltheme-framework.php')) { ?>

                    <!-- ////////content for GRID View//////// -->
                    <?php if ( urbanpointwp_redux('mt_blog_display_type') == 'grid' ) { ?>

                        <?php if ($post_img) { ?>
                            <!-- POST THUMBNAIL -->
                            <?php if ( urbanpointwp_redux('mt_blog_display_type') == 'list' ) { ?>

                                <div class="col-md-6 post-thumbnail">
                                    <a href="<?php the_permalink(); ?>" class="relative">
                                        <?php echo wp_kses_post($post_img); ?>
                                    </a>
                                </div>

                                <?php } else { ?>

                                    <div class="col-md-12 post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="relative">
                                            <?php echo wp_kses_post($post_img); ?>
                                        </a>
                                    </div>

                                <?php } ?>
                        <?php } ?>
                    
                        <!-- POST DETAILS -->
                        <?php if ( urbanpointwp_redux('mt_blog_display_type') == 'grid' ) { ?>

                        <div class="col-md-12 post-details">

                        <?php } else { ?>

                        <div class="<?php echo esc_attr($post_col); ?> post-details">

                        <?php } ?>
                        
                        
                            <h3 class="post-name row">
                                <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                                    <?php if(is_sticky(get_the_ID())){ ?>
                                        <span class="post-sticky-label">
                                            <i class="fa fa-bookmark"></i>
                                        </span>
                                    <?php } ?>
                                    <?php the_title() ?>
                                </a>
                            </h3>

                            <div class="post-category-comment-date row">
                                <div class="post-date">
                                    <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                                        <i class="icon-calendar"></i>
                                        <span class="blog_date"><?php echo get_the_date(); ?></span>
                                    </a>
                                </div>
                                <span class="post-tags">
                                    <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' ); ?>
                                </span>

                                
                                <span class="post-author"><i class="icon-user icons"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></span>
                                <span class="post-comments"><i class="icon-bubbles icons"></i><a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>  

                            </div>

                            <div class="post-excerpt row">
                            <?php
                                /* translators: %s: Name of current post */
                                the_content( sprintf(__( 'Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'urbanpointwp' ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ) );
                            ?>
                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanpointwp' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                            </div>
                        </div>

                    <!-- ////////content for LIST View//////// -->
                    <?php } elseif ( urbanpointwp_redux('mt_blog_display_type') == 'list' ) { ?>
                        <!-- POST DETAILS -->
                        <?php if ( urbanpointwp_redux('mt_blog_display_type') == 'grid' ) { ?>

                        <div class="col-md-12 post-details">

                        <?php } else { ?>

                        <div class="<?php echo esc_attr($post_col); ?> post-details">

                        <?php } ?>
                        
                        
                            <h3 class="post-name row">
                                <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                                    <span class="post-sticky-label">
                                        <i class="fa fa-bookmark"></i>
                                    </span>
                                    <?php the_title() ?>
                                </a>
                            </h3>

                            <div class="post-category-comment-date row">
                                <span class="post-date">
                                    <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                                        <i class="icon-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </a>
                                </span>
                                <span class="post-tags">
                                    <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' ); ?>
                                </span>

                                
                                <span class="post-author"><i class="icon-user icons"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></span>
                                <span class="post-comments"><i class="icon-bubbles icons"></i><a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>  

                            </div>

                            <div class="post-excerpt row">
                            <?php
                                /* translators: %s: Name of current post */
                                the_content( sprintf(__( 'Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'urbanpointwp' ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ) );
                            ?>
                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanpointwp' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                            </div>
                        </div>


                        <?php if ($post_img) { ?>
                            <!-- POST THUMBNAIL -->
                            <?php if ( urbanpointwp_redux('mt_blog_display_type') == 'list' ) { ?>

                                <div class="col-md-6 post-thumbnail">
                                    <a href="<?php the_permalink(); ?>" class="relative">
                                        <?php echo wp_kses_post($post_img); ?>
                                    </a>
                                </div>

                                <?php } else { ?>

                                    <div class="col-md-12 post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="relative">
                                            <?php echo wp_kses_post($post_img); ?>
                                        </a>
                                    </div>

                                <?php } ?>
                        <?php } ?>

                    <?php } ?>

        <?php } else { ?>

                <!-- POST DETAILS -->
                <div class="<?php echo esc_attr($post_col); ?> post-details">

                    <h3 class="post-name row">
                        <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                            <?php if(is_sticky(get_the_ID())){ ?>
                                <span class="post-sticky-label">
                                    <i class="fa fa-bookmark"></i>
                                </span>
                            <?php } ?>
                            <?php the_title() ?>
                        </a>
                    </h3>
                    
                    <div class="post-category-comment-date row">
                        <div class="post-date">
                            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                                <i class="icon-calendar"></i>
                                <span class="blog_date"><?php echo get_the_date(); ?></span>
                            </a>
                        </div>
                        <span class="post-tags">
                            <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' ); ?>
                        </span>
                        <span class="post-author"><i class="icon-user icons"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo get_the_author(); ?></a></span>
                        <span class="post-comments"><i class="icon-bubbles icons"></i><a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>  
                    </div>

                    <div class="post-excerpt row">
                    <?php
                        /* translators: %s: Name of current post */
                        the_content( sprintf(__( 'Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'urbanpointwp' ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );
                    ?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanpointwp' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                    </div>
                </div>


                <?php if ($post_img) { ?>
                    <!-- POST THUMBNAIL -->

                    <div class="col-md-6 post-thumbnail">
                        <a href="<?php the_permalink(); ?>" class="relative">
                            <?php echo wp_kses_post($post_img); ?>
                        </a>
                    </div>

                <?php } ?>

        <?php } ?>


    </div>
</article>