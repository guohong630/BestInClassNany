<?php

/**
 * Blockquote shortcode options
 *
 * @package wpv
 * @subpackage editor
 */

return array(
	'name' => __('Testimonials', 'davidandgoliath') ,
    'desc' => __('Please note that this element shows already created testimonials. To create one go to Testimonials tab in the WordPress main navigation menu on the left - add new.  ' , 'davidandgoliath'), 
	'icon' => array(
		'char' => WPV_Editor::get_icon('quotes-left'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'blockquote',
	'controls' => 'size name clone edit delete',
	'options' => array(
		
		array(
			'name' => __('Layout', 'davidandgoliath') ,
			'id' => 'layout',
			'default' => 'slider',
			'type' => 'select',
			'options' => array(
				'slider' => __('Slider', 'davidandgoliath'),
				'static' => __('Static', 'davidandgoliath'),
			),
		) ,
		array(
			'name' => __('Categories (optional)', 'davidandgoliath') ,
			'desc' => __('By default all categories are active. Please note that if you do not see catgories, most probably there are none created.  You can use ctr + click to select multiple categories.' , 'davidandgoliath'),
			'id' => 'cat',
			'default' => array() ,
			'target' => 'testimonials_category',
			'type' => 'multiselect',
		) ,
		array(
			'name' => __('IDs (optional)', 'davidandgoliath') ,
			'desc' => __(' By default all testimonials are active. You can use ctr + click to select multiple IDs.', 'davidandgoliath') ,
			'id' => 'ids',
			'default' => array() ,
			'target' => 'testimonials',
			'type' => 'multiselect',
        ) ,
        
		
		array(
			'name' => __('Title (optional)', 'davidandgoliath') ,
			'desc' => __('The title is placed just above the element.', 'davidandgoliath'),
			'id' => 'column_title',
			'default' => __('', 'davidandgoliath') ,
			'type' => 'text'
		) ,


		array(
			'name' => __('Title Type (optional)', 'davidandgoliath') ,
			'id' => 'column_title_type',
			'default' => 'single',
			'type' => 'select',
			'options' => array(
				'single' => __('Title with devider next to it.', 'davidandgoliath'),
				'double' => __('Title with devider under it.', 'davidandgoliath'),
				'no-divider' => __('No Divider', 'davidandgoliath'),
			),
		) ,
		array(
			'name' => __('Element Animation (optional)', 'davidandgoliath') ,
			'id' => 'column_animation',
			'default' => 'none',
			'type' => 'select',
			'options' => array(
				'none' => __('No animation', 'davidandgoliath'),
				'from-left' => __('Appear from left', 'davidandgoliath'),
				'from-right' => __('Appear from right', 'davidandgoliath'),
				'fade-in' => __('Fade in', 'davidandgoliath'),
			),
		) ,
	) ,
);
