<?php
/**
 * The template for displaying Author archive pages.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); ?>
		<div id="content" class="container" role="main">
			<div id="main"<?php if (!dinky_get_theme_option('sidebar_display')): ?> class="center <?php if (dinky_get_theme_option('fullmain_nosidebar')): ?> full<?php endif; ?>"<?php endif; ?>>
				<?php get_sidebar('up_main'); ?>
				<?php if ( have_posts() ) the_post(); ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'dinky' ), '<span>'. get_the_author() . '</span>' ); ?></h1>
				</header>
				<?php get_template_part( 'author-bio' ); ?>
				<?php rewind_posts(); ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php dinky_archive_nav(); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif;?>
				<?php get_sidebar('under_main'); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>