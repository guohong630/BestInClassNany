<?php
return array(
	'name' => __('Buttons', 'davidandgoliath') ,
	'value' => 'button',
	'options' => array(
		array(
			'name' => __('Text', 'davidandgoliath') ,
			'id' => 'text',
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Font size', 'davidandgoliath') ,
			'id' => 'font',
			'default' => 24,
			'type' => 'range',
			'min' => 10,
			'max' => 64,
		) ,
		array(
			'name' => __('Background', 'davidandgoliath') ,
			'id' => 'bgColor',
			'default' => 'accent1',
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
			'type' => 'select'
		) ,
		array(
			'name' => __('Alignment', 'davidandgoliath') ,
			'id' => 'align',
			'default' => '',
			'prompt' => '',
			'options' => array(
				'left' => __('Left', 'davidandgoliath') ,
				'right' => __('Right', 'davidandgoliath') ,
				'center' => __('Center', 'davidandgoliath') ,
			) ,
			'type' => 'select',
		) ,
		array(
			'name' => __('Link', 'davidandgoliath') ,
			'id' => 'link',
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Link Target', 'davidandgoliath') ,
			'id' => 'linkTarget',
			'default' => '_self',
			'options' => array(
				'_blank' => __('Load in a new window', 'davidandgoliath') ,
				'_self' => __('Load in the same frame as it was clicked', 'davidandgoliath') ,
			) ,
			'type' => 'select',
		) ,
		array(
			'name' => __('Icon', 'davidandgoliath') ,
			'id' => 'icon',
			'default' => '',
			'type' => 'icons',
		) ,
		array(
			'name' => __('Icon Style', 'davidandgoliath'),
			'type' => 'select-row',
			'selects' => array(
				'icon_color' => array(
					'desc' => __('Color:', 'davidandgoliath'),
					"default" => "",
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
				'icon_placement' => array(
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
			'name' => __('ID', 'davidandgoliath') ,
			'desc' => __('ID attribute added to the button element.', 'davidandgoliath'),
			'id' => 'id',
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Class', 'davidandgoliath') ,
			'desc' => __('Class attribute added to the button element.', 'davidandgoliath'),
			'id' => 'class',
			'default' => '',
			'type' => 'text',
		) ,
	) ,
);
