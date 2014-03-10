<?php

/*
Plugin Name: Vamtam Push Menu
Description: Implements the "Navigation Drawer" UI pattern from Android 4.x
Version: 1.2.1
Author: Vamtam
Author URI: http://vamtam.com
*/

$GLOBALS['WpvPushMenuPath'] = plugins_url( '/', __FILE__ ) .'/';
$GLOBALS['WpvPushMenuVersion'] = '1.2.1';

class WpvPushMenu {
	private $menu_name = 'wpv-push-menu';
	private $backup_menu_name = 'menu-header';

	public function __construct() {
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'wp_footer', array( &$this, 'wp_footer' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ) );

		if ( !class_exists( 'Vamtam_Updates' ) )
			require 'vamtam-updates/class-vamtam-updates.php';

		$plugin_slug = basename(dirname(__FILE__));
		$plugin_file = basename(__FILE__);

		new Vamtam_Updates( array(
				'slug' => $plugin_slug,
				'main_file' => $plugin_slug . '/' . $plugin_file,
			) );
	}

	public function init() {
		register_nav_menus( array(
				$this->menu_name => __( 'Push Menu', 'wpv' ),
			) );
	}

	public function wp_footer() {
		$templates = array( 'menu-item', 'menu-root' );
		foreach ( $templates as $name ) {
			echo "<script id='wpvpm-$name' type='text/html'>";
			readfile('templates/'.$name.'.php', true);
			echo '</script>';
		}
	}

	public function enqueue_scripts() {
		$main_js = ( WP_DEBUG || ( defined( 'WPV_SCRIPT_DEBUG' ) && WPV_SCRIPT_DEBUG ) ) ? 'push-menu.js' : 'push-menu.min.js';
		wp_enqueue_script( 'vamtam-push-menu', $GLOBALS['WpvPushMenuPath'] . 'js/dist/' . $main_js, array( 'jquery', 'backbone', 'underscore' ), $GLOBALS['WpvPushMenuVersion'] , true );

		$this->load_menu();
	}

	private function load_menu() {
		if ( !has_nav_menu( $this->menu_name ) )
			$this->menu_name = $this->backup_menu_name;

		if ( has_nav_menu( $this->menu_name ) && $locations = get_nav_menu_locations() ) {
			$menu = wp_get_nav_menu_object( $locations[ $this->menu_name ] );

			if ( $menu && ! is_wp_error( $menu ) && !isset( $menu_items ) )
				$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );

			// Set up the $menu_item variables
			_wp_menu_item_classes_by_context( $menu_items );

			$sorted_menu_items = array();
			foreach ( (array) $menu_items as $key => $menu_item )
				$sorted_menu_items[$menu_item->menu_order] = $menu_item;

			unset( $menu_items );

			$menu_order = $menu_children = $menu_items_by_id = array();

			foreach ( $sorted_menu_items as $key => $menu_item ) {
				$menu_items_by_id[$menu_item->ID] = new wpv_push_menu_item( $menu_item );
				$menu_items_by_id[(int)$menu_item->menu_item_parent]->children[] = &$menu_items_by_id[$menu_item->ID];
				if ( !(int)$menu_item->menu_item_parent )
					$menu_order[] = &$menu_items_by_id[$menu_item->ID];;
			}

			unset( $sorted_menu_items );

			$root_item = new wpv_push_menu_item();
			$root_item->title = __( 'Menu', 'wpv' );
			$root_item->type = 'root';
			$root_item->children = $menu_order;

			wp_localize_script( 'vamtam-push-menu', 'WpvPushMenu', array(
					'items' => $this->fix_tree( $root_item ),
				) );

			unset( $menu_items_by_id, $menu_children, $menu_order );
		}
	}

	private function fix_tree( $tree ) {
		if ( count( $tree->children ) === 0 )
			return $tree;

		$new_tree = new wpv_push_menu_level( $tree );

		if ( $tree->type !== 'root' ) {
			if ( !empty( $tree->url ) )
				$new_tree->children[] = new wpv_push_menu_item( $tree );
		} else {
			$new_tree->type = 'root';
		}

		foreach ( $tree->children as $child ) {
			$new_tree->children[] = $this->fix_tree( $child );
		}

		unset( $tree );

		return $new_tree;
	}
}

class wpv_push_menu_item {
	public function __construct( $menu_item = null ) {
		$copy = array(
			'url',
			'title',
			'attr_title',
			'description',
			'classes',
		);

		foreach ( $copy as $prop )
			$this->$prop = isset( $menu_item->$prop ) ? $menu_item->$prop : '';

		$this->type = 'item';
		$this->children = array();
	}
}

class wpv_push_menu_level {
	public function __construct( $menu_item ) {
		$copy = array(
			'title',
			'description',
		);

		foreach ( $copy as $prop )
			$this->$prop = $menu_item->$prop;

		$this->type = 'item';
		$this->children = array();
	}
}

new WpvPushMenu;
