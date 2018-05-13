<?php
/**
 * The template for displaying search results pages.
 *
 * @package numbat
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
?>

<!-- Breadcrumbs -->
<div class="numbat-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2><?php printf( esc_html__( 'Search Results for: %s', 'numbat' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
            </div>
            <div class="col-md-4">
                <ol class="breadcrumb pull-right">
                    <?php numbat_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div>



<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
            <?php if ( $numbat_redux['numbat_blog_layout'] == 'numbat_blog_left_sidebar' && is_active_sidebar( $sidebar )) { ?>
            <div class="col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">

    		<?php if ( have_posts() ) : ?>
                <div class="row">
        			<?php /* Start the Loop */ ?>
        			<?php while ( have_posts() ) : the_post(); ?>

        				<?php
        				/**
        				 * Run the loop for the search to output the results.
        				 * If you want to overload this in a child theme then include a file
        				 * called content-search.php and that will be used instead.
        				 */
        				get_template_part( 'content', get_post_format() );
        				?>

        			<?php endwhile; ?>

                    <div class="numbat-pagination pagination">             
                        <?php numbat_pagination(); ?>
                    </div>
                </div>
    		<?php else : ?>

    			<?php get_template_part( 'content', 'none' ); ?>

    		<?php endif; ?>
            </div>

            <?php if ( $numbat_redux['numbat_blog_layout'] == 'numbat_blog_right_sidebar' && is_active_sidebar( $sidebar )) { ?>
            <div class="col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
