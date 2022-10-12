<div class="biznine">

	<?php if( !of_get_option('show_bnine_products_section') || of_get_option('show_bnine_products_section') == 'true' ) : ?>
	<div class="biznine-products">
    
		<div class="biznine-products-item biznine-products-item-x-y">
        
             <div class="biznine-products-item-title">
                  <a href="
                  	<?php
						if( of_get_option('bnine_left_section_link') ){
							echo esc_url( of_get_option('bnine_left_section_link') );
						}else{
							echo "#";
						}
					?>
                  ">
                  	<?php
						if( of_get_option('bnine_left_section_headline') ){
							echo esc_html( of_get_option('bnine_left_section_headline') );
						}else{
							_e('Design',  'BizKit');
						}
					?>                  
                  </a>
             </div><!-- .biznine-products-item-title -->
                            
             <div class="biznine-products-item-desc">
             
                  	<?php
						if( of_get_option('bnine_left_section_text') ){
							echo esc_html( of_get_option('bnine_left_section_text') );
						}else{
							_e('You can change this text in Biz Nine settings tab of theme options page. You can change this text in Biz Nine settings tab of theme options page.',  'BizKit');
						}
					?>             
                                               
             </div><!-- .biznine-products-item-desc -->
                            
             <div class="biznine-products-item-image">
                  	<?php
						if( of_get_option('bnine_left_section_image') ){
							echo '<img class="" src="'.of_get_option('bnine_left_section_image').'"  />';
						}else{
							echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
						}
					?>              
             </div><!-- .biznine-products-item-image -->                       
                        
        </div><!-- .biznine-products-item -->
    
		<div class="biznine-products-item biznine-products-item-x-y">
        
             <div class="biznine-products-item-title">
                  <a href="
                  	<?php
						if( of_get_option('bnine_center_section_link') ){
							echo esc_url( of_get_option('bnine_center_section_link') );
						}else{
							echo "#";
						}
					?>
                  ">
                  	<?php
						if( of_get_option('bnine_center_section_headline') ){
							echo esc_html( of_get_option('bnine_center_section_headline') );
						}else{
							_e('Development',  'BizKit');
						}
					?>                  
                  </a>
             </div><!-- .biznine-products-item-title -->
                            
             <div class="biznine-products-item-desc">
             
                  	<?php
						if( of_get_option('bnine_center_section_text') ){
							echo esc_html( of_get_option('bnine_center_section_text') );
						}else{
							_e('You can change this text in Biz Nine settings tab of theme options page. You can change this text in Biz Nine settings tab of theme options page.',  'BizKit');
						}
					?>             
                                               
             </div><!-- .biznine-products-item-desc -->
                            
             <div class="biznine-products-item-image">
                  	<?php
						if( of_get_option('bnine_center_section_image') ){
							echo '<img class="" src="'.of_get_option('bnine_center_section_image').'"  />';
						}else{
							echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
						}
					?>              
             </div><!-- .biznine-products-item-image -->                       
                        
        </div><!-- .biznine-products-item -->
        
		<div class="biznine-products-item biznine-products-item-x-y">
        
             <div class="biznine-products-item-title">
                  <a href="
                  	<?php
						if( of_get_option('bnine_right_section_link') ){
							echo esc_url( of_get_option('bnine_right_section_link') );
						}else{
							echo "#";
						}
					?>
                  ">
                  	<?php
						if( of_get_option('bnine_right_section_headline') ){
							echo esc_html( of_get_option('bnine_right_section_headline') );
						}else{
							_e('Marketing',  'BizKit');
						}
					?>                  
                  </a>
             </div><!-- .biznine-products-item-title -->
                            
             <div class="biznine-products-item-desc">
             
                  	<?php
						if( of_get_option('bnine_right_section_text') ){
							echo esc_html( of_get_option('bnine_right_section_text') );
						}else{
							_e('You can change this text in Biz Nine settings tab of theme options page. You can change this text in Biz Nine settings tab of theme options page.',  'BizKit');
						}
					?>             
                                               
             </div><!-- .biznine-products-item-desc -->
                            
             <div class="biznine-products-item-image">
                  	<?php
						if( of_get_option('bnine_right_section_image') ){
							echo '<img class="" src="'.of_get_option('bnine_right_section_image').'"  />';
						}else{
							echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
						}
					?>              
             </div><!-- .biznine-products-item-image -->                       
                        
        </div><!-- .biznine-products-item -->
                        
    </div><!-- .biznine-products -->        
    <?php endif; ?>
    
    <?php if( !of_get_option('bnine_show_quote_section') || of_get_option('bnine_show_quote_section') == 'true' ) : ?>
	<div class="biznine-quote">
    
            <div class="biznine-quote-text">
                
                <p>"
                  	<?php
						if( of_get_option('bnine_quote_text') ){
							echo esc_html( of_get_option('bnine_quote_text') );
						}else{
							_e('You can change this text in Biz Nine settings tab of theme options page. You can change this text in Biz Nine settings tab of theme options page.',  'BizKit');
						}
					?>				
                "</p> 
                    
            </div><!-- .biz0neplus-quote-text -->
            
            <p class="biznine-quote-name">
            
                <span>
                  	<?php
						if( of_get_option('bnine_quote_name') ){
							echo esc_html( of_get_option('bnine_quote_name') );
						}else{
							_e('Mac Taylor',  'BizKit');
						}
					?>
                </span>   
            </p>     
    
    </div><!-- .biznine-quote -->  
    <?php endif; ?>
    
    <?php if( !of_get_option('bnine_show_about_section') || of_get_option('bnine_show_about_section') == 'true' ) : ?>
	<div class="biznine-about">
    
    	<div class="biznine-about-inner">
    
            <h1>
                  	<?php
						if( of_get_option('bnine_about_headline') ){
							echo esc_html( of_get_option('bnine_about_headline') );
						}else{
							_e('About Us',  'BizKit');
						}
					?>   
            </h1>
            
            <div class="biznine-about-inner-content">
                  	<?php
						if( of_get_option('bnine_about_text') ){
							echo esc_html( of_get_option('bnine_about_text') );
						}else{
							_e('You can change this text in Biz Nine settings tab of theme options page. You can change this text in Biz Nine settings tab of theme options page.',  'BizKit');
						}
					?>                               
            </div>
            
       </div>    
    
    </div><!-- .biznine-about -->  
    <?php endif; ?>
    
</div><!-- .biznine -->

<?php if( !of_get_option('show_biznine_posts') || of_get_option('show_biznine_posts') == 'true' ) : ?>
<div class="biznine">
	
		<?php 
			
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}			 
			
		?>
		
</div><!-- .biz0ne -->
<?php endif; ?>