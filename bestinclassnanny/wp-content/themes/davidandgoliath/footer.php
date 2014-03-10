<?php
/**
 * Footer template
 *
 * @package wpv
 * @subpackage david-goliath
 */
?>

<?php if(!defined('WPV_NO_PAGE_CONTENT')): ?>
						</div> <!-- .limit-wrapper -->

					</div><!-- / #main (do not remove this comment) -->

				</div><!-- #main-content -->

				<?php if(!is_page_template('page-blank.php')): ?>
					<footer class="main-footer">
						<?php if(wpv_get_optionb('has-footer-sidebars')): ?>
							<div class="footer-sidebars-wrapper">
								<?php WpvTemplates::footer_sidebars(); ?>
							</div>
						<?php endif ?>

					</footer>

					<?php get_template_part('templates/footer-map') ?>
					<?php do_action('wpv_before_sub_footer') ?>

					<?php if(wpv_get_option('credits') != ''): ?>
						<div class="copyrights">
							<div class="limit-wrapper">
								<div class="row">
									<?php echo do_shortcode(wpv_get_option( 'credits' )); ?>
								</div>
							</div>
						</div>
					<?php endif ?>
				<?php endif ?>

			</div><!-- / .pane-wrapper -->

		</div><!-- / .page-dash-wrapper -->

<?php endif // WPV_NO_PAGE_CONTENT ?>
	</div><!-- / .boxed-layout -->
</div><!-- / #container -->

<?php get_template_part('templates/side-buttons') ?>
<?php wp_footer(); ?>
<!-- W3TC-include-js-head -->
</body>
</html>
