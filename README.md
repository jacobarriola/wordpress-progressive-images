# Progressive images for WordPress
This is a WordPress 🔌 plugin that loads all of your images after your page loads.

## To install
* Download repo
* Move file to your `wp-content/plugins` directory
* Activate plugin via wp-cli or the WordPress dashboard

## Issue reporting
I built this plugin for the 2017 Orange County WordCamp plugin contest, so I won't be actively maintaining this project. 

## Available filters
The plugin filters both featured images and all images in the WordPress content.

**Remove functionality on ALL post thumbnails:**
```php
add_filter( 'Progressive_Images\enabled', function( $post_thumbnail_id ) {
    return false;
}, 10, 1 );
```

**Remove functionality on a specific post thumbnail:**
```php
add_filter( 'Progressive_Images\enabled', function( $post_thumbnail_id ) {
    if ( 1234 !== $post_thumbnail_id ) {
        return true;
    }
    return false;
}, 10, 1 );
```

**Remove functionality on images in post_content:**
```php
remove_filter( 'the_content', 'Progress_Images/add_wrapping_content_markup' );
remove_filter( 'the_content', 'Progress_Images/replace_src' );
remove_filter( 'the_content', 'Progress_Images/replace_srcset' );
```

**Add a class to the wrapping markup on post_thumbnails**
```php
add_filter( 'Progressive_Images\markup_wrapper_class', function( $class ) {
	$class .= ' your-awesome-class';
	return $class;
}, 10, 3);
```
