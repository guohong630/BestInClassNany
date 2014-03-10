<?php
/**
 * Feedburner Email Subscription
 * 
 * @package Zourbuth
 * @subpackage Function 
 * Give your biggest fans another way to keep up with your content feed by placing an email subscription widget on your site.
 * This widget support shortcode for the short description.
 * For another improvement, you can drop email to zourbuth@gmail.com or visit http://zourbuth.com/feedburner-email-subscription
**/

	
/**
 * Outputs the widget based on the arguments input through the widget controls.
 * @since 1.2.8
 */
function feedburner_email_subscription_template( $args ) {
	
	$template_file = FEEDBURNER_EMAIL_SUBSCRIPTION_DIR . 'templates/' . trailingslashit( $args['template'] ) . 'template.php';
	
	if ( file_exists( $template_file ) ) {
		extract( $args );		
		ob_start();  
		require( $template_file );  
		$output = ob_get_contents();
		ob_end_clean();		
		return $output;
	} else {
		trigger_error( 'Error: Could not load template ' . $template . '!' );
		exit();
	}
}


function proc_feedburner_email_subscription( $args ) { 
	// Set up the default form values
	$defaults = array(
		'feed'			=> 'zourbuth',
		'text'			=> __( 'Your email here', 'feedburner-email-subscription' ),
		'submit'		=> __( 'Subscribe', 'feedburner-email-subscription' ),
		'template'		=> 'default',
		'remove_css'	=> false,
		'bootstrap_3'	=> false,		
	);

	// Merge the user-selected arguments with the defaults
	$args = wp_parse_args( (array) $args, $defaults );
		
	$html = feedburner_email_subscription_template	( $args );
	return $html;
}

?>