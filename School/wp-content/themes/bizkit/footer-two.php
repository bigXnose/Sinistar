	<footer id="colophon" class="site-footer" role="contentinfo">
    
    	<div class="responsive-container">
            	
            <div class="site-info">
            
            
                <?php do_action( 'BizKit_credits' ); ?>
                <h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h3>
                <p><?php _e('&copy; All rights reserved.', 'BizKit') ?></p>
                <?php if( is_home() || is_front_page() ): ?>
                <p><?php printf( __( 'Designed by: %1$s.', 'BizKit' ), '<a href="http://www.themealley.com/" rel="designer">ThemeAlley.com</a>' ); ?></p>
                <?php endif; ?>
                <p>Powered by <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'BizKit' ); ?>" rel="generator"><?php printf( __( '%s', 'BizKit' ), 'WordPress' ); ?></a></p>
                <div class="footer-search"><?php get_search_form(); ?></div>

                
            </div><!-- .site-info -->
            
            <div class="footer-widget-two">
            	<?php if ( dynamic_sidebar('footer-left') ); ?>
            </div>
            
            
            <div class="footer-widget-two">
            	<?php if ( dynamic_sidebar('footer-right') ); ?>             
            </div>            
            
    	</div><!-- #Responsive-Container -->
                    
	</footer><!-- #colophon -->