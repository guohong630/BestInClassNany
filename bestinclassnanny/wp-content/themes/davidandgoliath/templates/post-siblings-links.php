<?php

/**
 * Prev/next/view all buttons for posts and portfolio items
 *
 * @package wpv
 * @subpackage david-goliath
 */

global $post;

$same_cat = count(wp_get_object_terms($post->ID, 'category', array('fields' => 'ids'))) > 0;
if($post->post_type == 'portfolio')
	$same_cat = false;

$view_all = wpv_get_option($post->post_type.'-all-items');

?>
<span class="post-siblings">
	<?php previous_post_link('%link', '<span class="icon theme">'.wpv_get_icon('theme-angle-left').'</span>', $same_cat) ?>

	<?php if(!empty($view_all)): ?>
		<a href="<?php echo $view_all ?>" class="all-items"><?php echo do_shortcode('[icon name="grid2"]') ?></a>
	<?php endif ?>

	<?php next_post_link('%link', '<span class="icon theme">'.wpv_get_icon('theme-angle-right').'</span>', $same_cat) ?>
</span>