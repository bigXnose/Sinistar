<?php
/**
 * The front page file.
 *
 * @package alexandria
 */

get_header(); ?>

	<?php 
		
		if( !of_get_option('homepage_layout') || of_get_option('homepage_layout') == 'bone' ) {
			get_template_part( 'index', 'bone' ); 
		}elseif( of_get_option('homepage_layout') == 'btwo' ) {
			get_template_part( 'index', 'btwo' ); 
		}elseif( of_get_option('homepage_layout') == 'bfour' ) {
			get_template_part( 'index', 'bfour' ); 
		}elseif( of_get_option('homepage_layout') == 'eone' ) {
			get_template_part( 'index', 'eone' ); 
		}else{	
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}
		}
		
	?>

<?php get_footer(); ?>