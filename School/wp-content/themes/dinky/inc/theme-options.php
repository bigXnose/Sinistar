<?php
/**
 * Dinky theme Options
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;

function dinky_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'dinky-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2013-09-27' );
	wp_enqueue_script( 'dinky-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2013-09-27' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'dinky_admin_enqueue_scripts' );

function dinky_theme_options_init() {

	register_setting(
		'dinky_options',
		'dinky_theme_options',
		'dinky_theme_options_validate'
	);

	add_settings_section(
		'general',
		'',
		'__return_false',
		'theme_options'
	);

	add_settings_field( 'view_title', '<h3>'.__( 'View',     'dinky' ).'<h3>', 'dinky_settings_field_title', 'theme_options', 'general' );
	
	/**
 	 * @since Dinky 1.1
 	 */
	add_settings_field( 'cover_display_home', __( 'Display cover in home page',     'dinky' ), 'dinky_settings_field_cover_display_home', 'theme_options', 'general' );
	add_settings_field( 'cover_display_other', __( 'Display cover in other pages',     'dinky' ), 'dinky_settings_field_cover_display_other', 'theme_options', 'general' );
	add_settings_field( 'content_display_home', __( 'Display content and footer in home page',     'dinky' ), 'dinky_settings_field_content_display_home', 'theme_options', 'general' );	
	
	add_settings_field( 'sidebar_display', __( 'Display sidebar column',     'dinky' ), 'dinky_settings_field_sidebar_display', 'theme_options', 'general' );
	add_settings_field( 'fullmain_nosidebar', '<span id="fullmain-nosidebar-title"' . ((dinky_get_theme_option('sidebar_display')) ? 'style="display: none"' : '') . ' >' .  __( 'Full size main column when dont display sidebar column',     'dinky' )  . '</span>', 'dinky_settings_field_fullmain_nosidebar', 'theme_options', 'general' );
	
	/**
 	 * @since Dinky 1.1
 	 */
	add_settings_field( 'intro_display_home', __( 'Display intro in home page',     'dinky' ), 'dinky_settings_field_intro_display_home', 'theme_options', 'general' );
	
	add_settings_field( 'intro_display_other', __( 'Display intro in other pages',     'dinky' ), 'dinky_settings_field_intro_display_other', 'theme_options', 'general' );
	add_settings_field( 'intro_display_mobile', __( 'Display intro in mobile view',     'dinky' ), 'dinky_settings_field_intro_display_mobile', 'theme_options', 'general' );
	/**
 	 * @since Dinky 1.5
 	 */
	add_settings_field( 'topmenu_logo', __( 'Logo image url to display adjacent top menu',     'dinky' ), 'dinky_settings_field_topmenu_logo', 'theme_options', 'general' );
	
	/**
 	 * @since Dinky 1.5.13
 	 */
	add_settings_field( 'footer_dark', __( 'Dark background for Footer area',     'dinky' ), 'dinky_settings_field_footer_dark', 'theme_options', 'general' );
	
	add_settings_field( 'content_title', '<h3>'.__( 'Content',     'dinky' ).'<h3>', 'dinky_settings_field_title', 'theme_options', 'general' );
	add_settings_field( 'intro_content', __( 'Intro content',     'dinky' ), 'dinky_settings_field_intro_content', 'theme_options', 'general' );
	add_settings_field( 'copyright', __( 'Copyright content',     'dinky' ), 'dinky_settings_field_copyright', 'theme_options', 'general' );
	add_settings_field( 'tags_title', '<h3>'.__( 'Header tags',     'dinky' ).'<h3>', 'dinky_settings_field_title', 'theme_options', 'general' );
	add_settings_field( 'tag_author', __( 'Author link',     'dinky' ), 'dinky_settings_field_tag_author', 'theme_options', 'general' );
	add_settings_field( 'tag_shortlink', __( 'Shortlink',     'dinky' ), 'dinky_settings_field_tag_shortlink', 'theme_options', 'general' );
	
	/**
 	 * @since Dinky 1.2.3
 	 */
	add_settings_field( 'tag_favicon', __( 'Favicon link',     'dinky' ), 'dinky_settings_field_tag_favicon', 'theme_options', 'general' );
	
	add_settings_field( 'social_title', '<h3>'.__( 'Social icons',     'dinky' ).'<h3>', 'dinky_settings_field_title', 'theme_options', 'general' );
	add_settings_field( 'social_mail', __( 'E-mail',     'dinky' ), 'dinky_settings_field_social_mail', 'theme_options', 'general' );
	add_settings_field( 'social_feed', __( 'Feed',     'dinky' ), 'dinky_settings_field_social_feed', 'theme_options', 'general' );
	add_settings_field( 'social_twitter', __( 'Twitter',     'dinky' ), 'dinky_settings_field_social_twitter', 'theme_options', 'general' );
	add_settings_field( 'social_facebook', __( 'Facebook',     'dinky' ), 'dinky_settings_field_social_facebook', 'theme_options', 'general' );
	add_settings_field( 'social_google', __( 'Google+',     'dinky' ), 'dinky_settings_field_social_google', 'theme_options', 'general' );
	add_settings_field( 'social_linkedin', __( 'Linkedin',     'dinky' ), 'dinky_settings_field_social_linkedin', 'theme_options', 'general' );
	add_settings_field( 'social_github', __( 'Github',     'dinky' ), 'dinky_settings_field_social_github', 'theme_options', 'general' );
	add_settings_field( 'social_instagram', __( 'Instagram',     'dinky' ), 'dinky_settings_field_social_instagram', 'theme_options', 'general' );
	add_settings_field( 'social_foursquare', __( 'Foursquare',     'dinky' ), 'dinky_settings_field_social_foursquare', 'theme_options', 'general' );
	add_settings_field( 'social_youtube', __( 'Youtube',     'dinky' ), 'dinky_settings_field_social_youtube', 'theme_options', 'general' );
	add_settings_field( 'social_dribbble', __( 'Dribbble',     'dinky' ), 'dinky_settings_field_social_dribbble', 'theme_options', 'general' );
	add_settings_field( 'social_tumblr', __( 'Tumblr',     'dinky' ), 'dinky_settings_field_social_tumblr', 'theme_options', 'general' );
	add_settings_field( 'social_flickr', __( 'Flickr',     'dinky' ), 'dinky_settings_field_social_flickr', 'theme_options', 'general' );
	add_settings_field( 'social_blogger', __( 'Blogger',     'dinky' ), 'dinky_settings_field_social_blogger', 'theme_options', 'general' );
	add_settings_field( 'social_pinterest', __( 'Pinterest',     'dinky' ), 'dinky_settings_field_social_pinterest', 'theme_options', 'general' );
	add_settings_field( 'social_fivehundredpix', __( 'Fivehundredpix',     'dinky' ), 'dinky_settings_field_social_fivehundredpix', 'theme_options', 'general' );
	add_settings_field( 'social_reddit', __( 'Reddit',     'dinky' ), 'dinky_settings_field_social_reddit', 'theme_options', 'general' );
	add_settings_field( 'social_vimeo', __( 'Vimeo',     'dinky' ), 'dinky_settings_field_social_vimeo', 'theme_options', 'general' );
	add_settings_field( 'social_smugmug', __( 'Smugmug',     'dinky' ), 'dinky_settings_field_social_smugmug', 'theme_options', 'general' );
	add_settings_field( 'social_stumbleupon', __( 'Stumbleupon',     'dinky' ), 'dinky_settings_field_social_stumbleupon', 'theme_options', 'general' );
}
add_action( 'admin_init', 'dinky_theme_options_init' );

