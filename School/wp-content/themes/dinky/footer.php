<?php
/**
 * The template for displaying the Footer.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;
?>
		<?php get_sidebar('under_content'); ?>
		<footer id="footer" role="contentinfo" <?php if (dinky_get_theme_option('footer_dark')): ?>class="dark"<?php endif; ?>>
			<?php get_sidebar('footer'); ?>
			<div class="copyright">
				<div class="container" style="overflow: hidden;">
					<p <?php if (has_nav_menu('footer')): ?>class="inside"<?php endif; ?>><?php if (dinky_get_theme_option('copyright') != ''): echo dinky_get_theme_option('copyright'); else: ?><?php printf( __( '<span lang="en-US">&copy;</span> Copyright %s <a href="%s" title="%s">%s</a>', 'dinky' ), (function_exists('jdate') ? jdate('Y') : date('Y')), home_url('/'), get_bloginfo('name', 'display'), get_bloginfo('name') ); ?><?php endif; ?></p>
					<?php if (has_nav_menu('footer')): ?><div id="footer-navigation"><?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'nav-menu' ) ); ?></div><?php endif; ?>
				</div>
				<?php 
				/**
 				 * You are free to remove the credit/designer link but I would very much appreciate your support by leaving it intact, thank you.
 				 */
				?>
				<p class="copyright-designer"><?php _e('<strong>Dinky</strong> WordPress Theme - Theme By <a href="http://misam.ir/" title="Misam Saki">Misam Saki</a>', 'dinky'); ?></p>
			</div>
			<a href="#wrapper" title="<?php _e('To Top','dinky'); ?>" id="toTop" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span><?php _e('To Top','dinky'); ?></a>
		<?php wp_footer(); ?>
		</footer>
	</body>
</html>