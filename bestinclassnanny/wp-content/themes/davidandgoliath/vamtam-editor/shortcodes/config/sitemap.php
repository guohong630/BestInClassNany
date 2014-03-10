<?php
return array(
	"name" => "Sitemap",
	'icon' => array(
		'char' => WPV_Editor::get_icon('list'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	"value" => "sitemap",
	'controls' => 'size name clone edit delete',
	'class' => 'slim',
	"options" => array(
		array(
			'name' => __('General', 'davidandgoliath'),
			'type' => 'separator',
		),
			array(
				"name" => __("Filter", 'davidandgoliath') ,
				"id" => "shows",
				"default" => array(),
				"options" => array(
					"pages" => __("Pages", 'davidandgoliath') ,
					"categories" => __("Categories", 'davidandgoliath') ,
					"posts" => __("Posts", 'davidandgoliath') ,
					"portfolios" => __("Portfolios", 'davidandgoliath') ,
				) ,
				"type" => "multiselect",
			) ,

			array(
				"name" => __("Limit", 'davidandgoliath') ,
				"desc" => __("Sets the number of items to display.<br>leaving this setting as 0 displays all items.", 'davidandgoliath') ,
				"id" => "number",
				"default" => 0,
				"min" => 0,
				"max" => 200,
				"type" => "range"
			) ,

			array(
				"name" => __("Depth", 'davidandgoliath') ,
				"desc" => __("This parameter controls how many levels in the hierarchy are to be included. <br> 0: Displays pages at any depth and arranges them hierarchically in nested lists<br> -1: Displays pages at any depth and arranges them in a single, flat list<br> 1: Displays top-level Pages only<br> 2, 3 … Displays Pages to the given depth", 'davidandgoliath') ,
				"id" => "depth",
				"default" => 0,
				"min" => - 1,
				"max" => 5,
				"type" => "range"
			) ,

		array(
			'name' => __('Posts and portfolios', 'davidandgoliath'),
			'type' => 'separator',
		),
			array(
				"name" => __("Show comments", 'davidandgoliath') ,
				"id" => "show_comment",
				"desc" => '',
				"default" => true,
				"type" => "toggle"
			) ,
			array(
				"name" => __("Specific post categories", 'davidandgoliath') ,
				"id" => "post_categories",
				"default" => array() ,
				"target" => 'cat',
				"type" => "multiselect",
			) ,
			array(
				"name" => __("Specific posts", 'davidandgoliath') ,
				"desc" => __("The specific posts you want to display", 'davidandgoliath') ,
				"id" => "posts",
				"default" => array() ,
				"target" => 'post',
				"type" => "multiselect",
			) ,
			array(
				"name" => __("Specific portfolio categories", 'davidandgoliath') ,
				"id" => "portfolio_categories",
				"default" => array() ,
				"target" => 'portfolio_category',
				"type" => "multiselect",
			) ,
		
		array(
			'name' => __('Categories', 'davidandgoliath'),
			'type' => 'separator',
		),
			array(
				"name" => __("Show Count", 'davidandgoliath') ,
				"id" => "show_count",
				"desc" => __("Toggles the display of the current count of posts in each category.", 'davidandgoliath') ,
				"default" => true,
				"type" => "toggle"
			) ,
			array(
				"name" => __("Show Feed", 'davidandgoliath') ,
				"id" => "show_feed",
				"desc" => __("Display a link to each category's <a href='http://codex.wordpress.org/Glossary#RSS' target='_blank'>rss-2</a> feed.", 'davidandgoliath') ,
				"default" => true,
				"type" => "toggle"
			) ,
			array(
			'name' => __('Title', 'davidandgoliath') ,
			'desc' => __('The column title is placed just above the element.', 'davidandgoliath'),
			'id' => 'column_title',
			'default' => '',
			'type' => 'text'
		) ,
		array(
			'name' => __('Title Type (optional)', 'davidandgoliath') ,
			'id' => 'column_title_type',
			'default' => 'single',
			'type' => 'select',
			'options' => array(
				'single' => __('Title with divider next to it', 'davidandgoliath'),
				'double' => __('Title with divider below', 'davidandgoliath'),
				'no-divider' => __('No Divider', 'davidandgoliath'),
			),
		) ,
	) ,
);
