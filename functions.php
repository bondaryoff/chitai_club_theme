<?php
/**
 * readClub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package readClub
 */

if (!defined('_S_VERSION')) {
 // Replace the version number of the theme on each release.
 define('_S_VERSION', '1.0.0');
}

if (!function_exists('readclub_setup')):
 /**
  * Sets up theme defaults and registers support for various WordPress features.
  *
  * Note that this function is hooked into the after_setup_theme hook, which
  * runs before the init hook. The init hook is too late for some features, such
  * as indicating support for post thumbnails.
  */
 function readclub_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on readClub, use a find and replace
   * to change 'readclub' to the name of your theme in all the template files.
   */
  load_theme_textdomain('readclub', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support('title-tag');

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

  add_image_size( 'anons__img', 335, 216, true);



  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
   array(
    'main-menu' => 'Главное меню',
    'login-menu' => 'Меню входа',
    'footer-menu-1' => 'Меню в подвале 1',
    'footer-menu-2' => 'Меню в подвале 2',
    'admin-menu' => 'Меню администратора',
   )
  );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support(
   'html5',
   array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
   )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');
 }
endif;
add_action('after_setup_theme', 'readclub_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function readclub_widgets_init() {
//  register_sidebar(
//   array(
//    'name'          => esc_html__( 'Sidebar', 'readclub' ),
//    'id'            => 'sidebar-1',
//    'description'   => esc_html__( 'Add widgets here.', 'readclub' ),
//    'before_widget' => '<section id="%1$s" class="widget %2$s">',
//    'after_widget'  => '</section>',
//    'before_title'  => '<h2 class="widget-title">',
//    'after_title'   => '</h2>',
//   )
//  );
// }
// add_action( 'widgets_init', 'readclub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function readclub_styles() {
 wp_enqueue_style('readclub-style', get_stylesheet_uri(), array(), _S_VERSION);
 wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
}
add_action('wp_head', 'readclub_styles');

function readclub_scripts() {
 wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true);
 wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/magnific-popup.js', array(), _S_VERSION, true);
 wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
 wp_enqueue_script('main', get_template_directory_uri() . '/js/main.min.js', array(), _S_VERSION, true);

}
add_action('wp_footer', 'readclub_scripts');

/**
 * Implement the Custom Header feature.
 */

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
//  require get_template_directory() . '/inc/jetpack.php';
// }

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
 add_theme_support('woocommerce');
// add_theme_support( 'wc-product-gallery-zoom' );
 // add_theme_support( 'wc-product-gallery-lightbox' );
 add_theme_support('wc-product-gallery-slider');
}

// add_action( 'woocommerce_before_single_product_summary', 'add_wrapp_product', 10 );
// function add_wrapp_product($ars){
//  echo '<div class="container">www';
//  return $args;
//  echo "</div>";

// }

// add_theme_support( 'woocommerce', apply_filters( 'storefront_woocommerce_args', array(
// 'single_image_width'    => 416
// 'thumbnail_image_width' => 324,
// 'product_grid'          => array(
// 'default_columns' => 3,
// 'default_rows'    => 4,
// 'min_columns'     => 1,
// 'max_columns'     => 6,
// 'min_rows'        => 1
// )
//  ) ) );

function product_short_description() {
 $content = get_the_content();
 $content = strip_tags($content);
 echo mb_substr($content, 0, 380) . '...';
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

if (function_exists('acf_add_options_page')) {

 acf_add_options_page(array(
  'page_title' => 'Настройки темы',
  'menu_title' => 'Настройки темы',
  'menu_slug'  => 'settings',
  'capability' => 'edit_posts',
  'redirect'   => false,
 ));

 acf_add_options_page(array(
  'page_title' => 'Наша команда',
  'menu_title' => 'Наша команда',
  'menu_slug'  => 'our-team',
  'capability' => 'edit_posts',
  'redirect'   => false,
 ));

 acf_add_options_page(array(
  'page_title' => 'FAQ',
  'menu_title' => 'FAQ',
  'menu_slug'  => 'faq',
  'capability' => 'edit_posts',
  'redirect'   => false,
 ));

 acf_add_options_page(array(
  'page_title' => 'Отзывы',
  'menu_title' => 'Отзывы',
  'menu_slug'  => 'comments',
  'capability' => 'edit_posts',
  'redirect'   => false,
 ));

}




/**
 * Automatically adds product to cart on visit
 */
// add_action( 'template_redirect', 'add_product_to_cart' );
// function add_product_to_cart() {
//     if ( !is_admin() ) {
        
//         $found = false;
//         //check if product already in cart
       

//         if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
//             foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
//                 $_product = $values['data'];
//                 if ( $_product->get_id() == $product_id )
//                     $found = true;
//             }
//             // if product not found, add it
//             if ( ! $found )
//                 WC()->cart->add_to_cart( $product_id );
//         } else {

//         }
//     }
// }



function woocommerce_maybe_add_multiple_products_to_cart() {
  // Make sure WC is installed, and add-to-cart qauery arg exists, and contains at least one comma.
  if ( ! class_exists( 'WC_Form_Handler' ) || empty( $_REQUEST['add-to-cart'] ) || false === strpos( $_REQUEST['add-to-cart'], ',' ) ) {
      return;
  }
  
  // Remove WooCommerce's hook, as it's useless (doesn't handle multiple products).
  remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );
  
  $product_ids = explode( ',', $_REQUEST['add-to-cart'] );
  $count       = count( $product_ids );
  $number      = 0;
  
  foreach ( $product_ids as $product_id ) {
      if ( ++$number === $count ) {
          // Ok, final item, let's send it back to woocommerce's add_to_cart_action method for handling.
          $_REQUEST['add-to-cart'] = $product_id;
  
          return WC_Form_Handler::add_to_cart_action();
      }
  
      $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $product_id ) );
      $was_added_to_cart = false;
      $adding_to_cart    = wc_get_product( $product_id );
  
      if ( ! $adding_to_cart ) {
          continue;
      }
  
      $add_to_cart_handler = apply_filters( 'woocommerce_add_to_cart_handler', $adding_to_cart->product_type, $adding_to_cart );
  
      /*
       * Sorry.. if you want non-simple products, you're on your own.
       *
       * Related: WooCommerce has set the following methods as private:
       * WC_Form_Handler::add_to_cart_handler_variable(),
       * WC_Form_Handler::add_to_cart_handler_grouped(),
       * WC_Form_Handler::add_to_cart_handler_simple()
       *
       * Why you gotta be like that WooCommerce?
       */
      if ( 'simple' !== $add_to_cart_handler ) {
          continue;
      }
  
      // For now, quantity applies to all products.. This could be changed easily enough, but I didn't need this feature.
      $quantity          = empty( $_REQUEST['quantity'] ) ? 1 : wc_stock_amount( $_REQUEST['quantity'] );
      $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
  
      if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity ) ) {
          wc_add_to_cart_message( array( $product_id => $quantity ), true );
      }
  }
  }
  
   // Fire before the WC_Form_Handler::add_to_cart_action callback.
   add_action( 'wp_loaded', 'woocommerce_maybe_add_multiple_products_to_cart', 15 );





