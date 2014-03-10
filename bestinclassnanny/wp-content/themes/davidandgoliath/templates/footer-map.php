<?php
/**
 * Footer map template
 *
 * @package wpv
 * @subpackage david-goliath
 */

if (wpv_get_option('enable-fmap')): $FMAP_ID = uniqid(); ?>
	<div class="footer-map"></div>
	<script type="text/javascript">
	(function($) {
		
		function floatVal( x, defaultValue ) {
			var out = parseFloat(x);
			if ( isNaN(out) || !isFinite(out) )
				out = defaultValue === undefined ? 0 : floatVal( defaultValue );
			return out;
		}
		
		var ID          = '<?php echo $FMAP_ID; ?>';
		var address     = '<?php echo esc_js(wpv_get_option('fmap-address')); ?>';
		var latitude    = floatVal('<?php wpvge('fmap-latitude'); ?>');
		var longitude   = floatVal('<?php wpvge('fmap-longitude'); ?>');
		var zoom        = floatVal('<?php wpvge('fmap-zoom'); ?>', 14);
		var marker      = !!'<?php wpvge('fmap-marker'); ?>';
		var html        = '<?php echo str_replace("'", "\\'", wpv_get_option('fmap-html')); ?>';
		var popup       = !!'<?php wpvge('fmap-popup'); ?>';
		var controls    = '<?php wpvge('fmap-controls'); ?>';
		var scrollwheel = !!'<?php wpvge('fmap-scrollwheel'); ?>';
		var maptype     = '<?php wpvge('fmap-maptype'); ?>' || "ROADMAP";
		var invert_lightness = !!'<?php wpvge('fmap-invert-lightness'); ?>';
		var color       = '<?php echo wpv_sanitize_accent(wpv_get_option('fmap-color')); ?>';
		
		function createMap() {
			
			var cfg = { zoom : zoom };
			
			if (marker) {
				cfg.markers = [{
					address  : address,
					latitude : latitude,
					longitude: longitude,
					html     : html,
					popup    : popup
				}];
			} else {
				cfg.latitude  = latitude;
				cfg.longitude = longitude;
				cfg.address   = address;
			}
			
			cfg.maptype     = maptype;
			cfg.controls    = controls || [];
			cfg.scrollwheel = scrollwheel;
			cfg.custom = {
				styles: [
					{
						stylers: [
							{ inverse_lightness: invert_lightness },
							{ hue : color }
						]
					}
				]
			}
			
			return $('<div id="google_map_' + ID + '" class="map"/>').appendTo(".footer-map").gMap(cfg);
			
			
		}
		
		$(".show-fmap-button").click(function(e) {
			e.preventDefault();
			
			if ($("body").is(".footer-map-expanded")) {
				$(this).html($(this).data("opentext"));
				$("body").removeClass("footer-map-expanded");
			} else {
				var map = $("#google_map_" + ID);
				if (!map.length) {
					map = createMap();
				}
				$("body").addClass("footer-map-expanded");
				$(this).html($(this).data("closetext"));
				setTimeout(function() {
					map[0].scrollIntoView();
				}, 400);
			}
		});
	})(jQuery);
	</script>
<?php endif;