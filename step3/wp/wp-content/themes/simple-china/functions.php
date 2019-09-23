<?php

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

/*function wpt_register_js() {
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', 'jquery');
}

add_action( 'wp_enqueue_scripts', 'wpt_register_js' );
*/

function wpt_register_css() {
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

/* Bootstrap*/
function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );







add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
  load_theme_textdomain( 'china-theme', get_template_directory() . '/languages' );
}

add_theme_support( 'title-tag' );




$args = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/images/headbd.png',
);

global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) :
	add_theme_support( 'custom-header', $args );
endif;


/**
 * Set up the content width value based on the theme's design.
 *
 * @see
 *
 * @since v 2.3
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}


		/*
		 * Make available for translation.
		 *
		 * Translations can be added to the /languages/ directory.
		 * If you're building a theme based on Twenty Fourteen, use a find and
		 * replace to change 'twentyfourteen' to the name of your theme in all
		 * template files.
		 */


		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( array( 'css/editor-style.css', chinatheme_font_url() ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 672, 372, true );
		add_image_size( 'chinatheme-full-width', 1038, 576, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'   => __( 'Top primary menu', 'china-theme' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );



		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'china-theme_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );


		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'china-theme_get_featured_posts',
			'max_posts' => 6,
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );

// end_setup



	/**
	 * Register Lato Google font for chinatheme.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @return string
	 */
	function chinatheme_font_url() {
		$font_url = '';
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Lato, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}


add_action( 'widgets_init', 'china_theme_widgets_init' );

function china_theme_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'china-theme' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'china-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="bgpng sbtitle widgettitle">',
				'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Front left', 'china-theme' ),
        'id' => 'sidebar-f1',
        'description' => __( 'Widgets in this area on fron page on the left.', 'china-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="bgpng sbtitle widgettitle">',
				'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Front center', 'china-theme' ),
        'id' => 'sidebar-f2',
        'description' => __( 'Widgets in this area on fron page on the center.', 'china-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="bgpng sbtitle widgettitle">',
				'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Front right', 'china-theme' ),
        'id' => 'sidebar-f3',
        'description' => __( 'Widgets in this area on fron page on the right.', 'china-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="bgpng sbtitle widgettitle">',
				'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Front content', 'china-theme' ),
        'id' => 'sidebar-fright',
        'description' => __( 'Widgets in this area on fron page inside content on right .', 'china-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="bgpng sbtitle widgettitle">',
        'after_title'   => '</h2>',
    ) );


}



?>
