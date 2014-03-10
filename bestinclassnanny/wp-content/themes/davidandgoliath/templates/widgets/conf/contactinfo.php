<p>
	<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Icons Color:', 'davidandgoliath'); ?></label>
	<select name="<?php echo $this->get_field_name('color'); ?>" id="<?php echo $this->get_field_id('color'); ?>" class="widefat">
		<option value="accent1"<?php selected($color, 'accent1'); ?>>Accent 1</option>
		<option value="accent2"<?php selected($color, 'accent2'); ?>>Accent 2</option>
		<option value="accent3"<?php selected($color, 'accent3'); ?>>Accent 3</option>
		<option value="accent4"<?php selected($color, 'accent4'); ?>>Accent 4</option>
	</select>
</p>
<?php foreach($this->fields as $name=>$field): ?>
	<p>
		<label for="<?php echo $this->get_field_id($name); ?>"><?php echo $field['description']; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id($name); ?>" name="<?php echo $this->get_field_name($name); ?>" type="text" value="<?php echo $field['value']; ?>" />
	</p>
<?php endforeach ?>