<?php

/**
 * Slogan shortcode options
 *
 * @package wpv
 * @subpackage editor
 */

return array(
	'name' => __('Call Out Box', 'davidandgoliath') ,
	'desc' => __('You can place the call out box into а column - color box elemnent in order to have background color.' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('font-size'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'slogan',
	'controls' => 'size name clone edit delete handle',
	'options' => array(
		array(
			'name' => __('Content', 'davidandgoliath') ,
			'id' => 'html-content',
			'default' => __('<h1>You can place your call out box text here</h1>', 'davidandgoliath'),
			'type' => 'editor',
			'holder' => 'textarea',
		) ,
		array(
			'name' => __('Button Text', 'davidandgoliath') ,
			'id' => 'button_text',
			'default' => 'Button Text',
			'type' => 'text'
		) ,
		array(
			'name' => __('Button Link', 'davidandgoliath') ,
			'id' => 'link',
			'default' => '',
			'type' => 'text'
		) ,
		array(
			'name' => __('Button Icon', 'davidandgoliath') ,
			'id' => 'button_icon',
			'default' => 'cart',
			'type' => 'icons',
		) ,
		array(
			'name' => __('Button Icon Style', 'davidandgoliath'),
			'type' => 'select-row',
			'selects' => array(
				'button_icon_color' => array(
					'desc' => __('Color:', 'davidandgoliath'),
					"default" => "accent 1",
					"prompt" => '',
					"options" => array(
						'accent1' => __('Accent 1', 'davidandgoliath'),
						'accent2' => __('Accent 2', 'davidandgoliath'),
						'accent3' => __('Accent 3', 'davidandgoliath'),
						'accent4' => __('Accent 4', 'davidandgoliath'),
						'accent5' => __('Accent 5', 'davidandgoliath'),
						'accent6' => __('Accent 6', 'davidandgoliath'),
						'accent7' => __('Accent 7', 'davidandgoliath'),
						'accent8' => __('Accent 8', 'davidandgoliath'),
					) ,
				),
				'button_icon_placement' => array(
					'desc' => __('Placement:', 'davidandgoliath'),
					"default" => 'left',
					"options" => array(
						'left' => __('Left', 'davidandgoliath'),
						'right' => __('Right', 'davidandgoliath'),
					) ,
				),
				),
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
		
	) ,
);