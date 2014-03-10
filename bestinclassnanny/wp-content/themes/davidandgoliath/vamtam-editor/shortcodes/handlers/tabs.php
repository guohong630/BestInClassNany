<?php

class WPV_Tabs {
	public function __construct() {
		add_shortcode('tabs', array(&$this, 'tabs'));
	}

	public function tabs($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'layout' => 'horizontal',
			'left_color' => 'accent8',
			'right_color' => 'accent1',
		), $atts));

		if (!wpv_sub_shortcode('tab', $content, $params, $sub_contents))
			return 'error parsing slider shortcode';

		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('front-jquery.ui.tabs.rotate');
			
		global $tabs_shown;
		if(!isset($tabs_shown))
			$tabs_shown = 0;

		$tabs_shown++;
		
		$id = 'tabs-'.$tabs_shown;

		$output = '<ul class="ui-tabs-nav">';

		if(isset($GLOBALS['wpv_last_column_title']) && !empty($GLOBALS['wpv_last_column_title']) && $layout == 'vertical')
			$output .= '<li class="inactive-block-title"><h2>'.$GLOBALS['wpv_last_column_title'].'</h2></li>';

		foreach($params as $i=>$p) {
			$class = isset($p['class']) ? " class='tab-{$p['class']}'" : '';
			$output .= '<li'.$class.'><a href="#'.$id.$i.'">' . $p['title'] . '</a></li>';
		}
		$output .= '</ul>';
		
		foreach($sub_contents as $i=>$c) {
			$class = isset($params[$i]['class']) ? ' tab-'.$params[$i]['class'] : '';
			$class .= ' ui-tabs-hide';
			$output .= '<div class="pane'.$class.'" id="'.$id.$i.'">' . do_shortcode(trim($c)) . '</div>';
		}

		$style = '';
		if($layout == 'vertical') {
			require_once(THEME_DIR . 'vendor/leafo/lessphp/lessc.inc.php');
			$l = new lessc();
			$l->importDir = '.';
			$l->setFormatter("compressed");

			$left_color = wpv_sanitize_accent($left_color);
			$right_color = wpv_sanitize_accent($right_color);

			$inner_style = '';

			if(!empty($left_color) && !empty($right_color)) {
				$inner_style = $l->compile("
					#{$id}.vertical {
						&,
						&:before {
							background: $right_color;
						}

						.ui-tabs-nav {
							&,
							&:before,
							li {
								background: $left_color;
							}

							.ui-state-active,
							.ui-state-selected,
							.ui-state-hover {
								background: $right_color;
							}
						}

						.pane {
							&:before {
								background: $left_color;
							}
						}
					}
				");
			}

			$style = '<style scoped>'.$inner_style.'</style>';
		}

		return '<div class="wpv-tabs '.$layout.'" id="'.$id.'">' . $output . $style . '</div>';
	}
}

new WPV_Tabs;
