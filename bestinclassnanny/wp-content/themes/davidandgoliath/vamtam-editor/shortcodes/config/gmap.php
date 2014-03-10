<?php
return array(
	'name' => __('Google Maps', 'davidandgoliath') ,
	'desc' => __('In order to enable Google Map you need:<br>
                 Insert the Google Map element into the editor, open its option panel by clicking on the icon- edit on the right of the element and fill in all fields nesessary.
' , 'davidandgoliath'),
		'icon' => array(
		'char' => WPV_Editor::get_icon('location1'),
		'size' => '30px',
		'lheight' => '45px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'gmap',
	'controls' => 'size name clone edit delete',
	'options' => array(


		array(
			'name' => __('Address (optional)', 'davidandgoliath') ,
			'desc' => __('Unless you\'ve filled in the Latitude and Longitude options, please enter the address that you want to be shown on the map. If you encounter any errors about the maximum number of address translation requests per page, you should either use the latitude/longitude options or upgrade to the paid Google Maps API.', 'davidandgoliath'),
			'id' => 'address',
			'size' => 30,
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Latitude', 'davidandgoliath') ,
			'desc' => __('This option is not necessary if an address is set.<br/><br/>', 'davidandgoliath'),
			'id' => 'latitude',
			'size' => 30,
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Longitude', 'davidandgoliath') ,
			'desc' => __('This option is not necessary if an address is set.<br/><br/>', 'davidandgoliath'),
			'id' => 'longitude',
			'size' => 30,
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Zoom', 'davidandgoliath') ,
			'desc' => __('Default map zoom level.<br/><br/>', 'davidandgoliath'),
			'id' => 'zoom',
			'default' => '14',
			'min' => 1,
			'max' => 19,
			'step' => '1',
			'type' => 'range'
		) ,
		array(
			'name' => __('Marker', 'davidandgoliath') ,
			'desc' => __('Enable an arrow pointing at the address.<br/><br/>', 'davidandgoliath'),
			'id' => 'marker',
			'default' => true,
			'type' => 'toggle'
		) ,
		array(
			'name' => __('HTML', 'davidandgoliath') ,
			'desc' => __('HTML code to be shown in a popup above the marker.<br/><br/>', 'davidandgoliath'),
			'id' => 'html',
			'size' => 30,
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Popup Marker', 'davidandgoliath') ,
			'desc' => __('Enable to open the popup above the marker by default.<br/><br/>', 'davidandgoliath'),
			'id' => 'popup',
			'default' => false,
			'type' => 'toggle'
		) ,
		array(
			'name' => __('Controls (optional)', 'davidandgoliath') ,
			'desc' => sprintf(__('This option is intended to be used only by advanced users and is not necessary for most use cases. Please refer to the <a href="%s" title="Google Maps API documentation">API documentation</a> for details.', 'davidandgoliath'), 'https://developers.google.com/maps/documentation/javascript/controls'),
			'id' => 'controls',
			'size' => 30,
			'default' => '',
			'type' => 'text',
		) ,
		array(
			'name' => __('Scrollwheel', 'davidandgoliath') ,
			'id' => 'scrollwheel',
			'default' => false,
			'type' => 'toggle'
		) ,
		array(
			'name' => __('Maptype (optional)', 'davidandgoliath') ,
			'id' => 'maptype',
			'default' => 'ROADMAP',
			'options' => array(
				'ROADMAP' => __('Default road map', 'davidandgoliath') ,
				'SATELLITE' => __('Google Earth satellite', 'davidandgoliath') ,
				'HYBRID' => __('Mixture of normal and satellite', 'davidandgoliath') ,
				'TERRAIN' => __('Physical map', 'davidandgoliath') ,
			) ,
			'type' => 'select',
		) ,
		array(
			'name' => __('Scrollwheel', 'davidandgoliath') ,
			'id' => 'scrollwheel',
			'default' => false,
			'type' => 'toggle'
		) ,
		array(
			'name' => __('Color (optional)', 'davidandgoliath') ,
			'desc' => __('Defines the overall hue for the map. It is advisable that you avoid gray colors, as they are not well-supported by Google Maps.', 'davidandgoliath'),
			'id' => 'hue',
			'default' => '',
			'prompt' => __('Default', 'davidandgoliath') ,
			'options' => array(
				'accent1' => __('Accent 1', 'davidandgoliath'),
				'accent2' => __('Accent 2', 'davidandgoliath'),
				'accent3' => __('Accent 3', 'davidandgoliath'),
				'accent4' => __('Accent 4', 'davidandgoliath'),
				'accent5' => __('Accent 5', 'davidandgoliath'),
				'accent6' => __('Accent 6', 'davidandgoliath'),
				'accent7' => __('Accent 7', 'davidandgoliath'),
				'accent8' => __('Accent 8', 'davidandgoliath'),
			) ,
			'type' => 'select',
		) ,
		array(
			'name' => __('Width (optional)', 'davidandgoliath') ,
			'desc' => __('Set to 0 is the full width.<br/><br/>', 'davidandgoliath') ,
			'id' => 'width',
			'default' => 0,
			'min' => 0,
			'max' => 960,
			'step' => '1',
			'type' => 'range'
		) ,
		array(
			'name' => __('Height', 'davidandgoliath') ,
			'id' => 'height',
			'default' => '400',
			'min' => 0,
			'max' => 960,
			'step' => '1',
			'type' => 'range'
		) ,


		array(
			'name' => __('Title (optioanl)', 'davidandgoliath') ,
			'desc' => __('The title is placed just above the element.<br/><br/>', 'davidandgoliath'),
			'id' => 'column_title',
			'default' => '',
			'type' => 'text'
		) ,
		array(
			'name' => __('Title Type (optional)', 'davidandgoliath') ,
			'id' => 'column_title_type',
			'default' => 'single',
			'type' => 'select',
			'options' => array(
				'single' => __('Title with divider next to it', 'davidandgoliath'),
				'double' => __('Title with divider below', 'davidandgoliath'),
				'no-divider' => __('No Divider', 'davidandgoliath'),
			),
		) ,
	) ,
);