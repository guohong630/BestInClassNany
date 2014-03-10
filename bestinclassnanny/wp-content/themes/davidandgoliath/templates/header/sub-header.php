<?php
/**
 * Site sub-header. Includes a slider, page title, etc.
 *
 * @package  wpv
 */

global $title;
if(!is_404()) {
	if(wpv_has_woocommerce() && is_woocommerce() && !is_single()) {
		if(is_product_category()) {
			$title = single_cat_title( '', false );
		} elseif(is_product_tag()) {
			$title = single_tag_title( '', false );
		} else {
			$title = woocommerce_get_page_id( 'shop' ) ? get_the_title(woocommerce_get_page_id( 'shop' )) : '';
		}
	}
}

if( (!WpvTemplates::has_breadcrumbs() && !WpvTemplates::has_page_header() && !WpvTemplates::has_post_siblings_buttons()) || is_404()) return;
if(is_page_template('page-blank.php')) return;

?>
<div id="sub-header" class="layout-<?php echo WpvTemplates::get_layout() ?>">
	<div class="meta-header">
		<div class="limit-wrapper">
			<div class="meta-header-inside">
				<?php
					WpvTemplates::breadcrumbs();
					WpvTemplates::page_header(false, $title);
				?>
			</div>
		</div>
	</div>
</div>