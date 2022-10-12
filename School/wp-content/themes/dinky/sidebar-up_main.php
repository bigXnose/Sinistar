<?php
/**
 * The sidebar containing the Up Main Widgets Area.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
				<?php if ( is_active_sidebar( 'up_main' ) ) : ?>
				<div id="sidebar-up_main" class="sidebar">
						<?php dynamic_sidebar( 'up_main' ); ?>
				</div>
				<?php endif; ?>