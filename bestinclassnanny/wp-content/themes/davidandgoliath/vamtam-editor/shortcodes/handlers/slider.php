<?php

function wpv_shortcode_slider($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => 400,
		'height' => 0,
		'effect' => 'fade',
		'animspeed' => 400,
		'pausetime' => 5000,
		'pauseonhover' => 'true',
		'style' => '',
		'direction' => 'right',
		'maintain_aspect_ratio' => 'true',
	), $atts));

	wp_enqueue_script('front-jquery.vamtam.slider');

	$id = md5(uniqid('', true));

	$slides = json_decode(trim($content));

	ob_start();

	// increase the max width/height so that it works fine for the largest one column layout
	if($width > 0 && $height > 0) {
		$height = 800/$width * $height;
		$width = 800;
	}

	if((int)$height === 0)
		$height = '"auto"';
?>
	<div class="slider-shortcode-wrapper for-<?php echo $id?> style-<?php echo $style?>"<?php if ($width > 0) { echo ' style="max-width: ' . $width . 'px;"'; }?>>
		<div class="slider-shortcode-wrapper-inner">
			<div id="slider-<?php echo $id?>" class="slider-shortcode"></div>
		</div>
		<?php if($style == '2'):	?>
			<div class="controls">
				<div class="inner">
					<span class="prev icon theme"><b><?php wpv_icon('theme-angle-left') ?></b></span>
					<span class="next icon theme"><b><?php wpv_icon('theme-angle-right') ?></b></span>
				</div>
			</div>
		<?php endif ?>
		<script>
			jQuery(function($) {
				$('#slider-<?php echo $id?>').vamtamSlider({
					slides: <?php echo json_encode($slides) ?>,
					height: <?php echo $height?>,
					<?php if(is_numeric($height) && $height >= 1): ?>
						initialHeight: <?php echo $height?>,
						minHeight: <?php echo min($height, 100)?>,
					<?php else: ?>
						initialHeight: 20,
						minHeight: 100,
					<?php endif ?>
					maxWidth: <?php echo apply_filters('wpv_shortcode_slider_width', $width, $style)?>,
					maintainAspectRatio : <?php echo $maintain_aspect_ratio ?>,
					pauseTime: <?php echo $pausetime?>,
					animationTime: <?php echo $animspeed?>,
					effect: '<?php echo $effect?>',
					autostart: '<?php echo $direction?>',
					pauseOnHover: <?php echo $pauseonhover?>
					<?php if($style == '2'):	?>
					,prevButton: '.for-<?php echo $id?> .controls .prev'
					,nextButton: '.for-<?php echo $id?> .controls .next'
					<?php endif ?>
				});
			});
		</script>
	</div>

<?php
	return ob_get_clean();
}
add_shortcode('slider', 'wpv_shortcode_slider');
