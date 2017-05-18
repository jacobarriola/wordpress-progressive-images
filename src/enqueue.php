<?php

namespace Progressive_Images;

/*
 * Enqueue our assets
 */
add_action( 'wp_enqueue_scripts', function() {

	wp_enqueue_style(
		'pi_css',
		PROGRESSIVE_IMAGES_URL . '/_dist/css/app.css',
		'',
		PROGRESSIVE_IMAGES_VERSION,
		''
	);

	wp_enqueue_script(
		'pi_js',
		PROGRESSIVE_IMAGES_URL . '/_dist/js/app.js',
		'',
		PROGRESSIVE_IMAGES_VERSION,
		true
	);

});