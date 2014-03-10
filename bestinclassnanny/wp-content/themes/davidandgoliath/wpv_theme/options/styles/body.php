<?php
/**
 * Theme options / Styles / Body
 * 
 * @package wpv
 * @subpackage david-goliath
 */

return array(

array(
	'name' => __('Body', 'davidandgoliath'),
	'type' => 'start',	
),

array(
	'name' => __('Where are these options used?', 'davidandgoliath'),
	'desc' => __('The page body is the area between the header and the footer. The page title, the body top widget areas and the sidebars are located here. You can change the style of these areas using the options below.', 'davidandgoliath'),
	'type' => 'info',
),

array(
	'name' => __('Backgrounds', 'davidandgoliath'),
	'type' => 'separator',
),
		
array(
	'name' => __('Body Background', 'davidandgoliath'),
	'desc' => __('If you want to use an image as a background, enabling the cover button will resize and crop the image so that it will always fit the browser window on any resolution. If the color opacity  is less than 1 the page background underneath will be visible.', 'davidandgoliath'),
	'id' => 'main-background',
	'type' => 'background',
	'only' => 'color,image,repeat,size,attachment'
),

array(
	'name' => __('Typography', 'davidandgoliath'),
	'type' => 'separator',
),

array(
	'name' => __('Body Font', 'davidandgoliath'),
	'desc' => __('This is the general font used in the body and the sidebars. Please note that the styles of the heading fonts are located in the general typography tab.', 'davidandgoliath'),
	'id' => 'primary-font',
	'type' => 'font',
	'min' => 1,
	'max' => 20,
	'lmin' => 1,
	'lmax' => 40,
),

array(
	'name' => __('Links', 'davidandgoliath'),
	'type' => 'color-row',
	'inputs' => array(
		'css_link_color' => array(
			'name' => __('Normal:', 'davidandgoliath'),
		),
		'css_link_visited_color' => array(
			'name' => __('Visited:', 'davidandgoliath'),
		),
		'css_link_hover_color' => array(
			'name' => __('Hover:', 'davidandgoliath'),
		),
	),
),

	array(
		'type' => 'end'
	),

);