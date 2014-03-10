<?php
	/**
	 * config page title
	 */
?>

<div id="wpv-ajax-overlay"></div><div id="wpv-ajax-content"><?php _e('Loading', 'davidandgoliath')?></div>

<div id="wpv-config" class="clearfix ui-tabs">
	<div id="wpv-config-tabs-wrapper" class="clearfix">
		<div id="icon-index" class="icon32"><br></div>
		<h2 id="wpv-config-tabs" class="nav-tab-wrapper">
			<ul>
				<?php
					$tabs = array();

					foreach($this->options as $option) {
							if($option['type'] == 'start') {
								$href = isset($option['slug']) ? $option['slug'] : $option['name'];
								if(isset($option['sub'])) {
									$href = $option['sub']." $href";
								}
								$href = preg_replace('/[^\w]+/', '-', strtolower($href));
								$tabs[]= array(
									'href' => $href,
									'name' => $option['name'],
									'nosave' => isset($option['nosave']) && $option['nosave'],
								);
							}
					}

					foreach($tabs as $i=>$tab):
				?>
					<li class="<?php if($tab['nosave']) echo 'nosave'; ?>"><a href="#<?php echo $tab['href'] ?>-tab-<?php echo $i ?>" title="<?php echo $tab['name'] ?>" class="nav-tab"><?php echo $tab['name'] ?></a></li>
				<?php endforeach ?>
			</ul>
		</h2>
	</div>

	<?php global $wpv_config_messages; echo $wpv_config_messages; ?>

<?php
	global $wpv_loaded_config_groups;
	$wpv_loaded_config_groups = 0;
?>