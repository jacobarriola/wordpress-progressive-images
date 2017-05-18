<?php

namespace Progressive_Images;

/**
 * Boolean to turn off this feature post thumbnails
 *
 * @param $post_thumbnail_id
 *
 * @return bool
 */
function enabled( $post_thumbnail_id ) {

	$enabled = apply_filters( __NAMESPACE__ . '\enabled', true, $post_thumbnail_id );

	if ( true !== $enabled ) {
		return false;
	}

	return true;
}


/**
 * Wrap our post_thumbnails with our markup so that the CSS and JS can execute their styles and behaviors
 *
 * @param $html
 * @param $post_id
 * @param $post_thumbnail_id
 * @param $size
 * @param $attr
 *
 * @return mixed|void
 */
function add_wrapping_markup( $html, $post_id, $post_thumbnail_id, $size, $attr  ) {

	// Bail if we happen to be in an admin page
	if ( is_admin() ) {
		return $html;
	}

	// Bail if this function has been turned off via filter
	if ( true !== enabled( $post_thumbnail_id ) ) {
		return $html;
	}

	// Add any classes
	$class = apply_filters( __NAMESPACE__ . '\markup_wrapper_class', 'pi_image-placeholder', $post_id, $post_thumbnail_id );

	$wrapped_html = sprintf( '<div class="%s">%s</div>',
		$class,
		$html
	);

	// Filter helps theme authors add any new markup if they choose
	return apply_filters( __NAMESPACE__ . '\markup_wrapped_html', $wrapped_html, $html );
}
add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\add_wrapping_markup', 10, 5 );

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
function replace_thumbnail_attributes( $attr, $attachment, $size ) {

	// Bail if we happen to be in an admin page
	if ( is_admin() ) {
		return $attr;
	}

	// Bail if this function has been turned off via filter
	if ( true !== enabled( $attachment->ID ) ) {
		return $attr;
	}

	$image = wp_get_attachment_image_src( $attachment->ID, $size );

	if ( empty( $image['1'] ) || empty( $image['2'] ) ) {
		return $attr;
	}

	$aspect_ratio        = get_aspect_ratio( $image['1'], $image['2'] );
	$attr['style']       = 'padding-bottom: ' . $aspect_ratio . '%';
	$attr['data-src']    = $attr['src'];
	$attr['data-srcset'] = $attr['srcset'];

	unset( $attr['srcset'] );
	unset( $attr['src'] );

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', __NAMESPACE__ . '\replace_thumbnail_attributes', 10, 3 );