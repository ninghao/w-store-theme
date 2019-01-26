<?php 

require get_stylesheet_directory() . '/inc/header.php';
require get_stylesheet_directory() . '/inc/footer.php';
require get_stylesheet_directory() . '/inc/product.php';
require get_stylesheet_directory() . '/inc/woocommerce.php';
require get_stylesheet_directory() . '/inc/gettext.php';

/**
 * styles and scripts.
 */
function w_store_scripts() {
	wp_enqueue_style( 'w-sotre-header', get_stylesheet_directory_uri() . '/assets/css/header.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-typo', get_stylesheet_directory_uri() . '/assets/css/typo.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-breadcrumb', get_stylesheet_directory_uri() . '/assets/css/breadcrumb.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-products', get_stylesheet_directory_uri() . '/assets/css/products.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-product', get_stylesheet_directory_uri() . '/assets/css/product.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-input', get_stylesheet_directory_uri() . '/assets/css/input.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-cart', get_stylesheet_directory_uri() . '/assets/css/cart.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-comment', get_stylesheet_directory_uri() . '/assets/css/comment.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-address', get_stylesheet_directory_uri() . '/assets/css/address.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-widget', get_stylesheet_directory_uri() . '/assets/css/widget.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-alert', get_stylesheet_directory_uri() . '/assets/css/alert.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w-sotre-account', get_stylesheet_directory_uri() . '/assets/css/account.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'w_store_scripts', 90 );

/**
 * quality of upload images thumbnail.
 */
add_filter( 'jpeg_quality', function( ) { return 100; } );

/**
 * setup theme
 */
add_action( 'after_setup_theme', 'w_store_setup' );

function w_store_setup() {
	// load_theme_textdomain( 'w-store', get_stylesheet_directory_uri() . '/languages' );
}
