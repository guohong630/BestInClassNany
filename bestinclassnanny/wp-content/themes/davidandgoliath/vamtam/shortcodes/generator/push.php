<?php
return array(
	'name' => __('Vertical Blank Space', 'davidandgoliath') ,
	'value' => 'push',
	'options' => array(
		array(
			"name" => __("Height", 'davidandgoliath') ,
			"id" => "h",
			"default" => 30,
			'min' => -200,
			'max' => 200,
			"type" => "range",
		) ,
	) ,
);
