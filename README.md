# Progressive images for WordPress
This is a WordPress 🔌 plugin that loads your post thumbnail after your page loads.

## Requirements
PHP > 5.3, since we use namespacing.

## To install
* Download repo
* Move file to your `wp-content/plugins` directory
* Activate plugin via wp-cli or the WordPress dashboard

## Issue reporting
I built this plugin for the 2017 Orange County WordCamp plugin contest, so I won't be actively maintaining this project. 

## Available filters
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

**Add a class to the wrapping markup on post_thumbnails**
```php
add_filter( 'Progressive_Images\markup_wrapper_class', function( $class ) {
	$class .= ' your-awesome-class';
	return $class;
}, 10, 3);
```