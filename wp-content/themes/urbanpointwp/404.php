<?php
/**
 * The template for displaying 404 pages (not found).
 *
 */

get_header(); ?>

<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>

	<!-- Page content -->
	<div id="primary" class="content-area">
	    <main id="main" class="vc_container blog-posts site-main">
	        <div class="vc_col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header-404">
						<?php
							if (is_plugin_active('redux-framework/redux-framework.php')){
								if (urbanpointwp_redux('mt_404_page') != '') {
						            $content_post   = get_post(urbanpointwp_redux('mt_404_page'));
						            $content        = $content_post->post_content;
						            $content        = apply_filters('the_content', $content);
						            echo wp_kses_post($content);
						        }else{ ?>
									<div class="high-padding">
										<img class="aligncenter" src="<?php echo esc_url(get_template_directory_uri() . '/images/404.png'); ?>" alt="<?php esc_html_e( 'Not Found', 'urbanpointwp' ); ?>">
										<h2 class="page-title text-center"><?php esc_html_e( 'Sorry, this page does not exist', 'urbanpointwp' ); ?></h2>
										<h3 class="page-title text-center"><?php esc_html_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'urbanpointwp' ); ?></h3>
									</div>
							<?php }
							}else{ ?>
								<div class="high-padding">
									<img class="aligncenter" src="<?php echo esc_url(get_template_directory_uri() . '/images/404.png'); ?>" alt="<?php esc_html_e( 'Not Found', 'urbanpointwp' ); ?>">
									<h2 class="page-title text-center"><?php esc_html_e( 'Sorry, this page does not exist', 'urbanpointwp' ); ?></h2>
									<h3 class="page-title text-center"><?php esc_html_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'urbanpointwp' ); ?></h3>
								</div>
							<?php }
						 ?>
					</header>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>