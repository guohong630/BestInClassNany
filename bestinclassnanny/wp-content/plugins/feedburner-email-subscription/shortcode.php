<?php
/**
 * Feedburner Email Subscription Shortcode
 * 
 * @package Zourbuth
 * @subpackage Function 
 * Give your biggest fans another way to keep up with your content feed by placing an email subscription widget on your site.
 * This widget support shortcode for the short description.
 * For another improvement, you can drop email to zourbuth@gmail.com or visit http://zourbuth.com/feedburner-email-subscription
**/
function feedburner_shortcode( $atts ) {
	$args = shortcode_atts(array(
		'feed'		=> '',
		'submit'	=> __( 'Subscribe', 'feedburner-email-subscription' ),
	), $atts );

	$html  = '';
	$html .= proc_feedburner_email_subscription( $atts ); 
	$html .= '<div class="clear"></div>';
	return $html;
}

add_shortcode('feedburner', 'feedburner_shortcode');
?>