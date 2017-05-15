<?php

/**
 * Wrap the post featured image with our markup
 *
 * @param $html
 *
 * @return string
 */
function pi_add_wrapping_markup( $html ) {
	if ( is_admin() ) {
		return $html;
	}
	return '<div class="pi_image-placeholder">' . $html . '</div>';
}
add_filter( 'post_thumbnail_html', 'pi_add_wrapping_markup' );

/**
 * Replace featured image src and src attributes with our data attributes. Add some padding to the
 * placeholders for some smoothness
 *
 * @param $attr
 * @param $attachment
 * @param $size
 *
 * @return mixed
 */
function pi_replace_thumbnail_attributes( $attr, $attachment, $size ) {

	if ( is_admin() ) {
		return $attr;
	}

	$image = wp_get_attachment_image_src( $attachment->ID, $size );

	if ( empty( $image['1'] ) || empty( $image['2'] ) ) {
		return $attr;
	}

	$aspect_ratio        = ProgressiveImages\get_aspect_ratio( $image['1'], $image['2'] );
	$attr['style']       = 'padding-bottom: ' . $aspect_ratio . '%';
	$attr['data-src']    = $attr['src'];
	$attr['data-srcset'] = $attr['srcset'];

	unset( $attr['srcset'] );
	unset( $attr['src'] );

	return $attr;

}
add_filter( 'wp_get_attachment_image_attributes', 'pi_replace_thumbnail_attributes', 10, 3 );


/**
 * Wrap content images with our placeholder div
 *
 * @param $content
 *
 * @return mixed
 */
function pi_add_wrapping_content_markup( $content ) {

	// A regular expression of what to look for.
	$pattern = '/(<img([^>]*)>)/i';

	// What to replace it with. $1 refers to the content in the first 'capture group', in parentheses above
	$replacement = '<div class="pi_image-placeholder">$1</div>';

	// run preg_replace() on the $content
	$content = preg_replace( $pattern, $replacement, $content );

	// return the processed content
	return $content;
}
add_filter( 'the_content', 'pi_add_wrapping_content_markup' );

/*
 * Replace src attribute with data-src
 */
function pi_replace_src( $content ) {

	// A regular expression of what to look for.
	$pattern = '/src=/i';

	// What to replace it with. $1 refers to the content in the first 'capture group', in parentheses above
	$replacement = 'data-src=';

	// run preg_replace() on the $content
	$content = preg_replace( $pattern, $replacement, $content );

	// return the processed content
	return $content;
}
add_filter( 'the_content', 'pi_replace_src' );

/*
 * Replace srcset attribute with our data-srcset
 */
function pi_replace_srcset( $content ) {

	// A regular expression of what to look for.
	$pattern = '/srcset=/i';

	// What to replace it with. $1 refers to the content in the first 'capture group', in parentheses above
	$replacement = 'data-srcset=';

	// run preg_replace() on the $content
	$content = preg_replace( $pattern, $replacement, $content );

	// return the processed content
	return $content;
}
add_filter( 'the_content', 'pi_replace_srcset');