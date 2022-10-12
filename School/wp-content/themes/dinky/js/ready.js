/**
 * Main Script
 *
 * Package: Dinky
 * Since: Dinky 1.0
 * License: GNU General Public License v3 or later
 * Copyright (C) 2013  Misam Saki, misam.ir
 * Author: Misam Saki, http://misam.ir/
 * Theme URI: http://wordpress.org/themes/dinky/
 * Github: http://github.com/misamplus/dinky-theme/
*/

$ = jQuery; // for adapt by jquery library from WordPress core bundled library resources

var hf = 30;
$(document).ready(function() {
	$(window).scroll(function() {
		var window_scrollTop = $(window).scrollTop();
		if (window_scrollTop > 0) $('#toTop').fadeIn('fast'); else $('#toTop').fadeOut('fast');

		/**
		 * Since: Dinky 1.5
		 */
		if ( $('.menu-top').html() != undefined ) {
			var masthead_topOffset = $('#masthead').height() - window_scrollTop;
			var mainNavigation_height = $('#main-navigation').height();
			if (masthead_topOffset < mainNavigation_height + hf) {
				$('.menu-primary').addClass('hidden');
				$('.menu-top').removeClass('hidden');
				$('#main-navigation').addClass('fixed');
				hf = -20;
			} else {
				$('#main-navigation').removeClass('fixed');
				$('.menu-top').addClass('hidden');
				$('.menu-primary').removeClass('hidden');
				hf = 30;
			}
		}
	});
	$(window).load(function() {
		var window_scrollTop = $(window).scrollTop();
		if (window_scrollTop == 0) $('#toTop').css('display', 'none');
	});
	$('#toTop').click(function() {
		$('html,body').animate({scrollTop:0}, 'slow');
		return false;
	});
	$('a.mobile-select-menu').click(function() {
		$('#mobile-navigation ul').slideToggle('fast');
	});
	$(window).on('load', function() {
		d_h_offset = 0;
		mastheadResize();
	});
	$(window).on('resize', function() {
		mastheadResize();
	}, 300);
});

var d_h_offset = 0;
function mastheadResize() {
	var window_h = $(window).height();
	if (window_h < 700) {
		var masthead_h = $('#masthead').height() + 15;
		var d_h = window_h - masthead_h + d_h_offset;
		if (d_h < -185) d_h = -185;
		d_h_offset = d_h;
		$('#cover').height(400 + d_h);
		$('.cover').height(400 + d_h);
	}
}

/**
 * For delay 
 */

;(function ($) {
    var methods = { on: $.fn.on, bind: $.fn.bind };
    $.each(methods, function(k){
        $.fn[k] = function () {
            var args = [].slice.call(arguments),
                delay = args.pop(),
                fn = args.pop(),
                timer;

            args.push(function () {
                var self = this,
                    arg = arguments;
                clearTimeout(timer);
                timer = setTimeout(function(){
                    fn.apply(self, [].slice.call(arg));
                }, delay);
            });

            return methods[k].apply(this, isNaN(delay) ? arguments : args);
        };
    });
}(jQuery));