<?php
/**
 * Vamtam Post Options
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(

array(
	'name' => __('General', 'davidandgoliath'),
	'type' => 'separator',
),

array(
	"name" => __("Cite", 'davidandgoliath') ,
	"id" => "testimonial-author",
	"default" => "",
	"type" => "text",
) ,

array(
	"name" => __("Link", 'davidandgoliath') ,
	"id" => "testimonial-link",
	"default" => "",
	"type" => "text",
) ,

);
