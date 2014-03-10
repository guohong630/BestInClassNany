<?php
return 	array(
	'name' => __('Team Member', 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('profile'),
		'size' => '26px',
		'lheight' => '39px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'team_member',
	'controls' => 'size name clone edit delete',
	'options' => array(
		
		array(
			'name' => __('Name', 'davidandgoliath'),
			'id' => 'name',
			'default' => 'Nikolay Yordanov',
			'type' => 'text',
			'holder' => 'h5',
		),
		array(
			'name' => __('Position', 'davidandgoliath'),
			'id' => 'position',
			'default' => 'Web Developer',
			'type' => 'text'
		),
		array(
			'name' => __('Link', 'davidandgoliath'),
			'id' => 'url',
			'default' => '/',
			'type' => 'text'
		),
		array(
			'name' => __('Email', 'davidandgoliath'),
			'id' => 'email',
			'default' => 'support@vamtam.com',
			'type' => 'text'
		),
		array(
			'name' => __('Phone', 'davidandgoliath'),
			'id' => 'phone',
			'default' => '+448786562223',
			'type' => 'text'
		),
		array(
			'name' => __('Picture url', 'davidandgoliath'),
			'id' => 'picture',
			'default' => 'http://makalu.vamtam.com/wp-content/uploads/2013/03/people4.png',
			'type' => 'upload'
		),
		array(
			'name' => __('Google+', 'davidandgoliath'),
			'id' => 'googleplus',
			'default' => '/',
			'type' => 'text'
		),
		array(
			'name' => __('LinkedIn', 'davidandgoliath'),
			'id' => 'linkedin',
			'default' => '',
			'type' => 'text'
		),
		array(
			'name' => __('Facebook', 'davidandgoliath'),
			'id' => 'facebook',
			'default' => '/',
			'type' => 'text'
		),
		array(
			'name' => __('Twitter', 'davidandgoliath'),
			'id' => 'twitter',
			'default' => '/',
			'type' => 'text'
		),
		array(
			'name' => __('YouTube', 'davidandgoliath'),
			'id' => 'youtube',
			'default' => '/',
			'type' => 'text'
		),
		
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
	),
);
