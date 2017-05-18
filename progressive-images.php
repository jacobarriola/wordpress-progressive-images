<?php
/*
Plugin Name: Progressive Images
Description: Load images after everything else has loaded
Version: 0.0.3
Author: Jacob Arriola
Author URI: http://jacobarriola.com
License: GPL2
*/

// Bail if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define our plugin constants
define( 'PROGRESSIVE_IMAGES_URL', plugin_dir_url( __FILE__ ) );
define( 'PROGRESSIVE_IMAGES_PATH', plugin_dir_path( __FILE__ ) );
define( 'PROGRESSIVE_IMAGES_VERSION', '0.0.2' );

/*
 * Require our files
 */
require_once __DIR__ . '/src/util.php';
require_once __DIR__ . '/src/enqueue.php';
require_once __DIR__ . '/src/image-replacement.php';