				<?php 
				
					if( of_get_option('header_slider') == 'cheader' ) {
						get_template_part( 'slider', 'cheader' ); 
					}else{
						get_template_part( 'slider', 'one' ); 
					}
					
				?>