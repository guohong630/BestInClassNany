<?php
/**
 * Search results template
 * 
 * @package wpv
 * @subpackage david-goliath
 */
global $title;
$title = sprintf( __( 'Search Results for: %s', 'davidandgoliath' ), '<span>' . get_search_query() . '</span>' ); 
get_header(); ?>

<div class="pane main-pane">
	<div class="row">
		<div class="page-outer-wrapper">
			<div class="clearfix page-wrapper">
				<?php if ( have_posts() ): the_post(); ?>
					<?php WpvTemplates::left_sidebar() ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(WpvTemplates::get_layout()); ?>>
						<?php 
						global $wpv_has_header_sidebars;
						if( $wpv_has_header_sidebars) {
							WpvTemplates::header_sidebars();
						} 
						?>
						<div class="page-content">
							<?php 
							rewind_posts();
							get_template_part('loop', 'category'); 
							?>
						</div>
					</article>
					<?php WpvTemplates::right_sidebar() ?>
				<?php else: ?>
				<article>
					<h1 style="text-align: center;margin-top: 35px;"><?php _e('Sorry, nothing found', 'davidandgoliath') ?></h1>
				</article>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>