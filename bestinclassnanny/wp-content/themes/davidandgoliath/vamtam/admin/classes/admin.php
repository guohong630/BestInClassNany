<?php

/**
 * Framework admin enhancements
 *
 * @author Nikolay Yordanov <me@nyordanov.com>
 * @package wpv
 */

/**
 * class WpvAdmin
 */
class WpvAdmin {

	/**
	 * Initialize the theme admin
	 */
	public function __construct() {
		$this->option_pages = array(
			'general' => array(
				__('VamTam | General Settings', 'davidandgoliath'),
				__('General Settings', 'davidandgoliath'),
			),

			'layout' => array(
				__('VamTam | Layout', 'davidandgoliath'),
				__('Layout', 'davidandgoliath'),
			),

			'styles' => array(
				__('VamTam | Styles', 'davidandgoliath'),
				__('Styles', 'davidandgoliath'),
			),

			'import' => array(
				__('VamTam | Quick Import', 'davidandgoliath'),
				__('Quick Import', 'davidandgoliath'),
			),

			'help' => array(
				__('VamTam | help', 'davidandgoliath'),
				__('Help', 'davidandgoliath'),
			),
		);

		add_action('admin_menu', array(&$this, 'load_menus'));
		add_action('menu_order', array(&$this, 'reorder_menus'));

		add_action('add_meta_boxes', array(&$this, 'load_metaboxes'));
		add_action('save_post', array(&$this, 'load_metaboxes'));

		add_action('sidebar_admin_setup', array(&$this, 'sidebar_admin_setup'));
		add_action('wp_ajax_wpv-delete-widget-area', array('WpvSidebarInterface', 'delete_widget_area') );

		require_once WPV_ADMIN_METABOXES . 'shortcode.php';

		$this->load_functions();
		new WpvSkinManagement;
		new WpvIconsHelper;

		require_once WPV_ADMIN_HELPERS . 'updates/version-checker.php';

		if(!wpv_get_option(THEME_SLUG.'_vamtam_theme_activated', false)) {
			wpv_update_option(THEME_SLUG.'_vamtam_theme_activated', true);
			delete_option('default_comment_status');
		}
	}

	/**
	 * Widgets page
	 */
	public function sidebar_admin_setup() {
		new WpvSidebarInterface;
	}

	/**
	 * Theme admin menus
	 */
	public function load_menus() {
		global $menu;

		$main = 'wpv_general';

		if(current_user_can('edit_theme_options'))
			$menu[] = array( '', 'read', 'separator-vamtam-theme', '', 'wp-menu-separator vamtam-theme' );

		add_menu_page('VamTam', 'VamTam', 'edit_theme_options', $main, array(&$this, 'load_options_page'), 'none', '55.2');

		foreach($this->option_pages as $id => $tr) {
			add_submenu_page($main, $tr[0], $tr[1], 'edit_theme_options', "wpv_$id", array(&$this, 'load_options_page'));
		}
	}

	/**
	 * Reorder the menu items in admin.
	 *
	 * @param mixed $menu_order
	 * @return void
	 */
	public function reorder_menus($menu_order) {
		// Initialize our custom order array
		$new_menu_order = array();

		// Get the index of our custom separator
		$separator = array_search( 'separator-vamtam-theme', $menu_order );

		$portfolio = array_search( 'edit.php?post_type=portfolio', $menu_order );
		$testimonials = array_search( 'edit.php?post_type=testimonials', $menu_order );

		// Loop through menu order and do some rearranging
		foreach ( $menu_order as $index => $item ) {
			if('wpv_general' == $item) {
				$new_menu_order[] = 'separator-vamtam-theme';
				$new_menu_order[] = $item;
				$new_menu_order[] = 'edit.php?post_type=portfolio';
				$new_menu_order[] = 'edit.php?post_type=testimonials';
				unset( $menu_order[$separator] );
				unset( $menu_order[$portfolio] );
				unset( $menu_order[$testimonials] );
			} elseif(!in_array($item, array('separator-vamtam-theme'))) {
				$new_menu_order[] = $item;
			}
		}

		return $new_menu_order;
	}

	/**
	 * Theme options pages callback
	 */
	public function load_options_page() {
		$page_str = str_replace('wpv_', '', $_GET['page']);
		$page = WPV_ADMIN_OPTIONS . $page_str . '.php';

		if(file_exists($page)) {
			$options = include $page;
		} else {
			$name = $this->option_pages[$page_str][0];

			$options = array(
				'name' => $name,
				'auto' => true,
				'config' => array(
					array(
						'name' => $name,
						'type' => 'title',
						'desc' => '',
					)
				)
			);

			$tabs = include WPV_THEME_OPTIONS . $page_str . '/list.php';

			foreach($tabs as $tab) {
				$tab_contents = include WPV_THEME_OPTIONS.$page_str."/$tab.php";

				$options['config'] = array_merge($options['config'], $tab_contents);
			}
		}

		if($options['auto'])
			new WpvConfigGenerator($options['name'], $options['config']);
	}

	/**
	 * Theme metaboxes
	 *
	 * @param int|null $post_id  id of the current post (if any)
	 */
	public function load_metaboxes($post_id = null) {
		remove_meta_box( 'postimagediv','page','side' );

		$config = array(
			'id' => 'testimonials-post-options',
			'title' => __('VamTam Testimonials', 'davidandgoliath'),
			'pages' => array('testimonials'),
			'context' => 'normal',
			'priority' => 'high',
			'post_id' => $post_id,
		);


		$options = include WPV_THEME_METABOXES . 'testimonials.php';
		new WpvMetaboxesGenerator($config, $options);


		$config = array(
			'id' => 'vamtam-post-format-options',
			'title' => __('VamTam Post Formats', 'davidandgoliath'),
			'pages' => array('post'),
			'context' => 'normal',
			'priority' => 'high',
			'post_id' => $post_id,
		);


		$options = include WPV_THEME_METABOXES . 'post-formats.php';
		new WpvMetaboxesGenerator($config, $options);

		$config = array(
			'id' => 'vamtam-portfolio-format-options',
			'title' => __('VamTam Portfolio Formats', 'davidandgoliath'),
			'pages' => array('portfolio'),
			'context' => 'normal',
			'priority' => 'high',
			'post_id' => $post_id,
		);


		$options = include WPV_THEME_METABOXES . 'portfolio-formats.php';
		new WpvMetaboxesGenerator($config, $options);

		$config = array(
			'id' => 'vamtam-portfolio-formats-select',
			'title' => __('VamTam Portfolio Format', 'davidandgoliath'),
			'pages' => array('portfolio'),
			'context' => 'side',
			'priority' => 'high',
			'post_id' => $post_id,
		);


		$options = include WPV_THEME_METABOXES . 'portfolio-formats-select.php';
		new WpvMetaboxesGenerator($config, $options);

		$config = array(
			'id' => 'general-post-options',
			'title' => __('VamTam Options', 'davidandgoliath'),
			'pages' => array('page', 'post', 'portfolio', 'product'),
			'context' => 'normal',
			'priority' => 'high',
			'post_id' => $post_id,
		);


		$options = include WPV_THEME_METABOXES . 'general.php';
		new WpvMetaboxesGenerator($config, $options);
	}

	/**
	 * Admin helper functions
	 */
	private function load_functions() {
		require_once WPV_ADMIN_HELPERS . 'base.php';
		require_once WPV_ADMIN_AJAX_DIR . 'base.php';
		require_once WPV_ADMIN_TYPES . 'portfolio.php';
	}
}
