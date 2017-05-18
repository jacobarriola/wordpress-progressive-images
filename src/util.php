<?php

namespace Progressive_Images;

function get_aspect_ratio( $width, $height ) {

	if ( empty( $width ) || empty( $height ) ) {
		return null;
	}

	if ( $width / $height === '1') {
		return 100;
	}

	if ( $width / $height <= '1' ) {
		return ( $width / $height ) * 100;
	}

	return ( ( $width / $height ) - 1 ) * 100;
}
