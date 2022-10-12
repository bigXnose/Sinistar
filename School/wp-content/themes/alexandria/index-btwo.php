<div class="biztwo">

	<div class="biztwo-products-container">
    
        <div class="biztwo-welcome">
        
            <h1>
                                <?php 
									if( of_get_option('biztwo_welcome_headline') ){
										echo esc_html( of_get_option('biztwo_welcome_headline') );
									}else {
										_e('Welcome Headline Comes Here',  'alexandria');
									}
								?>    
            </h1>
            
            <p>
                                <?php 
									if( of_get_option('biztwo_welcome_text') ){
										echo esc_html( of_get_option('biztwo_welcome_text') );
									}else {
										_e('You can change this text in welcome text box of welcome section block in Biz two tab of theme options page. You can change this text in welcome text box of welcome section block in Biz two tab of theme options page.',  'alexandria');
									}
								?>                                
            </p>    
        
        </div><!-- .biztwo-welcome -->
        
        <div class="biztwo-products-services">
        
                <div class="biztwo-products-services-item">
                
                    <div class="biztwo-products-services-img">
                                            <a href="<?php if( of_get_option('biztwo_left_section_link') ){ echo esc_url( of_get_option('biztwo_left_section_link') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('biztwo_left_section_headline') ) ? $biztwo_left_section_alt = 'alt="'.esc_attr( of_get_option('biztwo_left_section_headline') ).'"' : $biztwo_left_section_alt = '';
												
												if( of_get_option('biztwo_left_section_image') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('biztwo_left_section_image') ).'"'.$biztwo_left_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>                                    
                                            </a>            
                    </div><!-- .biztwo-products-services-img -->
                    
                    <div class="biztwo-products-services-content">
                    
                        <p class="biztwo-products-services-name">
                                                    <a href="<?php if( of_get_option('biztwo_left_section_link') ){ echo esc_url( of_get_option('biztwo_left_section_link') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('biztwo_left_section_headline') ){
                                                            echo esc_html( of_get_option('biztwo_left_section_headline') );
                                                        }else {
                                                            _e('Design',  'alexandria');
                                                        }
                                                    ?> 
                                                    </a>                
                        </p><!-- .biztwo-products-services-name -->
                        
                        <p class="biztwo-products-services-description">
                                                    <?php 
                                                        if( of_get_option('biztwo_left_section_text') ){
                                                            echo esc_html( of_get_option('biztwo_left_section_text') );
                                                        }else {
                                                            _e('You can change this text in description box of left section block in Biz two tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>                
                        </p><!-- .biztwo-products-services-description -->                
                    
                    </div><!-- .biztwo-products-services-content -->
                
                </div><!-- .biztwo-products-services-item --> 
                
                
                
                <div class="biztwo-products-services-item">
                
                    <div class="biztwo-products-services-img">
        
                                            <a href="<?php if( of_get_option('biztwo_center_section_link') ){ echo esc_url( of_get_option('biztwo_center_section_link') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('biztwo_center_section_headline') ) ? $biztwo_center_section_alt = 'alt="'.esc_attr( of_get_option('biztwo_center_section_headline') ).'"' : $biztwo_center_section_alt = '';												
												
												if( of_get_option('biztwo_center_section_image') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('biztwo_center_section_image') ).'"'.$biztwo_center_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>
                                            </a> 
                   
                    </div><!-- .biztwo-products-services-img --> 
                    
                    <div class="biztwo-products-services-content">
                    
                        <p class="biztwo-products-services-name">
                       
                                                    <a href="<?php if( of_get_option('biztwo_center_section_link') ){ echo esc_url( of_get_option('biztwo_center_section_link') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('biztwo_center_section_headline') ){
                                                            echo esc_html( of_get_option('biztwo_center_section_headline') );
                                                        }else {
                                                            _e('Development',  'alexandria');
                                                        }
                                                    ?>
                                                    </a>               
                       
                        </p><!-- .biztwo-products-services-name -->
                        
                        <p class="biztwo-products-services-description">
                        
                                                    <?php 
                                                        if( of_get_option('biztwo_center_section_text') ){
                                                            echo esc_html( of_get_option('biztwo_center_section_text') );
                                                        }else {
                                                            _e('You can change this text in description box of center section block in Biz two tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>                
                        
                        </p><!-- .biztwo-products-services-description -->                
                    
                    </div><!-- .biztwo-products-services-content -->                   
                
                </div><!-- .biztwo-products-services-item -->
                
                
                
                <div class="biztwo-products-services-item">
                
                    <div class="biztwo-products-services-img">
                   
                                            <a href="<?php if( of_get_option('biztwo_right_section_link') ){ echo esc_url( of_get_option('biztwo_right_section_link') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('biztwo_right_section_headline') ) ? $biztwo_right_section_alt = 'alt="'.esc_attr( of_get_option('biztwo_right_section_headline') ).'"' : $biztwo_right_section_alt = '';	
												
												if( of_get_option('biztwo_right_section_image') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('biztwo_right_section_image') ).'"'.$biztwo_right_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>
                                            </a>           
                   
                    </div><!-- .biztwo-products-services-img --> 
                    
                    <div class="biztwo-products-services-content">
                    
                        <p class="biztwo-products-services-name">
                       
                                                    <a href="<?php if( of_get_option('biztwo_right_section_link') ){ echo esc_url( of_get_option('biztwo_right_section_link') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('biztwo_right_section_headline') ){
                                                            echo esc_html( of_get_option('biztwo_right_section_headline') );
                                                        }else {
                                                            _e('Marketing',  'alexandria');
                                                        }
                                                    ?>
                                                    </a>               
                       
                        </p><!-- .biztwo-products-services-name -->
                        
                        <p class="biztwo-products-services-description">
                        
                                                    <?php 
                                                        if( of_get_option('biztwo_right_section_text') ){
                                                            echo esc_html( of_get_option('biztwo_right_section_text') );
                                                        }else {
                                                            _e('You can change this text in description box of right section block in Biz two tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>                
                        
                        </p><!-- .biztwo-products-services-description -->                
                    
                    </div><!-- .biztwo-products-services-content -->                   
                
                </div><!-- .biztwo-products-services-item -->                

		</div><!-- .biztwo-products-services -->
        
        <?php if( !of_get_option('show_alexandria_quote_biztwo') || of_get_option('show_alexandria_quote_biztwo') == 'true' ) : ?>
        <div class="biztwo-quote">
        
            <div class="biz0ne-quote-text">
                
                <p>
                    <?php 
                         if( of_get_option('biztwo_quote_section_text') ){
                              echo esc_html( of_get_option('biztwo_quote_section_text') );
                         }else {
                              _e('You can change this text in quote box of quote section block in Biz two tab of theme options page. You can change this text in quote box of quote section block in Biz two tab of theme options page.',  'alexandria');
                         }
                    ?>
                </p> 
                    
            </div><!-- .biz0ne-quote-text -->
            
            <p class="biz0ne-quote-name">
            
                <span>
                    <?php 
                        if( of_get_option('biztwo_quote_section_name') ){
                             echo esc_attr( of_get_option('biztwo_quote_section_name') );
                        }else {
                             _e('Mac Taylor',  'alexandria');
                        }
                    ?>
                </span>   
            </p>          
        
        </div><!-- .biztwo-quote -->
        <?php endif; ?>

	</div><!-- .biztwo-products -->
    
	<div class="biztwo-portfolio-container">
    
    	<div class="biztwo-portfolio">
        
        	<div class="biztwo-portfolio-heading"><?php _e('Portfolio',  'alexandria'); ?></div>
            
            <?php if( of_get_option('biztwo_port_one_image') ) : ?>
            <div class="biztwo-portfolio-item">
            
            	
            	<p class="biztwo-portfolio-item-image">
                	<img src="<?php echo esc_url( of_get_option('biztwo_port_one_image') ); ?>" <?php if( of_get_option('biztwo_port_one_name') ) { echo 'alt="'.esc_attr( of_get_option('biztwo_port_one_name') ).'"'; } ?> />
                </p>
                
                <?php if( of_get_option('biztwo_port_one_name') ) : ?>
            	<p class="biztwo-portfolio-item-name">
                                        <?php if( of_get_option('biztwo_port_one_link') ) : ?>
                                        <a href="<?php echo esc_url( of_get_option('biztwo_port_one_link') ); ?>">
                                            <?php echo esc_attr( of_get_option('biztwo_port_one_name') ); ?>
                                        </a>
                                        <?php else : ?>
                                            <?php echo esc_attr( of_get_option('biztwo_port_one_name') ); ?>
                                        <?php endif; ?>                
                </p>
                <?php endif; ?>               
            
            </div><!-- .biztwo-portfolio-item -->
            <?php endif; ?>
            
            
            <?php if( of_get_option('biztwo_port_two_image') ) : ?>
            <div class="biztwo-portfolio-item">
            
            	
            	<p class="biztwo-portfolio-item-image">
                	<img src="<?php echo esc_url( of_get_option('biztwo_port_two_image') ); ?>" <?php if( of_get_option('biztwo_port_two_name') ) { echo 'alt="'.esc_attr( of_get_option('biztwo_port_two_name') ).'"'; } ?> />
                </p>
                
                <?php if( of_get_option('biztwo_port_two_name') ) : ?>
            	<p class="biztwo-portfolio-item-name">
                                        <?php if( of_get_option('biztwo_port_two_link') ) : ?>
                                        <a href="<?php echo esc_url( of_get_option('biztwo_port_two_link') ); ?>">
                                            <?php echo esc_attr( of_get_option('biztwo_port_two_name') ); ?>
                                        </a>
                                        <?php else : ?>
                                            <?php echo esc_attr( of_get_option('biztwo_port_two_name') ); ?>
                                        <?php endif; ?>                
                </p>
                <?php endif; ?>               
            
            </div><!-- .biztwo-portfolio-item -->
            <?php endif; ?>
            
            
            <?php if( of_get_option('biztwo_port_three_image') ) : ?>
            <div class="biztwo-portfolio-item">
            
            	
            	<p class="biztwo-portfolio-item-image">
                	<img src="<?php echo esc_url( of_get_option('biztwo_port_three_image') ); ?>" <?php if( of_get_option('biztwo_port_three_name') ) { echo 'alt="'.esc_attr( of_get_option('biztwo_port_three_name') ).'"'; } ?> />
                </p>
                
                <?php if( of_get_option('biztwo_port_three_name') ) : ?>
            	<p class="biztwo-portfolio-item-name">
                                        <?php if( of_get_option('biztwo_port_three_link') ) : ?>
                                        <a href="<?php echo esc_url( of_get_option('biztwo_port_three_link') ); ?>">
                                            <?php echo esc_attr( of_get_option('biztwo_port_three_name') ); ?>
                                        </a>
                                        <?php else : ?>
                                            <?php echo esc_attr( of_get_option('biztwo_port_three_name') ); ?>
                                        <?php endif; ?>                
                </p>
                <?php endif; ?>               
            
            </div><!-- .biztwo-portfolio-item -->
            <?php endif; ?>
            
            
            <?php if( of_get_option('biztwo_port_four_image') ) : ?>
            <div class="biztwo-portfolio-item">
            
            	
            	<p class="biztwo-portfolio-item-image">
                	<img src="<?php echo esc_url( of_get_option('biztwo_port_four_image') ); ?>" <?php if( of_get_option('biztwo_port_four_name') ) { echo 'alt="'.esc_attr( of_get_option('biztwo_port_four_name') ).'"'; } ?> />
                </p>
                
                <?php if( of_get_option('biztwo_port_four_name') ) : ?>
            	<p class="biztwo-portfolio-item-name">
                                        <?php if( of_get_option('biztwo_port_four_link') ) : ?>
                                        <a href="<?php echo esc_url( of_get_option('biztwo_port_four_link') ); ?>">
                                            <?php echo esc_attr( of_get_option('biztwo_port_four_name') ); ?>
                                        </a>
                                        <?php else : ?>
                                            <?php echo esc_attr( of_get_option('biztwo_port_four_name') ); ?>
                                        <?php endif; ?>                
                </p>
                <?php endif; ?>               
            
            </div><!-- .biztwo-portfolio-item -->
            <?php endif; ?>                                    
        
        </div>

	</div><!-- .biztwo-portfolio -->    

</div><!-- .biztwo -->

<?php if( !of_get_option('show_biztwo_posts') || of_get_option('show_biztwo_posts') == 'true' ) : ?>
<div class="biztwo">
	
		<?php 
			
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}			 
			
		?>
		
</div><!-- .biztwo -->
<?php endif; ?> 