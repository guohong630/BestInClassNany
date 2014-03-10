/* jshint multistr:true */
(function() {
	"use strict";

	jQuery.WPV = jQuery.WPV || {}; // Namespace

	(function ($, undefined) {
		var J_WIN     = $(window);

		$(function () {
			if(top !== window && /vamtam\.com/.test(document.location.href)) {
				var width = 0;

				setInterval(function() {
					if($(window).width() !== width) {
						$(window).resize();
						setTimeout(function() { $(window).resize(); }, 100);
						setTimeout(function() { $(window).resize(); }, 200);
						setTimeout(function() { $(window).resize(); }, 300);
						setTimeout(function() { $(window).resize(); }, 500);
						width = $(window).width();
					}
				}, 200);
			}

			(function() {
				var width = 0;
				$(window).resize(function() {
					if($(window).width() !== width) {
						setTimeout(function() { $(window).resize(); }, 100);
						setTimeout(function() { $(window).resize(); }, 200);
						setTimeout(function() { $(window).resize(); }, 300);
						width = $(window).width();
					}
				});
			})();

			if ($("body").is(".responsive-layout")) {
				J_WIN.triggerHandler('resize.sizeClass');
			}

			//infinite scrolling
			if($('body').is('.pagination-infinite-scrolling')) {
				var last_auto_load = 0;
				$(window).bind('resize scroll', function(e) {
					var button = $('.lm-btn'),
						now_time = e.timeStamp || (new Date()).getTime();

					if(now_time - last_auto_load > 500 && button.css('opacity') === 1 && $(window).scrollTop() + $(window).height() >= button.offset().top) {
						last_auto_load = now_time;
						button.click();
					}
				});
			}

			if($('html').is('.placeholder')) {
				$.rawContentHandler(function() {
					$('.label-to-placeholder label[for]').each(function() {
						$('#' + $(this).prop('for')).attr('placeholder', $(this).text());
						$(this).hide();
					});
				});
			}

			// Video resizing
			// =====================================================================
			J_WIN.bind('resize.video load.video', function() {
				$('.portfolio_image_wrapper,\
					.boxed-layout .media-inner,\
					.boxed-layout .loop-wrapper.news .thumbnail,\
					.boxed-layout .portfolio_image .thumbnail,\
					.boxed-layout .wpv-video-frame').find('iframe, object, embed, video').each(function() {
					var v = $(this);

					if(v.prop('width') === '0' && v.prop('height') === '0') {
						v.css({width: '100%'}).css({height: v.width()*9/16});
					} else {
						v.css({height: v.prop('height')*v.width()/v.prop('width')});
					}
				});

				setTimeout(function() {
					$('.mejs-time-rail').css('width', '-=1px');
				}, 100);
			}).triggerHandler("resize.video");

			// Animated buttons 
			// =====================================================================
			$(document).on('mouseover focus click', '.animated.flash, .animated.wiggle', function() {
				$(this).removeClass('animated');
			});
                        
			// Create the full-screen slider and add it's keyboard navigation 
			// =====================================================================
			if ($.isArray(window.wpvBgSlides)) {
				var body = $('body');
				body.fastSlider({}, wpvBgSlides);

				$(window).bind('keydown', function(e) {
					switch(e.keyCode || e.which) {
						case 37:
							if(body.data("fastSlider"))
								body.data("fastSlider").prev();
						break;
						case 38:
							if(body.data("fastSlider"))
								body.data("fastSlider").goToPrevGalleryItem();
						break;
						case 39:
							if(body.data("fastSlider"))
								body.data("fastSlider").next();
						break;
						case 40:
							if(body.data("fastSlider"))
								body.data("fastSlider").goToNextGalleryItem();
						break;
					}
				});
			}

			// Tooltip
			// =====================================================================
			var tooltip_animation = 250;
			$('.shortcode-tooltip').hover(function () {
				var tt = $(this).find('.tooltip').fadeIn(tooltip_animation).animate({
					bottom: 25
				}, tooltip_animation);
				tt.css({ marginLeft: -tt.width() / 2 });
			}, function () {
				$(this).find('.tooltip').animate({
					bottom: 35
				}, tooltip_animation).fadeOut(tooltip_animation);
			});

			$('#commentform, .searchform').validator();

			$('.sitemap li:not(:has(.children))').addClass('single');

			// Scroll to top button
			// =====================================================================
			$(window).bind('resize scroll', function () {
				$('#scroll-to-top').toggleClass("visible", window.pageYOffset > 0);
			});
			$('#scroll-to-top').click(function () {
				$('html,body').animate({
					scrollTop: 0
				}, 300);
			});

			// page scroll
			$(document).on('click', '.wpv-animated-page-scroll[href]', function(e) {
				var el = $($(this).prop('href'));

				if(el.length) {
					e.preventDefault();
					$('html,body').animate({
						scrollTop: el.offset().top - 100
					});
				}
			});

		});

		$('#footer-sidebars .row').each(function() {
			$(this).find('aside').wpvEqualHeight();
		});

		$(window).resize(function() {
			$('#footer-sidebars .widget_footer_map:only-child').each(function() {
				var fmt = $(this).find('.footer-map-trigger');

				fmt.css({
					height: '',
					'line-height': ''
				});

				var widget_height = $(this).height(),
					area_height = $(this).parent().height(),
					fmt_height = fmt.height();

				if(widget_height < area_height) {
					var new_height = fmt_height + area_height - widget_height;

					fmt.css({
						height: new_height,
						'line-height': new_height+'px'
					});
				}
			});
		}).resize();

		// Internet Explorer fixes -------------------------------------------------
		if (!Modernizr.lastchild) {
			$('p:empty').hide();
			$('*:last-child').addClass('last last-child');

			var logo = $(".main-header .logo");
			if (logo.length) {
				var logoImage = logo.find("> img");
				if (logoImage.length === 1) {
					logo.width(logoImage[0].offsetWidth);
				}
			}
		}

		$('#feedback.slideout').click(function(e) {
			$(this).parent().toggleClass("expanded");
			e.preventDefault();
		});

		// =========================================================================
		// Raw Content Handlers and Live Scripts
		// =========================================================================

		// Equal height elements
		// =========================================================================
		$.rawContentHandler(function() {
			$(".row:has(> div.has-background)").each(function(i, o) {
				var row = $(o),
					columns = row.find('> div');

				if(columns.length > 1) {
					row.addClass('has-nomargin-column');
					columns.wpvEqualHeight();
				}
			});

			$('.row:has(.linkarea)').each(function() {
				$(this).find('.linkarea').wpvEqualHeight({
					method: 'height'
				});
			});
		});

		// Touch control for the sliders
		// =========================================================================
		$.rawContentHandler(function() {
			$('.vamtam-slider').not('.scroll-x .vamtam-slider').touchwipe({
				preventDefaultEvents : false,
				canUseEvent : function(e) {
					//console.log($(e.target).is(".slide, .slide *"));
					return $(e.target).is(".slide, .slide *");
				},
				wipeLeft: function(e) {
					e.preventDefault();
					$(this).closest(".vamtam-slider").vamtamSlider("pos", "next");
				},
				wipeRight: function(e) {
					e.preventDefault();
					$(this).closest(".vamtam-slider").vamtamSlider("pos", "prev");
				}
			});

			// BG lider
			$(".fast-slider").touchwipe({
				canUseEvent : function(e) {
					return $(e.target).is("#container");
				},
				wipeLeft: function() {
					if($(this).data("fastSlider"))
						$(this).data("fastSlider").prev();
				},
				wipeRight: function() {
					if($(this).data("fastSlider"))
						$(this).data("fastSlider").next();
				},
				wipeDown: function() {
					if($(this).data("fastSlider"))
						$(this).data("fastSlider").goToPrevGalleryItem();
				},
				wipeUp: function() {
					if($(this).data("fastSlider"))
						$(this).data("fastSlider").goToNextGalleryItem();
				}
			});
		});

		// LINKAREA
		// =========================================================================
		$("body")
		.on("mouseenter", ".linkarea[data-hoverclass]", function() {
			$(this).addClass(this.getAttribute("data-hoverclass"));
		})
		.on("mouseleave", ".linkarea[data-hoverclass]", function() {
			$(this).removeClass(this.getAttribute("data-hoverclass"));
		})
		.on("mousedown", ".linkarea[data-activeclass]", function() {
			$(this).addClass(this.getAttribute("data-activeclass"));
		})
		.on("mouseup", ".linkarea[data-activeclass]", function() {
			$(this).removeClass(this.getAttribute("data-activeclass"));
		})
		.on("click", ".linkarea[data-href]", function(e) {
			if (e.isDefaultPrevented()) {
				return false;
			}

			var href = this.getAttribute("data-href");
			if (href) {
				e.preventDefault();
				e.stopImmediatePropagation();
				try {
					var target = String(this.getAttribute("data-target") || "self").replace(/^_/, "");
					if (target === "blank" || target === "new") {
						window.open(href);
					} else {
						window[target].location = href;
					}
				} catch (ex) {}
			}
		});

		J_WIN.triggerHandler('resize.sizeClass');

		$(window).bind("load", function() {
			setTimeout(function() {
				$(window).trigger("resize");
			}, 1);
		});

	})(jQuery);

})();