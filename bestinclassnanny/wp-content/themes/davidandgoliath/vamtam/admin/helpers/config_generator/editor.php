<?php
/**
 * textarea
 */

 $rows = isset($rows) ? $rows : 5;
?>

<div class="wpv-config-row editor <?php echo $class ?> <?php echo empty($desc) ? 'no-desc':''?>">
	<div class="rtitle">
		<h4>
			<label for="<?php echo $id?>"><?php echo $name?></label>
		</h4>

		<?php wpv_description($id, $desc) ?>
	</div>

	<div class="rcontent">
		<div id="wp-<?php echo $id?>-wrap" class="wp-editor-wrap tmce-active">
			<div id="wp-<?php echo $id ?>-editor-tools" class="wp-editor-tools">
				<?php do_action('media_buttons', $id); ?>
				<a id="<?php echo $id?>-html" class="hide-if-no-js wp-switch-editor switch-html"><?php _e('HTML', 'davidandgoliath') ?></a>
				<a id="<?php echo $id?>-tmce" class="hide-if-no-js wp-switch-editor switch-tmce"><?php _e('Visual', 'davidandgoliath') ?></a>
			</div>
			<div id="wp-<?php echo $id ?>-editor-container" class="wp-editor-container">
				<textarea id="<?php echo $id?>" rows="<?php echo $rows ?>" name="<?php echo $id?>" class="large-text code <?php wpv_static($value)?>"><?php echo wpv_get_option($id, $default);?></textarea>
			</div>
		</div>
	</div>
</div>
