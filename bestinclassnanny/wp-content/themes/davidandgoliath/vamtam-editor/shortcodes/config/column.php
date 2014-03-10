<?php

/**
 * Column shortcode options
 *
 * @package wpv
 * @subpackage editor
 */

return array(
	'name' => __('Column - Color Box', 'davidandgoliath') ,
	'desc' => __('Once inserted into the editor you can change its width using +/- icons on the left.<br/>
	You can insert any element into by draging and dropping it onto the box. <br/> 
	You can drag and drop column into column for complex layouts.<br/>
	You can move any element outside of the column by drag and drop.<br/>
	You can set color/image background on any column.
	' , 'davidandgoliath'),
	'icon' => array(
		'char' => WPV_Editor::get_icon('table1'),
		'size' => '26px',
		'lheight' => '39px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'column',
	'controls' => 'size name clone edit delete handle',
	'options' => array(


		array(
			'name' => __('Background Parallax', 'davidandgoliath'),
			'desc' => __('The parallax effect will affect only the image background of the column not the elements you place into it.<br/>
You can insert column into column with transparent background images and thus create multi layers parallax effects. <br/>
Parallax - Simple, align in the middle  - the column background is positioned - center/center   when it is in the middle of the screen.<br/>
Parallax - Fixed attachment - the column background is positioned top center when the column is at the top of the screen.<br/>
The option bellow controls speed and direction of the animation.<br/>
The parallax effect will be disabled on mobile devices as they do not yet properly support this animations and may cause different issues.
', 'davidandgoliath'),
			'id' => 'parallax_bg',
			'type' => 'select',
			'default' => 'disabled',
			'options' => array(
				'disabled' => __('Disabled', 'davidandgoliath'),
				'to-centre' => __('Simple, align at the middle', 'davidandgoliath'),
				'fixed' => __('Fixed attachment', 'davidandgoliath'),
			),
			'field_filter' => 'fbprlx',
		),

		array(
			'name' => __('Background Parallax Inertia', 'davidandgoliath'),
			'desc' => __('
The option controls speed and direction of the animation. Minus means against the scroll direction. Plus means with the direction of the scroll.
The bigger the number the higher the speed. 
', 'davidandgoliath'),
			'id' => 'parallax_bg_inertia',
			'type' => 'range',
			'min' => -5,
			'max' => 5,
			'step' => 0.05,
			'default' => -.2,
			'class' => 'fbprlx fbprlx-fixed fbprlx-to-centre',
		),

		array(
			'name' => __('Full Screen Mode', 'davidandgoliath'),
			'desc' => __('Extend the background of the column to the end of the screen. This is basicly a full screen mode.', 'davidandgoliath'),
			'id' => 'extended',
			'type' => 'toggle',
			'default' => false,
			'class' => 'hide-inner hide-1-2 hide-1-3 hide-1-4 hide-1-5 hide 1-6 hide-2-3 hide-2-5 hide-3-5 hide-4-5 hide-5-6',
			'field_filter' => 'fbe',
		),

		array(
			'name' => __('Use Left/Right Padding', 'davidandgoliath') ,
			'id' => 'extended_padding',
			'default' => true,
			'type' => 'toggle',
			'class' => 'hide-inner fbe fbe-true' . (wpv_get_option('site-layout-type') == 'full' ? ' hidden': ''),
		) ,

		array(
			'name' => __('Background Color / Image', 'davidandgoliath'),
			'desc' => __('Please note that the background image left/right positions, as well as the cover option will not work as expected if the option Full Screen Mode is ON.', 'davidandgoliath'),
			'id' => 'background',
			'type' => 'background',
			'only' => 'color,image,repeat,position,size,attachment',
			'sep' => '_',
		),

		array(
			'name' => __('Vertical Padding', 'davidandgoliath'),
			'id' => 'vertical_padding',
			'type' => 'range-row',
			'ranges' => array(
				'vertical_padding_top' => array(
					'desc' => __('Top', 'davidandgoliath'),
					'default' => 0,
					'unit' => 'px',
					'min' => 0,
					'max' => 250,
				),
				'vertical_padding_bottom' => array(
					'desc' => __('Bottom', 'davidandgoliath'),
					'default' => 0,
					'unit' => 'px',
					'min' => 0,
					'max' => 250,
				),
			),
		),		


		array(
			'name' => __('"Read More" Button Link (optional)', 'davidandgoliath') ,
			'desc' => __('If enabled, the column will have a button on the right.<br/><br/>', 'davidandgoliath'),
			'id' => 'more_link',
			'default' => '',
			'type' => 'text',
			'class' => 'fbe fbe-false',
		) ,

		array(
			'name' => __('"Read More" Button Text (optional)', 'davidandgoliath') ,
			'desc' => __('If enabled, the column will have a button on the right.<br/><br/>', 'davidandgoliath'),
			'id' => 'more_text',
			'default' => '',
			'type' => 'text',
			'class' => 'fbe fbe-false',
		) ,
		array(
			'name' => __('Class (Optional)', 'davidandgoliath') ,
			'desc' => __('Use in case you have to modify the appearance of this column.<br/><br/>', 'davidandgoliath'),
			'id' => 'class',
			'default' => '',
			'type' => 'text'
		) ,
		
		array(
			'name' => __('Title (optional)', 'davidandgoliath') ,
			'desc' => __('The column title is placed at the top of the column.
				<br/><br/>', 'davidandgoliath'),
			'id' => 'title',
			'default' => '',
			'type' => 'text',
			'class' => 'fbprlx fbprlx-disabled',
		) ,
		array(
			'name' => __('Title Type (optional)', 'davidandgoliath') ,
			'id' => 'title_type',
			'default' => 'single',
			'type' => 'select',
			'options' => array(
				'single' => __('Title with divider next to it', 'davidandgoliath'),
				'double' => __('Title with divider below', 'davidandgoliath'),
				'no-divider' => __('No Divider', 'davidandgoliath'),
			),
			'class' => 'fbprlx fbprlx-disabled',
		) ,
		array(
			'name' => __('Element Animation (optional)', 'davidandgoliath') ,
			'id' => 'animation',
			'default' => 'none',
			'type' => 'select',
			'options' => array(
				'none' => __('No animation', 'davidandgoliath'),
				'from-left' => __('Appear from left', 'davidandgoliath'),
				'from-right' => __('Appear from right', 'davidandgoliath'),
				'fade-in' => __('Fade in', 'davidandgoliath'),
			),
			'class' => 'fbprlx fbprlx-disabled',
		) ,

		
	) ,
);
