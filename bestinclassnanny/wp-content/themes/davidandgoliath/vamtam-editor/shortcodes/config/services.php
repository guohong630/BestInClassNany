<?php
return array(
	'name' => __('Service Box', 'davidandgoliath') ,
	'desc' => __('Please note that the service box may not work properly in one half to full width layouts.' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('cog1'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'services',
	'controls' => 'size name clone edit delete',
	'options' => array(
		array(
			'name' => __('Style', 'davidandgoliath') ,
			'id' => 'fullimage',
			'default' => 'false',
			'type' => 'select',
			'options' => array(
				'false' => __('Style big icon with zoom out', 'davidandgoliath'),
				'true' => __('Style standard with an image or an icon ', 'davidandgoliath'),
			),
			'field_filter' => 'fbs',
		) ,

		array(
			'name' => __('Icon', 'davidandgoliath') ,
			'desc' => __('This option overrides the "Image" option.', 'davidandgoliath'),
			'id' => 'icon',
			'default' => 'apple',
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
			'class' => 'fbs fbs-true',
		),
		array(
			'name' => __(' Icon Background', 'davidandgoliath'),
			'id' => 'background',
			'default' => 'accent1',
			'type' => 'color',
			'class' => 'fbs fbs-false',
		),

		array(
			'name' => __('Image', 'davidandgoliath') ,
			'desc' => __('This option can be overridden by the "Icon" option.', 'davidandgoliath'),
			'id' => 'image',
			'default' => '',
			'type' => 'upload',
		) ,
		array(
			'name' => __('Title', 'davidandgoliath') ,
			'id' => 'title',
			'default' => 'This is a title',
			'type' => 'text',
		) ,

		array(
			'name' => __('Description', 'davidandgoliath') ,
			'id' => 'html-content',
			'default' => 'This is Photoshop’s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.

Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.',
			'type' => 'editor',
			'holder' => 'textarea',
		) ,

		array(
			'name' => __('Text Alignment', 'davidandgoliath') ,
			'id' => 'text_align',
			'default' => 'justify',
			'type' => 'select',
			'options' => array(
				'justify' => 'justify',
				'left' => 'left',
				'center' => 'center',
				'right' => 'right',
			)
		) ,
		array(
			'name' => __('Link', 'davidandgoliath') ,
			'id' => 'button_link',
			'default' => '/',
			'type' => 'text'
		) ,

		array(
			'name' => __('Button Text', 'davidandgoliath') ,
			'id' => 'button_text',
			'default' => 'learn more',
			'type' => 'text'
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
