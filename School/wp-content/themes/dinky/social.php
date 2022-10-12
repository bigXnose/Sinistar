<?php
/**
 * The template used for displaying Social icons content.
 *
 * @package Dinky
 * @since Dinky 1.2 (in header.php at Dinky 1.0)
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
			<nav id="social">
				<ul>
					<?php if (dinky_get_theme_option('social_mail') != ''): ?><li><a class="social_round-email" href="<?php echo 'mailto:' . dinky_get_theme_option('social_mail') ?>" title="<?php _e('E-mail','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_feed') != ''): ?><li><a class="social_round-rss" href="<?php echo dinky_get_theme_option('social_feed') ?>" title="<?php _e('Feed','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_twitter') != ''): ?><li><a class="social_round-twitter" href="<?php echo dinky_get_theme_option('social_twitter') ?>" title="<?php _e('Twitter','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_facebook') != ''): ?><li><a class="social_round-facebook" href="<?php echo dinky_get_theme_option('social_facebook') ?>" title="<?php _e('Facebook','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_google') != ''): ?><li><a class="social_round-google" href="<?php echo dinky_get_theme_option('social_google') ?>" title="<?php _e('Google+','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_linkedin') != ''): ?><li><a class="social_round-linkedin" href="<?php echo dinky_get_theme_option('social_linkedin') ?>" title="<?php _e('Linkedin','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_github') != ''): ?><li><a class="social_round-github" href="<?php echo dinky_get_theme_option('social_github') ?>" title="<?php _e('Github','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_instagram') != ''): ?><li><a class="social_round-instagram" href="<?php echo dinky_get_theme_option('social_instagram') ?>" title="<?php _e('Instagram','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_foursquare') != ''): ?><li><a class="social_round-foursquare" href="<?php echo dinky_get_theme_option('social_foursquare') ?>" title="<?php _e('Foursquare','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_youtube') != ''): ?><li><a class="social_round-youtube" href="<?php echo dinky_get_theme_option('social_youtube') ?>" title="<?php _e('Youtube','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_dribbble') != ''): ?><li><a class="social_round-dribbble" href="<?php echo dinky_get_theme_option('social_dribbble') ?>" title="<?php _e('Dribbble','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_tumblr') != ''): ?><li><a class="social_round-tumblr" href="<?php echo dinky_get_theme_option('social_tumblr') ?>" title="<?php _e('Tumblr','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_flickr') != ''): ?><li><a class="social_round-flickr" href="<?php echo dinky_get_theme_option('social_flickr') ?>" title="<?php _e('Flickr','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_blogger') != ''): ?><li><a class="social_round-blogger" href="<?php echo dinky_get_theme_option('social_blogger') ?>" title="<?php _e('Blogger','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_pinterest') != ''): ?><li><a class="social_round-pinterest" href="<?php echo dinky_get_theme_option('social_pinterest') ?>" title="<?php _e('Pinterest','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_fivehundredpix') != ''): ?><li><a class="social_round-fivehundredpix" href="<?php echo dinky_get_theme_option('social_fivehundredpix') ?>" title="<?php _e('Fivehundredpix','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_reddit') != ''): ?><li><a class="social_round-reddit" href="<?php echo dinky_get_theme_option('social_reddit') ?>" title="<?php _e('Reddit','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_vimeo') != ''): ?><li><a class="social_round-vimeo" href="<?php echo dinky_get_theme_option('social_vimeo') ?>" title="<?php _e('Vimeo','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_smugmug') != ''): ?><li><a class="social_round-smugmug" href="<?php echo dinky_get_theme_option('social_smugmug') ?>" title="<?php _e('Smugmug','dinky'); ?>"></a></li><?php endif; ?>
					<?php if (dinky_get_theme_option('social_stumbleupon') != ''): ?><li><a class="social_round-stumbleupon" href="<?php echo dinky_get_theme_option('social_stumbleupon') ?>" title="<?php _e('Stumbleupon','dinky'); ?>"></a></li><?php endif; ?>
				</ul>
			</nav>