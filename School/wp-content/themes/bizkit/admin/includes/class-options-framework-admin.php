<?php
/**
 * @package   Options_Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2014 WP Theming
 */

class Options_Framework_Admin {

	/**
     * Page hook for the options screen
     *
     * @since 1.7.0
     * @type string
     */
    protected $options_screen = null;

    /**
     * Hook in the scripts and styles
     *
     * @since 1.7.0
     */
    public function init() {

		// Gets options to load
    	$options = & Options_Framework::_optionsframework_options();

		// Checks if options are available
    	if ( $options ) {

			// Add the options page and menu item.
			add_action( 'admin_menu', array( $this, 'add_custom_options_page' ) );

			// Add the required scripts and styles
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			// Settings need to be registered after admin_init
			add_action( 'admin_init', array( $this, 'settings_init' ) );

			// Adds options menu to the admin bar
			add_action( 'wp_before_admin_bar_render', array( $this, 'optionsframework_admin_bar' ) );

		}

    }

	/**
     * Registers the settings
     *
     * @since 1.7.0
     */
    function settings_init() {

    	// Load Options Framework Settings
        $optionsframework_settings = get_option( 'optionsframework' );

		// Registers the settings fields and callback
		register_setting( 'optionsframework', $optionsframework_settings['id'],  array ( $this, 'validate_options' ) );

		// Displays notice after options save
		add_action( 'optionsframework_after_validate', array( $this, 'save_options_notice' ) );

    }

	/*
	 * Define menu options
	 *
	 * Examples usage:
	 *
	 * add_filter( 'optionsframework_menu', function( $menu ) {
	 *     $menu['page_title'] = 'The Options';
	 *	   $menu['menu_title'] = 'The Options';
	 *     return $menu;
	 * });
	 *
	 * @since 1.7.0
	 *
	 */
	static function menu_settings() {

		$menu = array(

			// Modes: submenu, menu
            'mode' => 'submenu',

            // Submenu default settings
            'page_title' => __( 'Theme Options', 'textdomain'),
			'menu_title' => __('Theme Options', 'textdomain'),
			'capability' => 'edit_theme_options',
			'menu_slug' => 'options-framework',
            'parent_slug' => 'themes.php',

            // Menu default settings
            'icon_url' => 'dashicons-admin-generic',
            'position' => '61'

		);

		return apply_filters( 'optionsframework_menu', $menu );
	}

	/**
     * Add a subpage called "Theme Options" to the appearance menu.
     *
     * @since 1.7.0
     */
	function add_custom_options_page() {

		$menu = $this->menu_settings();

		// If you want a top level menu, see this Gist:
		// https://gist.github.com/devinsays/884d6abe92857a329d99

		// Code removed because it conflicts with .org theme check.

		$this->options_screen = add_theme_page(
            	$menu['page_title'],
            	$menu['menu_title'],
            	$menu['capability'],
            	$menu['menu_slug'],
            	array( $this, 'options_page' )
        );

	}

	/**
     * Loads the required stylesheets
     *
     * @since 1.7.0
     */

	function enqueue_admin_styles( $hook ) {

		if ( $this->options_screen != $hook )
	        return;

		wp_enqueue_style( 'optionsframework', OPTIONS_FRAMEWORK_DIRECTORY . 'css/optionsframework.css', array(),  Options_Framework::VERSION );
		wp_enqueue_style( 'wp-color-picker' );
	}

	/**
     * Loads the required javascript
     *
     * @since 1.7.0
     */
	function enqueue_admin_scripts( $hook ) {

		if ( $this->options_screen != $hook )
	        return;

		// Enqueue custom option panel JS
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script( 'options-custom', OPTIONS_FRAMEWORK_DIRECTORY . 'js/options-custom.js', array( 'jquery','wp-color-picker' ), Options_Framework::VERSION );
		wp_enqueue_script('options-tabs', OPTIONS_FRAMEWORK_DIRECTORY.'js/jquery-ui.js', array('jquery'));
		
		// Inline scripts from options-interface.php
		add_action( 'admin_head', array( $this, 'of_admin_head' ) );
	}

	function of_admin_head() {
		// Hook to add custom scripts
		do_action( 'optionsframework_custom_scripts' );
	}

