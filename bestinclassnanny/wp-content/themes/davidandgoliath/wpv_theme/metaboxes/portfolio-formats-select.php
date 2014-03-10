<?php
/**
 * Vamtam Portfolio Format Selector
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(

array(
	'name' => __('Portfolio Format', 'davidandgoliath'),
	'type' => 'separator'
),

array(
	'name' => __('Portfolio Data Type', 'davidandgoliath'),
	'desc' => __('Image - uses the featured image (default)<br />
				  Gallery - use the featured image as a title image but show additional images too<br />
				  Video/Link - uses the "portfolio data url" setting<br />
				  Document - acts like a normal post<br />
				  HTML - overrides the image with arbitrary HTML when displaying a single portfolio page. Does not work with the ajax portfolio.
				', 'davidandgoliath'),
	'id' => 'portfolio_type',
	'type' => 'radio',
	'options' => array(
		'image' => __('Image', 'davidandgoliath'),
		'gallery' => __('Gallery', 'davidandgoliath'),
		'video' => __('Video', 'davidandgoliath'),
		'link' => __('Link', 'davidandgoliath'),
		'document' => __('Document', 'davidandgoliath'),
		'html' => __('HTML', 'davidandgoliath'),
	),
	'default' => 'image',
),

);
