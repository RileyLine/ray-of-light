<?php
/**
 * Ray of Light functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ray_of_Light
 */

if ( ! defined( 'ROL_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ROL_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rol_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Ray of Light, use a find and replace
		* to change 'rol' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rol', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-primary' => esc_html__( 'Primary', 'rol' ),
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
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

		
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'rol_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rol_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rol_content_width', 640 );
}
add_action( 'after_setup_theme', 'rol_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rol_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rol' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rol' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rol_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rol_scripts() {
	wp_enqueue_style( 'rol-style', get_stylesheet_uri(), array(), ROL_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rol_scripts' );

function rol_enqueue_styles() {
    wp_enqueue_style( 
		'header-styles',
		get_template_directory_uri() . '/assets/css/header-styles.css'
	);
    wp_enqueue_style( 
		'footer-styles',
		get_template_directory_uri() . '/assets/css/footer-styles.css'
	);
    wp_enqueue_style( 
		'main-styles',
		get_template_directory_uri() . '/assets/css/styles.css'
	);
    wp_enqueue_style( 
		'woocommerce-styles',
		get_template_directory_uri() . '/assets/css/woocommerce-styles.css'
	);
    wp_enqueue_style( 
		'event-styles',
		get_template_directory_uri() . '/assets/css/event-styles.css'
	);
}
add_action( 'wp_enqueue_scripts', 'rol_enqueue_styles' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 * 
 * Borrowed from: https://developer.wordpress.org/reference/functions/the_excerpt/#comment-325
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Block Editor additions.
 */
require get_template_directory() . '/inc/block-editor.php';

/**
 * Event Post Type additions.
 */
require get_template_directory() . '/inc/post-types.php';