function dinky_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_dinky_options', 'dinky_option_page_capability' );

function dinky_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'dinky' ),
		__( 'Theme Options', 'dinky' ),
		'edit_theme_options',
		'theme_options',
		'dinky_theme_options_render_page'
	);

	if ( ! $theme_page ) return;

	add_action( "load-$theme_page", 'dinky_theme_options_help' );
}
add_action( 'admin_menu', 'dinky_theme_options_add_page' );

function dinky_theme_options_help() {
	$help = '';
	$sidebar = '<p><strong>' . __( 'For more information:', 'dinky' ) . '</strong></p>' .
		'<a title="' . __( 'Dinky theme options', 'dinky' ) . '" href="' . __( 'http://en.misam.ir/', 'dinky' ) . 'projects/dinky-blog#theme-options">' . __( 'Click here', 'dinky' ) . '</a>';
	$screen = get_current_screen();
	$screen->add_help_tab( array(
		'title' => __( 'Overview', 'dinky' ),
		'id' => 'theme-options-help',
		'content' => $help,
		)
	);
	$screen->set_help_sidebar( $sidebar );
}

function dinky_get_default_theme_options() {
	$default_theme_options = array(
		'cover_display_home' => true,
		'cover_display_other' => false,
		'content_display_home' => true,
		'sidebar_display' => true,
		'fullmain_nosidebar' => false,
		'intro_display_home' => true,
		'intro_display_other' => true,
		'intro_display_mobile' => true,
		'intro_content' => __('Suitable for personal blogs that you can have blog and also have visit card in home page<br/>Several social icons to display your account links<br/>Support RTL languages and ability to add different languages typography', 'dinky'),
		'version_number' => '1.0',
		'social_mail' => get_bloginfo("admin_email"),
		'social_feed' => get_bloginfo("rss2_url"),
		'social_twitter' => 'http://twitter.com/',
		'social_facebook' => 'http://facebook.com/'
	);

	if ( is_rtl() ) $default_theme_options['theme_layout'] = 'sidebar-content';

	return apply_filters( 'dinky_default_theme_options', $default_theme_options );
}

