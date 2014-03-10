<?php

return array(
	"name" => __("Highlight", 'davidandgoliath') ,
	"value" => "highlight",
	"options" => array(
		array(
			"name" => __("Type", 'davidandgoliath') ,
			"id" => "type",
			"default" => '',
			"options" => array(
				"light" => __("light", 'davidandgoliath') ,
				"dark" => __("dark", 'davidandgoliath') ,
			) ,
			"type" => "select",
		) ,
		array(
			"name" => __("Content", 'davidandgoliath') ,
			"id" => "content",
			"default" => "",
			"type" => "textarea"
		) ,
	)
);