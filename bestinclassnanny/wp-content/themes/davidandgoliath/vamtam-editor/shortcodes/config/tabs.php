<?php
return array(
	'name' => __('Tabs', 'davidandgoliath') ,
	'desc' => __('Adding tabs, changing the name of the tab and adding content into the tabs is done when the tab element is toggled.' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('storage1'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'tabs',
	'controls' => 'size name clone edit delete always-expanded',
	'callbacks' => array(
		'init' => 'init-tabs',
		'generated-shortcode' => 'generate-tabs',
	),
	'options' => array(

		array(
			'name' => __('Layout', 'davidandgoliath') ,
			"id" => "layout",
			"default" => 'horizontal',
			"type" => "radio",
			'options' => array(
				'horizontal' => __('Horizontal', 'davidandgoliath'),
				'vertical' => __('Vertical', 'davidandgoliath'),
			),
			'field_filter' => 'fts',
		) ,
		array(
			'name' => __('Navigation Color', 'davidandgoliath') ,
			'id' => 'left_color',
			'type' => 'color',
			'default' => 'accent8',
			'class' => 'fts fts-vertical',
		) ,
		array(
			'name' => __('Content Color', 'davidandgoliath') ,
			'id' => 'right_color',
			'type' => 'color',
			'default' => 'accent1',
			'class' => 'fts fts-vertical',
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
				'single' => __('Title with divider next to it.', 'davidandgoliath'),
				'double' => __('Title with divider below', 'davidandgoliath'),
				'no-divider' => __('No Divider', 'davidandgoliath'),
			),
			'class' => 'fts fts-horizontal',
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
