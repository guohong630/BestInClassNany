<?php

function shortcodes_tinymce() {
	add_filter("mce_external_plugins", "shortcodes_tinymce_plugin");
	add_filter('mce_buttons', 'shortcodes_tinymce_button');
}

function shortcodes_tinymce_button($buttons) {
	array_push($buttons, "separator", "shortcodes");
	return $buttons;
}

function shortcodes_tinymce_plugin($plugin_array) {
	$plugin_array['shortcodes'] = WPV_ADMIN_ASSETS_URI . 'js/shortcodes_tinymce.js';
	return $plugin_array;
}
add_action('admin_init', 'shortcodes_tinymce');

function wpv_tinymce_lang() {
	$lang = array(
		'url' => WPV_ADMIN_AJAX.'get_shortcodes.php',
		'button' => '',
		'title' => __('Vamtam shortcodes', 'davidandgoliath'),
		'shortcodes' => array(),
	);

	$shortcodes = include WPV_THEME_METABOXES . 'shortcode.php';

	sort($shortcodes);

	foreach($shortcodes as $slug) {
		$shortcode_options = include WPV_SHORTCODES_GENERATOR . $slug . '.php';
		$lang['shortcodes'][] = array(
			'title' => $shortcode_options['name'],
			'slug' => $slug,
		);
	}

	echo '<script>WpvTmceShortcodes='.json_encode($lang).';</script>';
}
add_action('admin_head', 'wpv_tinymce_lang');
