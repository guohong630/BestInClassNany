<?php
/**
 * Sidebar helpers
 *
 * @package wpv
 */
/**
 * class WpvSidebars
 *
 * register right/left, header and footer sidebars
 * also provides a function which outputs the correct right/left sidebar
 */
class WpvSidebars {

	/**
	 * List of widget areas
	 * @var array
	 */
	private $sidebars = array();

	/**
	 * List of sidebar placements
	 * @var array
	 */
	private $places = array();

	/**
	 * Singleton instance
	 * @var WpvSidebars
	 */
	private static $instance;

	/**
	 * Set the available widgets area
	 */
	public function __construct() {
 		$this->sidebars = array(
			'page' => __('Shared Page Widget Area', 'davidandgoliath'),
			'blog' => __('Blog Widget Area', 'davidandgoliath'),
			'portfolio' => __('Portfolio Widget Area', 'davidandgoliath'),
		);

 		if(wpv_has_woocommerce())
			$this->sidebars['wpv-woocommerce'] = __('WooCommerce Widget Area', 'davidandgoliath');

		$this->places = array('left', 'right');
	}

	/**
	 * Get singleton instance
	 * @return WpvSidebars singleton instance
	 */
	public static function getInstance() {
		if(!isset(self::$instance))
			self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Register sidebars
	 */
	public function register_sidebars() {
		foreach($this->sidebars as $id=>$name) {
			foreach($this->places as $place) {
				register_sidebar(array(
					'id' => $id.'-'.$place,
					'name' => $name . " ($place)",
					'description' => $name . " ($place)",
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget' => '</section>',
					'before_title' => apply_filters('wpv_before_widget_title', '<h4 class="widget-title">', 'body'),
					'after_title' => apply_filters('wpv_after_widget_title', '</h4>', 'body'),
				));
			}
		}

		for($i=1; $i<=(int)wpv_get_option('footer-sidebars'); $i++) {
			register_sidebar(array(
				'id' => "footer-sidebars-$i",
				'name' => "Footer widget area $i",
				'description' => "Footer widget area $i",
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => apply_filters('wpv_before_widget_title', '<h4 class="widget-title">', 'footer'),
				'after_title' => apply_filters('wpv_after_widget_title', '</h4>', 'footer'),
			));
		}

		for($i=1; $i<=(int)wpv_get_option('header-sidebars'); $i++) {
			register_sidebar(array(
				'id' => "header-sidebars-$i",
				'name' => "Body Top Widget Area $i",
				'description' => "Body top widget area $i",
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => apply_filters('wpv_before_widget_title', '<h4 class="widget-title">', 'header'),
				'after_title' => apply_filters('wpv_after_widget_title', '</h4>', 'header'),
			));
		}

		if(wpv_get_option('feedback-type') == 'sidebar') {
			register_sidebar(array(
				'id' => "feedback-sidebar",
				'name' => "Feedback Widget Area",
				'description' => "Slides out when the feedback button is clicked",
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => apply_filters('wpv_before_widget_title', '<h4 class="widget-title">', 'feedback'),
				'after_title' => apply_filters('wpv_after_widget_title', '</h4>', 'feedback'),
			));
		}

		register_sidebar(array(
			'id' => "top-nav-sidebar",
			'name' => __('Top Bar Widget Area', 'davidandgoliath'),
			'description' => __('Displayed next to the top menu. Not all widgets will fit in the available space.', 'davidandgoliath'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => apply_filters('wpv_before_widget_title', '<strong class="widget-title">', 'top-nav-sidebar'),
			'after_title' => apply_filters('wpv_after_widget_title', '</strong>', 'top-nav-sidebar'),
		));
                
                register_sidebar(array(
			'id' => "homepage-top",
			'name' => __('Homepage Top', 'davidandgoliath'),
			'description' => __('Displayed above content on homepage.', 'davidandgoliath'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => apply_filters('wpv_before_widget_title', '<strong class="widget-title">', 'homepage-top'),
			'after_title' => apply_filters('wpv_after_widget_title', '</strong>', 'homepage-top'),
		));
                
                register_sidebar(array(
			'id' => "homepage-bottom",
			'name' => __('Homepage Bottom Featured', 'davidandgoliath'),
			'description' => __('Displayed under post on homepage.', 'davidandgoliath'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => apply_filters('wpv_before_widget_title', '<strong class="widget-title">', 'homepage-bottom'),
			'after_title' => apply_filters('wpv_after_widget_title', '</strong>', 'homepage-bottom'),
		));
                
                register_sidebar(array(
			'id' => "header-right",
			'name' => __('Header Right', 'davidandgoliath'),
			'description' => __('Displayed on the right side of the header.', 'davidandgoliath'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => apply_filters('wpv_before_widget_title', '<strong class="widget-title">', 'header-right'),
			'after_title' => apply_filters('wpv_after_widget_title', '</strong>', 'header-right'),
		));
                
                register_sidebar(array(
			'id' => "homepage-right",
			'name' => __('Homepage Right', 'davidandgoliath'),
			'description' => __('Displayed on the right side of the header.', 'davidandgoliath'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => apply_filters('wpv_before_widget_title', '<strong class="widget-title">', 'homepage-right'),
			'after_title' => apply_filters('wpv_after_widget_title', '</strong>', 'homepage-right'),
		));

		$custom_sidebars = wpv_get_option('custom-sidebars');
		$custom_sidebars = explode(',', $custom_sidebars);

		foreach($custom_sidebars as $sidebar) {
			$name = str_replace('wpv_sidebar-', '', $sidebar);
			$sidebar = sanitize_title($sidebar);
			if(!empty($sidebar)) {
				foreach($this->places as $place) {
					register_sidebar(array(
						'id' => $sidebar.'-'.$place,
						'name' => "$name ($place)",
						'description' => "$name ($place)",
						'before_widget' => '<section id="%1$s" class="widget %2$s">',
						'after_widget' => '</section>',
						'before_title' => apply_filters('wpv_before_widget_title', '<h4 class="widget-title">', 'body'),
						'after_title' => apply_filters('wpv_after_widget_title', '</h4>', 'body'),
						'class' => 'vamtam-custom',
					));
				}
			}
		}
	}

	/**
	 * Output the correct sidebar
	 *
	 * @uses dynamic_sidebar()
	 *
	 * @param  string $place one of $this->placements
	 * @return bool          result of dynamic_sidebar()
	 */
	public function get_sidebar($place = 'left'){
		global $post;

		if(is_front_page() || is_home() || is_page()) {
			$sidebar = $this->sidebars['page'];
		}

		if(is_singular('post')) {
			$sidebar = $this->sidebars['blog'];
		} elseif(is_singular('portfolio')) {
			$sidebar = $this->sidebars['portfolio'];
		}

		if(is_search() || is_archive())
			$sidebar = $this->sidebars['blog'];

		if(wpv_has_woocommerce() && is_woocommerce())
			$sidebar = $this->sidebars['wpv-woocommerce'];

		if(isset($post)) {
			$custom_sidebar = wpv_post_meta($post->ID, $place.'_sidebar_type', true);

			if(is_active_sidebar($custom_sidebar . '-' . $place))
				$sidebar = $custom_sidebar;
		}

		if(isset($sidebar))
			return dynamic_sidebar($sidebar.'-'.$place);

		return dynamic_sidebar($this->sidebars['blog'].'-'.$place);
	}
};
