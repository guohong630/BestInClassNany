<?php
return array(
	'name' => __('Price Box', 'davidandgoliath') ,
	'icon' => array(
		'char' => WPV_Editor::get_icon('basket1'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'price',
	'controls' => 'size name clone edit delete',
	'options' => array(
		
		array(
			'name' => __('Title', 'davidandgoliath') ,
			'id' => 'title',
			'default' => __('Title', 'davidandgoliath'),
			'type' => 'text',
			'holder' => 'h5',
		) ,
		array(
			'name' => __('Price', 'davidandgoliath') ,
			'id' => 'price',
			'default' => '69',
			'type' => 'text',
		) ,
		array(
			'name' => __('Currency', 'davidandgoliath') ,
			'id' => 'currency',
			'default' => '$',
			'type' => 'text',
		) ,
		array(
			'name' => __('Duration', 'davidandgoliath') ,
			'id' => 'duration',
			'default' => 'per month',
			'type' => 'text',
		) ,
		array(
			'name' => __('Summary', 'davidandgoliath') ,
			'id' => 'summary',
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Description', 'davidandgoliath') ,
			'id' => 'html-content',
			'default' => '<ul>
	<li>list item</li>
	<li>list item</li>
	<li>list item</li>
	<li>list item</li>
	<li>list item</li>
	<li>list item</li>
</ul>',
			'type' => 'editor',
			'holder' => 'textarea',
		) ,
		array(
			'name' => __('Button Text', 'davidandgoliath') ,
			'id' => 'button_text',
			'default' => 'Buy',
			'type' => 'text'
		) ,
		array(
			'name' => __('Button Link', 'davidandgoliath') ,
			'id' => 'button_link',
			'default' => '',
			'type' => 'text'
		) ,
		array(
			'name' => __('Featured', 'davidandgoliath') ,
			'id' => 'featured',
			'default' => 'false',
			'type' => 'toggle'
		) ,
		
	
		array(
			'name' => __('Title', 'davidandgoliath') ,
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
