<div class="first-row limit-wrapper">
	<?php get_template_part('templates/header/top/logo') ?>
</div>

<div class="second-row">
	<div class="limit-wrapper">
		<div class="second-row-columns">
			<?php if(wpv_get_option('phone-num-top') != '' || wpv_get_option('enable-header-search')): ?>
				<div class="header-left">
					<?php if(wpv_get_option('phone-num-top') != ''): ?>
						<div id="phone-num"><div><?php echo do_shortcode(wpv_get_option('phone-num-top'))?></div></div>
					<?php endif ?>
				</div>
			<?php endif ?>

			<div class="header-center">
				<div id="menus">
					<nav id="main-menu">
						<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
						<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'davidandgoliath' ); ?>" class="visuallyhidden"><?php _e( 'Skip to content', 'davidandgoliath' ); ?></a>
						<?php
							if(has_nav_menu('menu-header'))
								wp_nav_menu(array('theme_location' => 'menu-header'));
						?>
					</nav>
				</div>
			</div>

			<?php if(wpv_get_option('phone-num-top') != '' || wpv_get_option('enable-header-search')): ?>
				<div class="header-right">
					<?php if(wpv_get_option('enable-header-search')): ?>
						<div class="search-extend expanded">
							<form action="<?php echo home_url() ?>/" class="searchform" method="get" role="search" novalidate="">
								<input type="text" required="required" placeholder="<?php _e('Search', 'davidandgoliath') ?>" name="s" value="" id="search-text-widget" />
								<button type="submit" id="top-search-submit"></button>
								<?php if(defined('ICL_LANGUAGE_CODE')): ?>
									<input type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>"/>
								<?php endif ?>
							</form>
						</div>
					<?php endif ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>