<?php

/**
 * Theme options / Styles / Skins
 * 
 * @package wpv
 * @subpackage david-goliath
 */

return array(
	array(
		'name' => __('Save/Import Skins', 'davidandgoliath'),
		'type' => 'start',
		'nosave' => true,
	),
	
	array(
		'name' => __('How do I use skins?', 'davidandgoliath'),
		'desc' => __("You can import one of the theme's skins or create your own.<br>
Please not that the folowing options will not be saved and they will be the same for every skin:<br>
<br>
Custom Logo Picture<br>
Header Text Area<br>
Favicon<br>
Google Maps API Key<br>
Google Analytics Key<br>
Text Area in Footer<br>
Share Icons<br>
Custom JavaScript<br>
Custom CSS<br>
Footer Map Tab - all options<br>
Custom Sidebars<br>
\"View All Posts\" Link<br>
\"View All Portfolios\" Link", 'davidandgoliath'),
		'type' => 'info',
	),

	array(
		'name' => sprintf(__('Last Active Skin: %s', 'davidandgoliath'), wpv_get_option('last-active-skin')),
		'type' => 'separator',
	),

	array(
		'name' => __('Save Current Skin', 'davidandgoliath'),
		'desc' => __('If you use the same name as a previously saved skin it will overwrite the latter.', 'davidandgoliath'),
		'type' => 'config-export',
		'prefix' => 'theme',
	),
	array(
		'name' => __('Import Saved Skin', 'davidandgoliath'),
		'desc' => __('If you have made changes on the active skin, please save it before activating another skin. Otherwise you will lose these changes.', 'davidandgoliath'),
		'type' => 'config-import',
		'prefix' => 'theme',
	),
	
		array(
			'type' => 'end',
		),
);
