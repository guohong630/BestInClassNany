<?php
/**
 * 404 page template
 *
 * @package wpv
 * @subpackage david-goliath
 */

get_header(); ?>

<div class="clearfix">
	<h3 id="header-404">
		<?php _e('Page not found', 'davidandgoliath') ?>
	</h3>
	<h4 id="description-404">
		<span class="left-arrow">
			<span class="right-arrow"><?php _e('Use site navigation or just search...', 'davidandgoliath') ?></span>
		</span>
	</h4>
	<div class="page-404">
		<?php get_search_form(); ?>
	</div>
</div>

<?php get_footer(); ?>