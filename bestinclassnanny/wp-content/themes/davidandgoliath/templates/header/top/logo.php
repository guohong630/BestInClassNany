<a href="#" id="mp-menu-trigger" class="icon-b" data-icon="<?php wpv_icon('menu1') ?>"><?php _e('Open/Close Menu', 'davidandgoliath') ?></a>
<div class="logo-wrapper">
	<?php
		$logo = wpv_get_option('custom-header-logo');
		$logo2x = wpv_get_option('custom-header-logo2x');

		$upload_dir = wp_upload_dir();
		$logo_editor = wp_get_image_editor(wpv_get_attachment_file($logo));
		$logo_size = is_wp_error($logo_editor) ? array('height'=>0, 'width'=>0) : $logo_editor->get_size();

		if(!empty($logo2x)) {
			$upload_dir = wp_upload_dir();
			$logo_editor = wp_get_image_editor(wpv_get_attachment_file($logo2x));
			$logo2x_size = is_wp_error($logo_editor) ? array('height'=>0, 'width'=>0) : $logo_editor->get_size();
		}

		$padding = $max_height = 0;
		$logo_style = '';
		if(!empty($logo_size['height']) && wpv_get_option('header-layout') == 'logo-menu') {
			$padding = (wpv_get_option('header-height') - $logo_size['height'])/2;
			$max_height = $logo_size['height'];

			$logo_style = "padding: {$padding}px 0; max-height: {$max_height}px;";
		}
	?>
	<a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" class="logo <?php if(empty($logo)) echo 'text-logo' ?>"><?php
		if($logo):
		?>
			<img src="<?php echo $logo;?>" alt="<?php bloginfo('name')?>" class="<?php if($logo2x) echo 'hide-hidpi' ?>" height="<?php if(!empty($logo_size['height'])) echo $logo_size['height'] ?>" style="<?php echo esc_attr($logo_style) ?>"/>
			<?php if($logo2x && $logo2x_size['height']): ?>
				<img src="<?php echo $logo2x;?>" alt="<?php bloginfo('name')?>" class="show-hidpi-inline" height="<?php echo floor($logo2x_size['height']/2) ?>" style="<?php echo esc_attr($logo_style) ?>"/>
			<?php endif ?>
		<?php
		else:
			bloginfo( 'name' );
		endif;
		?>
	</a>
	<?php
		$description = get_bloginfo('description');
		if(!empty($description)):
	?>
			<span class="logo-tagline"><?php echo $description ?></span>
	<?php endif ?>
</div>