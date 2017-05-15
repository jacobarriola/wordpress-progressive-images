=== Progressive Images ===
Contributors: jacobarriola
Author URI: http://jacobarriola.com
Tags: performance, images
Requires at least: 4.7.4
Tested up to: 4.7.4
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

== Filters ==
The plugins  filters both featured images and all images in the WordPress content. You can disable either of these
filters via remove the following filters:

* Remove functionality on post thumbnails:
remove_filter( 'post_thumbnail_html', 'pi_add_wrapping_markup' );
remove_filter( 'wp_get_attachment_image_attributes', 'pi_replace_thumbnail_attributes' );

* Remove functionality on images in post_content:
remove_filter( 'the_content', 'pi_add_wrapping_content_markup' );
remove_filter( 'the_content', 'pi_replace_src' );
remove_filter( 'the_content', 'pi_replace_srcset' );