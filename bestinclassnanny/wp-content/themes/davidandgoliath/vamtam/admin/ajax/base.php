<?php

// gets the stylesheet for the font preview
function wpv_font_preview_callback() {
	global $available_fonts;
	
	$url = wpv_get_font_url($_POST['face'], $_POST['weight']);
	
	if(!empty($url)) {
		echo $url;
	}
	
	exit;
}
add_action('wp_ajax_wpv-font-preview', 'wpv_font_preview_callback');

// saves the theme/framework options
function wpv_save_options_callback() {
	$page_str = str_replace('wpv_', '', $_POST['page']);

	$options = array();

	$tabs = include WPV_THEME_OPTIONS . $page_str . '/list.php';

	foreach($tabs as $tab) {
		$tab_contents = include WPV_THEME_OPTIONS.$page_str."/$tab.php";
		
		$options = array_merge($options, $tab_contents);
	}
	
	if(!isset($_POST['cacheonly'])) {
		wpv_save_config($options);
	} else {
		wpv_update_generated_css();
	}
	
	wpv_update_option('css-cache-timestamp', time());

	_e('Saved', 'davidandgoliath');
	
	exit;
}
add_action('wp_ajax_wpv-save-options', 'wpv_save_options_callback');

function wpv_shortcode_generator() {
	$config = array(
		'title' => __('Shortcodes', 'davidandgoliath'),
		'id' => 'shortcode',
	);

	$shortcodes = apply_filters('wpv_shortcode_'.$_GET['slug'], include(WPV_SHORTCODES_GENERATOR . $_GET['slug'] .'.php'));
	$generator = new WpvShortcodesGenerator($config, $shortcodes);

	$generator->render();
}
add_action('wp_ajax_wpv-shortcode-generator', 'wpv_shortcode_generator');