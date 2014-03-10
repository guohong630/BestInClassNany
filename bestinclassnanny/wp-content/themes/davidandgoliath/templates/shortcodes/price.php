<div class="price-outer-wrapper">
	<div class="price-wrapper <?php echo $featured=='true'? 'featured':'' ?>">
		<h4 class="price-title"><?php echo $title ?></h4>
		<div class="price" style="text-align:<?php echo $text_align?>">
			<div class="value-box">
				<div class="value-box-content">
					<span class="value">
						<i><?php echo $currency?></i><span class="number"><?php echo $price?></span>
					</span>
					<span class="meta"><?php echo $duration?></span>
				</div>
			</div>

			<div class="content-box">
				<?php echo do_shortcode($content)?>
			</div>
			<div class="meta-box">
				<?php if(!!$summary):?><p class="description"><?php echo htmlspecialchars_decode($summary)?></p><?php endif?>
				<?php echo do_shortcode('[button bgcolor="accent1" icon="cart" link="'.$button_link.'"]'.$button_text.'[/button]') ?>
			</div>
		</div>
	</div>
</div>