function dinky_get_theme_options() {
	return get_option( 'dinky_theme_options', dinky_get_default_theme_options() );
}

function dinky_settings_field_title() {
}

function dinky_settings_field_cover_display_home() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['cover_display_home'])) $data = esc_attr( $options['cover_display_home'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[cover_display_home]" id="cover-display-home" value="1" />
	<?php
}

function dinky_settings_field_cover_display_other() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['cover_display_other'])) $data = esc_attr( $options['cover_display_other'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[cover_display_other]" id="cover-display-other" value="1" />
	<?php
}

function dinky_settings_field_content_display_home() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['content_display_home'])) $data = esc_attr( $options['content_display_home'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[content_display_home]" id="content-display-home" value="1" />
	<?php
}

function dinky_settings_field_sidebar_display() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['sidebar_display'])) $data = esc_attr( $options['sidebar_display'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[sidebar_display]" id="sidebar-display" value="1" onclick="sidebar_display_click();" />
	<?php
}

function dinky_settings_field_fullmain_nosidebar() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['fullmain_nosidebar'])) $data = esc_attr( $options['fullmain_nosidebar'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[fullmain_nosidebar]" id="fullmain-nosidebar" value="1" <?php if ($options['sidebar_display']) echo 'style="display: none;"'; ?> />
	<?php
}

function dinky_settings_field_intro_display_home() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['intro_display_home'])) $data = esc_attr( $options['intro_display_home'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[intro_display_home]" id="intro-display-home" value="1" />
	<?php
}

function dinky_settings_field_intro_display_other() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['intro_display_other'])) $data = esc_attr( $options['intro_display_other'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[intro_display_other]" id="intro-display-other" value="1" />
	<?php
}

function dinky_settings_field_intro_display_mobile() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['intro_display_mobile'])) $data = esc_attr( $options['intro_display_mobile'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[intro_display_mobile]" id="intro-display-mobile" value="1" />
	<?php
}

/**
 * @since Dinky 1.5
 */
function dinky_settings_field_topmenu_logo() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['topmenu_logo'])) $data = esc_attr( $options['topmenu_logo'] );
	?>
	<input type="text" name="dinky_theme_options[topmenu_logo]" id="topmenu-logo" value="<?php echo $data; ?>" />
	<?php
}

/**
 * @since Dinky 1.5.13
 */
function dinky_settings_field_footer_dark() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['footer_dark'])) $data = esc_attr( $options['footer_dark'] );
	if ($data == '') $data = false;
	?>
	<input type="checkbox" <?php if ($data) echo "checked"; ?> name="dinky_theme_options[footer_dark]" id="footer_dark" value="1" />
	<?php
}

function dinky_settings_field_intro_content() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['intro_content'])) $data = esc_attr( $options['intro_content'] );
	?>
	<textarea name="dinky_theme_options[intro_content]" id="intro_content"><?php echo $data; ?></textarea>
	<?php
}

