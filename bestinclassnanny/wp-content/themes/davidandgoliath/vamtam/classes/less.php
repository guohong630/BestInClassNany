<?php

/**
 * LESSPHP wrapper
 *
 * @package wpv
 */

/**
 * class WpvLess
 */
class WpvLess {

	/**
	 * List of option names which are known to be percentages
	 *
	 * @var array
	 */
	private static $percentages = array(
		'left-sidebar-width',
		'right-sidebar-width',
	);

	/**
	 * Compiles the LESS files
	 */
	public static function compile() {

		global $wpdb, $mocked, $wpv_defaults;

		$vars_raw = $vars_raw_by_id = array();

		if(!$mocked) {
			$vars_raw = $wpdb->get_results("
				SELECT REPLACE(option_name, 'wpv_', '') as name, option_value as value
				FROM $wpdb->options
				WHERE option_name LIKE 'wpv_%'
				");

			$defaults = $wpv_defaults;
			foreach($vars_raw as $v) {
				$defaults[$v->name] = $v->value;
			}

			$vars_raw = array();

			foreach($defaults as $name=>$value) {
				$vars_raw[] = (object)compact('name', 'value');
				$vars_raw_by_id[$name] = $value;
			}
		} else {
			global $skin_data;

			foreach($skin_data as $name=>$value) {
				$name = $name;
				$vars_raw[] = (object)compact('name', 'value');
				$vars_raw_by_id[$name] = $value;
			}
		}

		$vars = array();

		foreach($vars_raw as $var) {

			if(trim($var->value) === '' && preg_match('/\bbackground-image\b/i', $var->name)) {
				$vars[$var->name] = '';
				continue;
			}

			if(preg_match('/^[-\w\d]+$/i', $var->name)) {
				if(!empty($var->value) && ($value = self::prepare($var->name, $var->value))) {
					$vars[$var->name] = $value;
				} else {
					$vars[$var->name] = null;
				}
			}
		}

		// header-background-color
		$vars['header-background-color'] = wpv_get_option('header-background-color');
		if ($vars['header-background-color'] != 'transparent' && isset($vars['header-background-opacity']))
			$vars['header-background-color'] = 'fade('.$vars['header-background-color'].','.($vars['header-background-opacity']*100).'%)';

		$vars['main-background-color'] = wpv_get_option('main-background-color');
		if ($vars['main-background-color'] != 'transparent' && isset($vars['main-background-opacity']))
			$vars['main-background-color'] = 'fade('.$vars['main-background-color'].','.($vars['main-background-opacity']*100).'%)';

		if(class_exists('lessc') === false)
			require_once(THEME_DIR . 'vendor/leafo/lessphp/lessc.inc.php');
		$l = new lessc();
		$l->importDir = '.';

		include WPV_HELPERS . 'lessphp-extensions.php';

		global $wpv_defaults;

		$out = '';

		foreach ($vars as $name => $value) {
			if(empty($value) && !isset($vars_raw_by_id[$name]))
				$vars[$name] = isset($wpv_defaults[$name]) ? self::prepare($name, $wpv_defaults[$name]) : null;

			if(!is_null($vars[$name]))
				$out .= empty($value) ? "@name;\n" : "@$name:$value;\n";
		}

		$vars['theme-images-dir'] = '"' . addslashes(WPV_THEME_IMAGES) . '"';

		// -----------------------------------------------------------------------------
		$out = '';
		foreach ($vars as $name => $value) {
			$out .= $value ? "@$name:$value;\n" : "@$name;\n";
		}
		$file_vars = WPV_CACHE_DIR . 'variables.less';
		file_put_contents($file_vars, $out);

		$file_from = WPV_THEME_CSS_DIR . 'all.less';
		$file_to   = WPV_CACHE_DIR . 'all'.(is_multisite() ? $GLOBALS['blog_id'] : '').'.css';

		if($mocked) {
			try {
				echo $l->compileFile($file_from);
			} catch(Exception $e) {
				self::warning($e->getMessage());
			}
		} else {
			try {
				$l->compileFile($file_from, $file_to);
			} catch(Exception $e) {
				self::warning($e->getMessage());
			}
		}
	}

	/**
	 * Sanitizes a variable
	 *
	 * @param  string  $name           option name
	 * @param  string  $value          option value from db
	 * @param  boolean $returnOriginal whether to return the db value if no good sanitization is found
	 * @return int|string|null         sanitized value
	 */
	private static function prepare($name, $value, $returnOriginal = false) {
		$good = true;
		$name = preg_replace('/^wpv_/', '', $name);
		$originalValue = $value;

		// duck typing values
		if(preg_match('/(^share|^has-|^show|-last$)/i', $name)) {
			$good = false;
		} elseif(is_numeric($value)) { // most likely dimensions, must differentiate between percentages and pixels
			if (in_array($name, self::$percentages)) {
				$value .= '%';
			}
			elseif( preg_match('/(size|width|height)$/', $name) ) { // treat as px
				$value .= 'px';
			}
		} elseif(preg_match('/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', $value)) { // colors
			// as is
		} elseif(preg_match('/^http|^url/i', $value) || preg_match('/(face|weight)$/', $name) ) { // urls and other strings
			$value = '"'.addslashes($value).'"';
		} elseif(preg_match('/^accent(?:-color-)?(\d)$/', $value)) { // accents
			$value = wpv_sanitize_accent($value);
		} else {
			if (!preg_match('/\bface\b|\burl\b/i', $name)) {
				// check keywords
				$keywords = explode(' ', 'top right bottom left fixed static scroll cover contain auto repeat repeat-x repeat-y no-repeat center normal italic bold 300 800 transparent');
				$sub_values = explode(' ', $value);
				foreach($sub_values as $s) {
					if(!in_array($s, $keywords)) {
						$good = false;
						break;
					}
				}
			}
		}

		return $good ? $value : ($returnOriginal ? $originalValue : null);
	}

	/**
	 * shows a warning
	 *
	 * @param  string $message warning message
	 */
	private static function warning($message) {
		$message = str_replace('*/', '* /', $message);
		echo "/* WARNING: $message */";
	}
}
