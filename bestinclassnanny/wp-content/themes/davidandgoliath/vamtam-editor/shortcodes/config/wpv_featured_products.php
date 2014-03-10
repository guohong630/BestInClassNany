<?php
return array(
	'name' => __('Featured Products', 'davidandgoliath') ,
	'icon' => array(
		'char' => WPV_Editor::get_icon('cart1'),
		'size' => '26px',
		'lheight' => '39px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'wpv_featured_products',
	'controls' => 'size name clone edit delete',
	'options' => array(
		array(
			'name' => __('Columns', 'davidandgoliath') ,
			'id' => 'columns',
			'default' => 4,
			'min' => 2,
			'max' => 4,
			'type' => 'range',
		) ,
		array(
			'name' => __('Limit', 'davidandgoliath') ,
			'desc' => __('Maximum number of products.', 'davidandgoliath') ,
			'id' => 'per_page',
			'default' => 3,
			'min' => 1,
			'max' => 50,
			'type' => 'range',
		) ,

		array(
			'name' => __('Order By', 'davidandgoliath') ,
			'id' => 'orderby',
			'default' => 'date',
			'type' => 'radio',
			'options' => array(
				'date' => __('Date', 'davidandgoliath'),
				'menu_order' => __('Menu Order', 'davidandgoliath'),
			),
		) ,

		array(
			'name' => __('Order', 'davidandgoliath') ,
			'id' => 'order',
			'default' => 'desc',
			'type' => 'radio',
			'options' => array(
				'desc' => __('Descending', 'davidandgoliath'),
				'asc' => __('Ascending', 'davidandgoliath'),
			),
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
