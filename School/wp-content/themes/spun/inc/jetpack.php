<?php 
/**
 * Compatibility settings and functions for Jetpack from Automattic
 * See jetpack.me
 *
 * @package Spun
 */

function spun_jetpack_setup() {

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container'  => 'content',
		'footer'     => 'page',
		'render'	 => 'spun_infinite_scroll',
		'posts_per_page' => 15,
		'footer_widgets' => array( 'sidebar-1', 'sidebar-2', 'sidebar-3' ),
	) );
	
	add_theme_support( 'social-links', array(
		'facebook', 'twitter', 'linkedin', 'tumblr'
	) );
}
add_action( 'after_setup_theme', 'spun_jetpack_setup' );

/* Load the proper content template */
function spun_infinite_scroll() {
	while( have_posts() ) {
		the_post();

		get_template_part( 'content', 'home' );
	}
}