<div class="<?php if(!wpv_get_option('full-width-header')) echo 'limit-wrapper' ?>">
	<div class="header-contents">
		<div class="first-row">
			<?php get_template_part('templates/header/top/logo') ?>
		</div>

		<div class="second-row">
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