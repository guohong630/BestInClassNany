<?php

/**
 * displays a button
 */

function wpv_shortcode_button($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => false,
		'class' => false,
		'font' => '',
		'link' => '',
		'linktarget' => '',
		'bgcolor' => '',
		'align' => false,
		'icon' => '',
		'icon_placement' => 'left',
		'icon_color' => '',
	), $atts));
	
	$id = $id ? ' id="' . $id . '"' : '';
	$class = $class ? ' '.$class : '';
	$link = $link ? ' href="' . $link . '"' : '';
	$linktarget = $linktarget ? ' target="' . $linktarget . '"' : '';
	
	// inline styles for the button
	$font = $font ? "font-size: {$font}px;" : '';
	
	$style = ($font != '')? " style='$font'" : '';
	
	$aligncss = ($align && $align != 'center') ? ' align'.$align : '';

	$icon = empty($icon) ? '' : do_shortcode('[icon name="'.$icon.'" color="'.$icon_color.'"]');
	$icon_b = $icon_a = '';
	if($icon_placement == 'left') {
		$icon_b = $icon;
	} else {
		$icon_a = $icon;
	}
	
	$content = '<a'.
					$id.
					$link.
					$linktarget.
					$style.
					' class="button '.
					"$bgcolor $class $aligncss".
				'">'.$icon_b.'<span class="btext">' . trim(do_shortcode($content)) . '</span>'.$icon_a.'</a>';
	
	$content = $content;
	
	if($align === 'center')
		return '<p class="textcenter">'.$content.'</p>';
	else
		return $content;
}
add_shortcode('button', 'wpv_shortcode_button');