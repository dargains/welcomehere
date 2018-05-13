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

<nav class="navbar navbar-default" id="numbat-main-head">
  <div class="container">
      <div class="row">
          <div class="navbar-header col-md-3">

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
            
            <?php if ( class_exists( 'mega_main_init' ) ) { ?>
              <div id="navbar" class="navbar-collapse collapse in col-md-9">
            <?php }else{ ?>
              <div id="navbar" class="navbar-collapse collapse col-md-9">
            <?php } ?>

              <div class="col-md-6 search-form-product">
                <form role="search" method="get" class="woocommerce-product-search menu-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                  <input type="search" class="search-field " placeholder="<?php echo esc_html_x( 'Search', 'placeholder', 'numbat' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_html_x( 'Search for:', 'label', 'numbat' ); ?>" />
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                  <input type="hidden" name="post_type" value="product" />
                </form>
              </div>

              <div class="col-md-6 menu-products">
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

              

              <?php if ( class_exists( 'WooCommerce' ) ) { ?>
              <div class="header_mini_cart">
                <?php the_widget( 'WC_Widget_Cart' ); ?>
              </div>
              <?php } ?>
          </div>
      </div>
  </div>
</nav>