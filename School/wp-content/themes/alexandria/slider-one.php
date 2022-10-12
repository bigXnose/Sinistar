    <div id="feature" class="site-slider">
    
    	<div class="responsive-container"> 
        
        	<div class="site-slider-slider-one">
            
            	<div class="site-slider-slider-one-image">
                
					<?php 
                        if( of_get_option('slider_one_image') ){
                            echo '<img class="" src="'.esc_url( of_get_option('slider_one_image') ).'" />';
                        }else {
                          	echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg.png"  />';
                       }
                    ?>                 
                
                </div><!-- .site-slider-slider-one-image -->
                
            	<div class="site-slider-slider-one-text">
                
                	<h1 class="site-slider-slider-one-text-heading">
						<?php 
                            if( of_get_option('slider_one_headline') ){
                                 echo esc_html( of_get_option('slider_one_headline') );
                            }else {
								 _e('Responsive Business & Ecommerce Theme',  'alexandria');
                            }
                       ?>                      
                    </h1>
                    <p class="site-slider-slider-one-text-description">
						<?php 
                            if( of_get_option('slider_one_text') ){
                               echo esc_html( of_get_option('slider_one_text') );
                            }else {
                               _e('You can change this text in Slider One settings tab of theme options page. Write something awesome to make your website ridiculously fabulous.',  'alexandria');
                            }
                        ?>                     
                    </p>
                    <p class="site-slider-slider-one-text-button">
                        <a href="<?php if( of_get_option('slider_one_cta_link') ){ echo esc_url( of_get_option('slider_one_cta_link') );}else { echo '#';}?>">
							<?php 
                                if( of_get_option('slider_one_cta') ){
                                    echo esc_attr( of_get_option('slider_one_cta') );
                                }else {
									_e('Continue Reading',  'alexandria');
                                }
                            ?>
                        </a>                    
                    </p>
                
                </div><!-- .site-slider-slider-one-text -->                

    		</div><!-- .site-slider-slider-one -->
        
    	</div><!-- #Responsive-Container -->           
    
    </div><!-- #banner -->