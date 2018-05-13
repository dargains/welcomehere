<?php
/**
 * numbat functions and definitions
 *
 * @package numbat
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'numbat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function numbat_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on numbat, use a find and replace
     * to change 'numbat' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'numbat', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'numbat' ),
    ) );

    global $numbat_redux;


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'numbat_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // numbat_setup
add_action( 'after_setup_theme', 'numbat_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function numbat_widgets_init() {

    global $numbat_redux;

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'numbat' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Sidebar 1', 'numbat' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Woocommerce sidebar', 'numbat' ),
        'id'            => 'woocommerce',
        'description'   => esc_html__( 'Used on WooCommerce pages', 'numbat' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer #1', 'numbat' ),
        'id'            => 'before_footer_1',
        'description'   => esc_html__( 'Used above the footer #1', 'numbat' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer #2', 'numbat' ),
        'id'            => 'before_footer_2',
        'description'   => esc_html__( 'Used above the footer #2', 'numbat' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer #3', 'numbat' ),
        'id'            => 'before_footer_3',
        'description'   => esc_html__( 'Used above the footer #3', 'numbat' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer #4', 'numbat' ),
        'id'            => 'before_footer_4',
        'description'   => esc_html__( 'Used above the footer #4', 'numbat' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    if (isset($numbat_redux['dynamic_sidebars']) && !empty($numbat_redux['dynamic_sidebars'])){
        foreach ($numbat_redux['dynamic_sidebars'] as &$value) {
            $id           = str_replace(' ', '', $value);
            $id_lowercase = strtolower($id);
            if ($id_lowercase) {
                register_sidebar( array(
                    'name'          => $value,
                    'id'            => $id_lowercase,
                    'description'   => $value,
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }

    if (isset($numbat_redux['numbat_number_of_footer_columns'])) {
        for ($i=1; $i <= intval( $numbat_redux['numbat_number_of_footer_columns'] ) ; $i++) { 
            register_sidebar( array(
                'name'          => esc_html__( 'Footer ', 'numbat' ).esc_attr($i),
                'id'            => 'footer_column_'.esc_attr($i),
                'description'   => esc_html__( 'Footer sidebar', 'numbat' ),
                'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'numbat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function numbat_scripts() {

    //STYLESHEETS
    wp_enqueue_style( "font-awesome", get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( "numbat-responsive", get_template_directory_uri().'/css/responsive.css' );
    wp_enqueue_style( "numbat-media-screens", get_template_directory_uri().'/css/media-screens.css' );
    wp_enqueue_style( "owl-carousel", get_template_directory_uri().'/css/owl.carousel.css' );
    wp_enqueue_style( "owl-theme", get_template_directory_uri().'/css/owl.theme.css' );
    wp_enqueue_style( "animate", get_template_directory_uri().'/css/animate.css' );
    wp_enqueue_style( "numbat-style-css", get_template_directory_uri().'/css/style.css' );
    wp_enqueue_style( "numbat-skin-color", get_template_directory_uri().'/css/skin-colors/skin-default.css' );
    wp_enqueue_style( 'numbat-style', get_stylesheet_uri() );
    wp_enqueue_style( "select2-style", get_template_directory_uri().'/css/select2.min.css' );

    //SCRIPTS
    wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '2.6.2', true );
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'jquery-form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'), '3.51', true );
    wp_enqueue_script( 'jquery-ketchup', get_template_directory_uri() . '/js/jquery.ketchup.all.min.js', array('jquery'), '0.3.1', true );
    wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.13.1', true );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'uisearch', get_template_directory_uri() . '/js/uisearch.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'flatshadow', get_template_directory_uri() . '/js/jquery.flatshadow.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array('jquery'), '1.1.3', true );
    wp_enqueue_script( 'appear', get_template_directory_uri() . '/js/count/jquery.appear.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'countTo', get_template_directory_uri() . '/js/count/jquery.countTo.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'modernizr-viewport', get_template_directory_uri() . '/js/modernizr.viewport.js', array('jquery'), '2.6.2', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.1', true );
    wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/animate.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'numbat-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'numbat-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'numbat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'numbat_scripts' );


function numbat_enqueue_admin_scripts( $hook ) {
    wp_enqueue_style( "admin-style-css", get_template_directory_uri().'/css/admin-style.css' );
    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
        wp_enqueue_style( "numbat-admin-style-css", get_template_directory_uri().'/css/admin-style.css' );
        wp_enqueue_style( "numbat-colorpicker-css", get_template_directory_uri().'/css/colorpicker.css' );
        wp_enqueue_script( "numbat-colorpicker-js", get_template_directory_uri().'/js/colorpicker.js' , array( 'jquery' ) );
    }
}
add_action('admin_enqueue_scripts', 'numbat_enqueue_admin_scripts');


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Include the TGM_Plugin_Activation class.
 */
