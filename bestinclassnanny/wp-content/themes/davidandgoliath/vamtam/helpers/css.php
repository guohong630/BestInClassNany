<?php

/**
 * CSS-related helpers
 *
 * @package wpv
 */

/**
 * marks a font as "used"
 *
 * @param string $opt_id option name
 */
function wpv_use_font($opt_id) {
	global $wpv_fonts, $used_google_fonts, $used_local_fonts;

	// we need the google and local fonts cached, so we can generate the correct @import rules

	$font = wpv_get_option($opt_id . '-face');

	if(isset($wpv_fonts[$font]['gf'])) {
		$used_google_fonts[$font][] = wpv_get_option($opt_id . '-weight');
	} elseif(isset($wpv_fonts[$font]['local'])) {
		$used_local_fonts[]= $wpv_fonts[$font]['family'];
	}
}

/**
 * returns the external font url based on the font family
 *
 * @param string $font   font-family
 * @param string $weight font-weight
 */

function wpv_get_font_url($font, $weight='') {
	global $wpv_fonts;

	if(isset($wpv_fonts[$font]['gf'])) {
		// this is a google font
		return "http://fonts.googleapis.com/css?family=".urlencode($font).':'.$weight."&subset=cyrillic,greek,latin";
	} elseif(isset($wpv_fonts[$font]['local'])) {
		// this is a local @font-face font

		return WPV_FONTS_URI."$font/stylesheet.css";
	}

	return '';
}

/**
 * Called after the CSS cache is generated
 */
function wpv_finalize_custom_css() {
	global $used_google_fonts, $used_local_fonts, $mocked;

	ob_start();

	WpvLess::compile();

	$font_imports = '';
	$font_imports_urls = array();

	$pages = array('general', 'layout', 'styles', 'import');
	foreach($pages as $page_str) {
		$tabs = include WPV_THEME_OPTIONS . $page_str . '/list.php';

		foreach($tabs as $tab) {
			$tab_contents = include WPV_THEME_OPTIONS.$page_str."/$tab.php";
			foreach($tab_contents as $opt) {
				if(isset($opt['type']) && $opt['type'] == 'font') {
					wpv_use_font($opt['id']);
				}
			}
		}
	}

	if(is_array($used_google_fonts) && count($used_google_fonts)) {
		$param = array();
		foreach($used_google_fonts as $font => $weights) {
			$param[] = urlencode($font).':'.implode(',', array_unique($weights));
		}
		$param = implode('|', $param);

		$font_imports .= "@import url('http://fonts.googleapis.com/css?family=".$param."&subset=cyrillic,greek,latin');\n";
		$font_imports_urls['gfonts'] = "http://fonts.googleapis.com/css?family=".$param."&subset=cyrillic,greek,latin";
	}

	if(is_array($used_local_fonts) && count($used_local_fonts)) {
		foreach($used_local_fonts as $font) {
			$font_imports .= "@import url('".WPV_FONTS_URI."$font/stylesheet.css');\n";
			$font_imports_urls[$font] = WPV_FONTS_URI."$font/stylesheet.css";
		}
	}

	if(!isset($mocked)) {
		wpv_update_option('external-fonts', $font_imports_urls);

		return ob_get_clean();
	} else {
		return array(
			'styles' => ob_get_clean(),
			'imports' => $font_imports,
		);
	}
}

/**
 * Map an accent name to its value
 *
 * @param  string $color accent name
 * @return string        hex color or the input string
 */
function wpv_sanitize_accent($color) {
	if(preg_match('/accent(?:-color-)?(\d)/i', $color, $matches)) {
		$num = (int)$matches[1];
		$color = wpv_get_option("accent-color-$num");
	}

	return $color;
}

if(function_exists('wp_head')) {
	function wpv_customcss() {
		$styles = wpv_get_option('custom_css');
		if(empty($styles)) return;

		wp_add_inline_style('front-all', $styles);
	}
	add_action('wp_enqueue_scripts', 'wpv_customcss', 100);
}