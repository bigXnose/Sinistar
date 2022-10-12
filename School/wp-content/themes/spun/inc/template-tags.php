<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Spun
 */

if ( ! function_exists( 'spun_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 */
function spun_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'spun' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav screen-reader-text">' . _x( '&laquo; Previous Post', 'Previous post link', 'spun' ) . '</span>' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '<span class="meta-nav screen-reader-text">' . _x( 'Next Post &raquo;', 'Next post link', 'spun' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav screen-reader-text">&laquo;</span>', 'spun' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav screen-reader-text">&raquo;</span>', 'spun' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // spun_content_nav

if ( ! function_exists( 'spun_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function spun_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'spun' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'spun' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '+', 'spun' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'spun' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'spun' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'spun' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'spun' ), '| ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for spun_comment()

if ( ! function_exists( 'spun_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 */
function spun_posted_on() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'spun' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'spun' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 */
function spun_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so spun_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so spun_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in spun_categorized_blog
 *
 */
function spun_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'spun_category_transient_flusher' );
add_action( 'save_post', 'spun_category_transient_flusher' );


/**
 * Get one image from a specified post in the following order:
 * Featured Image, first attached image, first image from the_content HTML
 * @param int $id, The post ID to check
 * @param string $size, The image size to return, defaults to 'post-thumbnail'
 * @return string $thumb, Thumbnail image with markup
 */
function spun_get_image( $id, $size = 'home-post' ) {

	$thumb = '';

	if ( '' != get_the_post_thumbnail( $id ) ) {
		$thumb = get_the_post_thumbnail( $id, $size, array( 'title' => esc_attr( strip_tags( get_the_title() ) ) ) );
	}
	else {
		$args = array(
					'post_type'		 => 'attachment',
					'fields'    	 => 'ids',
					'numberposts'	 => 1,
					'post_status'	 => null,
					'post_mime_type' => 'image',
					'post_parent'	 => $id,
				);

		$first_attachment = get_posts( $args );

		if ( $first_attachment ) {

			/* Get the first image attachment */
			foreach ( $first_attachment as $attachment ) {
				$thumb = wp_get_attachment_image( $attachment, $size, false, array( 'title' => esc_attr( strip_tags( get_the_title() ) ) ) );
			}
		}
		elseif ( class_exists( 'Jetpack_PostImages' ) ) {

			/* Get the first image directly from HTML content */
			$getimage = new Jetpack_PostImages();
			$image = $getimage->from_html( $id );

			if ( $image )
				$thumb = '<img src="' . $image[0]['src'] . '" title="' . esc_attr( strip_tags( get_the_title() ) ) . '" class="attachment-' . $size . ' wp-post-image" />';
		}
	}

	return $thumb;
}