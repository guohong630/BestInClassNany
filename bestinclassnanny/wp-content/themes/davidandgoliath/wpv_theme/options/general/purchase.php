<?php

/**
 * Theme options / General / Purchase
 * 
 * @package wpv
 * @subpackage david-goliath
 */

return array(
array(
	'name' => __('Purchase', 'davidandgoliath'),
	'type' => 'start'
),

array(
	'name' => __('Why do you need this information?', 'davidandgoliath'),
	'desc' => __('Filling these fields allows us to implement automatic updates for your Vamtam theme. Your theme will still be working if you leave these options empty, although you will have to install updates manually.<br>
		Please note that any modifications made to the theme files will be overwritten after an automatic update. Your theme options and content will be preserved.', 'davidandgoliath'),
	'type' => 'info',
),

array(
	'name' => __('Your Envato Username', 'davidandgoliath') ,
	'id' => 'envato-username',
	'type' => 'text',
	'static' => true,
) ,

array(
	'name' => __('Your Envato API Key', 'davidandgoliath') ,
	'desc' => sprintf(__('Do not share your API key with people you can\'t trust! Your API key gives them access to your purchased items. <a href="%s">See this page for a description of the Envato API and how to obtain an API key.</a>', 'davidandgoliath'), 'http://extras.envato.com/api/'),
	'id' => 'envato-api-key',
	'type' => 'text',
	'static' => true,
) ,

array(
	'name' => __('Your Item Purchase Code', 'davidandgoliath') ,
	'desc' => sprintf(__('We use your Item Purchase Code for our support site. With our older themes, we insisted that you contact us only from your ThemeForest email address, so that we can verify that you\'ve truly purchased our theme. Starting from Makalu we can offer support for any email, as long as your website has a verified purchase code entered in this field.
		<br><br>
		To obtain your purchase code, go to your ThemeForest downloads, then click "License Certificate". The Item Purchase Code is in the downloaded text file. <a href="%s" target="_blank">Here is an example.</a>', 'davidandgoliath'), 'http://vamtam.com/tf-images/purchase-code.png'),
	'id' => 'envato-license-key',
	'type' => 'text',
	'static' => true,
) ,

array(
	'type' => 'end'
)
);