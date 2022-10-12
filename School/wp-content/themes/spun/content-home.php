<?php
/**
 * @package Spun
 */

/*
 * Get the post thumbnail; if one does not exist, try to get the first attached image.
 * If no images exist, let's print the post title instead.
 */
$restore_widont = remove_filter( 'the_title', 'widont' );
$postclass = '';
$spun_image = spun_get_image( get_the_ID() );

if ( '' != $spun_image ) :
	$thumb = $spun_image;
else :
	$thumb = '<span class="thumbnail-title no-thumbnail">' . get_the_title() . '</span>';
	$postclass = 'no-thumbnail';
endif;

if ( 'no-thumbnail' != $postclass ) :
	$thumb .= '<span class="thumbnail-title">' . get_the_title() . '</span>';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $postclass ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $thumb; ?></a>
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( $restore_widont )
		add_filter( 'the_title', 'widont' ); ?>