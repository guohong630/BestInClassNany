<?php

/*
 * Vamtam CRM Integration, used to check for updates and aiding support queries
 */

class Version_Checker {
	public $remote;
	public $interval;
	public $notice;

	public function __construct() {
		$this->remote = 'http://api.vamtam.com/version';
		$this->interval = 2*3600;

		$username = wpv_get_option('envato-username');
		$api_key = wpv_get_option('envato-api-key');

		if(!empty($username) && !empty($api_key)) {
			require_once("class-pixelentity-theme-update.php");
			PixelentityThemeUpdate::init($username, $api_key, 'Vamtam');
		}

		if(!isset($_GET['import']) && (!isset($_GET['step']) || (int)$_GET['step'] != 2) ) {
			add_action('admin_notices', array(&$this, 'has_new_version'));
		}
	}

	private function check_version() {
		$local_version = WpvFramework::getVersion();
		$key = THEME_SLUG.'_'.$local_version;

		$last_license_key = wpv_get_option('envato-license-key-old');
		$current_license_key = wpv_get_option('envato-license-key');

		if( $last_license_key != $current_license_key || false === ($response = get_transient($key)) ) {
			global $wp_version;

			$data = array(
				'body' => array(
					'theme_version' => $local_version,
					'php_version' => phpversion(),
					'server' => $_SERVER['SERVER_SOFTWARE'],
					'theme_name' => THEME_NAME,
					'license_key' => $current_license_key,
				),
				'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url().'; ',
			);

			if($last_license_key != $current_license_key)
				wpv_update_option('envato-license-key-old', $current_license_key);

			$response = wp_remote_post($this->remote, $data);

			set_transient( $key, $response, $this->interval ); // cache
		}

		return $response;
	}

	public function has_new_version() {
		$response = $this->check_version();

		if(is_array($response) && isset($response['body']) && isset($response['response']) && $response['response']['code'] == 200) {
			$response = explode('--splithere--', $response['body']);

			$response[0] = trim($response[0]);

			if(!empty($response[0]) && !defined('VAMTAM_HIDE_UPDATE_NOTIFICATION')) {
				echo '<div id="message" class="updated fade"><p>'. $response[0]. '</p></div>';
			}
		}
	}

}

new Version_Checker();
