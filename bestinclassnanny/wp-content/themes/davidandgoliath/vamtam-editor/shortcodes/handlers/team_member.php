<?php

class WPV_Team_Member {
	public function __construct() {
		add_shortcode('team_member', array(&$this, 'team_member'));
	}

	public function team_member($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'name' => 'Nikolay Yordanov',
			'position' => 'Web Developer',
			'phone' => '+448786562223',
			'email' => 'support@vamtam.com',
			'picture' => 'http://makalu.vamtam.com/wp-content/uploads/2013/03/people4.png',
			'url' => '/',
			'googleplus' => '/',
			'facebook' => '/',
			'twitter' => '/',
			'linkedin' => '/',
			'youtube' => '/',
		), $atts));
		
		ob_start();

		include(locate_template('templates/shortcodes/team_member.php'));

		return ob_get_clean();
	}
}

new WPV_Team_Member;
