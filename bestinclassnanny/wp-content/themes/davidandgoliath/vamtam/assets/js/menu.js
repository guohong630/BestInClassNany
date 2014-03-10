(function($, undefined) {
	"use strict";

	$(function() {
		$('.menu-item').has('>.sub-menu').addClass("has-submenu");

		if(Modernizr.touch) {
			var currently_active;

			$('.fixed-header-box .menu-item:has(>.sub-menu) > a').bind('click', function(e) {
				if(currently_active !== this) {
					e.preventDefault();
					currently_active = this;
				}

				e.stopPropagation();
			});

			$(window).bind('click.sub-menu-double-tap', function() {
				currently_active = undefined;
			});
		}

		$('#main-menu').find('.menu').fadeIn(500);
	});
})(jQuery);