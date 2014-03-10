<?php

/**
 * Theme options / Layout / Header
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(
array(
	'name' => __('Header', 'davidandgoliath'),
	'type' => 'start',
),

array(
	'name' => __('Header Layout', 'davidandgoliath'),
	'desc' => __('Please note that the theme uses Layered Slider and its option panel is found in the WordPress navigation menu on the left', 'davidandgoliath'),
	'type' => 'info',
),

array(
	'name' => __('Sticky Header', 'davidandgoliath'),
	'id' => 'sticky-header',
	'type' => 'toggle',
),

array(
	'name' => __('Header Height', 'davidandgoliath'),
	'desc' => __('This is the area above the slider.', 'davidandgoliath'),
	'id' => 'header-height',
	'type' => 'range',
	'min' => 30,
	'max' => 300,
	'unit' => 'px',
),

array(
	'name' => __('Top Bar Layout', 'davidandgoliath'),
	'id' => 'top-bar-layout',
	'type' => 'select',
	'options' => array(
		'false' => __('Disabled', 'davidandgoliath'),
		'["widgets","menu"]' => __('Left: Widgets, Right: Menu', 'davidandgoliath'),
		'["menu","widgets"]' => __('Left: Menu, Right: Widgets', 'davidandgoliath'),
	),
),

array(
	'name' => __('Header Layout', 'davidandgoliath'),
	'type' => 'autofill',
	'class' => 'no-box',
	'option_sets' => array(
		array(
			'name' => __('One row, left logo, menu on the right', 'davidandgoliath'),
			'image' => WPV_ADMIN_ASSETS_URI . 'images/header-layout-1.png',
			'values' => array(
				'header-layout' => 'logo-menu',
			),
		),
		array(
			'name' => __('Two rows; left-aligned logo on top, right-aligned text and search', 'davidandgoliath'),
			'image' => WPV_ADMIN_ASSETS_URI . 'images/header-layout-2.png',
			'values' => array(
				'header-layout' => 'logo-text-menu',
			),
		),
		array(
			'name' => __('Two rows; centered logo on top', 'davidandgoliath'),
			'image' => WPV_ADMIN_ASSETS_URI . 'images/header-layout-3.png',
			'values' => array(
				'header-layout' => 'standard',
			),
		),
	),
),

array(
	'name' => __('Header Layout', 'davidandgoliath'), // dummy option, do not remove
	'id' => 'header-layout',
	'type' => 'select',
	'class' => 'hidden',
	'options' => array(
		'standard' => __('Two rows; centered logo on top', 'davidandgoliath'),
		'logo-menu' => __('One row, left logo, menu on the right', 'davidandgoliath'),
		'logo-text-menu' => __('Two rows; left-aligned logo on top, right-aligned text and search', 'davidandgoliath'),
	),
	'field_filter' => 'fhl',
),

array(
	'name' => __('Header Text Area', 'davidandgoliath'),
	'desc' => __('You can place text/HTML or any shortcode in this field. The text will appear in the header on the left hand side.', 'davidandgoliath'),
	'id' => 'phone-num-top',
	'type' => 'textarea',
	'static' => true,
	'class' => 'fhl fhl-standard fhl-logo-text-menu',
),

array(
	'name' => __('Enable Header Search', 'davidandgoliath'),
	'id' => 'enable-header-search',
	'type' => 'toggle',
	'class' => 'fhl fhl-standard fhl-logo-text-menu',
),

array(
	'name' => __('Full Width Header', 'davidandgoliath'),
	'id' => 'full-width-header',
	'type' => 'toggle',
	'class' => 'fhl fhl-logo-menu',
),

	array(
		'type' => 'end'
	),

);