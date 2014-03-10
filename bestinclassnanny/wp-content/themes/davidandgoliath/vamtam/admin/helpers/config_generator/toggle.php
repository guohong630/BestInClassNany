<?php
/**
 * on/off toggle
 */
 
$option = $value;
$checked = wpv_get_option($id, $default);

$ff = empty($field_filter) ? '' : "data-field-filter='$field_filter'";
?>

<div class="wpv-config-row toggle <?php echo $class ?> clearfix" <?php echo $ff ?>>
	<div class="rtitle">
		<h4><?php echo $name?></h4>
		
		<?php wpv_description($id, $desc) ?>
	</div>
	
	<div class="rcontent clearfix">
		<?php if(isset($image)): ?>
			<img src="<?php echo $image?>" alt="<?php echo $name ?>" class="alignleft" />
		<?php endif ?>
		<label class="toggle-radio">
			<input type="radio" name="<?php echo $id?>" value="true" <?php checked($checked, true) ?>/>
			<span><?php _e('On', 'davidandgoliath') ?></span>
		</label>
		<label class="toggle-radio">
			<input type="radio" name="<?php echo $id?>" value="false" <?php checked($checked, false) ?>/>
			<span><?php _e('Off', 'davidandgoliath') ?></span>
		</label>
		<?php if(isset($has_default) && $has_default): ?>
			<label class="toggle-radio">
				<input type="radio" name="<?php echo $id?>" value="default" <?php checked($checked, 'default') ?>/>
				<span><?php _e('Default', 'davidandgoliath') ?></span>
			</label>
		<?php endif ?>
	</div>
</div>
