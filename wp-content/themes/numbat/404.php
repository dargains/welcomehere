<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package numbat
 */

global $numbat_redux;
get_header(); ?>

	<!-- Breadcrumbs -->
	<div class="numbat-breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8">
	                <h2><?php esc_html_e( '404 Page not found', 'numbat' ); ?></h2>
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
	<div id="primary" class="content-area">
	    <main id="main" class="container blog-posts high-padding site-main" role="main">
	        <div class="col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header">
						<h2 class="page-title text-center"><?php esc_html_e( 'Sorry, this page does not exist', 'numbat' ); ?></h2>
						<h3 class="page-title text-center"><?php esc_html_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'numbat' ); ?></h3>
					</header>

					<div class="page-content">
						<?php if (numbat_plugin_active('redux-framework/redux-framework.php')){ ?>
						<img src="<?php echo esc_attr($numbat_redux['img_404']['url']); ?>" alt="Not Found">
						<?php } else { ?> <img src="<?php echo esc_html(get_template_directory_uri() . '/images/404.png'); ?>" alt="Not Found"> <?php } ?>
						<h1 class="text-center"><?php esc_html_e( 'Page Not Found !', 'numbat' ); ?></h1>
					</div>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>