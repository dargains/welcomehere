<header class="header2">
  <div class="container logo-infos">
    <div class="row">

      <div class="col-md-8 col-sm-7">
        <div class="header-infos">
        <!-- <div class="header-infos-sub"> -->
          <?php if(urbanpointwp_redux('mt_divider_header_info_1_status') == true){ ?>
            <!-- HEADER INFO 1 -->
            <div class="text-center header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(urbanpointwp_redux('mt_divider_header_info_1_media_type') == 'font_awesome'){ ?>
                  <i class="<?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_1_faicon')); ?>"></i>
                <?php }elseif(urbanpointwp_redux('mt_divider_header_info_1_media_type') == 'media_image'){ ?>
                  <img src="<?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_1_image_icon','url')); ?>" alt="" />
                <?php }elseif(urbanpointwp_redux('mt_divider_header_info_1_media_type') == 'text_title'){ ?>
                  <p class="header_text_title"><?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_1_text_1')); ?>
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <p><?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_1_heading1')); ?></p>
              </div>
            </div>
            <!-- // HEADER INFO 1 -->
          <?php } ?>

          <?php if(urbanpointwp_redux('mt_divider_header_info_2_status') == true){ ?>
            <!-- HEADER INFO 2 -->
            <div class="text-center header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(urbanpointwp_redux('mt_divider_header_info_2_media_type') == 'font_awesome'){ ?>
                  <i class="<?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_2_faicon')); ?>"></i>
                <?php }elseif(urbanpointwp_redux('mt_divider_header_info_2_media_type') == 'media_image'){ ?>
                  <img src="<?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_2_image_icon','url')); ?>" alt="" />
                <?php }elseif(urbanpointwp_redux('mt_divider_header_info_2_media_type') == 'text_title'){ ?>
                  <p class="header_text_title"><?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_2_text_2')); ?>
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <p><?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_2_heading1')); ?></p>
              </div>
            </div>
            <!-- // HEADER INFO 2 -->
          <?php } ?>

          <?php if(urbanpointwp_redux('mt_divider_header_info_3_status') == true){ ?>
            <!-- HEADER INFO 3 -->
            <div class="text-center header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(urbanpointwp_redux('mt_divider_header_info_3_media_type') == 'font_awesome'){ ?>
                  <i class="<?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_3_faicon')); ?>"></i>
                <?php }elseif(urbanpointwp_redux('mt_divider_header_info_3_media_type') == 'media_image'){ ?>
                  <img src="<?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_3_image_icon','url')); ?>" alt="" />
                <?php }elseif(urbanpointwp_redux('mt_divider_header_info_3_media_type') == 'text_title'){ ?>
                  <p class="header_text_title"><?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_3_text_3')); ?>
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <p class="call_us_class"><?php echo esc_attr(urbanpointwp_redux('mt_divider_header_info_3_heading1')); ?></p>
              </div>
            </div>
            <!-- // HEADER INFO 3 -->
          <?php } ?>

          <!-- </div> -->
        </div>
        
    </div>

        <!-- NAV ACTIONS -->
            <div class="navbar-collapse actions collapse col-md-4 col-sm-5">
                <div class="header-nav-actions">

                  <?php if(urbanpointwp_redux('mt_header_fixed_sidebar_menu_status') == true) { ?>
                    <!-- MT BURGER -->
                    <div id="mt-nav-burger">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                  <?php } ?>

                  <?php if(urbanpointwp_redux('mt_header_is_search') == true){ ?>
                    <a href="#" class="mt-search-icon">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                  <?php } ?>

                  <ul class="social-links">
                        <?php if ( urbanpointwp_redux('mt_social_fb') && urbanpointwp_redux('mt_social_fb') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_tw') && urbanpointwp_redux('mt_social_tw') != '' ) { ?>
                            <li><a href="https://twitter.com/<?php echo esc_attr( urbanpointwp_redux('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_gplus') && urbanpointwp_redux('mt_social_gplus') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php } ?>
                        <?php if ( urbanpointwp_redux('mt_social_youtube') && urbanpointwp_redux('mt_social_youtube') != '' ) { ?>
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i></a></li>
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
                            <li><a href="<?php echo esc_url( urbanpointwp_redux('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i></a></li>
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
   </div>


  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          

          <!-- LOGO -->
          <div class="navbar-header pull-right col-md-3">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php if(urbanpointwp_redux('mt_logo','url')){ ?>
              <h1 class="logo">
                  <a href="<?php echo get_site_url(); ?>">
                      <img src="<?php echo esc_attr(urbanpointwp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                  </a>
              </h1>
            <?php }else{ ?>
              <h1 class="logo no-logo">
                  <a href="<?php echo esc_url(get_site_url()); ?>">
                    <?php echo esc_attr(get_bloginfo()); ?>
                  </a>
              </h1>
            <?php } ?>
          </div>


          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-9">
            <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
              <?php
                $defaults = array(
                  'menu'            => '',
                  'container'       => false,
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => 'menu',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => false,
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '%3$s',
                  'depth'           => 0,
                  'walker'          => ''
                );

                $defaults['theme_location'] = 'primary';

                wp_nav_menu( $defaults );
              ?>
            </ul>
          </div>

        </div>
    </div>
  </nav>
</header>
