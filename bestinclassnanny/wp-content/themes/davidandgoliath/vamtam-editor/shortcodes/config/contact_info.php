<?php

/**
 * Contact info shortcode options
 *
 * @package wpv
 * @subpackage editor
 */

return array(
	'name' => __('Contact Info', 'davidandgoliath') ,
	'icon' => array(
		'char' => WPV_Editor::get_icon('vcard'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'contact_info',
	'controls' => 'size name clone edit delete',
	'options' => array(
		
		array(
			'name' => __('Name', 'davidandgoliath'),
			'id' => 'name',
			'default' => 'Nick Perry',
			'size' => 30,
			'type' => 'text'
		),
		array(
			'name' => __('Color', 'davidandgoliath'),
			'id' => 'color',
			'default' => 'accent2',
			'prompt' => __('---', 'davidandgoliath'),
			'options' => array(
				'accent1' => __('Accent 1', 'davidandgoliath'),
				'accent2' => __('Accent 2', 'davidandgoliath'),
				'accent3' => __('Accent 3', 'davidandgoliath'),
				'accent4' => __('Accent 4', 'davidandgoliath'),
				'accent5' => __('Accent 5', 'davidandgoliath'),
				'accent6' => __('Accent 6', 'davidandgoliath'),
				'accent7' => __('Accent 7', 'davidandgoliath'),
				'accent8' => __('Accent 8', 'davidandgoliath'),
				
			),
			'type' => 'select',
		),
		array(
			'name' => __('Phone', 'davidandgoliath'),
			'id' => 'phone',
			'default' => '+23898933i',
			'size' => 30,
			'type' => 'text'
		),
		array(
			'name' => __('Cell Phone', 'davidandgoliath'),
			'id' => 'cellphone',
			'default' => '+23898933i',
			'size' => 30,
			'type' => 'text'
		),
		array(
			'name' => __('Email', 'davidandgoliath'),
			'id' => 'email',
			'default' => 'office@test.com',
			'type' => 'text'
		),
		array(
			'name' => __('Address', 'davidandgoliath'),
			'id' => 'address',
			'default' => 'London',
			'size' => 30,
			'type' => 'textarea'
		),
		
	
		array(
			'name' => __('Title (optional)', 'davidandgoliath') ,
			'desc' => __('The column title is placed just above the element.', 'davidandgoliath'),
			'id' => 'column_title',
			'default' => '',
			'type' => 'text'
		) ,
		array(
			'name' => __('Title Type (optional)', 'davidandgoliath') ,
			'id' => 'column_title_type',
			'default' => 'single',
			'type' => 'select',
			'options' => array(
				'single' => __('Title with divider next to it', 'davidandgoliath'),
				'double' => __('Title with divider below', 'davidandgoliath'),
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
