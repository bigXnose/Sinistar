<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'BizKit';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$magpro_slider_start = array("false" => __("No", 'BizKit' ),"true" => __("Yes", 'BizKit' ));
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Select a page:', 'BizKit' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select a Skin", 'BizKit' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Select a Skin", 'BizKit' ),
										"desc" => __("If you are not using child theme, selecting child theme will be same as using BizKit skin. If you are using child theme, then lite.css from the child theme will be used.", 'BizKit' ),
										"id" => "skin_style",
										"type" => "images",
										"std" => "verve",
										"options" => array(
											'verve' => $imagepath . 'verve.png',
											'radi' => $imagepath . 'radi.png',
											'gray' => $imagepath . 'blue.png',
											'green' => $imagepath . 'green.png',
											'aqua' => $imagepath . 'aqua.png',
											'grunge' => $imagepath . 'grunge.png',
											'child' => $imagepath . 'child.png')
										);						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Single Post Settings", 'BizKit' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Featured Image?", 'BizKit' ),
										"desc" => __("Select yes if you want to show featured image.", 'BizKit' ),
										"id" => "show_featured_image_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Ratings?", 'BizKit' ),
										"desc" => __("Select yes if you want to show ratings under post title.", 'BizKit' ),
										"id" => "show_rat_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);										
										
					$options[] = array( "name" => __("Show Posted by and Date?", 'BizKit' ),
										"desc" => __("Select yes if you want to show Posted by and Date under post title.", 'BizKit' ),
										"id" => "show_pd_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
					$options[] = array( "name" => __("Show Categories and Tags?", 'BizKit' ),
										"desc" => __("Select yes if you want to show categories under post title.", 'BizKit' ),
										"id" => "show_cats_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'BizKit' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'BizKit' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
																																							
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'BizKit' ),
										"desc" => __("Enter your twitter id", 'BizKit' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'BizKit' ),
										"desc" => __("Enter your reddit url", 'BizKit' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'BizKit' ),
										"desc" => __("Enter your facebook url", 'BizKit' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'BizKit' ),
										"desc" => __("Enter your stumbleupon url", 'BizKit' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'BizKit' ),
										"desc" => __("Enter your flickr url", 'BizKit' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'BizKit' ),
										"desc" => __("Enter your linkedin url", 'BizKit' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'BizKit' ),
										"desc" => __("Enter your google url", 'BizKit' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");

	$options[] = array( "name" => "country10",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Logo Section Settings", 'BizKit' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Logo Upload", 'BizKit' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'BizKit' ),
										"desc" => __("Upload your logo here.", 'BizKit' ),
										"id" => "logo_layout_upload",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");							
		
		$options[] = array( "name" => __("Logo Section Layout", 'BizKit' ),
							"type" => "groupcontaineropen");	

					
				$options[] = array( "name" => __("Select a layout", 'BizKit' ),
										"desc" => __("Images for logo section.", 'BizKit' ),
										"id" => "logo_layout_style",
										"type" => "images",
										"std" => "onebone",
										"options" => array(
											'sbys' => $imagepath . 'logo1.png',
											'onebone' => $imagepath . 'logo2.png')
										);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Header On/Off Settings", 'BizKit' ),
							"type" => "groupcontaineropen");	
					
					$options[] = array( "name" => __("Show Header on homepage", 'BizKit' ),
										"desc" => __("Select yes if you want to show Header on homepage.", 'BizKit' ),
										"id" => "show_BizKit_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show Header on Single post page", 'BizKit' ),
										"desc" => __("Select yes if you want to show Header on Single post page.", 'BizKit' ),
										"id" => "show_BizKit_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Pages", 'BizKit' ),
										"desc" => __("Select yes if you want to show Header on Pages.", 'BizKit' ),
										"id" => "show_BizKit_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Category Pages", 'BizKit' ),
										"desc" => __("Select yes if you want to show Header on Category Pages.", 'BizKit' ),
										"id" => "show_BizKit_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Header's/Slider's Available in PRO Version", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following header's/slider's are available in PRO version", 'BizKit' ),
										"desc" => __("Upgrade to PRO version for above header's/Slider's", 'BizKit' ),
										"id" => "header_slider",
										"std" => "one",
										"type" => "proimages",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'slider1.png',
											'videoone' => $imagepath . 'video.png',
											'oneplus' => $imagepath . 'oneplus.png',
											'slidertwo' => $imagepath . 'slidertwo.png',
											'slit' => $imagepath . 'slit.png',
											'fraction' => $imagepath . 'fraction.png',
											'hero' => $imagepath . 'hero.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");		
		
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'BizKit' ),
										"desc" => __("Images for layout.", 'BizKit' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "images",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'bnine' => $imagepath . 'bnine.png',
											'spage' => $imagepath . 'layout2.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Layouts available in PRO Version", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'BizKit' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizKit' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "proimages",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'btwo' => $imagepath . 'layout3.png',
											'boneplus' => $imagepath . 'boneplus.png',
											'bthree' => $imagepath . 'bthree.png',
											'bfour' => $imagepath . 'bfour.png',
											'bfive' => $imagepath . 'bfive.png',
											'bsix' => $imagepath . 'bsix.png',
											'bseven' => $imagepath . 'bseven.png',
											'beight' => $imagepath . 'beight.png',
											'bnine' => $imagepath . 'bnine.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Quote Settings", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Quote?", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Quote 1", 'BizKit' ),
										"desc" => __("Enter the quote text", 'BizKit' ),
										"id" => "show_quote1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 1", 'BizKit' ),
										"desc" => __("Enter the customer name", 'BizKit' ),
										"id" => "show_quote1_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 2", 'BizKit' ),
										"desc" => __("Enter the quote text", 'BizKit' ),
										"id" => "show_quote2",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 2", 'BizKit' ),
										"desc" => __("Enter the customer name", 'BizKit' ),
										"id" => "show_quote2_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 3", 'BizKit' ),
										"desc" => __("Enter the quote text", 'BizKit' ),
										"id" => "show_quote3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 3", 'BizKit' ),
										"desc" => __("Enter the customer name", 'BizKit' ),
										"id" => "show_quote3_cust",
										"type" => "proupgrade");																				
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Client Logos", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Client Logo Section?", 'BizKit' ),
										"desc" => __("Select yes if you want to show client logos.", 'BizKit' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Client Logo # 1", 'BizKit' ),
										"desc" => __("upload the logo", 'BizKit' ),
										"id" => "client_logo1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 2", 'BizKit' ),
										"desc" => __("upload the logo", 'BizKit' ),
										"id" => "client_logo2",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Client Logo # 3", 'BizKit' ),
										"desc" => __("upload the logo", 'BizKit' ),
										"id" => "client_logo3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 4", 'BizKit' ),
										"desc" => __("upload the logo", 'BizKit' ),
										"id" => "client_logo4",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");							
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz One Settings", 'BizKit' ),
							"type" => "tabheading");
																							
						
		$options[] = array( "name" => __("Welcome Section", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "welcome_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "welcome_text",
										"type" => "textarea");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Left Section", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizKit' ),
										"desc" => __("Upload your image here.", 'BizKit' ),
										"id" => "left_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "left_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "left_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'BizKit' ),
										"desc" => __("Enter the link to product or service", 'BizKit' ),
										"id" => "left_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Center Section", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizKit' ),
										"desc" => __("Upload your image here.", 'BizKit' ),
										"id" => "center_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "center_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "center_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Link", 'BizKit' ),
										"desc" => __("Enter the link to product or service", 'BizKit' ),
										"id" => "center_section_link",
										"type" => "text");																							
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Right Section", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizKit' ),
										"desc" => __("Upload your image here.", 'BizKit' ),
										"id" => "right_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "right_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "right_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'BizKit' ),
										"desc" => __("Enter the link to product or service", 'BizKit' ),
										"id" => "right_section_link",
										"type" => "text");																								

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Quote Section", 'BizKit' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote?", 'BizKit' ),
										"desc" => __("Select yes if you want to show quote.", 'BizKit' ),
										"id" => "show_BizKit_quote_bizone",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);								
					
					$options[] = array( "name" => __("Quote", 'BizKit' ),
										"desc" => __("Enter the Quote Text", 'BizKit' ),
										"id" => "quote_section_text",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Customer Name", 'BizKit' ),
										"desc" => __("Enter the customer name", 'BizKit' ),
										"id" => "quote_section_name",
										"type" => "text");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Recent Posts", 'BizKit' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'BizKit' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'BizKit' ),
										"id" => "show_bizone_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");														
						
	$options[] = array( "type" => "innertabclose");
	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz Nine Settings", 'BizKit' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Product Section", 'BizKit' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Left Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "bnine_left_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Left Description", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "bnine_left_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Left Link", 'BizKit' ),
										"desc" => __("Enter the link to product or service", 'BizKit' ),
										"id" => "bnine_left_section_link",
										"type" => "text");
										
					$options[] = array( "name" => __("Upload Image for Left Section", 'BizKit' ),
										"desc" => __("Upload your image here.", 'BizKit' ),
										"id" => "bnine_left_section_image",
										"type" => "upload");
										
					$options[] = array( "name" => __("Center Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "bnine_center_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Center Description", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "bnine_center_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Center Link", 'BizKit' ),
										"desc" => __("Enter the link to product or service", 'BizKit' ),
										"id" => "bnine_center_section_link",
										"type" => "text");
										
					$options[] = array( "name" => __("Upload Image for Center Section", 'BizKit' ),
										"desc" => __("Upload your image here.", 'BizKit' ),
										"id" => "bnine_center_section_image",
										"type" => "upload");
										
					$options[] = array( "name" => __("Right Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "bnine_right_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Right Description", 'BizKit' ),
										"desc" => __("Enter the welcome text", 'BizKit' ),
										"id" => "bnine_right_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Right Link", 'BizKit' ),
										"desc" => __("Enter the link to product or service", 'BizKit' ),
										"id" => "bnine_right_section_link",
										"type" => "text");
										
					$options[] = array( "name" => __("Upload Image for Right Section", 'BizKit' ),
										"desc" => __("Upload your image here.", 'BizKit' ),
										"id" => "bnine_right_section_image",
										"type" => "upload");																																					
							
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Quote Section", 'BizKit' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote Section?", 'BizKit' ),
										"desc" => __("Select yes if you want to show welcome section.", 'BizKit' ),
										"id" => "bnine_show_quote_section",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);							
							
					$options[] = array( "name" => __("Quote text", 'BizKit' ),
										"desc" => __("Enter the quote text.", 'BizKit' ),
										"id" => "bnine_quote_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Quote name", 'BizKit' ),
										"desc" => __("Enter the quote name.", 'BizKit' ),
										"id" => "bnine_quote_name",
										"type" => "text");																	
							
		$options[] = array( "type" => "groupcontainerclose");																							
							
		$options[] = array( "name" => __("About Section", 'BizKit' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show About Section?", 'BizKit' ),
										"desc" => __("Select yes if you want to show welcome section.", 'BizKit' ),
										"id" => "bnine_show_about_section",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);							

					$options[] = array( "name" => __("Headline", 'BizKit' ),
										"desc" => __("Enter the headline", 'BizKit' ),
										"id" => "bnine_about_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizKit' ),
										"desc" => __("Enter the welcome text.", 'BizKit' ),
										"id" => "bnine_about_text",
										"type" => "textarea");														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Recent Posts", 'BizKit' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'BizKit' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'BizKit' ),
										"id" => "show_biznine_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
		$options[] = array( "type" => "groupcontainerclose");																						
						
	$options[] = array( "type" => "innertabclose");			
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Page Settings", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Comments?", 'BizKit' ),
										"desc" => __("Select yes if you want to show comments", 'BizKit' ),
										"id" => "show_comments_spage",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	

	$options[] = array( "name" => "country19",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layouts available in PRO Version", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Portfolio layout's are available in PRO version", 'BizKit' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizKit' ),
										"id" => "portfolio_layout",
										"std" => "pone",
										"type" => "proimages",
										"options" => array(
											'pone' => $imagepath . 'pone.png',
											'ptwo' => $imagepath . 'ptwo.png',
											'pthree' => $imagepath . 'pthree.png',
											'pfour' => $imagepath . 'pfour.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");						
						
	$options[] = array( "type" => "innertabclose");
								
	$options[] = array( "name" => "country11",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Footer Settings", 'BizKit' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Social Section", 'BizKit' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show social Section?", 'BizKit' ),
										"desc" => __("Select yes if you want to show social section.", 'BizKit' ),
										"id" => "show_social_section",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Footer Logo Upload", 'BizKit' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'BizKit' ),
										"desc" => __("Upload your logo here.", 'BizKit' ),
										"id" => "footer_logo_upload",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Address Settings", 'BizKit' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show Search?", 'BizKit' ),
										"desc" => __("Select yes if you want to show search.", 'BizKit' ),
										"id" => "show_foote_search",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Address", 'BizKit' ),
										"desc" => __("Enter Address", 'BizKit' ),
										"id" => "footer_address",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Email", 'BizKit' ),
										"desc" => __("Enter Email Address", 'BizKit' ),
										"id" => "footer_email_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Phone Number", 'BizKit' ),
										"desc" => __("Enter Phone Number", 'BizKit' ),
										"id" => "footer_phone",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Skype", 'BizKit' ),
										"desc" => __("Enter Skype Address", 'BizKit' ),
										"id" => "footer_skype_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Google Map", 'BizKit' ),
										"desc" => __("Enter google map", 'BizKit' ),
										"id" => "footer_map_address",
										"type" => "proupgrade",
										);																																																														
										
		$options[] = array( "type" => "groupcontainerclose");											
										
		$options[] = array( "name" => __("Footer Layouts", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a footer layout", 'BizKit' ),
										"desc" => __("Images for layout.", 'BizKit' ),
										"id" => "footer_layout",
										"std" => "one",
										"type" => "images",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'footer1.png',
											'two' => $imagepath . 'footer2.png')
										);	
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Footer Layouts available in PRO Version", 'BizKit' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'BizKit' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizKit' ),
										"id" => "homepage_layout",
										"std" => "fone",
										"type" => "proimages",
										"options" => array(
											'fthree' => $imagepath . 'fthree.png',
											'ffour' => $imagepath . 'ffour.png',
											'ffive' => $imagepath . 'ffive.png',
											'fsix' => $imagepath . 'fsix.png')
										);					
										
		$options[] = array( "type" => "groupcontainerclose");																							
						
	$options[] = array( "type" => "innertabclose");			
							
						

							
		
	return $options;
}