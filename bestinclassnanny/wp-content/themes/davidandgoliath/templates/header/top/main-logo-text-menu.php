<div class="first-row limit-wrapper">
	<div class="first-row-wrapper">
		<div class="first-row-left">
			<?php get_template_part('templates/header/top/logo') ?>
		</div>
		<div class="first-row-right">
			<div class="first-row-right-inner">
				<div id="phone-num"><div><?php echo do_shortcode(wpv_get_option('phone-num-top'))?></div></div>
				<div class="search-wrapper">
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
                                 <?php dynamic_sidebar('Header Right'); ?>
			</div>
		</div>
	</div>
</div>

<div class="second-row">
	<div class="limit-wrapper">
		<div class="second-row-columns">
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
		</div>
	</div>
</div>