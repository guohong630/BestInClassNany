<?php

/**
 * Blockquote shortcode handler
 *
 * @package wpv
 * @subpackage editor
 */

/**
 * class WPV_Blockquote
 */
class WPV_Blockquote {
	/**
	 * Register the shortcodes
	 */
	public function __construct() {
		add_shortcode('blockquote', array(__CLASS__, 'dispatch'));
	}

	/**
	 * Blockquote shortcode callback
	 * 
	 * @param  array  $atts    shortcode attributes
	 * @param  string $content shortcode content
	 * @param  string $code    shortcode name
	 * @return string          output html
	 */
	public static function dispatch($atts, $content, $code) {
		extract(shortcode_atts(array(
			'layout' => 'slider',
			'cat' => '',
			'ids' => '',
		), $atts));

		$query = array(
			'post_type' => 'testimonials',
			'orderby' => 'menu_order', 
			'order' => 'DESC',
			'posts_per_page' => -1,
		);
		
		if(!empty($cat)) {
			$query['tax_query'] = array(
				array(
					'taxonomy' => 'testimonials_category',
					'field' => 'slug', 
					'terms' => explode(',', $cat),
				)
			);
		}
		
		if($ids && $ids != 'null')
			$query['post__in'] = explode(',',$ids);

		$q = new WP_Query($query);

		$output = '';

		if($layout == 'slider') {
			$slides = array();

			while($q->have_posts()) {
				$q->the_post();

				$slides[] = array(
					'type' => 'html',
					'html' => self::format(),
				); 
			}

			$output = wpv_shortcode_slider(array(
				'style' => 'testimonials',
				'pausetime' => 5000,
				'effect' => 'fade',
				'direction' => 'right',
				'height' => 0,
				'width' => 0,
			), json_encode($slides), 'slider');
		} else {
			$output .= '<div class="jcarousel"><ul class="blockquote-list">';

			while($q->have_posts()) {
				$q->the_post();

				$output .= self::format();
			}

			$output .= '</ul></div><a class="jcarousel-prev" href="#">Prev</a>
    <a class="jcarousel-next" href="#">Next</a>';
		}
		
		return $output;
	}

	private static function format() {
		$content = get_the_content();
		$cite = get_post_meta( get_the_ID(), 'testimonial-author', true );
		$link = get_post_meta( get_the_ID(), 'testimonial-link', true );
		$title = get_the_title();

		if(!empty($link))
			// $cite = '<a href="'.$link.'" target="_blank">'.$cite.'</a>';

		$cite = "<p class='cite'>$cite</p>";

		$thumbnail = '';
                
                // intech custom modifications
                if (has_post_thumbnail( $post->ID ) ){
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
                }
                
                
		if(has_post_thumbnail())
			$thumbnail = get_the_post_thumbnail( get_the_ID(), 'thumbnail', array('class' => 'quote-thumbnail'));

		if(!empty($title)) {
			$title = "<strong class='quote-title'>$title:</strong>";
		}
		
                //we replaced the post thumbnail with original image
		return "<li class='small simple'><div class='image-wrap'><img src=' $image[0] '></div><div class='quote-text'>".$title."<div class='content'>".do_shortcode($content)."</div>".$cite."</div></li>";
	}
};

new WPV_Blockquote;
