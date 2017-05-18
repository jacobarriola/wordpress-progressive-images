=== Progressive Images ===
Contributors: jacobarriola
Author URI: http://jacobarriola.com
Tags: performance, images
Requires at least: 4.7.4
Tested up to: 4.7.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Load images after site has loaded on page

== Description ==
Load your images after all of the page content and assets have been loaded.

== Installation ==
1. Upload the plugin to wp-content/plugins
2. Activate the plugin in WordPress.
3. Enjoy!

== Issue reporting ==
I built this plugin for the 2017 Orange County WordCamp plugin contest, so I won't be actively maintaining this project.

Probably best to fork this repo on [GitHub](https://github.com/jacobarriola/wordpress-progressive-images) and adjust it to your use case.

== Filters ==
The plugin filters both featured images and all images in the WordPress content.

**Remove functionality on ALL post thumbnails:**
`add_filter( 'Progressive_Images\enabled', function( $post_thumbnail_id ) {
    return false;
}, 10, 1 );`

**Remove functionality on a specific post thumbnail:**
`add_filter( 'Progressive_Images\enabled', function( $post_thumbnail_id ) {
    if ( 1234 !== $post_thumbnail_id ) {
        return true;
    }
    return false;
}, 10, 1 );`

**Remove functionality on images in post_content:**
* `remove_filter( 'the_content', 'Progress_Images/add_wrapping_content_markup' );`
* `remove_filter( 'the_content', 'Progress_Images/replace_src' );`
* `remove_filter( 'the_content', 'Progress_Images/replace_srcset' );`

**Add a class to the wrapping markup on post_thumbnails**
`add_filter( 'Progressive_Images\markup_wrapper_class', function( $class ) {
	$class .= ' your-awesome-class';
	return $class;
}, 10, 3);`
