<div class="eone">

		<?php if( !of_get_option('show_eone_welcome_section') || of_get_option('show_eone_welcome_section') == 'true' ) : ?>
        <div class="eone-welcome">
        
            <h1>
                <?php 
                    if( of_get_option('eone_welcome_headline') ){
                        echo esc_html( of_get_option('eone_welcome_headline') );
                    }else {
                        _e('Welcome Headline Comes Here',  'alexandria');
                    }
                ?>    
            </h1>
            
            <div>
                <?php 
                    if( of_get_option('eone_welcome_text') ){
                        echo of_get_option('eone_welcome_text');
                    }else {
                        _e('You can change this text in welcome text box of welcome section block in Biz one tab of theme options page. You can change this text in welcome text box of welcome section block in Biz two tab of theme options page.',  'alexandria');
                    }
                ?>                                
            </div>    
        
        </div><!-- .eone-welcome -->
        <?php endif; ?>
        
        
        <div class="eone-latest-products">
        
        		<div class="eone-latest-products-heading">
                	<h2>
						<?php 
                            if( of_get_option('eone_latest_section_headline') ){
                                echo of_get_option('eone_latest_section_headline');
                            }else {
                                _e('Latest Products',  'alexandria');
                            }
                        ?>                    
                    </h2>
                </div><!-- .eone-latest-products-heading -->
            
				<?php
                    
					if(of_get_option('eone_latest_section_num')){
						$ecom_one_num = of_get_option('eone_latest_section_num');
					}else{
						$ecom_one_num = 10;	
					}
					
					$ecom_one = array(
                        'post_type' => 'product',
						'posts_per_page' => $ecom_one_num,
                    );
                    $ecom_one_list_of_posts = new WP_Query( $ecom_one );
                ?>        
                
                    <?php if ( $ecom_one_list_of_posts->have_posts() ) : ?>
                    
						<?php $ecom_one_itemnum = 0; while ( $ecom_one_list_of_posts->have_posts() ) : $ecom_one_list_of_posts->the_post(); $ecom_one_itemnum++ ?>
                        
                        <div class="<?php if((($ecom_one_itemnum - 1) % 3 ) == 0){ echo "clear-both"; } ?> eone-product">
                        
                            <div class="eone-product-image">
                                <?php 
                                
                                    if(has_post_thumbnail()){
                                        the_post_thumbnail('alexandriathumb');
                                    }else{
                                        echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/ecomimg.png"  />';
                                    }
                                    
                                ?>
                            </div><!-- .eone-product-image -->
                            
                            <div class="eone-product-content">
                            
                                <?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
                                
                                <div class="eone-product-content-description">
                                    <?php the_excerpt(); ?>
                                </div><!-- .eone-product-content-description -->
                                
                            </div><!-- .eone-product-content --> 
                            
                            <div class="eone-product-price">
                                    <?php 
                                        $ecom_product = new WC_Product( get_the_ID() );
                                        $ecom_price = $ecom_product->get_price_html();
                                        if( $ecom_price ){
                                        echo '<p><span>'.$ecom_price.'</span></p>';
                                        }
                                    ?>                	
                            </div><!-- .eone-product-price -->
                            
                            <div class="eone-product-buy">
                            
                                <span><a href="<?php echo esc_url( get_permalink() ); ?>">
                                	<?php
										if(of_get_option('eone_latest_section_buy_text')){
											echo of_get_option('eone_latest_section_buy_text');
										}else{
											_e('View Details',  'alexandria');	
										}									
									?>                                
                                </a></span>
                            
                            </div><!-- .eone-product-buy -->
                        
                        </div><!-- .eone-product -->
                        
                        <?php endwhile; ?>
                        
                        <?php alexandria_ecom_content_nav( 'ecom-nav-below' ); ?>
                    
                    <?php else : ?>
                    
                    	<p>No products to show.</p>
                        
                    <?php endif; ?>             
            
        </div><!-- .eone-latest-products -->        
        
        
</div><!-- .eone -->  