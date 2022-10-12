<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Spun
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 */
function spun_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'spun_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 */
function spun_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'spun_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 */
function spun_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'spun_enhanced_image_navigation', 10, 2 );

/**
 * Remove widget title header if no title is entered.
 * @todo Remove this function when this is fixed in core.
 */

function spun_calendar_widget_title( $title = '', $instance = '', $id_base = '' ) {

	if ( 'calendar' == $id_base && '&nbsp;' == $title )
		$title = '';
	return $title;
}
add_filter( 'widget_title', 'spun_calendar_widget_title', 10, 3 );

/**
 * Filter archives to display one less post per page to account for the .page-title circle
 */
function spun_limit_posts_per_archive_page() {

	if ( ! is_home() && is_archive() || is_search() ) {

		$posts_per_page = intval( get_option( 'posts_per_page' ) ) - 1;
		set_query_var( 'posts_per_page', $posts_per_page );
	}
}
add_filter( 'pre_get_posts', 'spun_limit_posts_per_archive_page' );

/**
 * Count the number of active sidebars and generate an ID to style them.
 */
function spun_count_sidebars() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) )
		$count = 'one';

	if ( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) ||
		 is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-3' ) ||
		 is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
		$count = 'two';

	if ( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
		$count = 'three';

	print $count;
}


/**
 * For image post format, as we display the featured image properly,
 * regex it out of the content.
 */
function spun_strip_featured_image( $content ) {
	if ( '' != get_the_post_thumbnail() && 'image' == get_post_format() ) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$image_url = $image_url[0];
		$image_url = str_replace( array( 'http://', 'https://' ), 'https?://', $image_url );
		$regex     = sprintf( '#<a href="%1$s"><img[^>]*? src="%1$s[^"]*" [^>]*?/></a>#', $image_url );
		$content   = preg_replace( $regex, '', $content );
	}

	return $content;
}
add_filter( 'the_content', 'spun_strip_featured_image' );

/**
 * Regex gallery shortcode from gallery post format content.
 */
function spun_strip_gallery( $content ) {
	if ( 'gallery' == get_post_format() ) {
		$regex = '/\[gallery.*]/';
		$content = preg_replace( $regex, '', $content );
	}

	return $content;
}
add_filter( 'the_content', 'spun_strip_gallery' );

/**
 * Extract gallery shortcode from content
 */
function spun_gallery_shortcode( $content ) {
	$regex = '/\[gallery.*]/';
	$shortcode = preg_match( $regex, $content, $gallery_shortcode );
	return $gallery_shortcode;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function spun_wp_title( $title, $sep ) {
        global $page, $paged;

        if ( is_feed() )
                return $title;

        // Add the blog name
        $title .= get_bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
                $title .= " $sep $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
                $title .= " $sep " . sprintf( __( 'Page %s', 'spun' ), max( $paged, $page ) );

        return $title;
}
add_filter( 'wp_title', 'spun_wp_title', 10, 2 );