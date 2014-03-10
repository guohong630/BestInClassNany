<?php
return array(
	'name' => __('Drop Cap', 'davidandgoliath') ,
	'value' => 'dropcap',
	'options' => array(
		array(
			'name' => __('Type', 'davidandgoliath') ,
			'id' => 'type',
			'default' => '1',
			'type' => 'select',
			'options' => array(
				'1' => __('Type 1', 'davidandgoliath'),
				'2' => __('Type 2', 'davidandgoliath'),
			),
		) ,
		array(
			'name' => __('Text', 'davidandgoliath') ,
			'id' => 'text',
			'default' => '',
			'type' => 'text',
		) ,
	) ,
);