require get_template_directory().'/inc/tgm/include_plugins.php';
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'numbat_vcSetAsTheme' );
function numbat_vcSetAsTheme() {
    vc_set_as_theme( true );
}


add_action( 'vc_base_register_front_css', 'numbat_enqueue_front_css_foreever' );

function numbat_enqueue_front_css_foreever() {
    wp_enqueue_style( 'js_composer_front' );
}

/* ========= LOAD - REDUX - FRAMEWORK ===================================== */
require_once(get_template_directory() . '/redux-framework/numbat-config.php');

// CUSTOM FUNCTIONS
require_once(get_template_directory() . '/inc/custom-functions.php');
require_once(get_template_directory() . '/inc/custom-functions.header.php');

/* ========= CUSTOM COMMENTS ===================================== */
require get_template_directory() . '/inc/custom-comments.php';

/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'numbat_member_pic350x350',        350, 350, true );
add_image_size( 'numbat_testimonials_pic110x110',  110, 110, true );
add_image_size( 'numbat_portfolio_pic400x400',     400, 400, true );
add_image_size( 'numbat_featured_post_pic500x230', 500, 230, true );
add_image_size( 'numbat_related_post_pic500x300',  500, 300, true );
add_image_size( 'numbat_post_pic700x450',          700, 450, true );
add_image_size( 'numbat_portfolio_pic500x350',     500, 350, true );
add_image_size( 'numbat_portfolio_pic700x450',     700, 450, true );
add_image_size( 'numbat_single_post_pic900x300',   900, 300, true );
add_image_size( 'numbat_portfolio_pic900x500',     900, 500, true );
add_image_size( 'numbat_post_widget_pic70x70',     70, 70, true );
add_image_size( 'numbat_pic100x75',                100, 75, true );


/* ========= LIMIT POST CONTENT ===================================== */
function numbat_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}

/* ========= BREADCRUMBS ===================================== */
function numbat_breadcrumb() {
    global $numbat_redux;

    if (numbat_plugin_active('redux-framework/redux-framework.php')) {
        if ( !$numbat_redux['numbat-enable-breadcrumbs'] ) {
           return false;
        }
    }

    $delimiter = '';
    //text for the 'Home' link
    $name = esc_html__("Home", "numbat");
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';
        if (!is_home() && !is_front_page() || is_paged()) {
            global $post;
            global $product;
            $home = home_url();
            echo '<li><a href="' . esc_html($home) . '">' . esc_html($name) . '</a></li> ' . esc_html($delimiter) . '';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, true, '' . esc_html($delimiter) . ''));
            echo   wp_kses_post($currentBefore) . esc_html(single_cat_title('', false)) .  wp_kses_post($currentAfter);
        } elseif (is_day()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . esc_html($delimiter) . '';
            echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . esc_html($delimiter) . ' ';
            echo  wp_kses_post($currentBefore) . get_the_time('d') . wp_kses_post($currentAfter);
        } elseif (is_month()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . esc_html($delimiter) . '';
            echo  wp_kses_post($currentBefore) . get_the_time('F') . wp_kses_post($currentAfter);
        } elseif (is_year()) {
            echo  wp_kses_post($currentBefore) . get_the_time('Y') . wp_kses_post($currentAfter);
        } elseif (is_attachment()) {
            echo  wp_kses_post($currentBefore);
            the_title();
            $currentAfter;
        } elseif (class_exists( 'WooCommerce' ) && is_shop()) {
            echo  wp_kses_post($currentBefore);
            echo esc_html__('Shop','numbat');
            $currentAfter;
        }elseif (class_exists('WooCommerce') && is_product()) {
            if (get_the_category()) {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li>' . get_category_parents($cat, true, ' ' . esc_html($delimiter) . '') . '</li>';
            }
            echo  wp_kses_post($currentBefore);
            the_title();
            echo  wp_kses_post($currentAfter);
        }elseif ( get_post_type() == 'Post Type Name' ) {
                echo  wp_kses_post($delimiter);
                echo get_the_term_list($post->ID, 'Custom Taxonomy Name', ' ', ', ', ' ' . esc_html($delimiter) . ' ');
                the_title();      
        } elseif (is_single()) {
            if (get_the_category()) {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li>' . get_category_parents($cat, true, ' ' . esc_html($delimiter) . '') . '</li>';
            }
            echo  wp_kses_post($currentBefore);
            the_title();
            echo  wp_kses_post($currentAfter);
        } elseif (is_page() && !$post->post_parent) {
            echo  wp_kses_post($currentBefore);
            the_title();
            echo  wp_kses_post($currentAfter);
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo  wp_kses_post($crumb) . ' ' . wp_kses_post($delimiter) . ' ';
            echo  wp_kses_post($currentBefore);
            the_title();
            echo  wp_kses_post($currentAfter);
        } elseif (is_search()) {
            echo  wp_kses_post($currentBefore) . get_search_query() . wp_kses_post($currentAfter);
        } elseif (is_tag()) {
            echo  wp_kses_post($currentBefore) . single_tag_title( '', false ) . wp_kses_post($currentAfter);
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo  wp_kses_post($currentBefore) . wp_kses_post($userdata->display_name) . wp_kses_post($currentAfter);
        } elseif (is_404()) {
            echo  wp_kses_post($currentBefore) . esc_html__('404 Not Found','numbat') . wp_kses_post($currentAfter);
        }
        if (get_query_var('paged')) {
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo  wp_kses_post($currentBefore);
            echo esc_html__('Page','numbat') . ' ' . get_query_var('paged');
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo  wp_kses_post($currentAfter);
        }
    }
}
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
function numbat_woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
?>
<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart','numbat' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'numbat' ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
<?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
} 
add_filter( 'woocommerce_add_to_cart_fragments', 'numbat_woocommerce_header_add_to_cart_fragment' );


