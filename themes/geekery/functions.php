<?php
/**
 * Geekery functions and definitions
 *
 * @package Magnigenie
 * @subpackage Geekery
 * @since Geekery 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 768; /* pixels */
}

if ( ! function_exists( 'geekery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function geekery_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on geekery, use a find and replace
	 * to change 'geekery' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'geekery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 * Post thumbail is used for pages that are shown in the featured section of Front page.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'geekery' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'geekery_custom_background_args', array(
		'default-color' => 'EAEAEA',
		'default-image' => '',
	) ) );

	// Adding excerpt option box for pages as well
	add_post_type_support( 'page', 'excerpt' );
}
endif; // geekery_setup
add_action( 'after_setup_theme', 'geekery_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function geekery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'geekery' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'geekery_widgets_init' );

/**
 * Adding Google Fonts.
 */

function geekery_fonts_url() {
    $fonts_url = '';
 
    $roboto = _x( 'on', 'Roboto font: on or off', 'geekery' );
 
    $merriweather = _x( 'on', 'Merriweather font: on or off', 'geekery' );
 
    if ( 'off' !== $roboto || 'off' !== $merriweather ) {
        $font_families = array();
 
        if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto:300,400,700,400italic';
        }
 
        if ( 'off' !== $merriweather ) {
            $font_families[] = 'Merriweather:700italic,300,400,800,600';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}


/**
 * Enqueue scripts and styles.
 */

function geekery_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'geekery-style', get_stylesheet_uri() );
	wp_enqueue_style( 'geekery-fonts', geekery_fonts_url(), array(), null );
	wp_enqueue_style( 'owl-main-style', get_template_directory_uri() . '/owl.carousel.css' ); 
	wp_enqueue_style( 'owl-theme-style', get_template_directory_uri() . '/owl.theme.css' );
	wp_enqueue_style( 'afn-genericons', get_template_directory_uri() . '/font/genericons.css', array(), '3.0.2' );

	wp_enqueue_script( 'geekery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'geekery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'top-sldier-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'geekery-custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), false, true );
	
	$geekery_header_image_link = get_header_image();
	wp_localize_script( 'geekery-custom-js', 'geekeryScriptParam', array('geekery_image_link'=> $geekery_header_image_link ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

global $is_IE;

if ( $is_IE ) {
    wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5shiv.min.js', true ); 
}
}
add_action( 'wp_enqueue_scripts', 'geekery_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

