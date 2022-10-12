<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	<?php } // if ( ! empty( $header_image ) ) ?>

 *
 * @package alexandria
 */
if ( ! function_exists( 'alexandria_custom_header_setup' ) ) :
/**
 * Setup the WordPress core custom header feature.
 *
 * @uses alexandria_header_style()
 * @uses alexandria_admin_header_style()
 * @uses alexandria_admin_header_image()
 *
 * @package alexandria
 */
function alexandria_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'alexandria_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000',
		'width'                  => 1920,
		'height'                 => 500,
		'flex-height'            => true,
		'flex-width'             => true,
		'header-text'            => false,
		'wp-head-callback'       => '',
		'admin-head-callback'    => 'alexandria_admin_header_style',
		'admin-preview-callback' => 'alexandria_admin_header_image',
	) ) );
}
endif; // alexandria_custom_header_setup
add_action( 'after_setup_theme', 'alexandria_custom_header_setup' );

if ( ! function_exists( 'alexandria_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see alexandria_custom_header_setup().
 */
function alexandria_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // alexandria_admin_header_style

if ( ! function_exists( 'alexandria_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see alexandria_custom_header_setup().
 */
function alexandria_admin_header_image() {
	$style        = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	$header_image = get_header_image();
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // alexandria_admin_header_image