// SINGLE PRODUCT
// Unhook functions
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

// Hook functions
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

/* ========= PAGINATION ===================================== */
if ( ! function_exists( 'numbat_pagination' ) ) {
    function numbat_pagination($query = null) {

        if (!$query) {
            global $wp_query;
            $query = $wp_query;
        }
        
        $big = 999999999; // need an unlikely integer
        $current = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : '1');
        echo paginate_links( 
            array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => '?paged=%#%',
                'current'       => max( 1, $current ),
                'total'         => $query->max_num_pages,
                'prev_text'     => esc_html__('&#171;','numbat'),
                'next_text'     => esc_html__('&#187;','numbat'),
            ) 
        );
    }
}

/* ========= SEARCH FOR POSTS ONLY ===================================== */
function numbat_search_filter($query) {
    if ($query->is_search && !isset($_GET['post_type'])) {
        $query->set('post_type', 'post');
    }
    return $query;
}
if( !is_admin() ){
    add_filter('pre_get_posts','numbat_search_filter');
}

/* ========= DYNAMIC FEATURED IMAGE ON PORTFOLIO CUSTOM POSTS ONLY ===================================== */
function numbat_filter_post_types() {
    return array('portfolio'); 
}
add_filter('dfi_post_types', 'numbat_filter_post_types');


/* ========= CHECK FOR PINGBACKS ===================================== */
function numbat_post_has( $type, $post_id ) {
    $comments = get_comments('status=approve&type=' . esc_html($type) . '&post_id=' . esc_html($post_id) );
    $comments = separate_comments( $comments );
    return 0 < count( $comments[ $type ] );
}
/* ========= REGISTER FONT-AWESOME TO REDUX ===================================== */
function numbat_register_fontawesome_to_redux() {
    wp_register_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), time(), 'all' );  
    wp_enqueue_style( 'font-awesome' );
}
// This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
add_action( 'redux/page/redux_demo/enqueue', 'numbat_register_fontawesome_to_redux' );


/* Custom functions for woocommerce */

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

