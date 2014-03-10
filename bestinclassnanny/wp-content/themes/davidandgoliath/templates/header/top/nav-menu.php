<div class="grid-1-2 menu-wrapper">
	<?php if(has_nav_menu('menu-top')): ?>
			<?php wp_nav_menu(array('fallback_cb' => '', 'theme_location' => 'menu-top' )); ?>
	<?php endif ?>
</div>