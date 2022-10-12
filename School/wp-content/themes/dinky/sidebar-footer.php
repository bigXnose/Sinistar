<?php
/**
 * The sidebar containing the Footer Widgets Area.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
			<?php if ( is_active_sidebar( 'footer' ) & ((dinky_get_theme_option('content_display_home') & is_home()) | !is_home()) ) : ?>
			<div id="sidebar-footer" class="sidebar container">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
			<?php endif; ?>