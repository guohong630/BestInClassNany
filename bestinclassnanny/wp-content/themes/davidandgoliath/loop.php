<?php

/**
 * Catch-all post loop
 */

// display full post/image or thumbs
if(!isset($called_from_shortcode)) {
	$image = 'true';
	$show_content = true;
	$nopaging = false;
	$width = 'full';
	$news = false;
	$layout = 'normal';
	$column = 1;
}

global $wpv_loop_vars;
$old_wpv_loop_vars = $wpv_loop_vars;
$wpv_loop_vars = array(
	'image' => $image,
	'show_content' => $show_content,
	'width' => $width,
	'news' => $news,
	'column' => $column,
	'layout' => $layout,
);

?>
<div class="loop-wrapper clearfix <?php if($news) echo 'news row'?> <?php if($layout) echo $layout ?> <?php if(!$nopaging) echo 'paginated' ?>" data-columns="<?php echo $column ?>">
<?php
$i = 0;
global $wp_query;
if(have_posts()) while(have_posts()): the_post();
?>
	<div class="<?php if($news && $i%$column == 0) echo 'clearboth' ?> page-content post-head <?php echo $column > 1 ? "grid-1-$column" : 'clearfix'?> <?php echo get_post_type()?>">
		<div>
			<?php get_template_part('templates/post');	?>
		</div>
	</div>
<?php
	$i++;
endwhile;
?>
</div>

<?php $wpv_loop_vars = $old_wpv_loop_vars; ?>
<?php if(!$nopaging) WpvTemplates::pagination() ?>
