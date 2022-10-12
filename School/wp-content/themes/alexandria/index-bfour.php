<div class="bizfour">

        <div class="bizfour-welcome">
        
            <h1>
                <?php 
                    if( of_get_option('welcome_headline_bfour') ){
                        echo esc_html( of_get_option('welcome_headline_bfour') );
                    }else {
                        _e('Welcome Headline Comes Here',  'alexandria');
                    }
                ?>    
            </h1>
            
            <p>
                <?php 
                    if( of_get_option('welcome_text_bfour') ){
                        echo esc_html( of_get_option('welcome_text_bfour') );
                    }else {
                        _e('You can change this text in welcome text box of welcome section block in Biz one tab of theme options page. You can change this text in welcome text box of welcome section block in Biz two tab of theme options page.',  'alexandria');
                    }
                ?>                                
            </p>    
        
        </div><!-- .bizfour-welcome -->
        
        <div class="bizfour-products-services">
        
            <div class="bizfour-products-services-item">
            
                <div class="bizfour-products-services-img">
                
                                            <a href="<?php if( of_get_option('left_section_link_bfour') ){ echo esc_url( of_get_option('left_section_link_bfour') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('left_section_headline_bfour') ) ? $bizone_left_section_alt = 'alt="'.esc_attr( of_get_option('left_section_headline_bfour') ).'"' : $bizone_left_section_alt = '';
												
												if( of_get_option('left_section_image_bfour') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('left_section_image_bfour') ).'"'.$bizone_left_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>                                    
                                            </a>        
                
                </div><!-- .bizfour-products-services-img -->
                
                <div class="bizfour-products-services-name">
                                                    <a href="<?php if( of_get_option('left_section_link_bfour') ){ echo esc_url( of_get_option('left_section_link_bfour') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('left_section_headline_bfour') ){
                                                            echo esc_html( of_get_option('left_section_headline_bfour') );
                                                        }else {
                                                            _e('Design',  'alexandria');
                                                        }
                                                    ?> 
                                                    </a>        
                </div><!-- .bizfour-products-services-name -->
                
                <div class="bizfour-products-services-description">
                                                    <?php 
                                                        if( of_get_option('left_section_text_bfour') ){
                                                            echo esc_html( of_get_option('left_section_text_bfour') );
                                                        }else {
                                                            _e('You can change this text in description box of left section block in Biz one tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>        
                </div><!-- .bizfour-products-services-description -->                
            
            </div><!-- .bizfour-products-services-item -->
            
            <div class="bizfour-products-services-item">
            
                <div class="bizfour-products-services-img">
                                            <a href="<?php if( of_get_option('center_left_section_link_bfour') ){ echo esc_url( of_get_option('center_left_section_link_bfour') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('center_left_section_headline_bfour') ) ? $bizone_center_section_alt = 'alt="'.esc_attr( of_get_option('center_left_section_headline_bfour') ).'"' : $bizone_left_section_alt = '';
												
												if( of_get_option('center_left_section_image_bfour') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('center_left_section_image_bfour') ).'"'.$bizone_center_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>
                                            </a>        
                </div><!-- .bizfour-products-services-img -->
                
                <div class="bizfour-products-services-name">
                                                    <a href="<?php if( of_get_option('center_left_section_link_bfour') ){ echo esc_url( of_get_option('center_left_section_link_bfour') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('center_left_section_headline_bfour') ){
                                                            echo esc_html( of_get_option('center_left_section_headline_bfour') );
                                                        }else {
                                                            _e('Development',  'alexandria');
                                                        }
                                                    ?>
                                                    </a>       
                </div><!-- .bizfour-products-services-name -->
                
                <div class="bizfour-products-services-description">
                                                    <?php 
                                                        if( of_get_option('center_left_section_text_bfour') ){
                                                            echo esc_html( of_get_option('center_left_section_text_bfour') );
                                                        }else {
                                                            _e('You can change this text in description box of center section block in Biz one tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>       
                </div><!-- .bizfour-products-services-description -->                
            
            </div><!-- .bizfour-products-services-item -->
            
            
            
            
            <div class="bizfour-products-services-item">
            
                <div class="bizfour-products-services-img">
                                            <a href="<?php if( of_get_option('center_right_section_link_bfour') ){ echo esc_url( of_get_option('center_right_section_link_bfour') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('center_right_section_headline_bfour') ) ? $bizone_center_section_alt = 'alt="'.esc_attr( of_get_option('center_right_section_headline_bfour') ).'"' : $bizone_left_section_alt = '';
												
												if( of_get_option('center_right_section_image_bfour') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('center_right_section_image_bfour') ).'"'.$bizone_center_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>
                                            </a>        
                </div><!-- .bizfour-products-services-img -->
                
                <div class="bizfour-products-services-name">
                                                    <a href="<?php if( of_get_option('center_right_section_link_bfour') ){ echo esc_url( of_get_option('center_right_section_link_bfour') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('center_right_section_headline_bfour') ){
                                                            echo esc_html( of_get_option('center_right_section_headline_bfour') );
                                                        }else {
                                                            _e('Hosting',  'alexandria');
                                                        }
                                                    ?>
                                                    </a>       
                </div><!-- .bizfour-products-services-name -->
                
                <div class="bizfour-products-services-description">
                                                    <?php 
                                                        if( of_get_option('center_right_section_text_bfour') ){
                                                            echo esc_html( of_get_option('center_right_section_text_bfour') );
                                                        }else {
                                                            _e('You can change this text in description box of center section block in Biz one tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>       
                </div><!-- .bizfour-products-services-description -->                
            
            </div><!-- .bizfour-products-services-item -->
            
            
                        
            
            <div class="bizfour-products-services-item">
            
                <div class="bizfour-products-services-img">
                                            <a href="<?php if( of_get_option('right_section_link_bfour') ){ echo esc_url( of_get_option('right_section_link_bfour') );}else { echo '#';}?>">
                                            <?php 
                                                
												( of_get_option('right_section_headline_bfour') ) ? $bizone_right_section_alt = 'alt="'.esc_attr( of_get_option('right_section_headline_bfour') ).'"' : $bizone_right_section_alt = '';
												
												if( of_get_option('right_section_image_bfour') ){
                                                    echo '<img class="" src="'.esc_url( of_get_option('right_section_image_bfour') ).'"'.$bizone_right_section_alt.' />';
                                                }else {
                                                    echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                                }
												
                                            ?>
                                            </a>        
                </div><!-- .bizfour-products-services-img -->
                
                <div class="bizfour-products-services-name">
                                                    <a href="<?php if( of_get_option('right_section_link_bfour') ){ echo esc_url( of_get_option('right_section_link_bfour') );}else { echo '#';}?>">
                                                    <?php 
                                                        if( of_get_option('right_section_headline_bfour') ){
                                                            echo esc_html( of_get_option('right_section_headline_bfour') );
                                                        }else {
                                                            _e('Marketing',  'alexandria');
                                                        }
                                                    ?>
                                                    </a>        
                </div><!-- .bizfour-products-services-name -->
                
                <div class="bizfour-products-services-description">
                                                    <?php 
                                                        if( of_get_option('right_section_text_bfour') ){
                                                            echo esc_html( of_get_option('right_section_text_bfour') );
                                                        }else {
                                                            _e('You can change this text in description box of right section block in Biz one tab of theme options page.',  'alexandria');
                                                        }
                                                    ?>        
                </div><!-- .bizfour-products-services-description -->                
            
            </div><!-- .bizfour-products-services-item -->        
        
        </div><!-- .bizfour-products-services -->
        
        <?php if( !of_get_option('show_alexandria_quote_bfour') || of_get_option('show_alexandria_quote_bfour') == 'true' ) : ?>
        <div class="bizfour-quote">
        
            <div class="bizfour-quote-text">
                
                <p>
                    <?php 
                         if( of_get_option('quote_section_text_bfour') ){
                              echo esc_html( of_get_option('quote_section_text_bfour') );
                         }else {
                              _e('You can change this text in quote box of quote section block in Biz one tab of theme options page. You can change this text in quote box of quote section block in Biz one tab of theme options page.',  'alexandria');
                         }
                    ?>
                </p> 
                    
            </div><!-- .bizfour-quote-text -->
            
            <p class="bizfour-quote-name">
            
                <span>
                    <?php 
                        if( of_get_option('quote_section_name_bfour') ){
                             echo esc_attr( of_get_option('quote_section_name_bfour') );
                        }else {
                             _e('Mac Taylor',  'alexandria');
                        }
                    ?>
                </span>   
            </p>    
        
        </div><!-- .bizfour-quote -->
        <?php endif; ?>
		
</div><!-- .bizfour -->  

<?php if( !of_get_option('show_bizone_posts_bfour') || of_get_option('show_bizone_posts_bfour') == 'true' ) : ?>
<div class="bizfour">
	
		<?php 
			
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}			 
			
		?>
		
</div><!-- .bizfour -->
<?php endif; ?>  