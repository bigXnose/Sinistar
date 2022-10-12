<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Spun
 */
?>
		<?php if ( is_active_sidebar( 'sidebar-1' )
				|| is_active_sidebar( 'sidebar-2' )
				|| is_active_sidebar( 'sidebar-3' ) ) : ?>
			<a class="sidebar-link">
				<?php echo _x( '+', 'Open sidebar', 'spun' ); ?>
			</a>
		<?php endif; ?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<?php do_action( 'before_sidebar' ); ?>
				<div class="widget-column <?php spun_count_sidebars(); ?>">
					<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<?php do_action( 'before_sidebar' ); ?>
				<div class="widget-column <?php spun_count_sidebars(); ?>">
					<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<?php do_action( 'before_sidebar' ); ?>
				<div class="widget-column <?php spun_count_sidebars(); ?>">
					<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
				</div>
			<?php endif; ?>

		</div><!-- #secondary .widget-area -->
