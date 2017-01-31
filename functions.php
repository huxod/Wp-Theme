<?php
/**
 * hlportfolio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hlportfolio
 */

if ( ! function_exists( 'hlportfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hlportfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hlportfolio, use a find and replace
	 * to change 'hlportfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hlportfolio', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'hlportfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hlportfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'hlportfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hlportfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hlportfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'hlportfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hlportfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hlportfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hlportfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hlportfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function hlportfolio_scripts() {
	
	wp_enqueue_style( 'hlportfolio-style', get_stylesheet_uri() );

	/* Bootstrap  flie css 4.0 alpha */

	wp_enqueue_style( 'hlportfolio-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );

	/* Main file css*/

	wp_enqueue_style( 'hlportfolio-style-main', get_template_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'hlportfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hlportfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	/* Jquery  flie js 4.0 alpha */

	wp_enqueue_script( 'hlportfolio-jquery-js', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), '20151215', true );

	/* Jquery migration flie js 4.0 alpha */

	wp_enqueue_script( 'hlportfolio-jquery-migrate-js', get_template_directory_uri() . '/js/jquery-migrate-1.4.1.min.js', array(), '20151215', true );
	/* Jquery migration flie js 4.0 alpha */

	wp_enqueue_script( 'hlportfolio-tether-js', get_template_directory_uri() . '/js/tether.min.js', array(), '20151215', true );

	/* Bootstrap  flie js 4.0 alpha */

	wp_enqueue_script( 'hlportfolio-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	/* hlportfolio file js  */

	wp_enqueue_script( 'hlportfolio-script-js', get_template_directory_uri() . '/js/script.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hlportfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Custom Logo file.
 */
require get_template_directory() . '/inc/custom-logo.php';

/**
 * Load Custom Logo file.
 */
require get_template_directory() . '/inc/shortcodes.php';

function odoheart( $atts, $content=null ) {
	$a = shortcode_atts( array(
		'data-percent' => '100',
		'data-color' => '20df6e',
		), $atts );
	$result =  '<div class="wrapper_canvas">';
	$result .='<canvas class="myCircle" data-percent="' . esc_attr($a['data-percent']) . '" data-color="' . esc_attr($a['data-color']) . '" width="500" height="500"></canvas>';
	$result .= '<span></span></div>';
	return force_balance_tags( $result );
}
add_shortcode( 'odoheart', 'odoheart' );


add_action( 'init', 'odoheart_buttons' );
function odoheart_buttons() {
	add_filter( "mce_external_plugins", "odoheart_add_buttons" );
	add_filter( 'mce_buttons', 'odoheart_register_buttons' );
}
function odoheart_add_buttons( $plugin_array ) {
	$plugin_array['odoheart'] = get_template_directory_uri() . '/js/odoheart_buttons.js';
	return $plugin_array;
}
function odoheart_register_buttons( $buttons ) {
	array_push( $buttons, 'odoheart'); // dropcap', 'recentposts
	return $buttons;
}

function change_menu($items){

if(!is_front_page()){

  foreach($items as $item){


    $item->url = get_bloginfo("url") . "/" .  $item->url;


  }

}

  return $items;

}

add_filter('wp_nav_menu_objects', 'change_menu');