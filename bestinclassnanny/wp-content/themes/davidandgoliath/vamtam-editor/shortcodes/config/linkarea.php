<?php
return array(
	'name' => __('Box with a Link', 'davidandgoliath') ,
	'desc' => __('You can set a link, background color and hover color to a section of the website and place your content there.' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('link5'),
		'size' => '30px',
		'lheight' => '40px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'linkarea',
	'controls' => 'size name clone edit delete',
	'options' => array(
		array(
			'name' => __('Background Color', 'davidandgoliath') ,
			'id' => 'background_color',
			'default' => '',
			'prompt' => __('No background', 'davidandgoliath'),
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
			'name' => __('Hover Color', 'davidandgoliath') ,
			'id' => 'hover_color',
			'default' => 'accent1',
			'prompt' => __('No background', 'davidandgoliath'),
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
			'name' => __('Link', 'davidandgoliath') ,
			'id' => 'href',
			'default' => '',
			'type' => 'text',
		) ,

		array(
			"name" => __("Target", 'davidandgoliath') ,
			"id" => "target",
			"default" => '_self',
			"options" => array(
				"_blank" => __('Load in a new window', 'davidandgoliath') ,
				"_self" => __('Load in the same frame as it was clicked', 'davidandgoliath') ,
			) ,
			"type" => "select",
		) ,
		
		array(
			'name' => __('Contents', 'davidandgoliath') ,
			'id' => 'html-content',
			'default' => __('This is Photoshop’s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.', 'davidandgoliath'),
			'type' => 'editor',
			'holder' => 'textarea',
		) ,

		array(
			'name' => __('Icon', 'davidandgoliath') ,
			'desc' => __('This option overrides the "Image" option.', 'davidandgoliath'),
			'id' => 'icon',
			'default' => '',
			'type' => 'icons',
		) ,
		array(
			"name" => __("Icon Color", 'davidandgoliath') ,
			"id" => "icon_color",
			"default" => 'accent6',
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
			"type" => "select",
		) ,
		array(
			'name' => __('Icon Size', 'davidandgoliath'),
			'id' => 'icon_size',
			'type' => 'range',
			'default' => 62,
			'min' => 8,
			'max' => 100,
		),

		array(
			'name' => __('Image', 'davidandgoliath') ,
			'desc' => __('The image will appear above the content.<br/><br/>', 'davidandgoliath'),
			'id' => 'image',
			'default' => '',
			'type' => 'upload',
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
