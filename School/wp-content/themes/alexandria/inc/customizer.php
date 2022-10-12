<?php
/**
 * alexandria Theme Customizer
 *
 * @package alexandria
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function alexandria_customize_register( $wp_customize ) {

	class alexandriaUpgrade extends WP_Customize_Control {
		
		public function render_content() {
		?>
        	<p class="alexandria-upgrade-text"><?php echo esc_html( $this->description ); ?></p>
            <p class="alexandria-upgrade-link"><a target="_blank" href="https://www.themealley.com/business/">Upgrade to Pro</a></p>
        <?php
		}
		
	}
		
	global $alexandria_skins;
	global $alexandria_yes_no_choices;
	global $alexandria_logo_layout_choices;
	global $alexandria_header_layout_choices;
	global $alexandria_main_layout_choices;
	global $alexandria_footer_layout_choices;
	global $alexandria_defaults_new;
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	/* General Panel */
	$wp_customize->add_panel( 'alexandria_general_options', array(
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Options', 'alexandria'),
	) );	
	$wp_customize->get_section( 'background_image' )->panel = 'alexandria_general_options';
	$wp_customize->get_section( 'header_image' )->panel = 'alexandria_general_options';
	$wp_customize->get_section( 'background_image' )->title = 'Site Background Settings';
	$wp_customize->get_section( 'static_front_page' )->panel = 'alexandria_general_options';
	$wp_customize->get_section( 'title_tagline' )->panel = 'alexandria_general_options';
	$wp_customize->add_setting(
		'background_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'background_color', 
		array(
			'label'      => __( 'Background Color', 'alexandria' ),
			'section'    => 'background_image',
			'priority'   => 9
		) ) 
	);	
	
	/* Skin Section */
	$wp_customize->add_section( 'alexandria_skin_options', array(
		'panel'	=> 'alexandria_general_options',
		'priority'       => 650,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select a Skin', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'skin_style', array(
        'default'        => $alexandria_defaults_new['skin_style'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_skin',
    ));
    $wp_customize->add_control( 'skin_style', array(
        'label'   => __('Select a skin', 'alexandria'),
        'section' => 'alexandria_skin_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_skins,
    ));	
	$wp_customize->add_setting(
		'skins_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'skins_upgrade', 
		array(
			'description' => __( 'Want To Customize Colors Yourself?', 'alexandria' ),
			'section' => 'alexandria_skin_options',
			'priority'   => 800
		) 
	));		
	

	/* Single post settings */
	$wp_customize->add_section( 'alexandria_single_options', array(
		'panel'	=> 'alexandria_general_options',
		'priority'       => 670,
		'capability'     => 'edit_theme_options',
		'title'      => __('Single Post Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'show_featured_image_single', array(
        'default'        => $alexandria_defaults_new['show_featured_image_single'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_featured_image_single', array(
        'label'   => __('Show featured image?', 'alexandria'),
        'section' => 'alexandria_single_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));	
	$wp_customize->add_setting(
		'show_rat_on_single', array(
        'default'        => $alexandria_defaults_new['show_rat_on_single'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_rat_on_single', array(
        'label'   => __('Show Ratings?', 'alexandria'),
        'section' => 'alexandria_single_options',
        'type'    => 'select',
		'priority'   => 20,
        'choices' => $alexandria_yes_no_choices,
    ));			
	$wp_customize->add_setting(
		'show_pd_on_single', array(
        'default'        => $alexandria_defaults_new['show_pd_on_single'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_pd_on_single', array(
        'label'   => __('Show Posted by and Date?', 'alexandria'),
        'section' => 'alexandria_single_options',
        'type'    => 'select',
		'priority'   => 30,
        'choices' => $alexandria_yes_no_choices,
    ));	
	$wp_customize->add_setting(
		'show_cats_on_single', array(
        'default'        => $alexandria_defaults_new['show_cats_on_single'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_cats_on_single', array(
        'label'   => __('Show Categories and Tags?', 'alexandria'),
        'section' => 'alexandria_single_options',
        'type'    => 'select',
		'priority'   => 40,
        'choices' => $alexandria_yes_no_choices,
    ));	
	$wp_customize->add_setting(
		'show_np_box', array(
        'default'        => $alexandria_defaults_new['show_np_box'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_np_box', array(
        'label'   => __('Show Next/Previous Box?', 'alexandria'),
        'section' => 'alexandria_single_options',
        'type'    => 'select',
		'priority'   => 50,
        'choices' => $alexandria_yes_no_choices,
    ));		
	$wp_customize->add_setting(
		'alexandria_post_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_post_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_single_options',
			'priority'   => 800,
		) 
	));		
	
	
			
	
	/* Social Panel */
	$wp_customize->add_section( 'alexandria_social_options', array(
		'panel'	=> 'alexandria_general_options',
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'twitter_id', array(
        'default'        => $alexandria_defaults_new['twitter_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'twitter_id', array(
        'label'   => __( 'Twitter :', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 10,
    ));
	$wp_customize->add_setting(
		'redit_id', array(
        'default'        => $alexandria_defaults_new['redit_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'redit_id', array(
        'label'   => __( 'Reddit :', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 20,
    ));					
	$wp_customize->add_setting(
		'facebook_id', array(
        'default'        => $alexandria_defaults_new['facebook_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'facebook_id', array(
        'label'   => __( 'Facebook :', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'stumble_id', array(
        'default'        => $alexandria_defaults_new['stumble_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'stumble_id', array(
        'label'   => __( 'Stumble :', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 40,
    ));		
	$wp_customize->add_setting(
		'flickr_id', array(
        'default'        => $alexandria_defaults_new['flickr_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'flickr_id', array(
        'label'   => __( 'Flickr:', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 50,
    ));		
	$wp_customize->add_setting(
		'linkedin_id', array(
        'default'        => $alexandria_defaults_new['linkedin_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'linkedin_id', array(
        'label'   => __( 'LinkedIn:', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 60,
    ));		
	$wp_customize->add_setting(
		'google_id', array(
        'default'        => $alexandria_defaults_new['google_id'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'google_id', array(
        'label'   => __( 'Google:', 'alexandria' ),
        'section' => 'alexandria_social_options',
        'type'    => 'text',
		'priority'   => 70,
    ));		
	$wp_customize->add_setting(
		'alexandria_social_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_social_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_social_options',
			'priority'   => 800,
		) 
	));		
	
	/* Logo Section */
	$wp_customize->add_section( 'alexandria_logo_options', array(
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
		'title'      => __('Logo Section Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'logo_layout_style', array(
        'default'        => $alexandria_defaults_new['logo_layout_style'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_logo_layout',
    ));
    $wp_customize->add_control( 'logo_layout_style', array(
        'label'   => __('Select Logo Section Layout', 'alexandria'),
        'section' => 'alexandria_logo_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_logo_layout_choices,
    ));	
	$wp_customize->add_setting(
		'alexandria_logo_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_logo_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_logo_options',
			'priority'   => 800,
		) 
	));		
	
	
	/* Header Panel */
	$wp_customize->add_panel( 'alexandria_header_options', array(
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header/Slider Options', 'alexandria'),
	) );
	$wp_customize->add_section( 'alexandria_header_options', array(
		'panel'	=> 'alexandria_header_options',
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select A Header Type', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'header_slider', array(
        'default'        => $alexandria_defaults_new['header_slider'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_header_layout',
    ));
    $wp_customize->add_control( 'header_slider', array(
        'label'   => __('Select Header Section Layout', 'alexandria'),
        'section' => 'alexandria_header_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_header_layout_choices,
    ));
	$wp_customize->add_setting(
		'slider_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'slider_upgrade', 
		array(
			'description' => __( 'Want More Sliders?', 'alexandria' ),
			'section' => 'alexandria_header_options',
			'priority'   => 800,
		) 
	));	
					

	$wp_customize->add_section( 'alexandria_header_on', array(
		'panel'	=> 'alexandria_header_options',
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header ON/OFF Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'show_alexandria_slider_home', array(
        'default'        => $alexandria_defaults_new['show_alexandria_slider_home'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_slider_home', array(
        'label'   => __('Show Header on homepage?', 'alexandria'),
        'section' => 'alexandria_header_on',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));	
	$wp_customize->add_setting(
		'show_alexandria_slider_single', array(
        'default'        => $alexandria_defaults_new['show_alexandria_slider_single'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_slider_single', array(
        'label'   => __('Show Header on Single post page?', 'alexandria'),
        'section' => 'alexandria_header_on',
        'type'    => 'select',
		'priority'   => 20,
        'choices' => $alexandria_yes_no_choices,
    ));		
	$wp_customize->add_setting(
		'show_alexandria_slider_page', array(
        'default'        => $alexandria_defaults_new['show_alexandria_slider_page'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_slider_page', array(
        'label'   => __('Show Header on Pages?', 'alexandria'),
        'section' => 'alexandria_header_on',
        'type'    => 'select',
		'priority'   => 30,
        'choices' => $alexandria_yes_no_choices,
    ));		
	$wp_customize->add_setting(
		'show_alexandria_slider_archive', array(
        'default'        => $alexandria_defaults_new['show_alexandria_slider_archive'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_slider_archive', array(
        'label'   => __('Show Header on Category Pages?', 'alexandria'),
        'section' => 'alexandria_header_on',
        'type'    => 'select',
		'priority'   => 40,
        'choices' => $alexandria_yes_no_choices,
    ));
	$wp_customize->add_setting(
		'alexandria_header_on_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_header_on_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_header_on',
			'priority'   => 800,
		) 
	));		
	
	$wp_customize->add_section( 'alexandria_header_one', array(
		'panel'	=> 'alexandria_header_options',
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header One Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'slider_one_image', array(
        'default'        => $alexandria_defaults_new['slider_one_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'slider_one_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_header_one',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'slider_one_headline', array(
        'default'        => $alexandria_defaults_new['slider_one_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'slider_one_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_header_one',
        'type'    => 'text',
		'priority'   => 20,
    ));		
	$wp_customize->add_setting(
		'slider_one_text', array(
        'default'        => $alexandria_defaults_new['slider_one_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'slider_one_text', array(
        'label'   => __( 'Feature text', 'alexandria' ),
        'section' => 'alexandria_header_one',
        'type'    => 'text',
		'priority'   => 30,
    ));
	$wp_customize->add_setting(
		'slider_one_cta', array(
        'default'        => $alexandria_defaults_new['slider_one_cta'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'slider_one_cta', array(
        'label'   => __( 'Call To Action text', 'alexandria' ),
        'section' => 'alexandria_header_one',
        'type'    => 'text',
		'priority'   => 40,
    ));	
	$wp_customize->add_setting(
		'slider_one_cta_link', array(
        'default'        => $alexandria_defaults_new['slider_one_cta_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'slider_one_cta_link', array(
        'label'   => __( 'Call To Action Link', 'alexandria' ),
        'section' => 'alexandria_header_one',
        'type'    => 'text',
		'priority'   => 50,
    ));
	$wp_customize->add_setting(
		'alexandria_header_one_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_header_one_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_header_one',
			'priority'   => 800,
		) 
	));			
	
	/* Layout Panel */
	$wp_customize->add_section( 'alexandria_layout_settings', array(
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout Selection Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'homepage_layout', array(
        'default'        => $alexandria_defaults_new['homepage_layout'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_main_layout',
    ));
    $wp_customize->add_control( 'homepage_layout', array(
        'label'   => __('Select a homepage layout?', 'alexandria'),
        'section' => 'alexandria_layout_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_main_layout_choices,
    ));
	$wp_customize->add_setting(
		'layout_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'layout_upgrade', 
		array(
			'description' => __( 'Want More layouts?', 'alexandria' ),
			'section' => 'alexandria_layout_settings',
			'priority'   => 800,
		) 
	));	
	
	/* Bone Panel */
	$wp_customize->add_panel( 'alexandria_bone_options', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('BOne Settings', 'alexandria'),
	) );	
	$wp_customize->add_section( 'alexandria_bone_welcome_settings', array(
		'panel'	=> 'alexandria_bone_options',
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bone Welcome Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'welcome_headline', array(
        'default'        => $alexandria_defaults_new['welcome_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'welcome_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_bone_welcome_settings',
        'type'    => 'text',
		'priority'   => 10,
    ));
	$wp_customize->add_setting(
		'welcome_text', array(
        'default'        => $alexandria_defaults_new['welcome_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'welcome_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bone_welcome_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));
	
	$wp_customize->add_section( 'alexandria_bone_left_settings', array(
		'panel'	=> 'alexandria_bone_options',
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bone Left Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'left_section_image', array(
        'default'        => $alexandria_defaults_new['left_section_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'left_section_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bone_left_settings',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'left_section_headline', array(
        'default'        => $alexandria_defaults_new['left_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'left_section_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_bone_left_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'left_section_text', array(
        'default'        => $alexandria_defaults_new['left_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'left_section_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bone_left_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'left_section_link', array(
        'default'        => $alexandria_defaults_new['left_section_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'left_section_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bone_left_settings',
        'type'    => 'text',
		'priority'   => 40,
    ));
	$wp_customize->add_setting(
		'bone_left_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'bone_left_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bone_left_settings',
			'priority'   => 800,
		) 
	));		
	
	$wp_customize->add_section( 'alexandria_bone_center_settings', array(
		'panel'	=> 'alexandria_bone_options',
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bone Center Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'center_section_image', array(
        'default'        => $alexandria_defaults_new['center_section_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'center_section_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bone_center_settings',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'center_section_headline', array(
        'default'        => $alexandria_defaults_new['center_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'center_section_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_bone_center_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'center_section_text', array(
        'default'        => $alexandria_defaults_new['center_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'center_section_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bone_center_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'center_section_link', array(
        'default'        => $alexandria_defaults_new['center_section_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'center_section_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bone_center_settings',
        'type'    => 'text',
		'priority'   => 40,
    ));			
	$wp_customize->add_setting(
		'bone_center_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'bone_center_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bone_center_settings',
			'priority'   => 800,
		) 
	));

	$wp_customize->add_section( 'alexandria_bone_right_settings', array(
		'panel'	=> 'alexandria_bone_options',
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bone Right Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'right_section_image', array(
        'default'        => $alexandria_defaults_new['right_section_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'right_section_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bone_right_settings',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'right_section_headline', array(
        'default'        => $alexandria_defaults_new['right_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'right_section_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_bone_right_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'right_section_text', array(
        'default'        => $alexandria_defaults_new['right_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'right_section_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bone_right_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'right_section_link', array(
        'default'        => $alexandria_defaults_new['right_section_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'right_section_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bone_right_settings',
        'type'    => 'text',
		'priority'   => 40,
    ));
	$wp_customize->add_setting(
		'bone_right_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'bone_right_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bone_right_settings',
			'priority'   => 800,
		) 
	));	
	
	$wp_customize->add_section( 'alexandria_bone_quote_settings', array(
		'panel'	=> 'alexandria_bone_options',
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bone Quote Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'show_alexandria_quote_bizone', array(
        'default'        => $alexandria_defaults_new['show_alexandria_quote_bizone'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_quote_bizone', array(
        'label'   => __('Show Quote?', 'alexandria'),
        'section' => 'alexandria_bone_quote_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));		
	$wp_customize->add_setting(
		'quote_section_text', array(
        'default'        => $alexandria_defaults_new['quote_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'quote_section_text', array(
        'label'   => __( 'Quote', 'alexandria' ),
        'section' => 'alexandria_bone_quote_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));		
	$wp_customize->add_setting(
		'quote_section_name', array(
        'default'        => $alexandria_defaults_new['quote_section_name'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'quote_section_name', array(
        'label'   => __( 'Customer Name', 'alexandria' ),
        'section' => 'alexandria_bone_quote_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));
	$wp_customize->add_setting(
		'bone_quote_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'bone_quote_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bone_quote_settings',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_bone_recent_settings', array(
		'panel'	=> 'alexandria_bone_options',
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Recent Posts Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'show_bizone_posts', array(
        'default'        => $alexandria_defaults_new['show_bizone_posts'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_bizone_posts', array(
        'label'   => __('Show Recent Posts Section?', 'alexandria'),
        'section' => 'alexandria_bone_recent_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));
			
	
	/* Btwo Panel */
	$wp_customize->add_panel( 'alexandria_btwo_options', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('BTwo Settings', 'alexandria'),
	) );	
	$wp_customize->add_section( 'alexandria_btwo_welcome_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bone Welcome Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_welcome_headline', array(
        'default'        => $alexandria_defaults_new['biztwo_welcome_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_welcome_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_btwo_welcome_settings',
        'type'    => 'text',
		'priority'   => 10,
    ));
	$wp_customize->add_setting(
		'biztwo_welcome_text', array(
        'default'        => $alexandria_defaults_new['biztwo_welcome_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_welcome_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_btwo_welcome_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	
	$wp_customize->add_section( 'alexandria_btwo_top_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
		'title'      => __('Top Section Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_left_section_image', array(
        'default'        => $alexandria_defaults_new['biztwo_left_section_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_left_section_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_top_settings',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'biztwo_left_section_headline', array(
        'default'        => $alexandria_defaults_new['biztwo_left_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_left_section_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_btwo_top_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_left_section_text', array(
        'default'        => $alexandria_defaults_new['biztwo_left_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_left_section_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_btwo_top_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_left_section_link', array(
        'default'        => $alexandria_defaults_new['biztwo_left_section_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_left_section_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_top_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));
	$wp_customize->add_setting(
		'biztwo_left_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_left_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_top_settings',
			'priority'   => 800,
		) 
	));	
	
	
	$wp_customize->add_section( 'alexandria_btwo_middle_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
		'title'      => __('Middle Section Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_center_section_image', array(
        'default'        => $alexandria_defaults_new['biztwo_center_section_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_center_section_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_middle_settings',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'biztwo_center_section_headline', array(
        'default'        => $alexandria_defaults_new['biztwo_center_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_center_section_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_btwo_middle_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_center_section_text', array(
        'default'        => $alexandria_defaults_new['biztwo_center_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_center_section_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_btwo_middle_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'biztwo_center_section_link', array(
        'default'        => $alexandria_defaults_new['biztwo_center_section_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_center_section_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_middle_settings',
        'type'    => 'text',
		'priority'   => 40,
    ));	
	$wp_customize->add_setting(
		'biztwo_center_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_center_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_middle_settings',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_btwo_bottom_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Bottom Section Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_right_section_image', array(
        'default'        => $alexandria_defaults_new['biztwo_right_section_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_right_section_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_bottom_settings',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'biztwo_right_section_headline', array(
        'default'        => $alexandria_defaults_new['biztwo_right_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_right_section_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_btwo_bottom_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_right_section_text', array(
        'default'        => $alexandria_defaults_new['biztwo_right_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_right_section_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_btwo_bottom_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'biztwo_right_section_link', array(
        'default'        => $alexandria_defaults_new['biztwo_right_section_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_right_section_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_bottom_settings',
        'type'    => 'text',
		'priority'   => 40,
    ));	
	$wp_customize->add_setting(
		'biztwo_right_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_right_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_bottom_settings',
			'priority'   => 800,
		) 
	));			

	$wp_customize->add_section( 'alexandria_btwo_quote_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'show_alexandria_quote_biztwo', array(
        'default'        => $alexandria_defaults_new['show_alexandria_quote_biztwo'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_quote_biztwo', array(
        'label'   => __('Show Quote?', 'alexandria'),
        'section' => 'alexandria_btwo_quote_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));		
	$wp_customize->add_setting(
		'biztwo_quote_section_text', array(
        'default'        => $alexandria_defaults_new['biztwo_quote_section_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_quote_section_text', array(
        'label'   => __( 'Quote', 'alexandria' ),
        'section' => 'alexandria_btwo_quote_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));		
	$wp_customize->add_setting(
		'biztwo_quote_section_name', array(
        'default'        => $alexandria_defaults_new['biztwo_quote_section_name'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_quote_section_name', array(
        'label'   => __( 'Customer Name', 'alexandria' ),
        'section' => 'alexandria_btwo_quote_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'biztwo_quote_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_quote_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_quote_settings',
			'priority'   => 800,
		) 
	));			

	$wp_customize->add_section( 'alexandria_btwo_portone_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Portfolio Item # 1 Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_port_one_image', array(
        'default'        => $alexandria_defaults_new['biztwo_port_one_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_port_one_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_portone_settings',
				   'priority'   => 10,
			   )
		   )
	);
	$wp_customize->add_setting(
		'biztwo_port_one_name', array(
        'default'        => $alexandria_defaults_new['biztwo_port_one_name'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_port_one_name', array(
        'label'   => __( 'Name', 'alexandria' ),
        'section' => 'alexandria_btwo_portone_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_port_one_link', array(
        'default'        => $alexandria_defaults_new['biztwo_port_one_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_port_one_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_portone_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));
	$wp_customize->add_setting(
		'biztwo_port_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_port_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_portone_settings',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_btwo_porttwo_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Portfolio Item # 2 Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_port_two_image', array(
        'default'        => $alexandria_defaults_new['biztwo_port_two_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_port_two_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_porttwo_settings',
				   'priority'   => 10,
			   )
		   )
	);
	$wp_customize->add_setting(
		'biztwo_port_two_name', array(
        'default'        => $alexandria_defaults_new['biztwo_port_two_name'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_port_two_name', array(
        'label'   => __( 'Name', 'alexandria' ),
        'section' => 'alexandria_btwo_porttwo_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_port_two_link', array(
        'default'        => $alexandria_defaults_new['biztwo_port_two_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_port_two_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_porttwo_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'biztwo_port_two_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_port_two_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_porttwo_settings',
			'priority'   => 800,
		) 
	));	
	
	$wp_customize->add_section( 'alexandria_btwo_portthree_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 800,
		'capability'     => 'edit_theme_options',
		'title'      => __('Portfolio Item # 3 Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_port_three_image', array(
        'default'        => $alexandria_defaults_new['biztwo_port_three_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_port_three_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_portthree_settings',
				   'priority'   => 10,
			   )
		   )
	);
	$wp_customize->add_setting(
		'biztwo_port_three_name', array(
        'default'        => $alexandria_defaults_new['biztwo_port_three_name'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_port_three_name', array(
        'label'   => __( 'Name', 'alexandria' ),
        'section' => 'alexandria_btwo_portthree_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_port_three_link', array(
        'default'        => $alexandria_defaults_new['biztwo_port_three_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_port_three_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_portthree_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'alexandria_btwo_portthree_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_btwo_portthree_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_portthree_settings',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_btwo_portfour_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 900,
		'capability'     => 'edit_theme_options',
		'title'      => __('Portfolio Item # 4 Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'biztwo_port_four_image', array(
        'default'        => $alexandria_defaults_new['biztwo_port_four_image'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'biztwo_port_four_image',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_btwo_portfour_settings',
				   'priority'   => 10,
			   )
		   )
	);
	$wp_customize->add_setting(
		'biztwo_port_four_name', array(
        'default'        => $alexandria_defaults_new['biztwo_port_four_name'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'biztwo_port_four_name', array(
        'label'   => __( 'Name', 'alexandria' ),
        'section' => 'alexandria_btwo_portfour_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'biztwo_port_four_link', array(
        'default'        => $alexandria_defaults_new['biztwo_port_four_link'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'biztwo_port_four_link', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_btwo_portfour_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));	
	$wp_customize->add_setting(
		'biztwo_port_four_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'biztwo_port_four_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_btwo_portfour_settings',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_btwo_recent_settings', array(
		'panel'	=> 'alexandria_btwo_options',
		'priority'       => 910,
		'capability'     => 'edit_theme_options',
		'title'      => __('Recent Posts Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'show_biztwo_posts', array(
        'default'        => $alexandria_defaults_new['show_biztwo_posts'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_biztwo_posts', array(
        'label'   => __('Show Recent Posts Section?', 'alexandria'),
        'section' => 'alexandria_btwo_recent_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));	
	
	/* BFour Panel */
	$wp_customize->add_panel( 'alexandria_bfour_options', array(
		'priority'       => 630,
		'capability'     => 'edit_theme_options',
		'title'      => __('BFour Settings', 'alexandria'),
	) );		
	$wp_customize->add_section( 'alexandria_bfour_welcome_options', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'      => __('Welcome Section', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'welcome_headline_bfour', array(
        'default'        => $alexandria_defaults_new['welcome_headline_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'welcome_headline_bfour', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_bfour_welcome_options',
        'type'    => 'text',
		'priority'   => 10,
    ));		
	$wp_customize->add_setting(
		'welcome_text_bfour', array(
        'default'        => $alexandria_defaults_new['welcome_text_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'welcome_text_bfour', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bfour_welcome_options',
        'type'    => 'text',
		'priority'   => 20,
    ));		

	$wp_customize->add_section( 'alexandria_bfour_left_options', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
		'title'      => __('Left Section', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'left_section_image_bfour', array(
        'default'        => $alexandria_defaults_new['left_section_image_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'left_section_image_bfour',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bfour_left_options',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'left_section_headline_bfour', array(
        'default'        => $alexandria_defaults_new['left_section_headline_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'left_section_headline_bfour', array(
        'label'   => __( 'Enter the headline', 'alexandria' ),
        'section' => 'alexandria_bfour_left_options',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'left_section_text_bfour', array(
        'default'        => $alexandria_defaults_new['left_section_text_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'left_section_text_bfour', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bfour_left_options',
        'type'    => 'text',
		'priority'   => 30,
    ));		
	$wp_customize->add_setting(
		'left_section_link_bfour', array(
        'default'        => $alexandria_defaults_new['left_section_link_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'left_section_link_bfour', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bfour_left_options',
        'type'    => 'text',
		'priority'   => 40,
    ));	
	$wp_customize->add_setting(
		'left_section_bfour_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'left_section_bfour_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bfour_left_options',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_bfour_center_left_options', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Center Left Section', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'center_left_section_image_bfour', array(
        'default'        => $alexandria_defaults_new['center_left_section_image_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'center_left_section_image_bfour',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bfour_center_left_options',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'center_left_section_headline_bfour', array(
        'default'        => $alexandria_defaults_new['center_left_section_headline_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'center_left_section_headline_bfour', array(
        'label'   => __( 'Enter the headline', 'alexandria' ),
        'section' => 'alexandria_bfour_center_left_options',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'center_left_section_text_bfour', array(
        'default'        => $alexandria_defaults_new['center_left_section_text_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'center_left_section_text_bfour', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bfour_center_left_options',
        'type'    => 'text',
		'priority'   => 30,
    ));		
	$wp_customize->add_setting(
		'center_left_section_link_bfour', array(
        'default'        => $alexandria_defaults_new['center_left_section_link_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'center_left_section_link_bfour', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bfour_center_left_options',
        'type'    => 'text',
		'priority'   => 40,
    ));	
	$wp_customize->add_setting(
		'alexandria_bfour_center_left_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_bfour_center_left_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bfour_center_left_options',
			'priority'   => 800,
		) 
	));			
	
	$wp_customize->add_section( 'alexandria_bfour_center_right_options', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('Center Right Section', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'center_right_section_image_bfour', array(
        'default'        => $alexandria_defaults_new['center_right_section_image_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'center_right_section_image_bfour',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bfour_center_right_options',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'center_right_section_headline_bfour', array(
        'default'        => $alexandria_defaults_new['center_right_section_headline_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'center_right_section_headline_bfour', array(
        'label'   => __( 'Enter the headline', 'alexandria' ),
        'section' => 'alexandria_bfour_center_right_options',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'center_right_section_text_bfour', array(
        'default'        => $alexandria_defaults_new['center_right_section_text_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'center_right_section_text_bfour', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bfour_center_right_options',
        'type'    => 'text',
		'priority'   => 30,
    ));		
	$wp_customize->add_setting(
		'center_right_section_link_bfour', array(
        'default'        => $alexandria_defaults_new['center_right_section_link_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'center_right_section_link_bfour', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bfour_center_right_options',
        'type'    => 'text',
		'priority'   => 40,
    ));	
	$wp_customize->add_setting(
		'alexandria_bfour_center_right_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_bfour_center_right_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bfour_center_right_options',
			'priority'   => 800,
		) 
	));		
	
	
	
	
	$wp_customize->add_section( 'alexandria_bfour_right_options', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('Right Section', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'right_section_image_bfour', array(
        'default'        => $alexandria_defaults_new['right_section_image_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'right_section_image_bfour',
			   array(
				   'label'          => __( 'Upload Image.', 'alexandria' ),
				   'section'        => 'alexandria_bfour_right_options',
				   'priority'   => 10,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'right_section_headline_bfour', array(
        'default'        => $alexandria_defaults_new['right_section_headline_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'right_section_headline_bfour', array(
        'label'   => __( 'Enter the headline', 'alexandria' ),
        'section' => 'alexandria_bfour_right_options',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'right_section_text_bfour', array(
        'default'        => $alexandria_defaults_new['right_section_text_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'right_section_text_bfour', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_bfour_right_options',
        'type'    => 'text',
		'priority'   => 30,
    ));		
	$wp_customize->add_setting(
		'right_section_link_bfour', array(
        'default'        => $alexandria_defaults_new['right_section_link_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control( 'right_section_link_bfour', array(
        'label'   => __( 'Link', 'alexandria' ),
        'section' => 'alexandria_bfour_right_options',
        'type'    => 'text',
		'priority'   => 40,
    ));		
	$wp_customize->add_setting(
		'alexandria_bfour_right_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_bfour_right_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bfour_right_options',
			'priority'   => 800,
		) 
	));		
	
	
	$wp_customize->add_section( 'alexandria_bfour_quote_settings', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'show_alexandria_quote_bfour', array(
        'default'        => $alexandria_defaults_new['show_alexandria_quote_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_alexandria_quote_bfour', array(
        'label'   => __('Show Quote?', 'alexandria'),
        'section' => 'alexandria_bfour_quote_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));		
	$wp_customize->add_setting(
		'quote_section_text_bfour', array(
        'default'        => $alexandria_defaults_new['quote_section_text_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'quote_section_text_bfour', array(
        'label'   => __( 'Quote', 'alexandria' ),
        'section' => 'alexandria_bfour_quote_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));		
	$wp_customize->add_setting(
		'quote_section_name_bfour', array(
        'default'        => $alexandria_defaults_new['quote_section_name_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'quote_section_name_bfour', array(
        'label'   => __( 'Customer Name', 'alexandria' ),
        'section' => 'alexandria_bfour_quote_settings',
        'type'    => 'text',
		'priority'   => 30,
    ));		
	$wp_customize->add_setting(
		'alexandria_bfour_quote_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_bfour_quote_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_bfour_quote_settings',
			'priority'   => 800,
		) 
	));	



	$wp_customize->add_section( 'alexandria_bfour_recent_settings', array(
		'panel'	=> 'alexandria_bfour_options',
		'priority'       => 910,
		'capability'     => 'edit_theme_options',
		'title'      => __('Recent Posts Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'show_bizone_posts_bfour', array(
        'default'        => $alexandria_defaults_new['show_bizone_posts_bfour'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_bizone_posts_bfour', array(
        'label'   => __('Show Recent Posts Section?', 'alexandria'),
        'section' => 'alexandria_bfour_recent_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));		
			



	/* Ecom One Panel */
	$wp_customize->add_panel( 'alexandria_eone_options', array(
		'priority'       => 650,
		'capability'     => 'edit_theme_options',
		'title'      => __('Ecom One Settings', 'alexandria'),
	) );
	$wp_customize->add_section( 'alexandria_eone_welcome_settings', array(
		'panel'	=> 'alexandria_eone_options',
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Welcome Settings', 'alexandria'),
	) );	
	$wp_customize->add_setting(
		'show_eone_welcome_section', array(
        'default'        => $alexandria_defaults_new['show_eone_welcome_section'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_eone_welcome_section', array(
        'label'   => __('Show Recent Posts Section?', 'alexandria'),
        'section' => 'alexandria_eone_welcome_settings',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,
    ));
	$wp_customize->add_setting(
		'eone_welcome_headline', array(
        'default'        => $alexandria_defaults_new['eone_welcome_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'eone_welcome_headline', array(
        'label'   => __( 'Headline', 'alexandria' ),
        'section' => 'alexandria_eone_welcome_settings',
        'type'    => 'text',
		'priority'   => 10,
    ));		
	$wp_customize->add_setting(
		'eone_welcome_text', array(
        'default'        => $alexandria_defaults_new['eone_welcome_text'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'eone_welcome_text', array(
        'label'   => __( 'Welcome text', 'alexandria' ),
        'section' => 'alexandria_eone_welcome_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));							
	$wp_customize->add_setting(
		'alexandria_eone_welcome_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_eone_welcome_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_eone_welcome_settings',
			'priority'   => 800,
		) 
	));	
	
	
	$wp_customize->add_section( 'alexandria_eone_latest_settings', array(
		'panel'	=> 'alexandria_eone_options',
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Latest Products Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'eone_latest_section_headline', array(
        'default'        => $alexandria_defaults_new['eone_latest_section_headline'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'eone_latest_section_headline', array(
        'label'   => __( 'Heading', 'alexandria' ),
        'section' => 'alexandria_eone_latest_settings',
        'type'    => 'text',
		'priority'   => 10,
    ));	
	$wp_customize->add_setting(
		'eone_latest_section_num', array(
        'default'        => $alexandria_defaults_new['eone_latest_section_num'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'eone_latest_section_num', array(
        'label'   => __( 'How many Products?', 'alexandria' ),
        'section' => 'alexandria_eone_latest_settings',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'alexandria_eone_latest_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'alexandria_eone_latest_upgrade', 
		array(
			'description' => __( 'Want More Features?', 'alexandria' ),
			'section' => 'alexandria_eone_latest_settings',
			'priority'   => 800,
		) 
	));		
	
	
	/* Standard Panel */
	$wp_customize->add_section( 'alexandria_standard_options', array(
		'priority'       => 670,
		'capability'     => 'edit_theme_options',
		'title'      => __('Standard Blog Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'show_comments_spage', array(
        'default'        => $alexandria_defaults_new['show_comments_spage'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'show_comments_spage', array(
        'label'   => __('Show Comments?', 'alexandria'),
        'section' => 'alexandria_standard_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_yes_no_choices,		
    ));	
	
	/* Footer Panel */
	$wp_customize->add_section( 'alexandria_footer_options', array(
		'priority'       => 690,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer Settings', 'alexandria'),
	) );
	$wp_customize->add_setting(
		'footer_layout', array(
        'default'        => $alexandria_defaults_new['footer_layout'],
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'alexandria_sanitize_footer_layout',
    ));
    $wp_customize->add_control( 'footer_layout', array(
        'label'   => __('Select a footer layout', 'alexandria'),
        'section' => 'alexandria_footer_options',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => $alexandria_footer_layout_choices,		
    ));	
	$wp_customize->add_setting(
		'footer_layouts_upgrade', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control( new alexandriaUpgrade( 
		$wp_customize, 
		'footer_layouts_upgrade', 
		array(
			'description' => __( 'Want More Footer Layouts?', 'alexandria' ),
			'section' => 'alexandria_footer_options',
		) 
	));			
				
	
}
add_action( 'customize_register', 'alexandria_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function alexandria_customize_preview_js() {
	wp_enqueue_script( 'alexandria_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'alexandria_customize_preview_js' );

$alexandria_skins = array(

		'alexandria' => 'Alexandria',
		'radi' => 'Radi',
		'green' => 'Green',
		'purple' => 'Purple',
		'brown' => 'Brown',
		'orange' => 'Orange',
		'yellow' => 'Yellow',
		'aqua' => 'Aqua',
		'grunge' => 'Grunge',
		'pink' => 'Pink',
		'ggrun' => 'Ggrun',
		'oran' => 'Oran',
		'ggren' => 'Ggren',
		'margo' => 'Margo',
		'marbo' => 'Marbo',
		'ggrey' => 'Ggrey',
		'grebr' => 'Grebr',
		'brne' => 'Brne',
		'alge' => 'Alge',
		'raft' => 'Raft',
		'brwne' => 'Brwne',
		'dusty' => 'Dusty',
		'allblu' => 'Allblu',
		'slvrblu' => 'Slvrblu',
		'orblu' => 'Orblu',
		'child' => 'Child'
											
);

$alexandria_yes_no_choices = array( 'default' => __('Select an Option', 'alexandria'), 'true' => __('Yes', 'alexandria'), 'false' => __('No', 'alexandria') );

$alexandria_logo_layout_choices = array( 'default' => __('Select an Option', 'alexandria'), 'sbys'=> __('Nav Beside Logo', 'alexandria'), 'onebone'=> __('Nav Below Logo', 'alexandria'));
$alexandria_header_layout_choices = array( 'default' => __('Select an Option', 'alexandria'), 'one'=> __('Header One', 'alexandria'), 'cheader'=> __('Custom Header', 'alexandria'));
$alexandria_main_layout_choices = array( 'default' => __('Select an Option', 'alexandria'), 'bone'=> __('Business One', 'alexandria'), 'btwo'=> __('Business Two', 'alexandria'), 'bfour'=> __('Business Four', 'alexandria'), 'eone'=> __('ECommerce One', 'alexandria'), 'spage'=> __('Standard Page', 'alexandria'));
$alexandria_footer_layout_choices = array( 'default' => __('Select an Option', 'alexandria'), 'one' => __('Footer One', 'alexandria'), 'two' => __('Footer Two', 'alexandria') );
$alexandria_defaults = array(

	"skin_style" => "alexandria",
	"show_featured_image_single" => "false",
	"show_rat_on_single" => "true",
	"show_pd_on_single" => "true",
	"show_cats_on_single" => "true",
	"show_np_box" => "true",
	"twitter_id" => "",
	"redit_id" => "",
	"facebook_id" => "",
	"stumble_id" => "",
	"flickr_id" => "",
	"linkedin_id" => "",
	"google_id" => "",
	"logo_layout_style" => "sbys",
	"header_slider" => "one",
	"show_alexandria_slider_home" => "true",
	"show_alexandria_slider_single" => "false",
	"show_alexandria_slider_page" => "false",
	"show_alexandria_slider_archive" => "false",
	"slider_one_image" => "",
	"slider_one_headline" => "",
	"slider_one_text" => "",
	"slider_one_cta" => "",
	"slider_one_cta_link" => "",
	"homepage_layout"  => "bone",
	"welcome_headline" => "",
	"welcome_text" => "",
	"left_section_image" => "",
	"left_section_headline" => "",
	"left_section_text" => "",
	"left_section_link" => "",
	"center_section_image" => "",
	"center_section_headline" => "",
	"center_section_text" => "",
	"center_section_link" => "",
	"right_section_image" => "",
	"right_section_headline" => "",
	"right_section_text" => "",
	"right_section_link" => "",
	"show_alexandria_quote_bizone" => "true",
	"quote_section_text" => "",
	"quote_section_name" => "",
	"show_bizone_posts" => "true",
	"biztwo_welcome_headline" => "",
	"biztwo_welcome_text" => "",
	"biztwo_left_section_image" => "",
	"biztwo_left_section_headline" => "",
	"biztwo_left_section_text" => "",
	"biztwo_left_section_link" => "",
	"biztwo_center_section_image" => "",
	"biztwo_center_section_headline" => "",
	"biztwo_center_section_text" => "",
	"biztwo_center_section_link" => "",
	"biztwo_right_section_image" => "",
	"biztwo_right_section_headline" => "",
	"biztwo_right_section_text" => "",
	"biztwo_right_section_link" => "",
	"show_alexandria_quote_biztwo" => "true",
	"biztwo_quote_section_text" => "",
	"biztwo_quote_section_name" => "",
	"biztwo_port_one_image" => "",
	"biztwo_port_one_name" => "",
	"biztwo_port_one_link" => "",
	"biztwo_port_two_image" => "",
	"biztwo_port_two_name" => "",
	"biztwo_port_two_link" => "",
	"biztwo_port_three_image" => "",
	"biztwo_port_three_name" => "",
	"biztwo_port_three_link" => "",
	"biztwo_port_four_image" => "",
	"biztwo_port_four_name" => "",
	"biztwo_port_four_link" => "",
	"show_biztwo_posts" => "true",
	"welcome_headline_bfour" => "",
	"welcome_text_bfour" => "",
	"left_section_image_bfour" => "",
	"left_section_headline_bfour" => "",
	"left_section_text_bfour" => "",
	"left_section_link_bfour" => "",
	"center_left_section_image_bfour" => "",
	"center_left_section_headline_bfour" => "",
	"center_left_section_text_bfour" => "",
	"center_left_section_link_bfour" => "",
	"center_right_section_image_bfour" => "",
	"center_right_section_headline_bfour" => "",
	"center_right_section_text_bfour" => "",
	"center_right_section_link_bfour" => "",
	"right_section_image_bfour" => "",
	"right_section_headline_bfour" => "",
	"right_section_text_bfour" => "",
	"right_section_link_bfour" => "",
	"show_alexandria_quote_bfour" => "",
	"quote_section_text_bfour" => "",
	"quote_section_name_bfour" => "",
	"show_bizone_posts_bfour" => "true",
	"show_eone_welcome_section" => "true",
	"eone_welcome_headline" => "true",
	"eone_welcome_text" => "true",
	"eone_latest_section_headline" => "true",
	"eone_latest_section_num" => "",
	"show_comments_spage" => "true",
	"footer_layout" => "one"

);

$alexandria_option = get_option( 'optionsframework' );
								
$alexandria_options = get_option( $alexandria_option['id'] );

if(empty($alexandria_options)){
	$alexandria_defaults_new = $alexandria_defaults;
}else{
	$alexandria_defaults_new = array_merge($alexandria_defaults, $alexandria_options);
}

/* Sanitization */
function alexandria_sanitize_yes_no( $value ) {
	global $alexandria_yes_no_choices;
    if ( ! array_key_exists( $value, $alexandria_yes_no_choices ) ){
        $value = 'default';
	}
    return $value;	
}
function alexandria_sanitize_skin($value){
	global $alexandria_skins;
    if ( ! array_key_exists( $value, $alexandria_skins ) ){
        $value = 'default';
	}
    return $value;	
}
function alexandria_sanitize_slider($value){
	global $alexandria_slider_choices;
    if ( ! array_key_exists( $value, $alexandria_slider_choices ) ){
        $value = 'default';
	}
    return $value;	
}
function alexandria_sanitize_logo_layout($value){
	global $alexandria_logo_layout_choices;
    if ( ! array_key_exists( $value, $alexandria_logo_layout_choices ) ){
        $value = 'default';
	}
    return $value;	
}
function alexandria_sanitize_header_layout($value){
	global $alexandria_header_layout_choices;
    if ( ! array_key_exists( $value, $alexandria_header_layout_choices ) ){
        $value = 'default';
	}
    return $value;	
}
function alexandria_sanitize_main_layout($value){
	global $alexandria_main_layout_choices;
    if ( ! array_key_exists( $value, $alexandria_main_layout_choices ) ){
        $value = 'default';
	}
    return $value;	
}
function alexandria_sanitize_footer_layout($value){
	global $alexandria_footer_layout_choices;
    if ( ! array_key_exists( $value, $alexandria_footer_layout_choices ) ){
        $value = 'default';
	}
    return $value;	
}