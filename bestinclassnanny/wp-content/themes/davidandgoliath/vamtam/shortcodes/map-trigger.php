<?php

/**
 * Footer map trigger shortcode
 *
 * @package wpv
 */

/**
 * class WpvShortcodeMapTrigger
 */
class WpvShortcodeMapTrigger {

	/**
	 * add the shortcode
	 */
	public function __construct() {
		add_shortcode('fmap_trigger', array(__CLASS__, 'shortcode'));
	}

	/**
	 * shortcode callback
	 * 
	 * @param  array  $atts    shortcode attributes
	 * @param  string $content shortcode content
	 * @param  string $code    shortcode name
	 * @return string          output html
	 */
	public static function shortcode($atts=array(), $content = null, $code='fmap_trigger') {
		extract(shortcode_atts(array(
		), $atts));
		
		return '<div class="footer-map-trigger"><a class="show-fmap-button" data-opentext="'. esc_attr(do_shortcode(wpv_get_option('fmap-text-open'))) . '" data-closetext="'. esc_attr(do_shortcode(wpv_get_option('fmap-text-close'))) .'" href="#">'. do_shortcode(wpv_get_option('fmap-text-open')) .'</a></div>';
	}
}

new WpvShortcodeMapTrigger;
