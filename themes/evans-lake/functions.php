<?php
/**
 * Evans Lake Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Evans_Lake_Theme
 */

if ( ! function_exists( 'evans_lake_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function evans_lake_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // evans_lake_setup
add_action( 'after_setup_theme', 'evans_lake_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function evans_lake_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'evans_lake_content_width', 640 );
}
add_action( 'after_setup_theme', 'evans_lake_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function evans_lake_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'evans_lake_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function evans_lake_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'evans_lake_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function evans_lake_scripts() {
	wp_enqueue_style( 'evans-lake-style', get_stylesheet_uri() );
	wp_enqueue_style( 'flickity-cdn', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );

	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'evans-lake-toggle-menu',
		get_template_directory_uri() . '/js/toggle-menu.js',
		array('jquery'),
		false,
		true
	);

	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'evans-lake-toggle-search',
		get_template_directory_uri() . '/js/toggle-search.js',
		array('jquery'),
		false,
		true
	);

	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'evans-lake-arrow-scroll',
		get_template_directory_uri() . '/js/arrow-scroll.js',
		array('jquery'),
		false,
		true
	);
	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'toggle-faq',
		get_template_directory_uri() . '/js/toggle-faq.js',
		array('jquery'),
		false,
		true
	);

	wp_enqueue_script( 'font-awesome-cdn', 'https://use.fontawesome.com/affc2627e0.js', array(),'4.7.0');
	wp_enqueue_script( 'flickity-cdn', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js' );
  wp_enqueue_script( 'jquery-ui', 'http://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
	wp_enqueue_script( 'evans-lake-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

  wp_enqueue_script( 'toggle-faq', get_template_directory_uri() . '/build/js/toggle-faq.js', array() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	//Colorbox stylesheet
	wp_enqueue_style( 'colorbox', get_template_directory_uri() . 
	'/colorbox/colorbox.css' );
	
	//Your theme CSS
	wp_enqueue_style( 'themeslug-style', get_stylesheet_uri() );
	
	//Colorbox jQuery plugin js file
	wp_enqueue_script( 'colorbox', get_template_directory_uri() . 
	'/js/jquery.colorbox.js', array( 'jquery'   ), '', true );
	
	//Add main.js file
	wp_enqueue_script( 'themeslug-script', get_template_directory_uri() . 
	'/js/colorbox.js', array( 'colorbox' ), '', true );


}
add_action( 'wp_enqueue_scripts', 'evans_lake_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
