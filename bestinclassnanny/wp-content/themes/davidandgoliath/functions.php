<?php

/**
 * Theme functions. Initializes the Vamtam Framework.
 *
 * @package  wpv
 */

require_once('vamtam/classes/framework.php');

new WpvFramework(array(
	'name' => 'david-goliath',
	'slug' => 'david-goliath'
));

// TODO remove next line when the editor is fully functional, to be packaged as a standalone module with no dependencies to the theme
define ('VAMTAM_EDITOR_IN_THEME', true); include_once THEME_DIR.'vamtam-editor/editor.php';

// Add new image sizes
function lc_insert_custom_image_sizes( $image_sizes ) {
  // get the custom image sizes
  global $_wp_additional_image_sizes;
  // if there are none, just return the built-in sizes
  if ( empty( $_wp_additional_image_sizes ) )
    return $image_sizes;
 
  // add all the custom sizes to the built-in sizes
  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
    // and capitalise the first letter of each word
    if ( !isset($image_sizes[$id]) )
      $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
    }
 
  return $image_sizes;
}
 
function lc_custom_image_setup () {
add_theme_support( 'post-thumbnails' );
add_image_size('Long', 360, 180, TRUE);
add_filter( 'image_size_names_choose', 'lc_insert_custom_image_sizes' );
}
add_action( 'after_setup_theme', 'lc_custom_image_setup' );