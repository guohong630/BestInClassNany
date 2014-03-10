<?php

/**
 * Theme options / General / Footer Map
 *
 * @package wpv
 * @subpackage david-goliath
 */

return array(
array(
	'name' => __('Footer Map', 'davidandgoliath'),
	'type' => 'start'
),

array(
	'name' => __('How do I enable the footer map?', 'davidandgoliath'),
	'desc' => __('In order to enable the footer map you need:<br>
                1.Paste your Google Maps API Key in the General Settings tab . The map is located between the sub footer and footer. If you need more information on how to set up a map and generate Google Map API Key click here:
               <a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key" title="Google Maps API key" target="_blank">Google Maps API key</a>


. <br>2. Activate the Footer Map Trigger Widget in Footer by inserting it into a footer widget area.', 'davidandgoliath'),

    'type' => 'info',
),



array(
	'name' => __('Google Map Widget Image', 'davidandgoliath') ,
	'desc' => __('Since loading the actual map takes some time, a static image will be shown in its place until the "View Map" button is clicked.', 'davidandgoliath'),
	'id' => 'fmap-background',
	'type' => 'background',
	'only' => 'color,image,repeat,size',
) ,

array(
	'name' => __('"Open Map" Button Text', 'davidandgoliath') ,
	'desc' => __('This button will appear in the Footer Map Trigger Widget in Footer.', 'davidandgoliath'),
	'id' => 'fmap-text-open',
	'type' => 'text',
	'static' => true,
) ,
array
(
	'name' => __('"Close Map" Button Text', 'davidandgoliath') ,
	'desc' => __('This button will appear in the Footer Map Trigger Widget in Footer.', 'davidandgoliath'),
	'id' => 'fmap-text-close',
	'type' => 'text',
	'static' => true,
) ,

array(
	'name' => __('Address', 'davidandgoliath') ,
	'desc' => __('Unless you\'ve filled in the Latitude and Longitude options, please enter the address that you want to be shown on the map. If you encounter any errors about the maximum number of address translation requests per page, you should either use the latitude/longitude options or upgrade to the paid Google Maps API.', 'davidandgoliath'),
	'id' => 'fmap-address',
	'type' => 'text',
	'static' => true,
) ,
array(
	'name' => __('Latitude (optional)', 'davidandgoliath') ,
	'desc' => __('This option is not necessary if an address is set.', 'davidandgoliath'),
	'id' => 'fmap-latitude',
	'type' => 'text',
	'static' => true,
) ,
array(
	'name' => __('Longitude (optional)', 'davidandgoliath') ,
	'desc' => __('This option is not necessary if an address is set.', 'davidandgoliath'),
	'id' => 'fmap-longitude',
	'type' => 'text',
	'static' => true,
) ,
array(
	'name' => __('Zoom', 'davidandgoliath') ,
	'desc' => __('Default map zoom level.', 'davidandgoliath'),
	'id' => 'fmap-zoom',
	'min' => 1,
	'max' => 19,
	'type' => 'range',
	'static' => true,
) ,
array(
	'name' => __('Marker', 'davidandgoliath') ,
	'desc' => __('Enable an arrow pointing at the address.', 'davidandgoliath'),
	'id' => 'fmap-marker',
	'type' => 'toggle',
	'static' => true,
) ,
array(
	'name' => __('HTML', 'davidandgoliath') ,
	'desc' => __('HTML code to be shown in a popup above the marker.', 'davidandgoliath'),
	'id' => 'fmap-html',
	'type' => 'text',
	'static' => true,
) ,
array(
	'name' => __('Popup Marker', 'davidandgoliath') ,
	'desc' => __('Enable to open the popup above the marker by default.', 'davidandgoliath'),
	'id' => 'fmap-popup',
	'type' => 'toggle',
	'static' => true,
) ,
array(
	'name' => __('Controls (optional)', 'davidandgoliath') ,
	'desc' => sprintf(__('This option is intended to be used only by advanced users and is not necessary for most use cases. Please refer to the <a href="%s" title="Google Maps API documentation">API documentation</a> for details.', 'davidandgoliath'), 'https://developers.google.com/maps/documentation/javascript/controls'),
	'id' => 'fmap-controls',
	'type' => 'text',
	'static' => true,
) ,
array(
	'name' => __('Maptype', 'davidandgoliath') ,
	'id' => 'fmap-maptype',
	'options' => array(
		'ROADMAP' => __('Default road map', 'davidandgoliath') ,
		'SATELLITE' => __('Google Earth satellite', 'davidandgoliath') ,
		'HYBRID' => __('Mixture of normal and satellite', 'davidandgoliath') ,
		'TERRAIN' => __('Physical map', 'davidandgoliath') ,
	) ,
	'type' => 'select',
	'static' => true,
) ,

array(
	'name' => __('Scrollwheel', 'davidandgoliath') ,
	'id' => 'fmap-scrollwheel',
	'type' => 'toggle',
	'static' => true,
) ,
array(
	'name' => __('Color (optional)', 'davidandgoliath') ,
	'desc' => __('Defines the overall hue for the map. It is advisable that you avoid gray colors, as they are not well-supported by Google Maps.', 'davidandgoliath'),
	'id' => 'fmap-color',
	'prompt' => __('Default', 'davidandgoliath') ,
	'options' => array(
		'accent1' => 'accent1',
		'accent2' => 'accent2',
		'accent3' => 'accent3',
		'accent4' => 'accent4',
	) ,
	'type' => 'select',
) ,


array(
	'type' => 'end'
)
);