	/**
     * Builds out the options panel.
     *
	 * If we were using the Settings API as it was intended we would use
	 * do_settings_sections here.  But as we don't want the settings wrapped in a table,
	 * we'll call our own custom optionsframework_fields.  See options-interface.php
	 * for specifics on how each individual field is generated.
	 *
	 * Nonces are provided using the settings_fields()
	 *
     * @since 1.7.0
     */
	 function options_page() { ?>

		<div id="optionsframework" class="wrap">

			<?php settings_errors( 'options-framework' ); ?>        	
            
		    <div class="new_options_container">
            
				<form action="options.php" method="post">
				<?php settings_fields( 'optionsframework' ); ?>            
            
                <div class="new_options_container_top">
                
                    <div class="new_options_container_top_logo">
                        <a href="http://www.themealley.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a>
                    </div>
                    
                    <div class="new_options_container_top_twit">
                    
                        <div class="new_options_container_top_twit_bookmark">
                        
                            <div class="new_options_container_top_twit_bookmarkf">
                                                <div id="fb-root"></div>
                                                <script>(function(d, s, id) {
                                                  var js, fjs = d.getElementsByTagName(s)[0];
                                                  if (d.getElementById(id)) return;
                                                  js = d.createElement(s); js.id = id;
                                                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                                  fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));</script>
                                                <div class="fb-like" data-href="http://www.facebook.com/ThemeAlley" data-send="false" data-layout="box_count" data-width="450" data-show-faces="false"></div>
                                                </div>                
                    
                            
                            <div class="new_options_container_top_twit_bookmarkt">
                                        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="https://www.themealley.com/" data-count="vertical" data-text="Responsive WordPress Themes">Tweet</a>
                                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                            </div> 
                            
                            
                            <div class="new_options_container_top_twit_bookmarkg">
                            <!-- Place this tag where you want the +1 button to render -->
                            <g:plusone size="tall" href="https://www.themealley.com/"></g:plusone>
                                                                            
                            <!-- Place this render call where appropriate -->
                            <script type="text/javascript">
                                                                              (function() {
                                                                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                                                                po.src = 'https://apis.google.com/js/plusone.js';
                                                                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                                                              })();
                            </script>  
                            </div>                     
                                      
                            
                        </div>
                    </div>
                     
                    <div class="new_options_container_top_rate">
                        <a href="http://www.themealley.com/business/?a_aid=tskk&a_bid=550dad4a&chan=<?php echo wp_get_theme(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/rate.png" />
                        </a>
                    </div>                                     
                
                </div><!-- .new_options_container_top --> 
                
            	<div id="countrytabs" class="new_options_container_middle">
                
                    <ul class="shadetabs">
                        <li class="big"><a href="#country1"><h6><?php echo __('General', 'alexandria'); ?></h6><p><?php echo __('Settings', 'alexandria'); ?></p></a></li>
                        <li class="small"><a href="#country2"><p><?php echo __('Social Settings', 'alexandria'); ?></p></a></li>
                        <li class="big"><a href="#country10"><h6><?php echo __('Logo Section', 'alexandria'); ?></h6><p><?php echo __('Settings', 'alexandria'); ?></p></a></li>       
                        
                        <li class="big"><a href="#country3"><h6><?php echo __('Header', 'alexandria'); ?></h6><p><?php echo __('Settings', 'alexandria'); ?></p></a></li>
                                         
                        <li class="big"><a href="#country4"><h6><?php echo __('Layout', 'alexandria'); ?></h6><p><?php echo __('Settings', 'alexandria'); ?></p></a></li>
                        <li class="small"><a href="#country5"><p><?php echo __('Biz One Settings', 'alexandria'); ?></p></a></li>  
                        <li class="small"><a href="#country7"><p><?php echo __('Biz Two Settings', 'alexandria'); ?></p></a></li>               
                        <li class="small"><a href="#country9"><p><?php echo __('Standard Blog Settings', 'alexandria'); ?></p></a></li>
                        <li class="big"><a href="#country19"><h6><?php echo __('Portfolio', 'alexandria'); ?></h6><p><?php echo __('Settings', 'alexandria'); ?></p></a></li>                                             
                        
                        <li class="big"><a href="#country11"><h6><?php echo __('Footer', 'alexandria'); ?></h6><p><?php echo __('Settings', 'alexandria'); ?></p></a></li>                                             
                    </ul> 
                    
                    <div class="shadetabscontent">
                
    
                    <?php Options_Framework_Interface::optionsframework_fields(); /* Settings */ ?>
                    
                    </div><!-- .shadetabscontent -->
                    
                    <script type="text/javascript">
                    
                                           jQuery(document).ready(function(){
                                                jQuery.noConflict();
                                                jQuery('#countrytabs').tabs();
                                            });	
                    
                    </script>                                   
                
                
                
                </div><!-- #new_options_container_middle -->
                
				<div class="new_options_container_bottom">

                    <input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( __('Save Options', 'alexandria' ) ); ?>" />
                                        <input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( __('Restore Defaults', 'alexandria' ) ); ?>" onclick="return confirm( '<?php print esc_js( __( 'Click OK to reset. Any theme settings will be lost!', 'alexandria' ) ); ?>' );" />                
                
                </div><!-- .new_options_container_bottom -->                            
                         
            </form> 
			</div><!-- .new_options_container -->                
        
        </div><!-- #optionsframework -->                                      

	<?php
	}

