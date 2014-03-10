<?php

return array(
	"name" => __("Styled List", 'davidandgoliath') ,
	"value" => "list",
	"options" => array(
		array(
			'name' => __('Style', 'davidandgoliath') ,
			'id' => 'style',
			'default' => '',
			'type' => 'icons',
		) ,
		array(
			"name" => __("Color", 'davidandgoliath') ,
			"id" => "color",
			"default" => "",
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
			"name" => __("Content", 'davidandgoliath') ,
			"desc" => __("Please insert a valid HTML unordered list", 'davidandgoliath') ,
			"id" => "content",
			"default" => "<ul>
				<li>list item</li>
				<li>another item</li>
			</ul>",
			"type" => "textarea"
		) ,
	)
);