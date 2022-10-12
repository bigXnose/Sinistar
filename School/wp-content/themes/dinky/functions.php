<?php
/**
 * Dinky theme functions and definitions.
 *
 * @package Dinky
 * @since Dinky 1.0
 * @license GNU General Public License v3 or later
 * @copyright (C) 2013  Misam Saki, misam.ir
 * @author Misam Saki,  http://misam.ir/
 */

if ( !defined('ABSPATH')) exit;

if ( !isset( $content_width ) ) $content_width = 600;

function dinky_setup() {

	load_theme_textdomain( 'dinky', get_template_directory() . '/language' );

	add_editor_style();

	require( get_template_directory() . '/inc/theme-options.php' );

	require( get_template_directory() . '/inc/widgets.php' );

	/**
	 * @since Dinky 1.2
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	add_theme_support( 'automatic-feed-links' );

	register_nav_menu( 'primary', __( 'Primary Menu', 'dinky' ) );
	/**
	 * @since Dinky 1.5
	 */
	register_nav_menu( 'top', __( 'Top Menu', 'dinky' ) );
	/**
	 * @since Dinky 1.6
	 */
	register_nav_menu( 'footer', __( 'Footer Menu', 'dinky' ) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'fff',
	) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 598, 9999 ); // Unlimited height, soft crop

	add_theme_support( 'custom-header', array(
		'default-image' => '',
		'random-default' => true,
		'width' => 1000,
		'height' => 567,
		'flex-height' => true,
		'flex-width' => true,
		'default-text-color' => 'fff',
		'header-text' => true,
		'uploads' => true,
		'wp-head-callback' => '',
		'admin-head-callback' => 'dinky_admin_header_style',
		'admin-preview-callback' => 'dinky_admin_header_image'
		)
	);
	register_default_headers( array(
		'beach' => array(
			'url' => '%s/img/cover/beach.jpg',
			'thumbnail_url' => '%s/img/cover/beach-thumbnail.jpg',
			'description' => __( 'Beach', 'dinky' ) . ' - Iran / Gilan / Chamkhale'
		)
	) );
}
add_action( 'after_setup_theme', 'dinky_setup' );

function dinky_admin_header_style() { ?>
<style type="text/css">
#cover{width:800px;height:250px}.cover{width:800px;height:250px;position:absolute;z-index:-1}#title{width:100%;padding:80px 0 0 0;text-align:center}h1.title{text-shadow:1px 1px 0px #000;color:#FFF}h1.title:after{position:absolute;padding:5px;background:#0085BD;border-radius:7px;font-weight:normal;color:#FFF;text-shadow:none}h2.subtitle{text-shadow:1px 1px 0px #000;color:#FFF}
hgroup#title {
	<?php if (get_header_textcolor() == 'blank'): ?>display: none;<?php endif; ?>
}
h1.title, h2.subtitle {
	<?php if (get_header_textcolor() != 'blank'): ?>color: #<?php echo get_header_textcolor(); ?>;<?php endif; ?>
}
</style>
<?php }

function dinky_admin_header_image() { ?>
	<div id="cover">
		<?php if (get_header_image() != ''): ?><img alt="cover" class="cover" src="<?php echo get_header_image(); ?>" /><?php endif; ?>
		<?php if (1==1): ?>
		<hgroup id="title">
			<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
			<h2 class="subtitle"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
		<?php endif; ?>
	</div>
<?php }

function dinky_scripts_styles() {
	global $wp_styles;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	$fonts = __('Open+Sans:400italic,700italic,400,700|Droid+Serif:400italic,700italic,400,700', 'dinky');
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array('family' => $fonts);
	wp_enqueue_style( 'dinky-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_style( 'dinky-style', get_stylesheet_uri(), array(), '2013-09-27' );

	/**
	 * @since Dinky 1.5.13
	 */
	wp_style_add_data( 'dinky-style', 'rtl', get_template_directory_uri() . '/css/rtl.css?ver=2013-09-27' );

	wp_add_inline_style( 'dinky-style', dinky_get_custome_style() ); // Add custom style
	
	if (get_bloginfo('language') != 'en-US') wp_enqueue_style( 'dinky-style-lanugage-' . get_bloginfo('language'), get_template_directory_uri() . '/css/language/' . get_bloginfo('language') . '.css', array(), '2013-09-27' );

	wp_enqueue_style( 'dinky-ie', get_template_directory_uri() . '/css/ie.css', array( 'dinky-style' ), '2013-09-27' );
	$wp_styles->add_data( 'dinky-ie', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'dinky-ready', get_template_directory_uri() . '/js/ready.js', array('jquery'), '2013-09-27' );

}
add_action( 'wp_enqueue_scripts', 'dinky_scripts_styles' );

function dinky_get_custome_style() {
	$custom_style = "";
	if (get_header_textcolor() == 'blank'): $custom_style .=
	"#title {
		display: none;
	}";
	endif;
	if (get_header_textcolor() != 'blank'): $custom_style .=
	"#title .title, #title .subtitle {
		color: #" . get_header_textcolor() . ";
	}";
	endif;
	if ((!dinky_get_theme_option('content_display_home') & is_home())): $custom_style .=
	"#footer {
		display: none;
	}
	@media screen and (max-width: 600px) {
		#footer {
			display: block;
		}
	}";
	endif;
	if (!dinky_get_theme_option('intro_display_mobile')): $custom_style .=
	"@media screen and (max-width: 600px) {
		#intro {
			display: none;
		}
	}";
	endif;

	return $custom_style;
}

