<?php
  #Redux global variable
  global $numbat_redux;
  #WooCommerce global variable
  global $woocommerce;
  $myaccount_page_url = '#';
  if ( class_exists( 'WooCommerce' ) ) {
    $cart_url = wc_get_cart_url();
    
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
 <?php if (numbat_plugin_active('redux-framework/redux-framework.php')){ ?>
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-12 contact-header">
        <?php if($numbat_redux['numbat_contact_phone']) { ?><span><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_attr($numbat_redux['numbat_contact_phone']); ?></span>    <?php } ?>
        <?php if($numbat_redux['numbat_contact_email']) { ?><span><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_attr($numbat_redux['numbat_contact_email']); ?></span> <?php } ?>
        <?php if($numbat_redux['numbat_work_program'])  { ?><span><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_attr($numbat_redux['numbat_work_program']); ?></span>   <?php } ?>
      </div>
      <div class="col-md-5 col-sm-12 account-urls">
        <a class="top-wishliist" href="<?php echo esc_attr($wishlist_url); ?>"><i class="fa fa-heart-o"></i><?php esc_html_e('Wishlist', 'numbat'); ?></a>
        <a href="<?php echo esc_attr($myaccount_page_url); ?>"><i class="fa fa-user"></i><?php esc_html_e('My account', 'numbat'); ?></a>
        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
        <a  class="shop_cart" href="<?php echo esc_attr($cart_url); ?>"><i class="fa fa-shopping-basket"></i><?php esc_html_e('My bag', 'numbat'); ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<nav class="navbar navbar-default" id="numbat-main-head">
  	<div class="container">
      <div class="row">
          <div class="navbar-header col-md-3 col-sm-12">

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
            
           
          <div id="navbar" class="navbar-collapse collapse col-md-9 col-sm-12">
            <?php if (class_exists('WooCommerce')) { ?>
              <div class="col-md-7 menu-products">
            <?php } else { ?>
              <div class="col-md-12 menu-products">
              <?php } ?>
                <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
                <?php
                  if ( has_nav_menu( 'primary' ) ) {
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
                  }else{
                    echo '<p class="no-menu text-right">'.esc_attr__('Primary navigation menu is missing. Add one from "Appearance" -> "Menus"','numbat').'<p>';
                  }
                ?>
                </ul>
              </div>

  			<?php if (class_exists('WooCommerce')) : ?>
              <div class="col-md-5 search-form-product">
                <form name="myform" method="GET" class="woocommerce-product-search menu-search" action="<?php echo esc_url(home_url('/')); ?>">
				<?php 
					if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat'])) {
						$optsetlect=$_REQUEST['product_cat'];
					} else {
						$optsetlect=0;  
					}
					$args = array(
						'show_option_none' => esc_html__( 'Select category', 'numbat' ),
						'option_none_value'  => '',
						'hierarchical' => 0,
						'class' => 'cat',
						'echo' => 1,
						'value_field' => 'slug',
						'hide_empty' => true,
						'selected' => $optsetlect
					);
					$args['taxonomy'] = 'product_cat';
					$args['name'] = 'product_cat';              
					$args['class'] = 'form-control1';
					wp_dropdown_categories($args);
				?>
	            <input type="hidden" value="product" name="post_type">
	            <input type="text"  name="s" class="search-field" maxlength="128" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e('Search products...', 'numbat'); ?>">
	            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
	            <input type="hidden" name="post_type" value="product" />
            </form>

            </div>
            <?php endif; ?>

              <?php if ( class_exists( 'WooCommerce' ) ) { ?>
              <div class="header_mini_cart">
                <?php the_widget( 'WC_Widget_Cart' ); ?>
              </div>
              <?php } ?>
          </div>
      </div>
  	</div>
</nav>
