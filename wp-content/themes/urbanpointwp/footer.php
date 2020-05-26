<?php
/**
 * The template for displaying the footer.
 *
*/
?>

<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>

    <!-- FOOTER -->
    <footer>
        <!-- FOOTER TOP -->
        <div class="row footer-top">
            <div class="container">
            <?php
                //FOOTER ROW #1
                 if(urbanpointwp_redux('mt_logo','url')){ ?>
                  <!-- <h1 class="logo">
                      <a href="<?php echo get_site_url(); ?>">
                          <img src="<?php echo esc_attr(urbanpointwp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                      </a>
                  </h1> -->
                <?php }else{ ?>
                  <h1 class="logo no-logo">
                      <a href="<?php echo esc_url(get_site_url()); ?>">
                        <?php echo esc_attr(get_bloginfo()); ?>
                      </a>
                  </h1>
                <?php }
                echo urbanpointwp_footer_row1();

                //FOOTER ROW #2
                echo urbanpointwp_footer_row2();
                //FOOTER ROW #3
                echo urbanpointwp_footer_row3();
             ?>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="footer-div-parent">
            <div class="container footer">
                <div class="col-md-4">

                    <p class="copyright text-left"><?php echo date("Y"); ?> <?php echo urbanpointwp_redux('mt_footer_text'); ?> |<a href="https://welcome-here.com/wp-content/uploads/2019/03/termos_e_condicoes.pdf" target="_blank">Termos e condições</a></p>
                    
                    <a class="imageLeft" href="https://www.livroreclamacoes.pt/inicio" target="_blank" title="Livro de Reclamações">
                            <img src="https://welcome-here.com/wp-content/uploads/2020/05/livro-reclamacoes.png" alt="Livro de Reclamações">
                    </a>
                </div>
                <div class="col-md-4">

                	<?php if (!is_plugin_active('redux-framework/redux-framework.php')){ ?>
				        <!-- BACK TO TOP BUTTON -->
				        <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="#0">
				            <span></span>
				        </a>
				    <?php } else { ?>
				        <?php if (urbanpointwp_redux('mt_backtotop_status') == true) { ?>
				            <!-- BACK TO TOP BUTTON -->
				            <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="#0">
				                <span></span>
				            </a>
				        <?php } ?>
				    <?php } ?>



                </div>
                <div class="col-md-4">
                    <ul class="social-links">
                        <li>Follow us</li>
                        <?php if ( urbanpointwp_redux('mt_social_fb') && urbanpointwp_redux('mt_social_fb') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_fb') ) ?>" title="Facebook" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_tw') && urbanpointwp_redux('mt_social_tw') != '' ) { ?>
                            <li><a href="https://twitter.com/<?php echo esc_attr( urbanpointwp_redux('mt_social_tw') ) ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_gplus') && urbanpointwp_redux('mt_social_gplus') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_youtube') && urbanpointwp_redux('mt_social_youtube') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_youtube') ) ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_pinterest') && urbanpointwp_redux('mt_social_pinterest') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_linkedin') && urbanpointwp_redux('mt_social_linkedin') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_skype') && urbanpointwp_redux('mt_social_skype') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_skype') ) ?>"><i class="fa fa-skype"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_instagram') && urbanpointwp_redux('mt_social_instagram') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_instagram') ) ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_dribbble') && urbanpointwp_redux('mt_social_dribbble') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_deviantart') && urbanpointwp_redux('mt_social_deviantart') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_digg') && urbanpointwp_redux('mt_social_digg') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_digg') ) ?>"><i class="fa fa-digg"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_flickr') && urbanpointwp_redux('mt_social_flickr') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_stumbleupon') && urbanpointwp_redux('mt_social_stumbleupon') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_tumblr') && urbanpointwp_redux('mt_social_tumblr') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_vimeo') && urbanpointwp_redux('mt_social_vimeo') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>



<?php wp_footer(); ?>
</body>
</html>
