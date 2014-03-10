<?php

/**
 * Theme options / General / Posts
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(

array(
	'name' => __('Posts', 'davidandgoliath'),
	'type' => 'start',
),

array(
	'name' => __('Blog and Portfolio Listing Pages and Archives', 'davidandgoliath'),
	'type' => 'separator',
),

array(
	'name' => __('Pagination Type', 'davidandgoliath'),
	'desc' => __('Please note that you will need WP-PageNavi plugin installed if you chose "paged" style.', 'davidandgoliath'),
	'id' => 'pagination-type',
	'type' => 'select',
	'options' => array(
		'paged' => __('Paged', 'davidandgoliath'),
		'load-more' => __('Load more button', 'davidandgoliath'),
		'infinite-scrolling' => __('Infinite scrolling', 'davidandgoliath'),
	),
	'class' => 'slim',
),


array(
	'name' => __('Blog Posts', 'davidandgoliath'),
	'type' => 'separator',
),

array(
	'name' => __('"View All Posts" Link', 'davidandgoliath'),
	'desc' => __('In a single blog post view in the top you will find navigation with 3 buttons. The middle gets you to the blog listing view.<br>
You can place the link here.', 'davidandgoliath'),
	'id' => 'post-all-items',
	'type' => 'text',
	'static' => true,
	'class' => 'slim',
),

array(
	'name' => __('Show "Related Posts" in Single Post View', 'davidandgoliath'),
	'desc' => __('Enabling this option will show more posts from the same category when viewing a single post.', 'davidandgoliath'),
	'id' => 'show-related-posts',
	'type' => 'toggle',
	'class' => 'slim',
),

array(
	'name' => __('"Related Posts" title', 'davidandgoliath'),
	'id' => 'related-posts-title',
	'type' => 'text',
	'class' => 'slim',
),

array(
	'name' => __('Show Post Author', 'davidandgoliath'),
	'desc' => __('Blog post meta info, works for the single blog post view.', 'davidandgoliath'),
	'id' => 'show-post-author',
	'type' => 'toggle',
	'class' => 'slim'
),
array(
	'name' => __('Show Categories and Tags', 'davidandgoliath'),
	'desc' => __('Blog post meta info, works for the single blog post view.', 'davidandgoliath'),
	'id' => 'meta_posted_in',
	'type' => 'toggle',
	'class' => 'slim',
),
array(
	'name' => __('Show Post Timestamp', 'davidandgoliath'),
	'desc' => __('Blog post meta info, works for the single blog post view.', 'davidandgoliath'),
	'id' => 'meta_posted_on',
	'type' => 'toggle',
	'class' => 'slim',
),
array(
	'name' => __('Show Comment Count', 'davidandgoliath'),
	'desc' => __('Blog post meta info, works for the single blog post view.', 'davidandgoliath'),
	'id' => 'meta_comment_count',
	'type' => 'toggle',
	'class' => 'slim',
),

array(
	'name' => __('Portfolio Posts', 'davidandgoliath'),
	'type' => 'separator',
),

array(
	'name' => __('"View All Portfolios" Link', 'davidandgoliath'),
	'desc' => __('In a single portfolio post view in the top you will find navigation with 3 buttons. The middle gets you to the portfolio listing view.<br>
You can place the link here.', 'davidandgoliath'),
	'id' => 'portfolio-all-items',
	'type' => 'text',
	'static' => true,
	'class' => 'slim',
),
array(
	'name' => __('Show "Related Portfolios" in Single Portfolio View', 'davidandgoliath'),
	'desc' => __('Enabling this option will show more portfolio posts from the same category in the single portfolio post.', 'davidandgoliath'),
	'id' => 'show-related-portfolios',
	'type' => 'toggle',
	'class' => 'slim',
),

array(
	'name' => __('"Related Portfolios" title', 'davidandgoliath'),
	'id' => 'related-portfolios-title',
	'type' => 'text',
	'class' => 'slim',
),

	array(
		'type' => 'end'
	),
);