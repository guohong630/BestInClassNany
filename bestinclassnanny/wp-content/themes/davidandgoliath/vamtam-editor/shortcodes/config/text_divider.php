<?php
return array(
	'name' => __('Text Divider', 'davidandgoliath') ,
	'icon' => array(
		'char' => WPV_Editor::get_icon('minus'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'text_divider',
	'controls' => 'name clone edit delete',
	'options' => array(
		array(
			'name' => __('Type', 'davidandgoliath') ,
			'id' => 'type',
			'default' => 'single',
			'options' => array(
				'single' => __('Type 1', 'davidandgoliath') ,
				'double' => __('Type 2', 'davidandgoliath') ,
			) ,
			'type' => 'select',
			'class' => 'add-to-container',
			'field_filter' => 'ftds',
		) ,
		array(
			'name' => __('Text', 'davidandgoliath') ,
			'id' => 'html-content',
			'default' => __('Text Divider', 'davidandgoliath'),
			'type' => 'editor',
			'class' => 'ftds ftds-single ftds-double',
		) ,
		array(
			'name' => __('"More Info" Link', 'davidandgoliath'),
			'id' => 'more',
			'default' => '/',
			'placeholder' => __('No link', 'davidandgoliath'),
			'type' => 'text',
			'class' => 'ftds ftds-single',
		),

		array(
			'name' => __('"More Info" Text', 'davidandgoliath'),
			'id' => 'more_text',
			'default' => __('Read more', 'davidandgoliath'),
			'type' => 'text',
			'class' => 'ftds ftds-single',
		),
	) ,
);
