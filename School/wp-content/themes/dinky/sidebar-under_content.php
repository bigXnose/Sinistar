<?php
/**
 * The sidebar containing the Under Content Widgets Area.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
		<?php if ( is_active_sidebar( 'under_content' ) ) : ?>
		<div id="sidebar-under_content" class="sidebar container">
				<?php dynamic_sidebar( 'under_content' ); ?>
		</div>
		<?php endif; ?>