function numbat_woocommerce_show_top_custom_block() {
    $args = array();
    global $product;
    global $numbat_redux;
    
    echo '<div class="thumbnail-and-details">';    
              
        wc_get_template( 'loop/sale-flash.php' );
        
        echo '<div class="hover-container">';
            echo '<div class="thumbnail-overlay"></div>';
            echo '<div class="hover-components">';

                echo '<div class="component add-to-cart">';
                    wc_get_template( 'loop/add-to-cart.php' , $args );
                echo '</div>';
                echo '<div class="component wishlist">';
                    echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
                echo '</div>';
                echo '<div class="component compare">';
                    echo do_shortcode( '[yith_compare_button]' );
                echo '</div>';

                if (numbat_plugin_active('yith-woocommerce-quick-view/init.php')) {
                    if ($numbat_redux['is_quick_view_active'] == true) {
                        echo '<div class="component quick-view">';
                            echo '<a href="#" class="button yith-wcqv-button" data-product_id="' . yit_get_prop( $product, 'id', true ) . '">' . esc_html__('Quick View', 'numbat') . '</a>';
                        echo '</div>';
                    }
                }

            echo '</div>';
        echo '</div>';

        echo woocommerce_get_product_thumbnail();

        echo '<div class="details-review-container details-item">';
            wc_get_template( 'loop/rating.php' );
        echo '</div>';
    echo '</div>';

}
add_action( 'woocommerce_before_shop_loop_item_title', 'numbat_woocommerce_show_top_custom_block' );


function numbat_woocommerce_show_price_and_review() {
    echo '<div class="details-container">';
        echo '<div class="details-price-container details-item">';
            wc_get_template( 'loop/price.php' );
        echo '</div>';
    echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'numbat_woocommerce_show_price_and_review' );


function numbat_woocommerce_get_sidebar() {
    global $numbat_redux;

    if ( is_shop() ) {
        $sidebar = $numbat_redux['numbat_shop_layout_sidebar'];
    }elseif ( is_product() ) {
        $sidebar = $numbat_redux['numbat_single_shop_sidebar'];
    }else{
        $sidebar = 'woocommerce';
    }

    dynamic_sidebar( $sidebar );

}
add_action ( 'woocommerce_sidebar', 'numbat_woocommerce_get_sidebar' );

add_filter( 'loop_shop_columns', 'numbat_wc_loop_shop_columns', 1, 13 );

/*
 * Return a new number of maximum columns for shop archives
 * @param int Original value
 * @return int New number of columns
 */
function numbat_wc_loop_shop_columns( $number_columns ) {
    global $numbat_redux;

    if ( $numbat_redux['numbat-shop-columns'] ) {
        return $numbat_redux['numbat-shop-columns'];
    }else{
        return 3;
    }
}

global $numbat_redux;
if ( isset($numbat_redux['numbat-enable-related-products']) && !$numbat_redux['numbat-enable-related-products'] ) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}

add_filter( 'woocommerce_output_related_products_args', 'numbat_related_products_args' );
  function numbat_related_products_args( $args ) {
    global $numbat_redux;

    $args['posts_per_page'] = $numbat_redux['numbat-related-products-number'];
    $args['columns'] = 3;
    return $args;
}

function numbat_show_whislist_button_on_single() {
    echo '<div class="wishlist-container">';
        echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
    echo '</div>';
}
add_action( 'woocommerce_single_product_summary', 'numbat_show_whislist_button_on_single', 36 );


//To change wp_register() text:
add_filter('register','numbat_register_text_change');
function numbat_register_text_change($text) {
    $register_text_before   = esc_html__('Site Admin', 'numbat');
    $register_text_after    = esc_html__('Edit Your Profile', 'numbat');

    $text = str_replace($register_text_before, $register_text_after ,$text);

    return $text;
}

//To change wp_loginout() text:
add_filter('loginout','numbat_loginout_text_change');
function numbat_loginout_text_change($text) {
    $login_text_before  = esc_html__('Log in', 'numbat');
    $login_text_after   = esc_html__('Login', 'numbat');

    $logout_text_before = esc_html__('Log', 'numbat');
    $logout_text_after  = esc_html__('Log', 'numbat');

    $text = str_replace($login_text_before, $login_text_after ,$text);
    $text = str_replace($logout_text_before, $logout_text_after ,$text);
    return $text;
}

function numbat_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'numbat_add_editor_styles' );


function numbat_RemoveDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'numbat_RemoveDemoModeLink');


// REMOVE VC Parallax Notices
if ( class_exists('GambitVCParallaxBackgrounds') ) {
    defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) or define( 'GAMBIT_DISABLE_RATING_NOTICE', true );
}


add_filter( 'loop_shop_per_page', 'numbat_new_loop_shop_per_page', 20 );
function numbat_new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}

?>