	/**
	 * Validate Options.
	 *
	 * This runs after the submit/reset button has been clicked and
	 * validates the inputs.
	 *
	 * @uses $_POST['reset'] to restore default options
	 */
	function validate_options( $input ) {

		/*
		 * Restore Defaults.
		 *
		 * In the event that the user clicked the "Restore Defaults"
		 * button, the options defined in the theme's options.php
		 * file will be added to the option for the active theme.
		 */

		if ( isset( $_POST['reset'] ) ) {
			add_settings_error( 'options-framework', 'restore_defaults', __( 'Default options restored.', 'textdomain' ), 'updated fade' );
			return $this->get_default_values();
		}

		/*
		 * Update Settings
		 *
		 * This used to check for $_POST['update'], but has been updated
		 * to be compatible with the theme customizer introduced in WordPress 3.4
		 */

		$clean = array();
		$options = & Options_Framework::_optionsframework_options();
		foreach ( $options as $option ) {

			if ( ! isset( $option['id'] ) ) {
				continue;
			}

			if ( ! isset( $option['type'] ) ) {
				continue;
			}

			$id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

			// Set checkbox to false if it wasn't sent in the $_POST
			if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
				$input[$id] = false;
			}

			// Set each item in the multicheck to false if it wasn't sent in the $_POST
			if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
				foreach ( $option['options'] as $key => $value ) {
					$input[$id][$key] = false;
				}
			}

			// For a value to be submitted to database it must pass through a sanitization filter
			if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
				$clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
			}
		}

		// Hook to run after validation
		do_action( 'optionsframework_after_validate', $clean );

		return $clean;
	}

	/**
	 * Display message when options have been saved
	 */

	function save_options_notice() {
		add_settings_error( 'options-framework', 'save_options', __( 'Options saved.', 'textdomain' ), 'updated fade' );
	}

	/**
	 * Get the default values for all the theme options
	 *
	 * Get an array of all default values as set in
	 * options.php. The 'id','std' and 'type' keys need
	 * to be defined in the configuration array. In the
	 * event that these keys are not present the option
	 * will not be included in this function's output.
	 *
	 * @return array Re-keyed options configuration array.
	 *
	 */

	function get_default_values() {
		$output = array();
		$config = & Options_Framework::_optionsframework_options();
		foreach ( (array) $config as $option ) {
			if ( ! isset( $option['id'] ) ) {
				continue;
			}
			if ( ! isset( $option['std'] ) ) {
				continue;
			}
			if ( ! isset( $option['type'] ) ) {
				continue;
			}
			if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
				$output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
			}
		}
		return $output;
	}

	/**
	 * Add options menu item to admin bar
	 */

	function optionsframework_admin_bar() {

		$menu = $this->menu_settings();

		global $wp_admin_bar;

		if ( 'menu' == $menu['mode'] ) {
			$href = admin_url( 'admin.php?page=' . $menu['menu_slug'] );
		} else {
			$href = admin_url( 'themes.php?page=' . $menu['menu_slug'] );
		}

		$args = array(
			'parent' => 'appearance',
			'id' => 'of_theme_options',
			'title' => $menu['menu_title'],
			'href' => $href
		);

		$wp_admin_bar->add_menu( apply_filters( 'optionsframework_admin_bar', $args ) );
	}

}
