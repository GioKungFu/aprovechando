jQuery.noConflict();
;(function($) {
	$.fn.slideUpDown = function(params) {
		var defaults = { 
			itemSelector : 	'li.item',
			divHover	:	'.hover-slide',
			speed		:	200
		}
		var opts = $.extend({}, defaults, params);
		var timeout = new Array($(this).length);
		
		$(this).find(opts.divHover).hide();
		$(this).find(opts.itemSelector).bind('mouseover', function(){
			showDetail($(this).children('.product-shop').children('.f-fix').find(opts.divHover),opts.speed);
		}).bind('click', function(){
			showDetail($(this).children('.product-shop').children('.f-fix').find(opts.divHover),opts.speed);
		}).bind('mouseout', function(){
			hideDetail($(this).children('.product-shop').children('.f-fix').find(opts.divHover),opts.speed);
		});

		$(this).children('.product-shop').children('.f-fix').find(opts.divHover).bind('mouseover', function(){
			showDetail($(this),opts.speed);
		}).bind('click', function(){
			hideDetail($(this),opts.speed);
		}).bind('mouseout', function(){
			hideDetail($(this),opts.speed);
		});

		//var timeout = null;
		var hideDetail = function (element,speed) {
			if (timeout[element.attr('name')])
				clearTimeout(timeout[element.attr('name')]);
			timeout[element.attr('name')] = setTimeout(function() {
				timeout[element.attr('name')] = null;
				element.fadeOut('fast');
			}, speed);
		}

		var showDetail = function (element,speed) {
			if (timeout[element.attr('name')])
				clearTimeout(timeout[element.attr('name')]);
			timeout[element.attr('name')] = setTimeout(function() {
				timeout[element.attr('name')] = null;
				element.fadeIn('fast');
			}, speed);
		}
	}
})(jQuery);