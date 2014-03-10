<?php

/**
 * the following code will filter <pre><code> blocks
 */

global $wpv_code_token;
$wpv_code_token = md5(uniqid(rand()));
$wpv_code_matches = array();
function wpv_code_before_filter($content) {
	return preg_replace_callback("/(.?)\[(pre|code)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\\2\])?(.?)/s", 
			"wpv_code_before_filter_callback", $content);
}
add_filter('the_content', 'wpv_code_before_filter', 0);

function wpv_code_before_filter_callback(&$match) {
	global $wpv_code_token, $wpv_code_matches;
	$i = count($wpv_code_matches);
	
	$wpv_code_matches[$i] = $match;
	
	return "\n\n<p>" . $wpv_code_token . sprintf("%03d", $i) . "</p>\n\n";
}

function wpv_code_after_filter($content) {
	global $wpv_code_token;
	
	return preg_replace_callback("/<p>\s*" . $wpv_code_token . "(\d{3})\s*<\/p>/si",
			"wpv_code_after_filter_callback", $content);
}
add_filter('the_content', 'wpv_code_after_filter', 99);

function wpv_code_after_filter_callback($match) {
	global $wpv_code_matches;
	$i = intval($match[1]);
	$content = $wpv_code_matches[$i];
	$content[5] = trim($content[5]);
	
	if (version_compare(PHP_VERSION, '5.2.3') >= 0)
		$output = htmlspecialchars($content[5], ENT_NOQUOTES, get_bloginfo('charset'), false);
	else {
		$specialChars = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;');
		$output = strtr(htmlspecialchars_decode($content[5]), $specialChars);
	}
	
	return '<' . $content[2] . ' class="'. $content[2] .'">' . $output . '</' . $content[2] . '>';
}
