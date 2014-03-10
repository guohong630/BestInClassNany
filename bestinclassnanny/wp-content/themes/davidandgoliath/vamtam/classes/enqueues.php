<?php

/**
 * Enqueue styles and scripts used by the theme
 *
 * @package wpv
 */

/**
 * class WpvEnqueues
 */
class WpvEnqueues {
	/**
	 * Hook the relevant actions
	 */
	public function __construct() {
		add_action('wp_enqueue_scripts', array(&$this, 'scripts'));
		add_action('wp_enqueue_scripts', array(&$this, 'styles'));
		add_action('admin_enqueue_scripts', array(&$this, 'admin_scripts'));
		add_action('admin_enqueue_scripts', array(&$this, 'admin_styles'));
	}

	private function is_our_admin_page() {
		if(!is_admin()) return false;

		$screen = get_current_screen();
		return in_array($screen->base, array('post', 'widgets', 'themes')) || strpos($screen->base, 'vamtam_page') === 0 || strpos($screen->base, 'toplevel_page_wpv') === 0;
	}

	/**
	 * Front-end scripts
	 */
	public function scripts() {
		if(is_admin() || WpvTemplates::is_login()) return;

		global $is_IE, $content_width;

		$theme_version = WpvFramework::getVersion();
		$gmap_key = wpv_get_option('gmap_api_key');

		// modernizr should be on top
		wp_enqueue_script( 'modernizr', WPV_JS .'modernizr.min.js');

		if ( is_singular() && comments_open() ) {
  			wp_enqueue_script( 'comment-reply', false, false, false, true );
  		}

		if($is_IE) {
			wp_enqueue_script( 'vamtam-respondjs', WPV_JS .'plugins/thirdparty/respond.min.js', array(), $theme_version, true);
			wp_enqueue_script( 'vamtam-selectivizr', WPV_JS .'plugins/thirdparty/selectivizr.min.js', array(), $theme_version, true);
		}

		$all_js_path = (WP_DEBUG || (defined('WPV_SCRIPT_DEBUG') && WPV_SCRIPT_DEBUG)) ? 'all.js' : 'all.min.js';
		$all_js_deps = array(
			'jquery',
			'jquery-migrate',
			'jquery-ui-core',
			'jquery-effects-core',
			'jquery-ui-widget',
			'jquery-ui-accordion',
			'jquery-ui-tabs',
		);

		wp_enqueue_script( 'vamtam-all', WPV_JS . $all_js_path, $all_js_deps, $theme_version, true);

		wp_register_script( 'vamtam-fastslider', WPV_JS .'plugins/vamtam/jquery.fastslider.js', array('jquery', 'vamtam-all'), $theme_version, true);
		wp_register_script( 'vamtam-portfolioslider', WPV_JS .'plugins/vamtam/jquery.vamtam.portfolioslider.js', array('jquery', 'vamtam-all'), $theme_version, true);

		$script_vars = array(
			'content_width' => $content_width,
		);

		if(!empty($gmap_key)) {
			$script_vars['gmap_api_key'] = $gmap_key;
		}

		wp_localize_script('vamtam-all', 'WPV_FRONT', $script_vars);
	}

	/**
	 * Admin scripts
	 */
	public function admin_scripts() {
		if(!$this->is_our_admin_page()) return;

		$theme_version = WpvFramework::getVersion();

		wp_enqueue_script( 'jquery-magnific-popup', WPV_JS .'plugins/thirdparty/jquery.magnific.js', array('jquery'), $theme_version, true);

		wp_enqueue_script( 'common');
		wp_enqueue_script( 'editor');
		wp_enqueue_script( 'jquery-ui-sortable');
		wp_enqueue_script( 'jquery-ui-draggable');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-range', WPV_ADMIN_ASSETS_URI .'js/jquery.ui.range.js', array('jquery'), $theme_version, true);
		wp_enqueue_script( 'jquery-ui-slider');

		wp_enqueue_script( 'farbtastic' );

		wp_enqueue_media();

		wp_enqueue_script( 'wpv_admin', WPV_ADMIN_ASSETS_URI .'js/admin-all.js', array('jquery', 'underscore', 'backbone'), $theme_version, true);
		wp_enqueue_script( 'wpv-shortcode', WPV_ADMIN_ASSETS_URI . 'js/shortcode.js', array('jquery'), $theme_version, true);

		wp_localize_script('wpv_admin', 'WPV_ADMIN', array(
			'stylesurl' => admin_url('admin.php?page=wpv_styles'),
			'addNewIcon' => __('Add New Icon', 'davidandgoliath'),
			'iconName' => __('Icon', 'davidandgoliath'),
			'iconText' => __('Text', 'davidandgoliath'),
			'iconLink' => __('Link', 'davidandgoliath'),
			'iconChange' => __('Change', 'davidandgoliath'),
		));
	}

	/**
	 * Front-end styles
	 */
	public function styles() {
		if(is_admin() || WpvTemplates::is_login()) return;

		$theme_version = WpvFramework::getVersion();

		$external_fonts = maybe_unserialize(wpv_get_option('external-fonts'));
		if(is_array($external_fonts) && !empty($external_fonts)) {
			foreach($external_fonts as $name=>$url) {
				wp_enqueue_style( 'wpv-'.$name, $url, array(), $theme_version);
			}
		}

		wp_enqueue_style( 'front-magnific-popup', wpv_prepare_url(WPV_THEME_CSS . 'magnific.css'));

		$cache_timestamp = wpv_get_option('css-cache-timestamp');

		$generated_deps = array('front-magnific-popup');

		if(wpv_has_woocommerce())
			$generated_deps[] = 'woocommerce-general';

		$suffix = is_multisite() ? $GLOBALS['blog_id'] : '';

		wp_enqueue_style( 'front-all', wpv_prepare_url(WPV_CACHE_URI . 'all'.$suffix.'.css'), $generated_deps, $cache_timestamp);

		global $wpv_is_shortcode_preview;

		if($wpv_is_shortcode_preview) {
			wp_enqueue_style( 'vamtam-shortcode-preview', WPV_ADMIN_ASSETS_URI . 'css/shortcode-preview.css');
		}
	}

	/**
	 * Admin styles
	 */
	public function admin_styles() {
		if(is_admin()) {
			wp_enqueue_style( 'vamtam-admin-fonts', WPV_ADMIN_ASSETS_URI . 'css/fonts.css');
		}

		if(!$this->is_our_admin_page()) return;

		wp_enqueue_style( 'magnific', WPV_ADMIN_ASSETS_URI . 'css/magnific.css');
		wp_enqueue_style( 'wpv_admin', WPV_ADMIN_ASSETS_URI . 'css/wpv_admin.css');
		wp_enqueue_style( 'farbtastic' );
	}
}
