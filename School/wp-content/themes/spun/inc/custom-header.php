<?php
/**
 * @package Spun
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses spun_header_style()
 * @uses spun_admin_header_style()
 * @uses spun_admin_header_image()
 *
 * @package Spun
 */
function spun_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '999999',
		'width'                  => 150,
		'height'                 => 150,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'spun_header_style',
		'admin-head-callback'    => 'spun_admin_header_style',
		'admin-preview-callback' => 'spun_admin_header_image',
	);

	$args = apply_filters( 'spun_custom_header_args', $args );

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'spun_custom_header_setup' );

if ( ! function_exists( 'spun_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see spun_custom_header_setup().
 *
 */
function spun_header_style() {

	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color )
			return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
			// Has the text been hidden?
			if ( 'blank' == $header_text_color ) :
	?>
			.site-title,
			.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
			}
	<?php
			// If the user has set a custom color for the text use that
			else :
	?>
			.site-title a,
			.site-description {
					color: #<?php echo $header_text_color; ?>;
			}
	<?php endif; ?>
	</style>
	<?php
}
endif; // spun_header_style

if ( ! function_exists( 'spun_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see spun_custom_header_setup().
 *
 */
function spun_admin_header_style() {
?>
	<style type="text/css">
	<?php if ( false == get_theme_mod( 'spun_opacity', false ) ) : ?>
	.header-img-wrapper {
		opacity: .3;
		transition: opacity .5s ease-in-out;
		-webkit-transition: opacity .5s ease-in-out;
		-moz-transition: opacity .5s ease-in-out;
		-o-transition: opacity .5s ease-in-out;
	}
	<?php endif; ?>
	.appearance_page_custom-header #headimg {
		background: #fff;
		border: none;
		box-sizing: border-box;
		padding: 30px 1.5em;
	}
	.site-branding {
		display: inline-block;
		vertical-align: sub;
	}
	.appearance_page_custom-header #headimg:hover .header-img-wrapper {
		opacity: 1;
		transition: opacity .5s ease-in-out;
		-webkit-transition: opacity .5s ease-in-out;
		-moz-transition: opacity .5s ease-in-out;
		-o-transition: opacity .5s ease-in-out;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
		float: left;
		font-family: Playfair, Baskerville, "Times New Roman", Times, serif;
		font-size: 24px;
		font-style: italic;
		font-weight: normal;
		line-height: 1;
		margin: 0;
		text-transform: none;
		vertical-align: middle;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#desc {
		clear: none;
		display: none;
		font-family: Quicksand, Helvetica, Arial, sans-serif;
		-webkit-text-stroke: .35px; /* Hack to fix thin text in Windows */
		font-size: 14px;
		font-style: normal;
		margin: .75em 0;
		text-transform: uppercase;
	}
	#headimg img {
		display: inline-block;
		margin-right: 16px;
		margin-bottom: 0;
		max-width: 100%;
		vertical-align: middle;
	}
	.header-img-wrapper {
		float: left;
		width: 450px;
	}
	</style>
<?php
}
endif; // spun_admin_header_style

if ( ! function_exists( 'spun_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see spun_custom_header_setup().
 *
 */
function spun_admin_header_image() { ?>
	<div id="headimg">
		<div class="header-img-wrapper">
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
			<?php endif; ?>
			<div class="site-branding">
				<?php $style = sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?>
				<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
			</div>
		</div>
	</div>
<?php }
endif; // spun_admin_header_image