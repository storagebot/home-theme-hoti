<?php
/**
 * onesie functions and definitions
 *
 * @package onesie
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'onesie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function onesie_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on onesie, use a find and replace
	 * to change 'onesie' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'onesie', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'onesie_custom_background_args', array(
		'default-color' => '000000',
		'default-image' => get_template_directory_uri() . '/images/background.jpg',
	) ) );
}
endif; // onesie_setup
add_action( 'after_setup_theme', 'onesie_setup' );

/**
 * Enqueue scripts and styles.
 */
function onesie_scripts() {

	wp_enqueue_style( 'onesie-style', get_stylesheet_uri() );
	wp_enqueue_style( 'onesie-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', array( 'onesie-style' ), onesie_get_theme_version(), 'all' );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', array( 'onesie-style' ), onesie_get_theme_version(), 'all' );

	wp_enqueue_script( 'onesie-scripts', get_template_directory_uri() . '/js/onesie.js', array( 'jquery', 'onesie-magnific-popup' ), onesie_get_theme_version(), true );
	wp_enqueue_script( 'onesie-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), onesie_get_theme_version(), true );
	
	// Alt CSS Styles
	$options = get_option( gpp_get_current_theme_id() . '_options' );
	if ( isset ( $options['color'] ) && '' != $options['color'] ) {
		$style = get_template_directory_uri() . '/css/' . $options['color'] . '.css';
	} else {
		$style = get_template_directory_uri() . '/css/dark.css';
	}
	wp_enqueue_style( 'onesie-alt-style', $style, array( 'onesie-style' ), onesie_get_theme_version(), 'all' );

}
add_action( 'wp_enqueue_scripts', 'onesie_scripts' );

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
 * Load theme options
 */
require get_template_directory() . '/options/options.php';

/**
 * Load theme options
 */
require get_template_directory() . '/theme-options.php';
