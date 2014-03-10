(function($, undefined) {
	"use strict";

	tinymce.create('tinymce.plugins.Shortcodes', {
		init: function() {},
		createControl: function(n, cm) {
			if (n === 'shortcodes') {
				var open_shortcode = function(v) {
					if ($('#shortcodes').length === 0) {
						$('body').append('<div id="shortcodes">');
					}

					$('body').attr('data-wpvshortcode', v);

					$.get(ajaxurl, {
						action: 'wpv-shortcode-generator',
						slug: v,
						nocache: (new Date()).getTime()
					}, function(data) {
						$('#shortcodes').html(data);

						$(window).trigger('wpv_shortcodes_loaded');

						$.magnificPopup.open({
							type: 'inline',
							items: {
								src: '#' + $('#shortcodes > div').attr('id'),
								titleSrc: WpvTmceShortcodes.title
							},
							closeOnBgClick: false
						});
					});
				};

				var c = cm.createMenuButton('wpv_shortcodes', {
					title: WpvTmceShortcodes.title,
					image: WpvTmceShortcodes.button
				});



				c.onRenderMenu.add(function(c, m) {
					m.add({
						title: 'Shortcodes',
						'class': 'mceMenuItemTitle'
					}).setDisabled(1);

					var addSc = function(sc) {
						m.add({
							title: sc.title,
							onclick: function() {
								open_shortcode(sc.slug);
							}
						});
					};

					for(var i = 0; i < WpvTmceShortcodes.shortcodes.length; ++i) {
						addSc(WpvTmceShortcodes.shortcodes[i]);
					}
				});

				return c;
			}

			return null;
		}

	});

	tinymce.PluginManager.add('shortcodes', tinymce.plugins.Shortcodes);

})(jQuery);