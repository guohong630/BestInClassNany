<?php

/**
 * Theme options / General / General Settings
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(
array(
	'name' => __('General Settings', 'davidandgoliath'),
	'type' => 'start'
),

array(
	'name' => __('Custom Logo Picture', 'davidandgoliath'),
	'desc' => __('Optional way to replace "heading" and "description" text for your website with an image. Leave blank if none required.', 'davidandgoliath'),
	'id' => 'custom-header-logo',
	'type' => 'upload',
	'static' => true,
),

array(
	'name' => __('High Resolution Logo', 'davidandgoliath'),
	'desc' => __('Optional way to replace "heading" and "description" text for your website with an image. Leave blank if none required.', 'davidandgoliath'),
	'id' => 'custom-header-logo2x',
	'type' => 'upload',
	'static' => true,
),

array(
	'name' => __('Favicon', 'davidandgoliath'),
	'desc' => __('Upload your custom "favicon" which is visible in browser favourites and tabs. (Must be .png or .ico file - preferably 16px by 16px ). Leave blank if none required.', 'davidandgoliath'),
	'id' => 'favicon_url',
	'type' => 'upload',
	'static' => true,
),

array(
	'name' => __('Google Maps API Key', 'davidandgoliath'),
	'desc' => __("Only required if you have more than 2500 map loads per day. Paste your Google Maps API Key here. If you don't have one, please sign up for a <a href='https://developers.google.com/maps/documentation/javascript/tutorial#api_key'>Google Maps API key</a>.", 'davidandgoliath'),
	'id' => 'gmap_api_key',
	'type' => 'text',
	'static' => true,
	'class' => 'hidden',

),

array(
	'name' => __('Google Analytics Key', 'davidandgoliath'),
	'desc' => __("Paste your key here. It should be something like UA-XXXXX-X. We're using the faster asynchronous loader, so you don't need to worry about speed.", 'davidandgoliath'),
	'id' => 'analytics_key',
	'type' => 'text',
	'static' => true,
),

array(
	'name' => __('"Scroll to Top" Button', 'davidandgoliath'),
	'desc' => __('It is found in the bottom right side. It is sole purpose is help the user scroll a long page quickly to the top.', 'davidandgoliath'),
	'id' => 'show_scroll_to_top',
	'type' => 'toggle',
),

array(
	'name' => __('Feedback Button', 'davidandgoliath'),
	'desc' => __('It is found on the right hand side of your website. You can chose from a "link" or a slide out form(widget area).The slide out form is configured as a standard widget. You can use the same form you are using for your "contact us" page.', 'davidandgoliath'),
	'id' => 'feedback-type',
	'type' => 'select',
	'options' => array(
		'none' => __('None', 'davidandgoliath'),
		'link' => __('Link', 'davidandgoliath'),
		'sidebar' => __('Slide out widget area', 'davidandgoliath'),
	),
),

array(
	'name' => __('Feedback Button Link', 'davidandgoliath'),
	'desc' => __('If you have chosen a "link" in the option above, place the link of the button here, usually to your contact us page.', 'davidandgoliath'),
	'id' => 'feedback-link',
	'type' => 'text',
),

array(
	'name' => __('Share Icons', 'davidandgoliath'),
	'desc' => __('Select the social media you want enabled and for which parts of the website', 'davidandgoliath'),
	'type' => 'social',
	'static' => true,
),

array(
	'name' => __('Custom JavaScript', 'davidandgoliath'),
	'desc' => __('If the hundreds of options in the Theme Options Panel are not enough and you need customisation that is outside of the scope of the Theme Option Panel please place your javascript in this field. The contents of this field are placed near the <strong>&lt;/body&gt;</strong> tag, which improves the load times of the page.', 'davidandgoliath'),
	'id' => 'custom_js',
	'type' => 'textarea',
	'rows' => 15,
	'static' => true,
),

array(
	'name' => __('Custom CSS', 'davidandgoliath'),
	'desc' => __('If the hundreds of options in the Theme Options Panel are not enough and you need customisation that is outside of the scope of the Theme Options Panel please place your CSS in this field.', 'davidandgoliath'),
	'id' => 'custom_css',
	'type' => 'textarea',
	'rows' => 15,
	'class' => 'top-desc',
),

array(
	'type' => 'end'
)
);