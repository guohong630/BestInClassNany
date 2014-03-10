<?php
return array(
	'name' => __('Contact Form 7', 'davidandgoliath') ,
	'desc' => __('Please note that the theme uses the Contact Form 7 plugin for building forms and its option panel is found in the WordPress navigation menu on the left. ' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('pencil1'),
		'size' => '26px',
		'lheight' => '39px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'contact-form-7',
	'controls' => 'size name clone edit delete',
	'options' => array(
		array(
			'name' => __('Choose By ID', 'davidandgoliath') ,
			'id' => 'id',
			'default' => '',
			'prompt' => '',
			'options' => WPV_Editor::get_wpcf7_posts('ID'),
			'type' => 'select',
		) ,

		array(
			'name' => __('Choose By Title', 'davidandgoliath') ,
			'id' => 'title',
			'default' => '',
			'prompt' => '',
			'options' => WPV_Editor::get_wpcf7_posts('post_title'),
			'type' => 'select',
		) ,

		array(
			'name' => __('Title (optional)', 'davidandgoliath') ,
			'desc' => __('The title is placed just above the element.', 'davidandgoliath'),
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
				'single' => __('Title with devider next to it', 'davidandgoliath'),
				'double' => __('Title with devider under it ', 'davidandgoliath'),
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
