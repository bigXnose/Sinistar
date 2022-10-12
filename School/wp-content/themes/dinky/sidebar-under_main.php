<?php
/**
 * The sidebar containing the Under Main Widgets Area.
 *
 * @package Dinky
 * @since Dinky 1.5
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
				<?php if ( is_active_sidebar( 'under_main' ) ) : ?>
				<div id="sidebar-under_main" class="sidebar">
						<?php dynamic_sidebar( 'under_main' ); ?>
				</div>
				<?php endif; ?>