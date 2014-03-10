<?php

/**
 * The common code for the single and looped post template
 *
 * @package wpv
 */

	global $post;

	extract(WpvPostFormats::post_layout_info());
	$format = get_post_format();
	$format = empty($format)? 'standard' : $format;

	if(defined('WPV_ARCHIVE_TEMPLATE'))
		$show_content = false;

	$post_data = array_merge(array(
		'p' => $post,
		'format' => $format,
		'content' => is_single() ? get_the_content() :
		                           ($show_content && !$news ? get_the_content(__('Read more', 'davidandgoliath'), false) : get_the_excerpt()),
	), WpvPostFormats::post_layout_info());

	if(has_post_format('quote') && !is_single() && ($news || !$show_content)) {
		$post_data['content'] = '';
	}

	$post_data = WpvPostFormats::process($post_data);

	$has_media = isset($post_data['media']) ? 'has-image' : 'no-image';

// Output ----------------------------------------------------------------------
?>
<div class="post-article <?php echo $has_media?>-wrapper <?php echo (is_single()?'single':'list-item')?>">
	<div class="<?php echo $format?>-post-format clearfix <?php echo isset($post_data['act_as_image']) ? 'as-image' : 'as-normal' ?> <?php echo isset($post_data['act_as_standard']) ? 'as-standard-post-format' : '' ?>">
		<?php if(!$news) WpvTemplates::post_format_icon($format); ?>
	<?php
	// Single post -------------------------------------------------------------
	if (is_single()):

		// TITLE
		include(locate_template('templates/post/header.php'));
		include(locate_template('templates/post/subheader.php'));

		?><div class="post-content-outer"><?php
			if (isset($post_data['media'])):?>
				<div class="post-media">
					<div class='media-inner'>
						<?php echo $post_data['media']; ?>
					</div>
				</div>
			<?php endif;

			include(locate_template('templates/post/content.php'));

		?></div><?php

	// Post in loop ------------------------------------------------------------
	else:
		if($news && isset($post_data['media'])): ?>
			<div class="thumbnail">
				<?php echo $post_data['media']; ?>
				<?php WpvTemplates::post_format_icon($format) ?>

				<?php if(has_post_format( 'image' ) || isset($post_data['act_as_image'])): ?>
					<a href="<?php the_permalink() ?>" class="thumbnail-overlay">
						<span class="button accent1"><span class="btext"><?php _e('Read more', 'davidandgoliath') ?></span></span>
					</a>
				<?php endif ?>
			</div>
		<?php endif;

		// TITLE
		include(locate_template('templates/post/header.php'));
		include(locate_template('templates/post/subheader.php'));

		?><div class="post-content-outer"><?php
		if(!$news):
			if (isset($post_data['media'])):?>
				<div class="post-media">
					<div class='media-inner'>
						<?php echo $post_data['media']; ?>

						<?php if(has_post_format( 'image' ) || isset($post_data['act_as_image'])): ?>
							<a href="<?php the_permalink() ?>" class="thumbnail-overlay">
								<span class="button accent1"><span class="btext"><?php _e('Read more', 'davidandgoliath') ?></span></span>
							</a>
						<?php elseif(has_post_format('gallery')): ?>
							<a href="<?php the_permalink() ?>" class="button accent2"><span class="btext icon"><?php wpv_icon('plus') ?></span></a>
						<?php endif ?>
					</div>
				</div>
			<?php endif ?>
		<?php
			include(locate_template('templates/post/content.php'));
			include(locate_template('templates/post/meta.php'));
		elseif($show_content):
			echo $post_data['content'];
			include(locate_template('templates/post/meta-small.php'));
		endif; // no news
		?></div><?php
	endif ?>
	</div>
</div>
