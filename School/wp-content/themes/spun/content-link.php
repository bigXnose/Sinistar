<?php
/**
 * @package Spun
 */
 
$format = get_post_format();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="link-icon">
		<span class="screen-reader-text"><?php _e( 'Link', 'spun' ); ?></span>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link">
				<a href="#comments-toggle">
					<span class="tail"></span>
					<?php echo comments_number( __( '+', 'spun' ), __( '1', 'spun' ), __( '%', 'spun' ) ); ?>
				</a>
			</span>
		<?php endif; ?>
		<div class="entry-meta-wrapper">
			<span class="post-date">
				<?php spun_posted_on(); ?>
			</span>
			<span class="entry-format">
				<a href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'spun' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a>
			</span>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'spun' ) );
				if ( $tags_list ) :
			?>

			<span class="tags-links">
				<?php printf( __( '%1$s', 'spun' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>

			<?php edit_post_link( __( 'Edit', 'spun' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
