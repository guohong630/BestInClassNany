(function($, undefined) {
	"use strict";

	var win = $(window),
		elem_factor = 0.2,
		win_factor = 0.7,
		win_height = 0;

	var explorer = /MSIE (\d+)/.exec(navigator.userAgent),
		mobileSafari = navigator.userAgent.match(/(iPod|iPhone|iPad)/) && navigator.userAgent.match(/AppleWebKit/);

	win.resize(function() {
		win_height = win.height();

		if(
			(explorer && parseInt(explorer[1], 10) === 8) ||
			mobileSafari ||
			$.WPV.MEDIA.layout["layout-below-medium"]
		) {
			$('.wpv-grid.animated-active').removeClass('animated-active').addClass('animated-suspended');
		} else {
			$('.wpv-grid.animated-suspended').removeClass('animated-suspended').addClass('animated-active');
		}
	}).resize();

	win.bind('scroll touchmove load', function() {
		var win_height = win.height(),
			all_visible = $(window).scrollTop() + win_height,
			reduces_win_height = win_factor*win_height;

		$('.row > .animated-active:not(.animation-ended)').each(function() {
			var precision = Math.max(100, Math.min(reduces_win_height, elem_factor*$(this).outerHeight()));

			if(all_visible - precision > $(this).offset().top || mobileSafari) {
				$(this).addClass('animation-ended');
			} else {
				return false;
			}
		});
	}).scroll();
})(jQuery);