<?php
	global $is_shortcode_preview;
	$is_shortcode_preview = true;

	$GLOBALS['current_wpv_shortcode'] = stripslashes($_POST['data']);

	require_once( '../../../../../../wp-load.php' );

	add_action('wp_enqueue_scripts', 'shortcode_preview_styles');
	function shortcode_preview_styles() {
		$styles = "
		html, body {
			background: transparent;
			overflow: auto;
		}
		body {
		";

		if(strpos($GLOBALS['current_wpv_shortcode'], '[tooltip') !== false):
			$styles .= "padding: 100px 10px 10px 150px;";
		else:
			$styles .= "padding: 10px;";
		endif;

		$styles .= "{";
		wp_add_inline_style('front-all', $styles);
	}

	define('WPV_NO_PAGE_CONTENT', true);
?><!doctype html>
<html>
<head>
	<?php wp_head() ?>
</head>
<body class="shortcode-preview">
	<div id="preview-content">
		<div>
			<?php echo apply_filters('the_content', do_shortcode($GLOBALS['current_wpv_shortcode'])) ?>
	<?php get_footer() ?>
</body>
</html>