function dinky_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) return $title;

	$title .= get_bloginfo( 'name' );

	if (function_exists('jdate')) {
		global $post;
		if ( is_day() ) {
			$title = jdate('d', strtotime($post->post_date)) . " $sep " . jdate('F', strtotime($post->post_date)) . " $sep " . jdate('Y', strtotime($post->post_date)) . " $sep " . get_bloginfo( 'name' );
			return $title;
		} elseif ( is_month() ) {
			$title = jdate('F', strtotime($post->post_date)) . " $sep " . jdate('Y', strtotime($post->post_date)) . " $sep " . get_bloginfo( 'name' );
			return $title;
		} elseif ( is_year() ) {
			$title = jdate('Y', strtotime($post->post_date)) . " $sep " . get_bloginfo( 'name' );
			return $title;
		}
	}

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) $title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 ) $title =  sprintf( __( 'Page %s', 'dinky' ), max( $paged, $page ) ) . " $sep $title";

	return $title;
}
add_filter( 'wp_title', 'dinky_wp_title', 10, 2 );

function dinky_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'dinky_page_menu_args' );

function dinky_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Widgets Area', 'dinky' ),
		'id' => 'sidebar',
		'description' => __( '', 'dinky' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="entry-content">',
		'after_widget' => '</div></aside>',
		'before_title' => '<div class="entry-header"><span class="entry-title">',
		'after_title' => '</span></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Up Main Widgets Area', 'dinky' ),
		'id' => 'up_main',
		'description' => __( '', 'dinky' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="entry-content">',
		'after_widget' => '</div></aside>',
		'before_title' => '<div class="entry-header"><span class="entry-title">',
		'after_title' => '</span></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Under Main Widgets Area', 'dinky' ),
		'id' => 'under_main',
		'description' => __( '', 'dinky' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="entry-content">',
		'after_widget' => '</div></aside>',
		'before_title' => '<div class="entry-header"><span class="entry-title">',
		'after_title' => '</span></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Under Content (up footer) Widgets Area', 'dinky' ),
		'id' => 'under_content',
		'description' => __( '', 'dinky' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="entry-content">',
		'after_widget' => '</div></aside>',
		'before_title' => '<div class="entry-header"><span class="entry-title">',
		'after_title' => '</span></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widgets Area', 'dinky' ),
		'id' => 'footer',
		'description' => __( '', 'dinky' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="entry-content">',
		'after_widget' => '</div></aside>',
		'before_title' => '<div class="entry-header"><span class="entry-title">',
		'after_title' => '</span></div>'
	) );
}
add_action( 'widgets_init', 'dinky_widgets_init' );

/**
 * @since Dinky 1.2 (changed function name(1.2, 1.3.2). created in Dinky 1.0)
 */
function dinky_archive_nav() {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="archive-nav" class="navigation" role="navigation">
			<?php if(function_exists('wp_pagenavi')) : ?>
				<?php wp_pagenavi(); ?>
			<?php else: ?>
			<?php next_posts_link( __( '<span class="previous">&larr;</span> Older posts', 'dinky' ) ); ?>
			<?php previous_posts_link( __( 'Newer posts <span class="next">&rarr;</span>', 'dinky' ) ); ?>
			<?php endif; ?>
		</nav>
	<?php endif;
}

/**
 * @since Dinky 1.2
 */
