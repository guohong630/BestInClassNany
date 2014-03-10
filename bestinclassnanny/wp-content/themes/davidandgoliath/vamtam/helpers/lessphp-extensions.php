<?php

/**
 *
 * Extensions to the LESSPHP compiler
 *
 * This file *must* be included after lessphp has been initialized
 *
 * It is assumed that the lessphp instance is available as $l
 *
 * @package wpv
 */


if(!function_exists('wpv_mb_chr')) {
	/**
	 * Same as chr() but for unicode
	 *
	 * @param  int    $char character number
	 * @return string       character
	 */
	function wpv_mb_chr($char) {
		if ($char < 128)
			return chr($char);
		if ($char < 2048)
			return chr(($char >> 6) + 192) . chr(($char & 63) + 128);

		if ($char < 65536)
			return chr(($char >> 12) + 224) . chr((($char >> 6) & 63) + 128) . chr(($char & 63) + 128);

		if ($char < 2097152)
			return chr(($char >> 18) + 240) . chr((($char >> 12) & 63) + 128) . chr((($char >> 6) & 63) + 128) . chr(($char & 63) + 128);

		return '';
	}
}

if(!function_exists('wpv_get_icon_list')) {
	/**
	 * Returns the list of Icomoon icons
	 * @return array list of icons
	 */
	function wpv_get_icon_list() {
		if(!isset($GLOBALS['WPV_ICONS_CACHE']))
			$GLOBALS['WPV_ICONS_CACHE'] = include(BASEPATH.'vamtam/assets/fonts/icons/list.php');

		return $GLOBALS['WPV_ICONS_CACHE'];
	}

	/**
	 * Returns the list of theme icons
	 * @return array list of icons
	 */
	function wpv_get_theme_icon_list() {
		if(!isset($GLOBALS['WPV_THEME_ICONS_CACHE']))
			$GLOBALS['WPV_THEME_ICONS_CACHE'] = include(BASEPATH.'wpv_theme/assets/fonts/icons/list.php');

		return $GLOBALS['WPV_THEME_ICONS_CACHE'];
	}
}

if(!function_exists('wpv_lessphp_icon')) {
	/**
	 * icon() function for LESSPHP
	 *
	 * @param  string $arg icon name
	 * @return array       LESSPHP token
	 */
	function wpv_lessphp_icon($arg) {
		list($type, $icon) = $arg;

		$icons = wpv_get_icon_list();
		$theme_icons = wpv_get_theme_icon_list();

		if(isset($icons[$icon]))
			$icon = wpv_mb_chr($icons[$icon]);

		$theme_icon = preg_replace('/^theme-/', '', $icon, 1);
		if(isset($theme_icons[$theme_icon]))
			$icon = wpv_mb_chr($theme_icons[$theme_icon]);

		return array('string', '"', array($icon));
	}
}
// deliberately left outside the is statement above
// this simplifies the CLI compiler
$l->registerFunction("icon", "wpv_lessphp_icon");
