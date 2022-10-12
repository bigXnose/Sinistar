<?php
/**
 * @package Spun
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span class="active-link">', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link">
				<a href="#">
					<span class="tail"></span>
					<?php printf( _n( '1', '%1$s', get_comments_number(), 'spun' ), number_format_i18n( get_comments_number() ) ); ?>
				</a>
			</span>
		<?php endif; ?>
		<span class="post-date">
			<?php spun_posted_on(); ?>
		</span>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'spun' ) );
			if ( $categories_list && spun_categorized_blog() ) :
		?>
		<span class="cat-links">
			<?php printf( __( '%1$s', 'spun' ), $categories_list ); ?>
		</span>
		<?php endif; // End if categories ?>

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
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->