function dinky_posts_nav() { ?>
	<nav id="posts-nav" class="navigation" role="navigation">
		<?php previous_post_link( '%link', '<span class="previous">' . __( '&larr; Previous', 'dinky' ) . '</span>', true ); ?>
		<?php next_post_link( '%link', '<span class="next">' . __( 'Next &rarr;', 'dinky' ) . '</span>', true ); ?>
	</nav>
<?php }

/**
 * @since Dinky 1.2
 */
function dinky_post_nav() { ?>
	<?php wp_link_pages( array( 'before' => '<nav id="post-nav" class="navigation"><span class="nav-description">' . __( 'Pages', 'dinky' ) . '</span>' , 'after' => '</nav>' ) ); ?>
<?php }

function dinky_post_thumbnail() { ?>
	<?php if ( !is_single() && has_post_thumbnail() ) : ?>
		<div class="entry-image">
			<div class="container">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'dinky' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
			</div>
		</div>
	<?php endif; ?>
<?php }

function dinky_entry_meta() {
	$categories_list = get_the_category_list( __( ', ', 'dinky' ) );

	$tag_list = get_the_tag_list( '', __( ', ', 'dinky' ) );

	global $post;
	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( function_exists('jdate') ? jdate(get_option('date_format'), strtotime($post->post_date)) : get_the_time() ),
		esc_attr( get_the_date('c') ),
		esc_html( function_exists('jdate') ? jdate(get_option('date_format'), strtotime($post->post_date)) : get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'dinky' ), get_the_author() ) ),
		get_the_author()
	);

	if ( $tag_list ) {
		$utility_text = __( 'Posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'dinky' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'Posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'dinky' );
	} else {
		$utility_text = __( 'Posted on %3$s<span class="by-author"> by %4$s</span>.', 'dinky' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

function dinky_entry_shortmeta() {
	global $post;
	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( function_exists('jdate') ? jdate(get_option('date_format'), strtotime($post->post_date)) : get_the_time() ),
		esc_attr( get_the_date('c') ),
		esc_html( function_exists('jdate') ? jdate(get_option('date_format'), strtotime($post->post_date)) : get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'dinky' ), get_the_author() ) ),
		get_the_author()
	);

	$utility_text = __( 'Posted on %3$s<span class="by-author"> by %4$s</span>.', 'dinky' );

	printf(
		$utility_text,
		'',
		'',
		$date,
		$author
	);
}

/**
 * @since Dinky 1.1
 */
function dinky_entry_imagemeta() {
	global $post;
	$metadata = wp_get_attachment_metadata();
	if (isset($metadata['width'])) $width = $metadata['width']; else $width = __('Unknow', 'dinky');
	if (isset($metadata['height'])) $height = $metadata['height']; else $height = __('Unknow', 'dinky');
	printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'dinky' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( function_exists('jdate') ? jdate(get_option('date_format'), strtotime($post->post_date)) : get_the_date() ),
		esc_url( wp_get_attachment_url() ),
		$width,
		$height,
		esc_url( get_permalink( $post->post_parent ) ),
		esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
		get_the_title( $post->post_parent )
	);
}

/**
 * @since Dinky 1.2
 */
function dinky_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'dinky_attachment_size', array( 500, 500 ) );
	$next_attachment_url = wp_get_attachment_url();

	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		if ( $next_id ) $next_attachment_url = get_attachment_link( $next_id );
			else $next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}

/**
 * @since Dinky 1.2
 */
function dinky_archive_title() {
	global $post;
	if ( is_day() ) :
		printf( __( 'Daily Archives: %s', 'dinky' ), '<span>' . (function_exists('jdate') ? jdate(get_option('date_format'), strtotime($post->post_date)) : get_the_date()) . '</span>' );
	elseif ( is_month() ) :
		printf( __( 'Monthly Archives: %s', 'dinky' ), '<span>' . (function_exists('jdate') ? jdate('F Y', strtotime($post->post_date)) : get_the_date( 'F Y' )) . '</span>' );
	elseif ( is_year() ) :
		printf( __( 'Yearly Archives: %s', 'dinky' ), '<span>' . (function_exists('jdate') ? jdate('Y', strtotime($post->post_date)) : get_the_date( 'Y' )) . '</span>' );
	else :
		_e( 'Archives', 'dinky' );
	endif;
}

function dinky_body_class( $classes ) {
	$background_color = get_background_color();

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	if ( wp_style_is( 'dinky-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'dinky_body_class' );

function dinky_get_theme_option( $option ) {
	$theme_options = dinky_get_theme_options();
	if (isset($theme_options[$option])) $value = $theme_options[$option]; else $value = '';
	return $value;
}
?>
