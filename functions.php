<?php
/**
 * KC Realty functions and definitions
 *
 * @package KC Realty
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'kcrealty_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kcrealty_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'kcrealty' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kcrealty', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kcrealty' ),
		'social' => __( 'Social Links', 'kcrealty' ),
		'footer' => __( 'Footer Menu', 'kcrealty' )
	) );

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
	/*add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );*/

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'kcrealty_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/

	add_image_size( 'newslist', 800, 300, TRUE );
	add_image_size( 'staffthumb', 225, 225, TRUE );

} // kcrealty_setup()
endif; // kcrealty_setup
add_action( 'after_setup_theme', 'kcrealty_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kcrealty_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Home Sidebar', 'kcrealty' ),
		'id'            => 'sidebar-home',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

} // kcrealty_widgets_init()
add_action( 'widgets_init', 'kcrealty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kcrealty_scripts() {

	wp_enqueue_style( 'kcrealty-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kcrealty-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	wp_enqueue_script( 'kcrealty-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	wp_enqueue_script( 'kcrealty-acf-maps', get_template_directory_uri() . '/js/acf-map.min.js', array( 'jquery' ), '20150202', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

} // kcrealty_scripts()
add_action( 'wp_enqueue_scripts', 'kcrealty_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Slushamn themekit.
 */
require get_template_directory() . '/inc/themekit.php';
