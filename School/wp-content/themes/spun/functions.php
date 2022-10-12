<?php
/**
 * Spun functions and definitions
 *
 * @package Spun
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
if ( ! isset( $content_width ) )
	$content_width = 700; /* pixels */

if ( ! function_exists( 'spun_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 */
function spun_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Spun, use a find and replace
	 * to change 'spun' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'spun', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'home-post', 360, 360, true );
	add_image_size( 'single-post', 700, 999 );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'spun' ),
	) );

	/**
	 * Add support for custom backgrounds
	 */
	add_theme_support( 'custom-background' );
	
	/**
	 * Add support for editor styles
	 */
	add_editor_style();

	/**
	 * Add support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery' ) );

}
endif; // spun_setup
add_action( 'after_setup_theme', 'spun_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 */
function spun_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'spun' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar 2', 'spun' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar 3', 'spun' ),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'spun_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function spun_scripts() {

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'spun-toggle', get_template_directory_uri() . '/js/toggle.js', array( 'jquery' ), '20121005', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	wp_enqueue_style( 'spun-quicksand' );
	wp_enqueue_style( 'spun-playfair' );
	wp_enqueue_style( 'spun-nunito' );

}
add_action( 'wp_enqueue_scripts', 'spun_scripts', 1 );

function spun_options_styles() {
	if ( false == get_theme_mod( 'spun_grayscale', false ) ) : ?>
	<style type="text/css">
		.blog .hentry a .attachment-home-post,
		.archive .hentry a .attachment-home-post,
		.search .hentry a .attachment-home-post {
			filter: grayscale(100%);
			-webkit-filter: grayscale(100%);
			-webkit-filter: grayscale(1); /* Older versions of webkit */
			-moz-filter: grayscale(100%);
			-o-filter: grayscale(100%);
			-ms-filter: grayscale(100%); /* IE 10 */
			filter: gray; /* IE 9 */
			filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox */
		}
		@media screen and ( max-width: 800px ) {
			/* Remove hover effects for touchscreens */
			.blog .hentry a .attachment-home-post,
			.archive .hentry a .attachment-home-post,
			.search .hentry a .attachment-home-post {
				filter:none;
				-webkit-filter:none;
				-moz-filter:none;
				-o-filter:none;
			}
		}
	</style>
		<?php 
	endif;
	
	if ( false == get_theme_mod( 'spun_opacity', false ) ) : ?>
		<style type="text/css">
			.site-content #nav-below .nav-previous a,
			.site-content #nav-below .nav-next a,
			.site-content #image-navigation .nav-previous a,
			.site-content #image-navigation .nav-next a,
			.comment-navigation .nav-next,
			.comment-navigation .nav-previous,
			#infinite-handle span,
			.sidebar-link,
			a.comment-reply-link,
			a#cancel-comment-reply-link,
			.comments-link a,
			.hentry.no-thumbnail,
			button,
			html input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.site-footer {
				opacity: .2;
			}
			.site-header,
			.entry-meta-wrapper,
			.comment-meta,
			.page-links span.active-link,
			.page-links a span.active-link {
				opacity: .3;
			}
			@media screen and ( max-width: 800px ) {
				/* Increase opacity for small screen sizes and touch screens */
				.site-header,
				.site-content #nav-below .nav-previous a,
				.site-content #nav-below .nav-next a,
				.site-content #image-navigation .nav-previous a,
				.site-content #image-navigation .nav-next a,
				.comment-navigation .nav-next a,
				.comment-navigation .nav-previous a,
				#infinite-handle span,
				.sidebar-link,
				a.comment-reply-link,
				a#cancel-comment-reply-link,
				.site-footer,
				.comments-link a,
				.comment-meta,
				.entry-meta-wrapper,
				.hentry.no-thumbnail,
				.page-links span.active-link,
				.page-links a span.active-link {
					opacity: 1;
				}
			}
		</style>
		<?php
	endif;
	
	if ( false == get_theme_mod( 'spun_titles', false ) ) : ?>
		<style type="text/css">
			.hentry .thumbnail-title {
				display: none;
			}
		</style>
		<?php
	endif;
}
add_action( 'wp_head', 'spun_options_styles', 1 );

/**
 * Register Google Fonts
 */
function spun_google_fonts() {

	$protocol = is_ssl() ? 'https' : 'http';

	/*	translators: If there are characters in your language that are not supported
		by Playfair, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Playfair font: on or off', 'spun' ) ) {

		wp_register_style( 'spun-playfair', "$protocol://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic" );

	}
	
	/*	translators: If there are characters in your language that are not supported
		by Quicksand, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Quicksand font: on or off', 'spun' ) ) {

		wp_register_style( 'spun-quicksand', "$protocol://fonts.googleapis.com/css?family=Quicksand:300" );

	}
	
	/*	translators: If there are characters in your language that are not supported
		by Nunito, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Nunito font: on or off', 'spun' ) ) {

		wp_register_style( 'spun-nunito', "$protocol://fonts.googleapis.com/css?family=Nunito:300" );

	}

}
add_action( 'init', 'spun_google_fonts' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function typo_mce_css( $mce_css ) {
	$protocol = is_ssl() ? 'https' : 'http';
	$font_url = $protocol . '://fonts.googleapis.com/css?family=Quicksand:300|Playfair+Display:400,700,400italic,700italic';

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'typo_mce_css' );

/**
 * Enqueue Google Fonts for custom headers
 */
function spun_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'spun-playfair' );
	wp_enqueue_style( 'spun-quicksand' );

}
add_action( 'admin_enqueue_scripts', 'spun_admin_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( file_exists( get_template_directory() . '/inc/jetpack.php' ) )
	require get_template_directory() . '/inc/jetpack.php';
	
/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates
 */
require( get_template_directory() . '/inc/extras.php' );

/**
 * Customizer support for theme options
 */
require( get_template_directory() . '/inc/customizer.php' );