<?php

return array(
	"name" => __("Icon", 'davidandgoliath') ,
	"value" => "icon",
	"options" => array(
		array(
			'name' => __('Name', 'davidandgoliath') ,
			'id' => 'name',
			'default' => '',
			'type' => 'icons',
		) ,
		array(
			"name" => __("Color (optional)", 'davidandgoliath') ,
			"id" => "color",
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
			"type" => "select",
		) ,
		array(
			'name' => __('Size', 'davidandgoliath'),
			'id' => 'size',
			'type' => 'range',
			'default' => 16,
			'min' => 8,
			'max' => 100,
		),
		array(
			"name" => __("Style", 'davidandgoliath') ,
			"id" => "style",
			"default" => '',
			"prompt" => __('Default', 'davidandgoliath'),
			"options" => array(
				'inverted-colors' => __('Invert colors', 'davidandgoliath'),
				'box' => __('Box', 'davidandgoliath'),
			) ,
			"type" => "select",
		) ,
	)
);