/*
Plugin Name: Remove product-category slug
Plugin URI: https://timersys.com/
Description: Check if url slug matches a woocommerce product category and use it instead
Version: 0.1
Author: Timersys
License: GPLv2 or later
*/
add_filter('request', function( $vars ) {
    global $wpdb;
    if( ! empty( $vars['pagename'] ) || ! empty( $vars['category_name'] ) || ! empty( $vars['name'] ) || ! empty( $vars['attachment'] ) ) {
        $slug = ! empty( $vars['pagename'] ) ? $vars['pagename'] : ( ! empty( $vars['name'] ) ? $vars['name'] : ( !empty( $vars['category_name'] ) ? $vars['category_name'] : $vars['attachment'] ) );
        $exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s" ,array( $slug )));
        if( $exists ){
            $old_vars = $vars;
            $vars = array('product_cat' => $slug );
            if ( !empty( $old_vars['paged'] ) || !empty( $old_vars['page'] ) )
                $vars['paged'] = ! empty( $old_vars['paged'] ) ? $old_vars['paged'] : $old_vars['page'];
            if ( !empty( $old_vars['orderby'] ) )
                    $vars['orderby'] = $old_vars['orderby'];
                if ( !empty( $old_vars['order'] ) )
                    $vars['order'] = $old_vars['order'];    
        }
    }
    return $vars;
});


add_shortcode( 'orders', 'orders_shortcode' );

function orders_shortcode( $atts ){
    wc_get_template( 'myaccount/my-orders.php');
}

add_shortcode( 'subscriptions', 'subscriptions_shortcode' );

function subscriptions_shortcode( $atts ){
    $subscriptions = YWSBS_Subscription_Helper()->get_subscriptions_by_user( get_current_user_id() );
		wc_get_template( 'myaccount/my-subscriptions-view.php', array( 'subscriptions' => $subscriptions ), '', YITH_YWSBS_TEMPLATE_PATH . '/' );
}


add_shortcode( 'payAddr', 'payAddr_shortcode' );

function payAddr_shortcode( $atts ){
    wc_get_template( 'myaccount/my-address.php');

}



function my_login_logo() { ?>
<style type="text/css">
body {
	background: #EDFDDE !important;
}

#login h1 a,
.login h1 a {
	background-image: url(<?php echo get_stylesheet_directory_uri();
	?>/img/logo-full.png);
	height: 63px;
	width: 207px;
	background-size: cover;
	background-repeat: no-repeat;
	margin-bottom: 30px;
}

form {
	border-radius: 8px;
}

#login input[type="email"],
#login input[type="text"],
#login input[type="password"] {
	border: 3px solid #FEB326;
	/* padding: 15px; */
	height: 55px;
	width: 100%;
	font-family: "Nunito", sans-serif;
	font-size: 18px;
	background: #EDFDDE !important;
	outline: 0;
	border-radius: 8px;
	box-sizing: border-box;
	font-weight: bold;
}

#login input[type="checkbox"] {
	/* border: 3px solid #FEB326; */
}

#login input[type="submit"] {
	font-family: "Nunito", sans-serif;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	font-size: 20px;
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	justify-content: center;
	background: #FEB326;
	font-weight: 800;
	color: #fff !important;
	height: 65px;
	padding-left: 35px;
	padding-right: 35px;
	border-radius: 8px;
	border: 0;
	border-bottom: 4px solid rgba(0, 0, 0, 0.18);
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	width: 100%;
}

#nav{
    text-align: center;
}

#backtoblog{
    text-align: center;
}

.login form .forgetmenot {
	display: block;
	float: none;
}
#wp-auth-check-wrap #wp-auth-check{
    background: #EDFDDE !important;
}
</style>
<script>
    // document.querySelector('#login h1 a').href="https://chitai.club/"; 
</script>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );