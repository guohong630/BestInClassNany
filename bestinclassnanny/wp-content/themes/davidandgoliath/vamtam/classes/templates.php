<?php
/**
 * Various static template helpers
 *
 * @package  wpv
 */
/**
 * class WpvTemplates
 */
class WpvTemplates {
	/**
	 * Returns the current layout type and defines WPV_LAYOUT accordingly
	 *
	 * @return string current page layout
	 */
	public static function get_layout() {
		global $post;

		if(!defined('WPV_LAYOUT_TYPE')) {
			if(wpv_has_woocommerce()) {
				$id_override = is_single() ? $post->ID : (woocommerce_get_page_id( 'shop' ) ? woocommerce_get_page_id( 'shop' ) : null);
				if(is_shop() || is_product_category() || is_product_tag()) {
					define('WPV_LAYOUT_TYPE', wpv_post_meta_default('layout-type', 'default-body-layout', $id_override));
					return WPV_LAYOUT_TYPE;
				}
			}

			if(WpvFancyPortfolio::has('page') || is_404() || is_page_template('page-blank.php')) {
				define('WPV_LAYOUT_TYPE', 'full');
				define('WPV_LAYOUT', 'no-sidebars');
				return WPV_LAYOUT_TYPE;
			}

			$layout_type = '';
			if(is_singular(array('page', 'post', 'portfolio', 'product')) || (wpv_has_woocommerce() && is_woocommerce())) {
				$layout_type = wpv_post_meta_default('layout-type', 'default-body-layout');
			} else {
				$layout_type = wpv_get_option('default-body-layout');
			}

			if(empty($layout_type)) {
				$layout_type = 'full';
			}

			define('WPV_LAYOUT_TYPE', $layout_type);

			switch($layout_type) {
				case 'left-only':
					define('WPV_LAYOUT', 'left-sidebar');
				break;
				case 'right-only':
					define('WPV_LAYOUT', 'right-sidebar');
				break;
				case 'left-right':
					define('WPV_LAYOUT', 'two-sidebars');
				break;
				case 'full':
					define('WPV_LAYOUT', 'no-sidebars');
				break;
			}

			return $layout_type;
		}

		return WPV_LAYOUT_TYPE;
	}

	/**
	 * displays the left sidebar if there is one
	 */
	public static function left_sidebar() {
		$layout_type = WpvTemplates::get_layout();

		if($layout_type == 'left-only' || $layout_type == 'left-right'): ?>
			<aside class="<?php echo apply_filters('wpv_left_sidebar_class', 'left', $layout_type) ?>">
				<?php WpvSidebars::getInstance()->get_sidebar('left'); ?>
			</aside>
		<?php endif;
	}

	/**
	 * displays the right sidebar if there is one
	 */
	public static function right_sidebar() {
		$layout_type = WpvTemplates::get_layout();

		if($layout_type == 'right-only' || $layout_type == 'left-right'): ?>
			<aside class="<?php echo apply_filters('wpv_right_sidebar_class', 'right', $layout_type) ?>">
				<?php WpvSidebars::getInstance()->get_sidebar('right'); ?>
			</aside>
		<?php endif;
	}

	/**
	 * Echoes a pagination in the form of 1 2 [3] 4 5
	 */
	public static function pagination_list() {
		global $wp_query;

		$total_pages = (int)$wp_query->max_num_pages;

		if($total_pages > 1) {
			$big = PHP_INT_MAX;
			$current_page = max(1, get_query_var('paged'));

			echo '<div class="wp-pagenavi">';

			echo '<span class="pages">'.sprintf(__('Page %d of %d', 'davidandgoliath'), $current_page, $total_pages).'</span>';

			echo paginate_links(array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => $current_page,
				'total' => $total_pages,
				'prev_text' => __('Prev', 'davidandgoliath'),
				'next_text' => __('Next', 'davidandgoliath'),
			));

			echo '</div>';
		}
	}

	/**
	 * Displays the pagination code based on the theme options or $pagination_type
	 *
	 * @param  string|null $pagination_type		overrides the pagination settings
	 */
	public static function pagination($pagination_type = null) {
		if(is_null($pagination_type))
			$pagination_type = wpv_get_option('pagination-type');

		if($pagination_type == 'paged') {
			self::pagination_list();
		} elseif($pagination_type == 'basic') {
			paginate_links();
		} else {
			global $wp_query;

			$max = $wp_query->max_num_pages;
			$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

			$class = apply_filters('wpv_lmbtn_class', 'lm-btn button full clearboth');

			if((int)$max > (int)$paged) {
				$url = remove_query_arg(array('page', 'paged'));
				$url .= (strpos($url, '?') === false) ? '?' : '&';
				$url .= 'paged='.($paged+1);

				echo '<div class="load-more"><a href="'.$url.'" class="'.$class.'"><span>'.__('Load more', 'davidandgoliath').'</span></a></div>';
			}
		}
	}

	public static function has_breadcrumbs() {
		return (wpv_get_optionb('enable-breadcrumbs') && !is_front_page() && !is_page_template('page-blank.php'));
	}

	/**
	 * Displays the breadcrumbs if they are enabled
	 */
	public static function breadcrumbs() {
		if(!self::has_breadcrumbs()) return;
		?>
			<h6 id="header-breadcrumbs">
				<?php dimox_breadcrumbs('&middot;') ?>
			</h6>
		<?php
	}

	/**
	 * Checks whether the current page has a title
	 *
	 * @return boolean whether the current page has a title
	 */
	public static function has_page_header() {
		$post_id = wpv_get_the_ID();

		if(is_null($post_id) || WpvFancyPortfolio::has('page'))
			return true;

		if(is_single() && has_post_format('aside'))
			return false;

		return get_post_meta($post_id, 'show-page-header', true) !== 'false' && !is_page_template('page-blank.php');
	}

	/**
	 * Checks whether the current page has post siblings links
	 *
	 * @return boolean whether the current page has post siblings links
	 */
	public static function has_post_siblings_buttons() {
		return is_singular(array('post','portfolio')) && current_theme_supports('wpv-ajax-siblings')&& !is_page_template('page-blank.php');
	}

	/**
	 * Displays the page header
	 *
	 * @param  bool $placed whether the title has already been output
	 * @param  string|null $title if set, overrides the current post title
	 */
	public static function page_header($placed=false, $title=null) {
		if($placed) return;

		global $post;

		if(is_null($title))
			$title = get_the_title();

		$needHeaderTitle = WpvTemplates::has_page_header();
		$needButtons = WpvTemplates::has_post_siblings_buttons();
		$description = is_object($post) ? get_post_meta($post->ID, 'description', true) : '';

		if ($needHeaderTitle || $needButtons):
			?><header class="page-header <?php echo $needButtons ? 'has-buttons':'' ?>">
				<div class="page-header-content">
					<h1>
					<?php if($needHeaderTitle): ?>
						<span class="title"><?php echo $title;?></span>
						<?php if(!empty($description)): ?>
							<span class="desc"><?php echo $description ?></span>
						<?php endif ?>
					<?php endif ?>
					</h1>
					<span class="spacer"></span>
					<?php if($needButtons) get_template_part('templates/post-siblings-links', $post->post_type) ?>
				</div>
			</header><?php
		endif;
	}

	/**
	 * Displays the header sidebars
	 */
	public static function header_sidebars() {
		if(WpvFancyPortfolio::has('disabled'))
			self::header_footer_sidebars('header');
	}

	/**
	 * Displays the footer sidebars
	 */
	public static function footer_sidebars() {
		self::header_footer_sidebars('footer');
	}

	/**
	 * displays header/footer sidebars
	 *
	 * @param string $area one of "header" or "footer"
	 */
	private static function header_footer_sidebars($area) {
		$is_active = false;
		$sidebar_count = (int)wpv_get_option("$area-sidebars");
		for($i=1; $i<=$sidebar_count; $i++) {
			$is_active = $is_active || is_active_sidebar("$area-sidebars-$i");
		}

		if($is_active && !is_page_template('page-blank.php')):
	?>

		<div id="<?php echo $area?>-sidebars" data-rows="<?php echo $sidebar_count ?>">
			<div class="row" data-num="0">
				<?php for($i=1; $i<=$sidebar_count; $i++): ?>
					<?php
						$active = is_active_sidebar("$area-sidebars-$i");
						$empty = wpv_get_option("$area-sidebars-$i-empty");
					?>
					<?php if($active || $empty) : ?>
						<?php
							$width = wpv_get_option("$area-sidebars-$i-width");
							$is_last = wpv_get_option("$area-sidebars-$i-last") || $width == 'full';
							$fit = ($width != 'full') ? 'fit' : '';
						?>
						<aside class="<?php echo $width?> <?php if($is_last) echo ' last' ?><?php if($empty) echo ' empty' ?> <?php echo $fit ?>">
							<?php dynamic_sidebar("$area-sidebars-$i"); ?>
						</aside>
						<?php if($is_last && $i != $sidebar_count): ?>
							</div><div class="row" data-num="<?php echo $i ?>">
						<?php endif ?>
					<?php endif; ?>
				<?php endfor ?>
			</div>
		</div>

		<?php endif;
	}

	/**
	 * Comments template
	 *
	 * @param  object $comment comment data
	 * @param  array $args    comment arguments
	 * @param  int $depth   comment depth
	 */
	public static function comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		$GLOBALS['comment_depth'] = $depth;
		?>
		<li id="comment-<?php comment_ID() ?>" <?php comment_class( 'clearfix' . ($args['has_children'] ? 'has-children' : '') ) ?>>
			<div class="comment-author">
				<?php echo get_avatar( get_comment_author_email(), 73 ); ?>
			</div>
			<div class="comment-content">
				<div class="comment-meta">
					<h4 class="comment-author-link"><?php comment_author_link(); ?></h4>
					<h6 title="<?php comment_time(); ?>" class="comment-time"><?php comment_date(); ?></h6>
					<?php edit_comment_link(sprintf('[%s]', __('Edit', 'davidandgoliath'))) ?>
					<?php
						if($args['type'] == 'all' || get_comment_type() == 'comment') :
							comment_reply_link(array_merge($args, array(
							'reply_text' => __('Reply','shape'),
							'login_text' => __('Log in to reply.','shape'),
							'depth' => $depth,
							'before' => '<h6 class="comment-reply-link">',
							'after' => '</h6>'
							)));
						endif;
					?>
				</div>
				<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'shape') ?>
				<?php comment_text() ?>
			</div>
		<?php
	}

	/**
	 * Check if the current context has share buttons
	 *
	 * @param  string  $context current view (page, post, etc.)
	 * @return boolean          whether the current context has share buttons
	 */
	public static function hasShare($context) {
		return apply_filters('wpv_has_share',
					(wpv_get_option("share-$context-twitter") || wpv_get_option("share-$context-facebook") ||
					wpv_get_option("share-$context-googleplus") || wpv_get_option("share-$context-pinterest")),
					$context);
	}

	/**
	 * Displays share buttons depending on $context
	 *
	 * @param string $context current view (page, post, etc.)
	 */
	public static function share($context) {
		if($output = apply_filters('wpv_share', false, $context)) {
			echo $output;
			return;
		}

		include(locate_template('templates/share.php'));
	}

	/**
	 * Displays the icon for a post format $format
	 * @param  string $format post format slug
	 * @return string         icon html
	 */
	public static function post_format_icon($format) {
		?>
		<a class="single-post-format" href="<?php echo add_query_arg( 'format_filter',$format, home_url()) ?>" title="<?php echo get_post_format_string($format) ?>">
			<?php echo do_shortcode('[icon name="'.WpvPostFormats::get_post_format_icon($format).'"]') ?>
		</a>
		<?php
	}

	/**
	 * Outputs the page title styles
	 */
	public static function get_title_style() {
		$post_id = wpv_get_the_ID();

		if(!current_theme_supports('wpv-page-title-style') || is_null($post_id))
			return;

		$bgcolor = wpv_sanitize_accent(wpv_post_meta($post_id, 'local-title-background-color', true));
		$bgimage = wpv_post_meta($post_id, 'local-title-background-image', true);
		$bgrepeat = wpv_post_meta($post_id, 'local-title-background-repeat', true);
		$bgsize = wpv_post_meta($post_id, 'local-title-background-size', true);
		$bgattachment = wpv_post_meta($post_id, 'local-title-background-attachment', true);
		$bgposition = wpv_post_meta($post_id, 'local-title-background-position', true);

		$style = '';
		if(!empty($bgcolor))
			$style .= "background-color:$bgcolor;";
		if(!empty($bgimage)) {
			$style .= "background-image:url('$bgimage');";
			if(!empty($bgrepeat))
				$style .= "background-repeat:$bgrepeat;";
			if(!empty($bgsize))
				$style .= "background-size:$bgsize;";
		}

		return $style;
	}

	/**
	 * Same as title_style(), but echos the result
	 */
	public static function title_style() {
		echo self::get_title_style();
	}

	/**
	 * Outputs the site title
	 */
	public static function site_title() {
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged, $post;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'davidandgoliath' ), max( $paged, $page ) );
	}

	/**
	 * Checks whether the current page has a header slider
	 * @return boolean true if there is a header slider
	 */
	public static function has_header_slider() {
		$post_id = wpv_get_the_ID();

		return !is_null($post_id) &&
				apply_filters('wpv_has_header_slider', (
					!is_404() && wpv_post_meta($post_id, 'slider-category', true) !== '' && WpvFancyPortfolio::has('disabled') && !is_page_template('page-blank.php')
				));
	}

	/**
	 * Returns true if this is the WP login page
	 *
	 * @return bool whether the current page is wp-login
	 */
	public static function is_login() {
		return strpos($_SERVER['PHP_SELF'], 'wp-login.php') !== false;
	}

	/**
	 * Returns the list of LayerSlider sliders in 'layerslider-ID' => 'Name' array
	 * @return array list of LayerSlider WP sliders
	 */
	public static function get_layer_sliders($prefix = 'layerslider-') {
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		$ls_table = $wpdb->get_results("SHOW TABLES LIKE '$table_name'");

		if(empty($ls_table))
			return array();

		// Get sliders
		$sliders = $wpdb->get_results("SELECT id, name FROM $table_name
											WHERE flag_hidden = '0' AND flag_deleted = '0'
											ORDER BY date_c ASC LIMIT 100" );

		$result = array();
		if(is_array($sliders) && !empty($sliders)) {
			foreach($sliders as $item) {
				$result[$prefix . $item->id] = $item->name;
			}
		}

		return $result;
	}

	/**
	 * The formatted output of a list of pages.
	 *
	 * Displays page links for paginated posts (i.e. includes the "nextpage".
	 * Quicktag one or more times). This tag must be within The Loop.
	 *
	 * The defaults for overwriting are:
	 * 'next_or_number' - Default is 'number' (string). Indicates whether page
	 *      numbers should be used. Valid values are number and next.
	 * 'nextpagelink' - Default is 'Next Page' (string). Text for link to next page.
	 *      of the bookmark.
	 * 'previouspagelink' - Default is 'Previous Page' (string). Text for link to
	 *      previous page, if available.
	 * 'pagelink' - Default is '%' (String).Format string for page numbers. The % in
	 *      the parameter string will be replaced with the page number, so Page %
	 *      generates "Page 1", "Page 2", etc. Defaults to %, just the page number.
	 * 'before' - Default is '<p id="post-pagination"> Pages:' (string). The html
	 *      or text to prepend to each bookmarks.
	 * 'after' - Default is '</p>' (string). The html or text to append to each
	 *      bookmarks.
	 * 'text_before' - Default is '' (string). The text to prepend to each Pages link
	 *      inside the <a> tag. Also prepended to the current item, which is not linked.
	 * 'text_after' - Default is '' (string). The text to append to each Pages link
	 *      inside the <a> tag. Also appended to the current item, which is not linked.
	 *
	 * @param string|array $args Optional. Overwrite the defaults.
	 * @return string Formatted output in HTML.
	 */
	public static function custom_link_pages( $args = '' ) {
		$defaults = array(
			'before' => '<p id="post-pagination">' . __( 'Pages:', 'davidandgoliath' ),
			'after' => '</p>',
			'text_before' => '',
			'text_after' => '',
			'next_or_number' => 'number',
			'nextpagelink' => __( 'Next page', 'davidandgoliath' ),
			'previouspagelink' => __( 'Previous page', 'davidandgoliath' ),
			'pagelink' => '%',
			'echo' => 1
		);

		$r = wp_parse_args( $args, $defaults );
		$r = apply_filters( 'wp_link_pages_args', $r );
		extract( $r, EXTR_SKIP );

		global $page, $numpages, $multipage, $more, $pagenow;

		$output = '';
		if ( $multipage ) {
			if ( 'number' == $next_or_number ) {
				$output .= $before;
				for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
					$j = str_replace( '%', $i, $pagelink );
					$output .= ' ';
					if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
						$output .= _wp_link_page( $i );
					else
						$output .= '<span class="current">';

					$output .= $text_before . $j . $text_after;
					if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
						$output .= '</a>';
					else
						$output .= '</span>';
				}
				$output .= $after;
			} else {
				if ( $more ) {
					$output .= $before;
					$i = $page - 1;
					if ( $i && $more ) {
						$output .= _wp_link_page( $i );
						$output .= $text_before . $previouspagelink . $text_after . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$output .= _wp_link_page( $i );
						$output .= $text_before . $nextpagelink . $text_after . '</a>';
					}
					$output .= $after;
				}
			}
		}

		if ( $echo )
			echo $output;

		return $output;
	}
}
