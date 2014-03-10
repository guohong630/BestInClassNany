<?php
/**
 * Single portfolio item used in a loop
 *
 * @package wpv
 * @subpackage david-goliath
 */
list($terms_slug, $terms_name) = wpv_get_portfolio_terms();

$item_class = array();

$item_class[] = $title === 'overlay' ? 'has-title' : 'no-title';
$item_class[] = $desc ? 'has-description' : 'no-description';
$item_class[] = $scrollable ? '' : "grid-1-$column";
$item_class[] = empty($moreText) ? 'no-button' : 'has-button';
?>
<li data-id="<?php the_id()?>" data-type="<?php echo implode(' ', $terms_slug)?>" class="<?php echo implode(' ', $item_class); ?>"<?php echo $li_style;?>>
	<div class="portfolio-item-wrapper">
		<?php
			$gallery = $lightbox = $href = '';
			extract(wpv_get_portfolio_options($group, $rel_group));

			$video_url = ($type === 'video' and !empty($href)) ? $href : '';

			if(empty($href))
				$href = get_permalink();

			if($fancy_page || $type === 'html' || $title === 'overlay' || (!empty($video_url) && has_post_thumbnail())) {
				$lightbox = '';
				$href = ($type=='link' ? $href : get_permalink());
			}

			if($fancy_page) {
				$gallery = '';
			}

			$suffix = $sortable === 'masonry' ? 'masonry' : 'loop';
		?>
		<div class="portfolio_image">
			<div class="thumbnail" style="max-height:<?php echo $size[1]?>px">
				<?php
					if(!empty($gallery)):
						echo do_shortcode($gallery);
					elseif(!empty($video_url) && !has_post_thumbnail()):
						global $wp_embed;
						echo $wp_embed->run_shortcode('[embed]'.$video_url.'[/embed]');
					elseif(has_post_thumbnail()):
				?>
						<a class="<?php echo $lightbox?> thumbnail-url <?php echo $type?>" <?php if(isset($link_target)) echo 'target="'.$link_target.'"'; ?> href="<?php echo $href?>" <?php echo $rel.$width.$height.$iframe?>>
							<?php the_post_thumbnail( "portfolio-{$suffix}-".$column ); ?>
							<span class="thumbnail-overlay">
								<span class="meta">
									<?php if($title === 'overlay'): ?>
										<div class="title"><?php the_title()?></div>
									<?php endif ?>
									<?php if(!empty($moreText)): ?>
										<span class="button accent1"><span class="btext"><?php echo $moreText ?></span></span>
									<?php endif ?>
								</span>
								<?php if(count($terms_name) > 0):?>
									<span class="label"><?php echo implode(', ', $terms_name)?></span>
								<?php endif ?>
							</span>
						</a>
				<?php endif ?>
			</div><!-- / .thumbnail -->
		</div>

		<?php if($title === 'below' || $desc): ?>
			<div class="portfolio_details project-info-pad folio">
				<?php if($title === 'below'): ?>
					<h4 class="title"><a href="<?php the_permalink() ?>"><?php the_title()?></a></h4>
				<?php endif ?>
				<?php if($desc):?>
					<div class="excerpt"><?php the_excerpt() ?></div>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
</li>