<?php
/**
 * Vamtam Post Format Options
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(

array(
	'name' => __('Standard', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-0',
),

array(
	'name' => __('How do I use standard post format?', 'davidandgoliath'),
	'desc' => __('Just use the editor below.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

// --

array(
	'name' => __('Aside', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-aside',
),

array(
	'name' => __('How do I use aside post format?', 'davidandgoliath'),
	'desc' => __('Just use the editor below. The post title will not be shown publicly.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

// --

array(
	'name' => __('Link', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-link',
),

array(
	'name' => __('How do I use link post format?', 'davidandgoliath'),
	'desc' => __('Use the editor below for the post body, put the link in the option below.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

array(
	'name' => __('Link', 'davidandgoliath'),
	'id' => 'wpv-post-format-link',
	'type' => 'text',
),

// --

array(
	'name' => __('Image', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-image',
),

array(
	'name' => __('How do I use image post format?', 'davidandgoliath'),
	'desc' => __('Use the standard Featured Image option.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

// --

array(
	'name' => __('Video', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-video',
),

array(
	'name' => __('How do I use video post format?', 'davidandgoliath'),
	'desc' => __('Put the url of the video below. You must use an oEmbed provider supported by WordPress or a file supported by the [video] shortcode which comes with WordPress.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

array(
	'name' => __('Link', 'davidandgoliath'),
	'id' => 'wpv-post-format-video-link',
	'type' => 'text',
),

// --

array(
	'name' => __('Audio', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-audio',
),

array(
	'name' => __('How do I use auido post format?', 'davidandgoliath'),
	'desc' => __('Put the url of the audio below. You must use an oEmbed provider supported by WordPress or a file supported by the [audio] shortcode which comes with WordPress.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

array(
	'name' => __('Link', 'davidandgoliath'),
	'id' => 'wpv-post-format-audio-link',
	'type' => 'text',
),

// --

array(
	'name' => __('Quote', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-quote',
),

array(
	'name' => __('How do I use quote post format?', 'davidandgoliath'),
	'desc' => __('Simply fill in author and link fields', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

array(
	'name' => __('Author', 'davidandgoliath'),
	'id' => 'wpv-post-format-quote-author',
	'type' => 'text',
),

array(
	'name' => __('Link', 'davidandgoliath'),
	'id' => 'wpv-post-format-quote-link',
	'type' => 'text',
),

// --

array(
	'name' => __('Gallery', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-gallery',
),

array(
	'name' => __('How do I use gallery post format?', 'davidandgoliath'),
	'desc' => __('Use the "Add Media" in a text/image block element to create a gallery.This button is also found in the top left side of the visual and text editors.', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

// --

array(
	'name' => __('Status', 'davidandgoliath'),
	'type' => 'separator',
	'tab_class' => 'wpv-post-format-status',
),

array(
	'name' => __('How do I use this post format?', 'davidandgoliath'),
	'desc' => __('...', 'davidandgoliath'),
	'type' => 'info',
	'visible' => true,
),

);
