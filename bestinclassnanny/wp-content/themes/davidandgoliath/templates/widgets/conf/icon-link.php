<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'davidandgoliath'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('custom_count'); ?>"><?php _e('How many links to show?', 'davidandgoliath'); ?></label>
	<select id="<?php echo $this->get_field_id('custom_count'); ?>" class="num_shown" name="<?php echo $this->get_field_name('custom_count'); ?>">
		<option <?php selected(0, $custom_count) ?>>0</option>
		<?php for($i=1; $i<=$this->max_custom; $i++): ?>
			<option <?php selected($i, $custom_count) ?>><?php echo $i ?></option>
		<?php endfor ?>
	</select>
</p>

<div class="hidden_wrap">
	<?php for ($i=1; $i<=$this->max_custom; $i++):
		$custom_name = "custom_name_$i";
		$custom_url = "custom_url_$i";
		$custom_icon = "custom_icon_$i"; ?>
		<div class="hidden_el" <?php if ($i > $custom_count):?>style="display:none"<?php endif; ?>>
		
			<p>
				<label for="<?php echo $this->get_field_id($custom_name); ?>"><?php printf(__('Name:', 'davidandgoliath') , $i); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id($custom_name); ?>" name="<?php echo $this->get_field_name($custom_name); ?>" type="text" value="<?php echo $custom_names[$i]; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id($custom_url); ?>"><?php printf(__('URL:', 'davidandgoliath') , $i); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id($custom_url); ?>" name="<?php echo $this->get_field_name($custom_url); ?>" type="text" value="<?php echo $custom_urls[$i]; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id($custom_icon); ?>"><?php printf(__('Icon:', 'davidandgoliath') , $i); ?></label>
				<select id="<?php echo $this->get_field_id($custom_icon); ?>" name="<?php echo $this->get_field_name($custom_icon); ?>">
					<?php foreach($icons as $key=>$name): ?>
						<option value="<?php echo $key?>" <?php selected($key, $custom_icons[$i]) ?>><?php echo $name?></option>
					<?php endforeach; ?>
				</select>
			</p>
		</div>

	<?php endfor; ?>
</div>