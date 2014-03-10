<?php

class WPV_Widget_Footer_Map extends WP_Widget {

	function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_footer_map',
			'description' => __('Trigger button for the footer map', 'davidandgoliath')
		);
		$this->WP_Widget('WPV-footer-map', __('Vamtam - Footer Map Trigger', 'davidandgoliath'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Contact Us', 'davidandgoliath') : $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		include(locate_template('templates/widgets/front/footer-map.php'));

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = !empty($instance['title']) ? esc_attr( $instance['title'] ) : __('Contact Us', 'davidandgoliath');
		
		include(locate_template('templates/widgets/conf/footer-map.php'));
	}

}
register_widget('WPV_Widget_Footer_Map');
