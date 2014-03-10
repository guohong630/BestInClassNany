<?php

/**
 * Blog shortcode options
 *
 * @package wpv
 * @subpackage editor
 */


return array(
	'name' => 'Blog',
	'desc' => __('Please note that this element shows already created blog posts. To create one go to the Posts tab in the WordPress main navigation menu on the left - add new. You do not have to go to Settings - Reading to set the blog listing page.' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('blog'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'blog',
	'controls' => 'size name clone edit delete',
	'options' => array(

		array(
			'name' => __('Layout', 'davidandgoliath'),
			'desc' => __('Big images - this is the standard layout in one column. <br/>
				Small images, Small Images - Scrollable, Small images - Masonry - the posts in these layouts come in boxes with image on top and text below. They come in 2,3,4 columns.', 'davidandgoliath') ,
			'id' => 'layout',
			'type' => 'select',
			'default' => 'normal',
			'options' => array(
				'normal' => __('Big Images', 'davidandgoliath'),
				'small' => __('Small Images - Normal', 'davidandgoliath'),
				'scroll-x' => __('Small Images - Scrollable', 'davidandgoliath'),
				'masonry' => __('Small Images - Masonry', 'davidandgoliath'),
			),
			'field_filter' => 'fbs',
		),
		array(
			'name' => __('Columns', 'davidandgoliath') ,
			'desc' => __('Number of posts to show per row.', 'davidandgoliath') ,
			'id' => 'column',
			'default' => 2,
			'min' => 2,
			'max' => 4,
			'type' => 'range',
			'class' => 'fbs fbs-small fbs-scroll-x fbs-masonry',
		) ,
		array(
			'name' => __('Limit', 'davidandgoliath') ,
			'desc' => __('Number of posts to show per page.', 'davidandgoliath') ,
			'id' => 'count',
			'default' => 3,
			'min' => 1,
			'max' => 50,
			'type' => 'range',
		) ,

		array(
			'name' => __('Display Post Content', 'davidandgoliath') ,
			'id' => 'show_content',
			'desc' => __('Big Images Layout: If the option is on, it will display the content of the post, otherwise it will display the excerpt.<br>
				Small Images - Normal, Scrollable, Masonry: If the option is on, the post excerpt will be shown, otherwise no content will be shown.', 'davidandgoliath') ,
			'default' => false,
			'type' => 'toggle',
		) ,
		array(
			'name' => __('Nopaging', 'davidandgoliath') ,
			'id' => 'nopaging',
			'desc' => __('If the option is on, it will disable pagination. You can set the type of pagination in General Settings - Posts - Pagination Type. ', 'davidandgoliath') ,
			'default' => true,
			'type' => 'toggle',
			'class' => 'fbs fbs-normal fbs-small fbs-masonry',
		) ,
		array(
			'name' => __('Category (optional)', 'davidandgoliath') ,
			'desc' => __('All categories will be shown if none are selected. Please note that if you do not see categories, there are none created most probably. You can use ctr + click to select multiple categories', 'davidandgoliath') ,
			'id' => 'cat',
			'default' => array() ,
			'target' => 'cat',
			'type' => 'multiselect',
			'layout' => 'checkbox',
		) ,
		array(
			'name' => __('Posts (optional)', 'davidandgoliath') ,
			'desc' => __('All posts will be shown if none are selected. If you select any posts here, this option will override the category option above. You can use ctr + click to select multiple posts.', 'davidandgoliath') ,
			'id' => 'posts',
			'default' => array() ,
			'target' => 'post',
			'type' => 'multiselect',
		) ,


		array(
			'name' => __('Title (optional)', 'davidandgoliath') ,
			'desc' => __('The title is placed just above the element.', 'davidandgoliath'),
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



