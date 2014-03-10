<?php
/**
 * Background portfolio controls
 *
 * @package wpv
 * @subpackage david-goliath
 */

$data = WpvFancyPortfolio::get();
?>
<script>wpvBgSlides = <?php echo json_encode($data)?>;</script>
<div class="fast-slider-gall-prev icon theme"><b><?php wpv_icon('theme-angle-left')?></b></div>
<div class="fast-slider-gall-next icon theme"><b><?php wpv_icon('theme-angle-right')?></b></div>
<div class="fast-slider-navbar">
	<div class="limit-wrapper">
		<div class="title">
			<h1 class="fast-slider-caption"></h1>
			<nav class="fast-slider-arrows">
				<div class="fast-slider-next icon theme"><b><?php wpv_icon('theme-angle-right')?></b></div>
				<?php
					$view_all = wpv_get_option('portfolio-all-items');
					if(!empty($view_all)):
				?>
					<a href="<?php echo $view_all?>" class="fast-slider-view-all icon"><b><?php wpv_icon('grid2')?></b></a>
				<?php endif ?>
				<div class="fast-slider-prev icon theme"><b><?php wpv_icon('theme-angle-left')?></b></div>
			</nav>
		</div>
		<div class="fast-slider-description">
			<div class="contents"></div>
			<a href="#" class="toggle-description" data-alternate="<?php esc_attr_e('Hide', 'davidandgoliath')?>"><?php _e('Show', 'davidandgoliath'); ?></a>
		</div>
	</div>
</div>