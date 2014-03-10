<input type="hidden" id="wpv_js_plugin_path" name="wpv_js_plugin_path" value="<?php echo $this->url ?>" />
<input type="hidden" id="wpv_js_home_path" name="wpv_js_home_path" value="<?php site_url() ?>" />

<ul id="wpv-editor-toolbox">
	<li id="wpv-editor-help"  class="has-help menu-top">
		<a href="#" class="va-icon va-icon-info desc-handle"></a>
		<div>
			<section class="content"><?php _e(' Drag the buttons below into the editor or click on it to add an element. Please note that you can change the width of most shortcodes using the +/- buttons found on their left side. You do not need to use the column shortcode unless the layout is very complex or you need a section of the site with background. The Vamtam drag &amp; drop editor is tightly integrated with the standard Visual and Text editors and you can switch to Visual or Text at any time without losing any changes.', 'davidandgoliath')?></section>
			<footer><a href="<?php echo admin_url('admin.php?page=wpv_help') ?>" title="<?php _e('Read more in our documentation', 'davidandgoliath') ?>"><?php _e('Read more in our documentation', 'davidandgoliath') ?></a></footer>
		</div>
	</li>
	<li id="wpv-editor-title" class="menu-top">
		<strong>Vamtam Drag &amp; Drop Editor</strong>
	</li>
</ul>

<div id="wpv-editor-shortcodes" class="clearfix">
	<ul>
		<?php echo $this->complex_elements() ?>
	</ul>
</div>

<div class="metabox-editor-content">
	<div id="visual_editor_edit_form"></div>
	<div id="visual_editor_content" class="wpv_main_sortable inner-sortable main_wrapper clearfix"></div>
</div>

<?php $status = get_post_meta($post->ID, '_wpv_ed_js_status', true) ?>
<input type="hidden" id="wpv_ed_js_status" name="_wpv_ed_js_status" value="<?php echo empty($status) ? 'true' : $status ?>" />
