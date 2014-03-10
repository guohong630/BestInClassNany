<?php
 /*
	Plugin Name: Feedburner Email Subscription
	Plugin URI: http://zourbuth.com/archives/498/feedburner-email-subscription-wordpress-plugin/
	Description: Give your biggest fans another way to keep up with your content feed by placing a <a href="http://www.feedburner.com/" alt="Feedburner" title="Feedburner">Feedburner</a> email subscription widget on your site. This widget will follow your theme stylesheet.
	Version: 1.2.9
	Author: zourbuth
	Author URI: http://zourbuth.com
	License: Under GPL2
 
	Copyright 2013 zourbuth (email : zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Exit if accessed directly
 * @since 1.2.8
 */
if ( ! defined( 'ABSPATH' ) )
	exit;


/**
 * Load the plugin
 * @since 1.2.8
 */
add_action( 'plugins_loaded', 'feedburner_email_subscription_plugins_loaded' );


/**
 * Initializes the plugin and it's features
 * @since 1.0
 */		
function feedburner_email_subscription_plugins_loaded() {

	// Set constant for feedburner plugin
	define( 'FEEDBURNER_EMAIL_SUBSCRIPTION_VERSION', '1.2.9' );
	define( 'FEEDBURNER_EMAIL_SUBSCRIPTION_DIR', plugin_dir_path( __FILE__ ) );
	define( 'FEEDBURNER_EMAIL_SUBSCRIPTION_URL', plugin_dir_url( __FILE__ ) );
	
	// Require additional plugin file
	require_once( FEEDBURNER_EMAIL_SUBSCRIPTION_DIR . 'feedburner.php' );
	require_once( FEEDBURNER_EMAIL_SUBSCRIPTION_DIR . 'shortcode.php' );	
	
	load_plugin_textdomain( 'feedburner-email-subscription', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

	// Loads and registers the new widgets
	add_action( 'widgets_init', 'feedburner_email_subscription_widget_init' );
}


/**
 * Register the extra widgets. Each widget is meant to replace or extend the current default
 * @since 1.0
 */
function feedburner_email_subscription_widget_init() {
	require_once( FEEDBURNER_EMAIL_SUBSCRIPTION_DIR . 'widget.php' );
	register_widget( 'Feedburner_Email_Subscription' );
}

?>