<?php
	global $post;

	$size = isset($value['size']) ? $value['size'] : '43';
	$button = isset($value['button']) ? $value['button'] : __('Insert', 'davidandgoliath');
	$remove = isset($value['remove']) ? $value['remove'] : __('Remove', 'davidandgoliath');
	$default = isset($GLOBALS['wpv_in_metabox']) ? 
					get_post_meta($post->ID, $id, true) :
					wpv_get_option($id, $default);

	$name = $id;
	$id = preg_replace('/[^\w]+/', '', $id);
?>

<div class="upload-basic-wrapper <?php echo !empty($default)?'active':'' ?>">
	<div class="image-upload-controls">
		<input type="text" id="<?php echo $id?>" name="<?php echo $name?>" size="<?php echo $size?>" value="<?php echo $default?>" class="image-upload <?php wpv_static($value)?> hidden" />

		<a class="button wpv-upload-button" href="#" data-target="<?php echo $id?>">
			<?php echo $button?>
		</a>

		<a class="button wpv-upload-clear <?php if(empty($default)) echo 'hidden'?>" href="#" data-target="<?php echo $id?>"><?php echo $remove?></a>
		<a class="wpv-upload-undo hidden" href="#" data-target="<?php echo $id?>"><?php echo __('Undo', 'davidandgoliath')?></a>
	</div>
	<div id="<?php echo $id?>_preview" class="image-upload-preview">
		<img src="<?php echo $default?>" />
	</div>
</div>