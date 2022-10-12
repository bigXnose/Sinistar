<?php
/**
 * The sidebar containing the Sidebar Widgets Area.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
			<?php if (dinky_get_theme_option('sidebar_display')): ?>
			<div id="sidebar" class="sidebar">
				<?php if ( !dynamic_sidebar( 'sidebar' ) ) : ?>
					<aside id="search" class="widget dinky-widget_search">
						<div class="entry-content">
							<form role="search" method="get" id="dinky-searchform" action="<?php echo home_url() ?>">
								<input type="text" name="s" id="dinky-s" placeholder="<?php _e('Search...','dinky'); ?>" autocomplete="off">
							</form>
						</div>
					</aside>
					<aside id="archives" class="widget widget_archive">
						<div class="entry-content">
							<div class="entry-header"><span class="entry-title"><?php _e( 'Archives' ); ?></span></div>
							<ul>
								<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
							</ul>
						</div>
					</aside>
					<aside id="meta" class="widget widget_meta">
						<div class="entry-content">
							<div class="entry-header"><span class="entry-title"><?php _e( 'Meta' ); ?></span></div>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<?php wp_meta(); ?>
							</ul>
						</div>
					</aside>
				<?php endif; ?>
			</div>
			<?php endif; ?>