function dinky_settings_field_copyright() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['copyright'])) $data = esc_attr( $options['copyright'] );
	?>
	<input type="text" name="dinky_theme_options[copyright]" id="copyright" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_tag_author() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['tag_author'])) $data = esc_url( $options['tag_author'] );
	?>
	<input type="text" name="dinky_theme_options[tag_author]" id="tag-author" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_tag_shortlink() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['tag_shortlink'])) $data = esc_url( $options['tag_shortlink'] );
	?>
	<input type="text" name="dinky_theme_options[tag_shortlink]" id="tag-shortlink" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_tag_favicon() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['tag_favicon'])) $data = esc_url( $options['tag_favicon'] );
	?>
	<input type="text" name="dinky_theme_options[tag_favicon]" id="tag-favicon" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_mail() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_mail'])) $data = esc_attr( $options['social_mail'] );
	?>
	<input type="text" name="dinky_theme_options[social_mail]" id="social-mail" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_feed() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_feed'])) $data = esc_url( $options['social_feed'] );
	?>
	<input type="text" name="dinky_theme_options[social_feed]" id="social-feed" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_twitter() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_twitter'])) $data = esc_url( $options['social_twitter'] );
	?>
	<input type="text" name="dinky_theme_options[social_twitter]" id="social-twitter" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_facebook() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_facebook'])) $data = esc_url( $options['social_facebook'] );
	?>
	<input type="text" name="dinky_theme_options[social_facebook]" id="social-facebook" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_google() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_google'])) $data = esc_url( $options['social_google'] );
	?>
	<input type="text" name="dinky_theme_options[social_google]" id="social-google" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_linkedin() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_linkedin'])) $data = esc_url( $options['social_linkedin'] );
	?>
	<input type="text" name="dinky_theme_options[social_linkedin]" id="social-linkedin" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_github() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_github'])) $data = esc_url( $options['social_github'] );
	?>
	<input type="text" name="dinky_theme_options[social_github]" id="social-github" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_instagram() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_linkedin'])) $data = esc_url( $options['social_linkedin'] );
	?>
	<input type="text" name="dinky_theme_options[social_instagram]" id="social-instagram" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_foursquare() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_foursquare'])) $data = esc_url( $options['social_foursquare'] );
	?>
	<input type="text" name="dinky_theme_options[social_foursquare]" id="social-foursquare" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_youtube() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_youtube'])) $data = esc_url( $options['social_youtube'] );
	?>
	<input type="text" name="dinky_theme_options[social_youtube]" id="social-youtube" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_dribbble() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_dribbble'])) $data = esc_url( $options['social_dribbble'] );
	?>
	<input type="text" name="dinky_theme_options[social_dribbble]" id="social-dribbble" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_tumblr() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_tumblr'])) $data = esc_url( $options['social_tumblr'] );
	?>
	<input type="text" name="dinky_theme_options[social_tumblr]" id="social-tumblr" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_flickr() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_flickr'])) $data = esc_url( $options['social_flickr'] );
	?>
	<input type="text" name="dinky_theme_options[social_flickr]" id="social-flickr" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_blogger() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_blogger'])) $data = esc_url( $options['social_blogger'] );
	?>
	<input type="text" name="dinky_theme_options[social_blogger]" id="social-blogger" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_pinterest() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_pinterest'])) $data = esc_url( $options['social_pinterest'] );
	?>
	<input type="text" name="dinky_theme_options[social_pinterest]" id="social-pinterest" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_fivehundredpix() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_fivehundredpix'])) $data = esc_url( $options['social_fivehundredpix'] );
	?>
	<input type="text" name="dinky_theme_options[social_fivehundredpix]" id="social-fivehundredpix" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_reddit() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_reddit'])) $data = esc_url( $options['social_reddit'] );
	?>
	<input type="text" name="dinky_theme_options[social_reddit]" id="social-reddit" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_vimeo() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_vimeo'])) $data = esc_url( $options['social_vimeo'] );
	?>
	<input type="text" name="dinky_theme_options[social_vimeo]" id="social-vimeo" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_smugmug() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_smugmug'])) $data = esc_url( $options['social_smugmug'] );
	?>
	<input type="text" name="dinky_theme_options[social_smugmug]" id="social-smugmug" value="<?php echo $data; ?>" />
	<?php
}

function dinky_settings_field_social_stumbleupon() {
	$options = dinky_get_theme_options();
	$data = '';
	if (isset($options['social_stumbleupon'])) $data = esc_url( $options['social_stumbleupon'] );
	?>
	<input type="text" name="dinky_theme_options[social_stumbleupon]" id="social-stumbleupon" value="<?php echo $data; ?>" />
	<?php
}

function dinky_theme_options_render_page() {
	?>
	<div class="wrap" id="dinky-options">
		<?php screen_icon(); ?>
		<?php $theme_name = wp_get_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'dinky' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'dinky_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
		<div id="dinky-ads">
		</div>
	</div>
	<?php
}

function dinky_theme_options_validate( $input ) {
	$output = $defaults = dinky_get_default_theme_options();

	//return apply_filters( 'dinky_theme_options_validate', $output, $input, $defaults );
	return $input;
}

function dinky_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$options  = dinky_get_theme_options();
	$defaults = dinky_get_default_theme_options();
}
add_action( 'customize_register', 'dinky_customize_register' );

function dinky_customize_preview_js() {
	wp_enqueue_script( 'dinky-customizer', get_template_directory_uri() . '/inc/theme-customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'dinky_customize_preview_js' );