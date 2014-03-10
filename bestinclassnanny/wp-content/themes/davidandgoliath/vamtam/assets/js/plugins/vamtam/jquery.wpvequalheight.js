;(function($, undefined) {
	"use strict";
	
	$.fn.wpvEqualHeight = function(options) {
		var columns = this,
			row = $(this).closest('.row'),
			rowWidth = 0;

		options = $.extend( {}, {
			method: 'outerHeight'
		}, options );

		function init() {
			var rw = row.width();
			if(rw !== rowWidth) {
				rowWidth = rw;
				var h = 0;

				columns.css("height", "auto").each(function() {
					h = Math.max(h, $(this)[options.method]());
				});

				if(!$.WPV.MEDIA.layout["layout-below-medium"])
					columns.height(h);
			}
		}

		if(columns.length > 1) {
			$(window).bind("resize load", init);
			columns.on('tabscreate accordioncreate', function() {
				rowWidth = 0;
				init();
			});
			init();
		}
	};
})(jQuery);