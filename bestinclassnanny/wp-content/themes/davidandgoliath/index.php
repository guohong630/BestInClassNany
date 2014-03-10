<?php
/**
 * Catch-all template
 * 
 * @package wpv
 * @subpackage david-goliath
 */

 

$format = get_query_var('format_filter');
$title = $format? sprintf(__('Post format: %s', 'davidandgoliath'), $format) :
				  __('Blog', 'davidandgoliath');
get_header();
?>

<div class="pane main-pane">
	<div class="row">
		<div class="page-outer-wrapper">
			<div class="page-wrapper clearfix">
				<?php WpvTemplates::left_sidebar() ?>

				<article <?php post_class(WpvTemplates::get_layout()) ?>>
					<?php 
					global $wpv_has_header_sidebars;
					if( $wpv_has_header_sidebars) {
						WpvTemplates::header_sidebars();
					}
					?>
					<div class="page-content">
						<?php get_template_part( 'loop', 'index' ); ?>
					</div>
				</article>

				<?php WpvTemplates::right_sidebar() ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
