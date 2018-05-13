<?php
/**
 * @package numbat
 */
?>
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



$placeholder = '700x450';
$master_class = 'col-md-12';
$thumbnail_class = 'col-md-4';
$post_details_class = 'col-md-8';
$type_class = 'list-view';
$image_size = 'numbat_post_pic700x450';

if ( $numbat_redux['blog-display-type'] == 'list' ) {

    $master_class = 'col-md-12';
    $thumbnail_class = 'col-md-4';
    if(wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )) {
        $post_details_class = 'col-md-8';
    }else{
        $post_details_class = 'col-md-12';
    }
    $type_class = 'list-view';
    $image_size = 'numbat_post_pic700x450';

} else {

    $type_class = 'grid-view';
    if ( $numbat_redux['blog-grid-columns'] == 1 ) {
        $master_class = 'col-md-12';
        $type_class .= ' grid-one-column';
        $image_size = 'numbat_portfolio_pic900x500';
        $placeholder = '900x500';
    }elseif ( $numbat_redux['blog-grid-columns'] == 2 ) {
        $master_class = 'col-md-6';
        $type_class .= ' grid-two-columns';
        $image_size = 'numbat_portfolio_pic900x500';
        $placeholder = '900x500';
    }elseif ( $numbat_redux['blog-grid-columns'] == 3 ) {
        $master_class = 'col-md-4';
        $type_class .= ' grid-three-columns';
        $image_size = 'numbat_post_pic700x450';
        $placeholder = '700x450';
    }elseif ( $numbat_redux['blog-grid-columns'] == 4 ) {
        $master_class = 'col-md-3';
        $type_class .= ' grid-four-columns';
        $image_size = 'numbat_post_pic700x450';
        $placeholder = '700x450';
    }

    $thumbnail_class = 'full-width-part';
    $post_details_class = 'full-width-part';

} 
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size );
$post_type_icon = $numbat_redux['numbat-enable-posttype-icon']; 
?>

<?php if (!numbat_plugin_active('redux-framework/redux-framework.php')){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post grid-view col-md-12 list-view '); ?>>    
    

    <?php if($thumbnail_src) { ?>
    <div class="<?php echo esc_attr($thumbnail_class); ?> post-thumbnail">
        <a href="<?php the_permalink(); ?>" class="relative">
            <?php if($thumbnail_src) { 
                echo '<img src="'. esc_html($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
            } ?>
            <div class="thumbnail-overlay absolute">
                <i class="fa fa-plus absolute"></i>
            </div>
        </a>
    </div>
    <?php } ?>

    <div class="<?php echo esc_attr($post_details_class); ?> post-details">
        <h3 class="post-name row"> <?php if( is_sticky() ) { echo '<i class="fa fa-bookmark" aria-hidden="true"></i>'; } ?>
            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                <?php if ($post_type_icon == 1) { ?>
                    <span class="post-type">
                        <i class="fa <?php echo esc_attr($post_icon); ?>"></i>
                    </span>
                <?php } ?>
                <?php the_title() ?>
            </a>
        </h3>
        
        <div class="post-category-comment-date row">
            <span class="post-author"><?php echo esc_html__('by ', 'numbat') . get_the_author(); ?></span>   /   
            <span class="post-tags">
                <?php if (get_the_category()) { ?>
                    <?php foreach((get_the_category()) as $category) {
                        $category_link = get_term_link( $category );
                        echo "<a href='". esc_url( $category_link ) ."'>" . $category->cat_name . "</a> / "; 
                    } ?>
                <?php } ?>
            </span>
            <span class="post-comments"><i class="fa fa-comments-o" aria-hidden="true"></i> <a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>    /   
            <span class="post-date"><?php echo get_the_date(); ?></span>
        </div>
        <div class="post-excerpt row">
        <?php
            /* translators: %s: Name of current post */
                the_content( sprintf(
                    '<span>' . esc_html__( 'Read more &rarr;', 'numbat' ),
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
<?php }else{ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post grid-view '.esc_html($master_class).' '.esc_html($type_class)); ?>>    
    
    <?php if($thumbnail_src) { ?>
    <div class="<?php echo esc_attr($thumbnail_class); ?> post-thumbnail">
        <a href="<?php the_permalink(); ?>" class="relative">
            <?php 
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size );
            if($thumbnail_src) { 
                echo '<img src="'. esc_html($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
            } ?>
            <div class="thumbnail-overlay absolute">
                <i class="fa fa-plus absolute"></i>
            </div>
        </a>
    </div>
    <?php } ?>

    <div class="<?php echo esc_attr($post_details_class); ?> post-details">
        <h3 class="post-name row"> <?php if( is_sticky() ) { echo '<i class="fa fa-bookmark" aria-hidden="true"></i>'; } ?>
            <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                <?php if ($post_type_icon == 1) { ?>
                    <span class="post-type">
                        <i class="fa <?php echo esc_attr($post_icon); ?>"></i>
                    </span>
                <?php } ?>
                <?php the_title() ?>
            </a>
        </h3>
        
        <div class="post-category-comment-date row">
            <span class="post-author"><?php echo esc_html__('by ', 'numbat') . get_the_author(); ?></span>   /   
            <span class="post-tags">
                <?php if (get_the_category()) { ?>
                    <?php foreach((get_the_category()) as $category) {
                        $category_link = get_term_link( $category );
                        echo "<a href='". esc_url( $category_link ) ."'>" . $category->cat_name . "</a> / "; 
                    } ?>
                <?php } ?>
            </span>
            <span class="post-comments"><i class="fa fa-comments-o" aria-hidden="true"></i> <a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>    /   
            <span class="post-date"><?php echo get_the_date(); ?></span>
        </div>
        <div class="post-excerpt row">
        <?php
            /* translators: %s: Name of current post */
                the_content( sprintf(
                    '<span>' . esc_html__( 'Read more &rarr;', 'numbat' ),
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
<?php } ?>