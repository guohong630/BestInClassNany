(function($, undefined) {
	"use strict";

	$(function() {
		var win = $(window),
			body = $('body'),
			hbox = $('.fixed-header-box'),
			hbox_filler,
			header = $('header.main-header'),
			middle = $('#header-middle'),
			middle_filler,
			main_content = $('#main-content'),
			second_row = hbox.find('.second-row'),
			admin_bar_fix = body.hasClass('admin-bar') ? 28 : 0,
			logo_wrapper = hbox.find('.logo-wrapper'),
			logo_wrapper_height = 0,
			explorer = /MSIE (\d+)/.exec(navigator.userAgent),
			loaded = false,
			interval,
			small_logo_height = 46;

		var ok_to_load = function() {
			return body.hasClass('sticky-header') &&
				!(explorer && parseInt(explorer[1], 10) === 8) &&
				!$.WPV.MEDIA.is_mobile() &&
				!$.WPV.MEDIA.layout["layout-below-medium"] &&
				hbox.length && second_row.length;
		};

		var ok_to_load_middle = function() {
			return $('#header-slider-container').length && $('.wpv-grid.parallax-bg').length === 0;
		};

		var init = function() {
			if(!ok_to_load())
				return;

			hbox_filler = hbox.clone().html('').css({
				'z-index': 0,
				visibility: 'hidden',
				height: hbox.outerHeight()
			}).insertAfter(hbox);

			hbox.css({
				position: 'fixed',
				top: hbox.offset().top,
				left: hbox.offset().left,
				width: hbox.outerWidth(),
				'-webkit-transform': 'translateZ(0)'
			});

			if(ok_to_load_middle()) {
				middle_filler = middle.clone().html('').css({
					'z-index': 0,
					visibility: 'hidden',
					height: middle.outerHeight()
				}).insertAfter(middle);

				middle.css({
					position: 'fixed',
					top: middle.offset().top,
					left: middle.offset().left,
					width: middle.outerWidth(),
					'z-index': 0
				});
			} else {
				middle_filler = null;
			}

			logo_wrapper_height = logo_wrapper.removeClass('scrolled').outerHeight();
			logo_wrapper.addClass('loaded');

			interval = setInterval(reposition, 41);

			loaded = true;

			win.scroll();
		};

		var destroy = function() {
			if(hbox_filler)
				hbox_filler.remove();

			hbox.removeClass('static-absolute fixed').css({
				position: '',
				top: '',
				left: '',
				width: '',
				'-webkit-transform': ''
			});

			if(middle_filler) {
				middle_filler.remove();

				middle.css({
					position: '',
					top: '',
					left: '',
					width: '',
					'z-index': 0
				});
			}

			logo_wrapper.removeClass('scrolled loaded');

			clearInterval(interval);

			loaded = false;
		};

		var reposition = function() {
			if(!loaded)
				return;

			var cpos = win.scrollTop();

			if(!header.hasClass('layout-logo-menu')) {
				var hbox_height = hbox.outerHeight(),
					second_row_height = second_row.height(),
					mcpos = main_content.offset().top - admin_bar_fix;

				if(mcpos <= cpos + hbox_height) {
					if( cpos + second_row_height <= mcpos) {
						hbox.css({
							position: 'absolute',
							top: mcpos - hbox_height,
							left: 0
						}).addClass('static-absolute').removeClass('fixed second-stage-active');
					} else {
						hbox.css({
							position: 'fixed',
							top: admin_bar_fix + second_row_height - hbox_height,
							left: hbox_filler.offset().left,
							width: hbox.outerWidth()
						}).addClass('second-stage-active');
					}
				} else {
					hbox.removeClass('static-absolute second-stage-active').css({
						position: 'fixed',
						top: hbox_filler.offset().top,
						left: hbox_filler.offset().left,
						width: hbox_filler.outerWidth()
					});
				}
			} else {
				if(cpos > logo_wrapper_height - small_logo_height) {
					if(!(logo_wrapper.hasClass('scrolled'))) {
						logo_wrapper.addClass('scrolled');
						hbox_filler.transition({
							height: '-='+(logo_wrapper_height - small_logo_height)+'px'
						}, 300, 'ease');

						middle.transition({
							top: '-='+(logo_wrapper_height - small_logo_height)+'px'
						}, 300, 'ease');
					}
				} else if(logo_wrapper.hasClass('scrolled')) {
					logo_wrapper.removeClass('scrolled');

					hbox_filler.transition({
						height: '+='+(logo_wrapper_height - small_logo_height)+'px'
					}, 300, 'ease');

					middle.transition({
						top: '+='+(logo_wrapper_height - small_logo_height)+'px'
					}, 300, 'ease');
				}
			}

			if(!hbox.hasClass('fixed') && !hbox.hasClass('static-absolute') && !hbox.hasClass('second-stage-active')) {
				hbox.css({
					position: 'fixed',
					top: hbox_filler.offset().top,
					left: hbox_filler.offset().left,
					width: hbox.outerWidth()
				}).addClass('fixed');
			}
		};

		win.bind('scroll touchmove', reposition).smartresize(function() {
			destroy();
			init();
		});

		init();
	});
})(jQuery);