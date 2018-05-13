<?php
  #Redux global variable
  global $numbat_redux;
  #WooCommerce global variable
  global $woocommerce;
  $myaccount_page_url = '#';
  if ( class_exists( 'WooCommerce' ) ) {
    $cart_url = $woocommerce->cart->get_cart_url();
    
    #My account url
    $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
    if ( $myaccount_page_id ) {
      $myaccount_page_url = get_permalink( $myaccount_page_id );
    }else{
      $myaccount_page_url = '#';
    }
  }else{
    $myaccount_page_url = '#';
  }
  #YITH Wishlist rul
  if( function_exists( 'YITH_WCWL' ) ){
      $wishlist_url = YITH_WCWL()->get_wishlist_url();
  }else{
      $wishlist_url = '#';
  }
?>


<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <?php if ( is_user_logged_in() ) { 
          esc_attr_e('Welcome! ', 'numbat') . wp_register('', '') . esc_attr_e(' or ', 'numbat') . wp_loginout();
        }else{
          if ( get_option( 'users_can_register' ) ) {
            esc_attr_e('Welcome! Please ', 'numbat') . wp_register('', '') . esc_attr_e(' or ', 'numbat') . wp_loginout();
          }else{
            esc_attr_e('Welcome! Please ', 'numbat') . wp_register('', '') . wp_loginout();
          }
        } ?> 
      </div>
      <div class="col-md-6 col-sm-6 text-right account-urls">
        <a class="top-wishliist" href="<?php echo esc_attr($wishlist_url); ?>">
          <i class="fa fa-heart-o"></i>
          <?php esc_attr_e('Wishlist', 'numbat'); ?>
        </a>
        <a href="<?php echo esc_attr($myaccount_page_url); ?>">
          <i class="fa fa-user"></i>
          <?php esc_attr_e('My account', 'numbat'); ?>
        </a>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-default" id="numbat-main-head">
  <div class="container">
      <div class="row">
          <div class="navbar-header col-md-8">

            <?php if ( !class_exists( 'mega_main_init' ) ) { ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <?php } ?>

            <?php echo numbat_logo(); ?>

          </div>
            <div class="navbar-header col-md-4">
                                <div class="nav_search_holder">
                      <div id="numbat-search" class="numbat-search">
                        <form method="GET" action="<?php echo esc_url(home_url('/')); ?>">
                          <input class="numbat-search-input" placeholder="<?php esc_attr_e('Enter your search term...', 'numbat'); ?>" type="search" value="" name="s" id="search">
                          <input class="numbat-search-submit" type="submit" value="">
                            <?php if (isset($numbat_redux['search_for']) && $numbat_redux['search_for'] == 'products') { ?>
                              <input type="hidden" value="product" name="post_type">
                            <?php } ?>
                          <span class="numbat-icon-search"></span>
                        </form>
                      </div>
                    </div>
                    </div>
            <?php if ( class_exists( 'mega_main_init' ) ) { ?>
              <div id="navbar" class="navbar-collapse collapse in col-md-12">
            <?php }else{ ?>
              <div id="navbar" class="navbar-collapse collapse col-md-12">
            <?php } ?>

              <ul class="menu nav navbar-nav pull-right nav-effect nav-menu">
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