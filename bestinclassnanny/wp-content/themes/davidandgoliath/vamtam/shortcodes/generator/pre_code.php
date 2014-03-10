<?php

return array(
	"name" => __("Pre & Code", 'davidandgoliath') ,
	"value" => "pre_code",
	"options" => array(
		array(
			"name" => __("Type", 'davidandgoliath') ,
			"id" => "type",
			"default" => 'code',
			"options" => array(
				"pre" => 'pre',
				"code" => 'code',
			) ,
			"type" => "select",
		) ,
		array(
			"name" => __("Content", 'davidandgoliath') ,
			'desc' => __('Any HTML code entered here will be displayed as-is, with preserved whitespace.', 'davidandgoliath'),
			"id" => "content",
			"default" => "",
			"type" => "textarea"
		) ,
	)
);