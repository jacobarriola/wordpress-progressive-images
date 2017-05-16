# Progressive images for WordPress
This is a WordPress 🔌 plugin that loads all of your images after your site loads.

## To install
* Download repo
* Move file to your `wp-content/plugins` directory
* Activate plugin via wp-cli or the WordPress dashboard

## Issue reporting
I built this plugin for the 2017 Orange County WordCamp plugin contest, so I won't be actively maintaining this project. 

## Available filters
The plugin filters both featured images and all images in the WordPress content. You can disable either of these
filters via remove the following filters:

*Remove functionality on post thumbnails:*
* `remove_filter( 'post_thumbnail_html', 'pi_add_wrapping_markup' );`
* `remove_filter( 'wp_get_attachment_image_attributes', 'pi_replace_thumbnail_attributes' );`

*Remove functionality on images in post_content:*
* `remove_filter( 'the_content', 'pi_add_wrapping_content_markup' );`
* `remove_filter( 'the_content', 'pi_replace_src' );`
* `remove_filter( 'the_content', 'pi_replace_srcset' );`
