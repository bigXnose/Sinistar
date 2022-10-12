<?php
/**
 * The template used for displaying page with none content
 *
 * @package Dinky
 * @since Dinky 1.2
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
					<div id="post-0" class="post nothing-found">
						<div class="entry-header">
							<h2 class="entry-title"><?php _e( 'Nothing Found', 'dinky' ); ?></h2>
						</div>
						<div class="entry-content">
							<p><?php _e( 'No posts to display.', 'dinky' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</div>