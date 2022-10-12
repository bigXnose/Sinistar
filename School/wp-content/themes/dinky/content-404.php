<?php
/**
 * The template used for displaying 404 page contents.
 *
 * @package Dinky
 * @since Dinky 1.2
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
				<div id="post-0" class="post error404">
					<div class="entry-header">
						<h2 class="entry-title"><?php _e( 'Not Found', 'dinky' ); ?></h2>
					</div>
					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dinky' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>