<?php

namespace Progressive_Images;

function get_aspect_ratio( $width, $height ) {

	if ( empty( $width ) || empty( $height ) ) {
		return null;
	}

	if ( $width / $height === '1') {
		return 100;
	}

	return ( $height / $width )  * 100;
}
