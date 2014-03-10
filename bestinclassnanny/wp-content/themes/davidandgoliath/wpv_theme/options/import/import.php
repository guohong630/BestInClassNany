<?php

/**
 * Theme options / Import / Quick Import
 * 
 * @package wpv
 * @subpackage david-goliath
 */

$disabled = $disabled_content = 'disabled';
$hidden = '';
$cf7 = 'contact-form-7/wp-contact-form-7.php';
$allplugins = function_exists('is_plugin_active') && is_plugin_active($cf7);
if($allplugins) {
	$disabled = $disabled_content = '';
	$hidden = 'hidden';
}

if(wpv_get_option('used-one-click-import')) {
	$disabled_content = 'disabled';
}

return array(

array(
	'name' => __('Quick Import', 'davidandgoliath'),
	'type' => 'start',
	'nosave' => true,
),

array(
	'name' => __('Some essential plugins are missing, please install them prior to importing the demo content.', 'davidandgoliath'),
	'desc' => sprintf(__('It is neccessary that you have <a href="%s" title="Install" target="_blank">installed Contact Form 7</a> prior to importing the demo content', 'davidandgoliath'), admin_url('themes.php?page=install-required-plugins')),
	'type' => 'info',
	'class' => "important $hidden",
),

array(
	'name' => __('Content Import', 'davidandgoliath'),
	'desc' => __('You are advised to use this importer only on new WordPress sites, as in doing so you will end up with quite a lot of example posts, pages, slides and portfolio items.', 'davidandgoliath'),
	'title' => __('Import Dummy Content', 'davidandgoliath'),
	'link' => $allplugins && $disabled_content !== 'disabled' ? wp_nonce_url(admin_url('admin.php?import=wpv&step=2&file='.WPV_THEME_SAMPLE_CONTENT), 'wpv-import') : 'javascript:void(0)',
	'type' => 'button',
	'class' => "top-desc $disabled_content",
),

array(
	'name' => __('Widget Import', 'davidandgoliath'),
	'desc' => __('Using this importer will overwrite your current sidebar settings', 'davidandgoliath'),
	'title' => __('Import Widgets', 'davidandgoliath'),
	'link' => $allplugins ? wp_nonce_url(admin_url('admin.php?import=wpv_widgets&file='.WPV_THEME_SAMPLE_WIDGETS), 'wpv-import') : 'javascript:void(0)',
	'type' => 'button',
	'class' => "top-desc $disabled",
),

array(
	'name' => __('Layer Slider', 'davidandgoliath'),
	'desc' => __('The theme uses Layered Slider and its option panel is found in the WordPress main navigation menu on the left.<br/>You will import the sliders seen in the demo website using this importer.', 'davidandgoliath'),
	'title' => __('Import Layer Slider Samples', 'davidandgoliath'),
	'link' => $allplugins ? admin_url('admin.php?page=layerslider&action=import_sample') : 'javascript:void(0)',
	'type' => 'button',
	'class' => "top-desc $disabled",
),
	array(
		'type' => 'end',
	),

);
