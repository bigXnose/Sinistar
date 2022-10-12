<?php
/**
 * The template for displaying comments.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
				<div id="comments">
				<?php if (post_password_required()): ?>
					<h6 id="comments-title"><?php _e('This post is password protected. Enter the password to view any comments.', 'dinky'); ?></h6>
				<?php return;endif; ?>
				<?php if (have_comments()) : ?>
					<h6 id="comments-title"><?php printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'dinky'), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');?></h6>
					<ol id="comments-list" class="comments-list">
						<?php wp_list_comments('avatar_size=60&type=comment'); ?>
					</ol>
					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
						<nav id="comments-nav" class="navigation" role="navigation">
							<span class="previous"><?php previous_comments_link(__( '&#8249; Older comments', 'dinky' )); ?></span>
							<span class="next"><?php next_comments_link(__( 'Newer comments &#8250;', 'dinky', 0 )); ?></span>
						</nav>
					<?php endif; ?>
				<?php endif; ?>
				<?php if (!empty($comments_by_type['pings'])) :
					$count = count($comments_by_type['pings']);
					($count !== 1) ? $txt = __('Pings&#47;Trackbacks','dinky') : $txt = __('Pings&#47;Trackbacks','dinky');
					?>
					<h6 id="pings-title"><?php printf( __( '%1$d %2$s for "%3$s"', 'dinky' ), $count, $txt, get_the_title() )?></h6>
					<ol id="pings-list" class="comments-list">
						<?php wp_list_comments('type=pings&max_depth=<em>'); ?>
					</ol>
				<?php endif; ?>
				<?php if (comments_open()) : ?>
					<?php
					$fields = array(
						'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name','dinky') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
						'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
						'email' => '<p class="comment-form-email"><label for="email">' . __('E-mail','dinky') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
						'<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>',
						'url' => '<p class="comment-form-url"><label for="url">' . __('Website','dinky') . '</label>' .
						'<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
					);
					$defaults = array('fields' => apply_filters('comment_form_default_fields', $fields));
					comment_form($defaults); ?>
				<?php endif; ?>
				</div>