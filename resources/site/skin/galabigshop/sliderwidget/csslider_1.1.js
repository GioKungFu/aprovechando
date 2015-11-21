;(function ($) {
	 $.fn.inlineStyle = function (prop) {
        var styles = $.trim(this.attr("style")),
             value;
		 
		if(styles){
			var arr = styles.split(";"),i;
			for(i = 0;i < arr.length;i++){
				var style = arr[i].split(":");
				
				if ($.trim(style[0]) === prop) {
					value = style[1];           
				}	
			}
		}	 
        return value;
    };
	
	$.csslider = function(el,options) {
		var defaults = {
			selector : ".slides > li.item",
			move : 1,
			speed : 400,
			direction : 'horizontal',
			textClassName : '.product-name',
			delay : 0,
			widthViewport : 0,
			heightViewport : 0,
			textPrev : 'Prev',
			textNext : 'Next',
			circular : 0,
			parentHidden : ''
		}
		
		var vars = $.extend({}, defaults, options);
		var slider = $(el),
        //touch = ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch,
        eventType = "click",
		vertical = vars.direction === "vertical",
		auto = vars.delay > 0;
		slider.addClass('csslider'),
		rtlStyle = $('div.page').first().css('direction') == 'rtl';
		var time = 0;
		slider.containerSelector = vars.selector.substr(0,vars.selector.search(' '));
		slider.container = $(slider.containerSelector, slider);
		slider.slides = $(vars.selector, slider);
		slider.target = 0;
		slider.enoughtItem = true;
		slider.currentHideNav = 'prev';
		if(vertical)
			slider.addClass('vertical');
		else
			slider.addClass('horizontal');
		slider.scrolling = false;
		
		slider.setup = function(){
			slider.viewport = $('<div class="viewport"></div>');
			slider.viewport.append(slider.container);
			slider.append(slider.viewport);
			slider.controlNav();
			if(vars.widthViewport > 0){
				slider.viewport.width(vars.widthViewport);
			}
			if(vars.heightViewport > 0){
				slider.viewport.height(vars.heightViewport);
			}
			slider.init(true);
			slider.hammer = new Hammer(slider.container[0], {"swipe_time": 200/*,"prevent_default" : true*/});
			slider.touchHamer();
		}
		
		slider.init = function (first){
			if(vars.parentHidden){
				slider.curDisplay = slider.parents(vars.parentHidden).css('display');
				if(slider.curDisplay != 'block')
					slider.parents(vars.parentHidden).css({visibility:'hidden',display:'block'});
			}
			//if($(vars.textClassName,slider))
				//$(vars.textClassName,slider).hide();
			if(slider.interval && auto)
				clearTimeout(slider.interval);
			// Do not reset when slider is first loaded	
			if(!first)	
				slider.reset();

			var maxWidth = 0,maxOuterWidth = 0,maxHeight = 0,i=0,maxHeight = 0,maxOuterHeight = 0;
			slider.slides.each(function(index,value){
				// Backup css inline for width and height
				if($(this).inlineStyle('width') != undefined){
					$(this).attr('data-width',$.trim($(this).inlineStyle('width')));
				}
				
				if($(this).inlineStyle('height') != undefined){
					$(this).attr('data-height',$.trim($(this).inlineStyle('height')));
				}
				
				if(maxWidth < $(this).width()){
					maxWidth = $(this).width();
					maxOuterWidth = $(this).outerWidth(true);
					i = index;
				}
				if(maxHeight < $(this).height()){
					maxHeight = $(this).height();
					maxOuterHeight = $(this).outerHeight(true);
				}
			});
			
			if(!vertical){ // horizontal
				//slider.lengthPx = Math.floor(slider.viewport.width()/maxOuterWidth)*maxOuterWidth;
				slider.lengthPx = slider.viewport.width();
				//slider.lengthPx = slider.viewport.width();
				if(slider.lengthPx < maxOuterWidth){
					slider.container.addClass('no-float');
					var newWidth = slider.viewport.width() - (maxOuterWidth - maxWidth);
					slider.lengthPx = slider.viewport.width();
					var ratio = (newWidth/maxWidth);
					var delta = maxWidth - newWidth;
					maxWidth = newWidth;
					maxOuterWidth = maxOuterWidth - delta;
					maxHeight = Math.ceil(maxHeight*ratio);
					//slider.slides.height(maxHeight);
					//$('a.product-image',slider).css('float','none');
				}
				slider.slides.width(maxWidth);
				var first = slider.slides.first();
				slider.stepLength = (maxOuterWidth)*vars.move;
				var lengthPx = slider.slides.length*(maxOuterWidth);
				slider.container.width(lengthPx);
				slider.container.lengthPx = lengthPx;
				if(slider.container.lengthPx - slider.lengthPx <= maxOuterWidth - maxWidth){
					slider.enoughtItem = false;
					slider.next.hide();
					slider.prev.hide();
				} else {
					slider.enoughtItem = true;
					slider.next.show();
					slider.prev.show();
				}
			} else { // vertical
				if(slider.viewport.width() < maxOuterWidth){
					slider.container.addClass('no-float');
					var newWidth = slider.viewport.width() - (maxOuterWidth - maxWidth);
					var ratio = (newWidth/maxWidth);
					maxWidth = newWidth;
					slider.slides.width(maxWidth);
					maxHeight = 0;maxOuterHeight = 0;
					slider.slides.each(function(index,value){
						if(maxHeight < $(this).height()){
							maxHeight = $(this).height();
							maxOuterHeight = $(this).outerHeight(true);
						}
					});
					//$('a.product-image',slider).css('float','none');
					/*newHeight = Math.ceil(maxHeight*ratio);
					var delta = maxHeight - newHeight;
					maxOuterHeight -= delta;
					maxHeight = newHeight;*/
				}
				//slider.lengthPx = Math.floor(slider.viewport.height()/maxOuterHeight)*maxOuterHeight;
				slider.lengthPx = slider.viewport.height();
				//slider.lengthPx = slider.viewport.height();
				slider.slides.height(maxHeight);
				var first = slider.slides.first();
				slider.stepLength = (maxOuterHeight)*vars.move;
				var lengthPx = slider.slides.length*(maxOuterHeight);
				slider.container.height(lengthPx);
				slider.container.lengthPx = lengthPx;
				if(slider.container.lengthPx - slider.lengthPx <= maxOuterHeight - maxHeight){
					slider.enoughtItem = false;
					slider.next.hide();
					slider.prev.hide();
				} else {
					slider.enoughtItem = true;
					slider.next.show();
					slider.prev.show();
				}
			}
			//if($(vars.textClassName,slider))
				//$(vars.textClassName,slider).show();
				
			slider.finalTarget = slider.lengthPx - slider.container.lengthPx;	
			//slider.deltaTotal = slider.lengthPx - Math.floor(slider.viewport.width()/maxOuterWidth)*maxOuterWidth;
			slider.target = 0;
			slider.resetScroll();
			slider.slide(slider.target,vars.speed);	
			if(vars.circular == 0 && slider.enoughtItem){
				slider.prev.hide();
				slider.next.show();
				slider.currentHideNav = 'prev';
			}
			/*if(auto)
				slider.interval = setTimeout(slider.nextSlide,vars.delay);*/
			if(vars.parentHidden){
				if(slider.curDisplay != 'block')
					slider.parents(vars.parentHidden).css({visibility:'',display:slider.curDisplay});
			}
		}
		
		slider.reset = function(){
			slider.container.css('height','');
			slider.slides.css('height','');
			slider.container.css('width','');
			slider.slides.css('width','');
			$('a.product-image',slider).css('float','');
			// Restore css inline
			if(slider.slides.attr('data-width')){
				slider.slides.css('width',slider.slides.attr('data-width'));
			}
			if(slider.slides.attr('data-height')){
				slider.slides.css('height',slider.slides.attr('data-height'));
			}
			slider.container.removeClass('no-float');
		}
		
		slider.resetScroll = function(){
			slider.scrolling = false;
			if(auto)
				slider.interval = setTimeout(slider.nextSlide,vars.delay);
		}
		
		slider.touchHamer = function(){
			var targetVirtual,flow, time, distance;
			if(typeof addEventListener == 'function'){
				el.addEventListener("touchmove", function(ev){
					if(ev.touches.length == 1)
						ev.preventDefault();
				}, false);
			}
			
			function cancelEvent(event)
			{
				event = event || window.event;
				if(event.preventDefault){
					event.preventDefault();
					event.stopPropagation();
				}else{
					event.returnValue = false;
					event.cancelBubble = true;
				}
			}
			
			slider.hammer.ondragstart = function(ev) {
				if(slider.interval && auto)
					clearTimeout(slider.interval);
				if(slider.scrolling 
					|| (vertical && (ev.direction == 'left' || ev.direction == 'right')) 
					|| (!vertical && (ev.direction == 'up' || ev.direction == 'down'))){
					return;
				}	
				targetVirtual = 0;
				flow = 0;
				time = Number( new Date() );
				distance = 0;
			}
			
			slider.hammer.ondrag = function(ev) {
				if(slider.interval && auto)
					clearTimeout(slider.interval);
				if(slider.scrolling
					|| (vertical && (ev.direction == 'left' || ev.direction == 'right')) 
					|| (!vertical && (ev.direction == 'up' || ev.direction == 'down'))
					|| !slider.enoughtItem){
					cancelEvent(ev);	
					return;
				}
				if(ev.touches.length > 1 || ev.scale && ev.scale !== 1 || slider.scrolling || !slider.enoughtItem){
					cancelEvent(ev);
					return;
				}	
				distance = (vertical) ? ev.distanceY : ev.distanceX;
				targetVirtual = slider.target + distance;
				if(targetVirtual > slider.stepLength/2){// last slide right
					flow = 1;
					return;
				}	
				if(slider.container.lengthPx + targetVirtual < slider.lengthPx - (slider.stepLength/2)){//first slide left
					flow = -1;
					return;
				}	
				if(vertical)
					slider.container.animate({ marginTop: targetVirtual + 'px'}, 0);
				else
					slider.container.animate({ marginLeft: targetVirtual + 'px'}, 0);
				
			};
			
			slider.hammer.ondragend = function(ev) {
				if(slider.scrolling
					|| (vertical && (ev.direction == 'left' || ev.direction == 'right')) 
					|| (!vertical && (ev.direction == 'up' || ev.direction == 'down'))
					|| !slider.enoughtItem){
					cancelEvent(ev);	
					return;
				}	
				//slider.hammer.cancelEvent(ev);	
				var oldTarget = slider.target;
				if(flow < 0){
					slider.target = slider.finalTarget;
					/*if(vars.circular == 0){
						slider.currentHideNav = 'next';
						slider.next.hide();
						slider.prev.show();
					}		*/			
				} else if(flow > 0){
					slider.target = 0;
					/*if(vars.circular == 0){
						slider.currentHideNav = 'prev';
						slider.next.show();
						slider.prev.hide();
					}*/
				} else {
					var remainDistance = Math.floor(Math.abs(distance)%slider.stepLength),remainStep;
					if(remainDistance < (slider.stepLength/2)){
						remainStep = (ev.direction == 'left' || ev.direction == 'up') ? remainDistance : remainDistance*(-1);
					} else {
						remainStep = (ev.direction == 'left' || ev.direction == 'up') ? (slider.stepLength-remainDistance)*(-1) : (slider.stepLength-remainDistance);
					}
					slider.target = targetVirtual + remainStep;
					
				}
		
				if(vars.circular == 0 && (oldTarget != slider.target)){
					if(ev.direction == 'left' || ev.direction == 'up'){ // next slide
						slider.checkNextSlide();
					} else {
						slider.checkPrevSlide();
					}
				}
		
				slider.slide(slider.target,vars.speed);
			};
			
			slider.hammer.onswipe = function(ev) {
				if(slider.scrolling || !slider.enoughtItem){
					cancelEvent(ev);	
					return;
				}	
				if(!vertical){
					if(ev.direction == 'left')
						slider.nextSlide();
					else if(ev.direction == 'right')	
						slider.prevSlide();
				} else {
					if(ev.direction == 'up')
						slider.nextSlide();
					else if(ev.direction == 'down')	
						slider.prevSlide();
				}
			}
			
		}		
		
		slider.slide = function(target, durationVal){
			if(slider.interval && auto)
				clearTimeout(slider.interval);
			slider.scrolling = true;
			var targetCss = target + 'px';
			if(!vertical)
				if(rtlStyle)
					slider.container.animate({ marginRight: targetCss}, durationVal, 'swing',slider.resetScroll);
				else	
					slider.container.animate({ marginLeft: targetCss}, durationVal, 'swing',slider.resetScroll);
			else	
				slider.container.animate({ marginTop: targetCss}, durationVal, 'swing',slider.resetScroll);
		}
		
		slider.checkNextSlide = function(){
			if(slider.currentHideNav != 'next' && vars.circular == 0){
				if(slider.currentHideNav == 'prev'){
					slider.prev.show();
					slider.currentHideNav = '';
				}	
				//if(slider.container.lengthPx + slider.target - slider.stepLength <= slider.lengthPx - slider.stepLength/2){
				if(slider.target <= slider.finalTarget){
					slider.currentHideNav = 'next';
					slider.next.hide();
				} 					
			}	
		}
		
		slider.checkPrevSlide = function(){
			if(slider.currentHideNav != 'prev' && vars.circular == 0){	
				if((slider.currentHideNav == 'next')){
					slider.next.show();
					slider.currentHideNav = '';
				}	
				if(slider.target + slider.stepLength > slider.stepLength/2){
					slider.currentHideNav = 'prev';
					slider.prev.hide();
				}									
			}
		}
		
		slider.nextSlide = function(){
			if(!slider.scrolling && slider.enoughtItem){
				if(slider.interval && auto)
					clearTimeout(slider.interval);
				slider.target -= slider.stepLength;
				//if(slider.container.lengthPx + slider.target <= slider.lengthPx){
				if(slider.target - Math.abs(slider.finalTarget)%slider.stepLength <= slider.finalTarget ){
					if(vars.circular > 0)
						slider.target = 0;
					else 
						slider.target = slider.finalTarget;
				}
				slider.slide(slider.target,vars.speed);	
				
				// Check show/hide prev/next button when circular is disabled
				slider.checkNextSlide();					
			}
		}
		
		slider.prevSlide = function(){
			if(!slider.scrolling && slider.enoughtItem){
				if(slider.interval && auto)
					clearTimeout(slider.interval);
				if(slider.target <= slider.finalTarget){
					slider.target += slider.stepLength + (Math.abs(slider.finalTarget)%slider.stepLength);
					if(slider.target >= 0){
						if((slider.target >= slider.stepLength) && (vars.circular > 0))
							slider.target = slider.finalTarget;
						else	
							slider.target = 0;
					}
				} else {
					slider.target += slider.stepLength;
					if(slider.target >= 0){
						if((slider.target >= slider.stepLength) && (vars.circular > 0))
							slider.target = slider.finalTarget;
						else	
							slider.target = 0;
					}
				}	
				slider.slide(slider.target,vars.speed);	
				
				// Check show/hide prev/next button when circular is disabled
				slider.checkPrevSlide();
			}	
		}
		
		slider.controlNav = function(){
			var navHtml =  $("<div class='controls'><a href='#' title='" + vars.textPrev + "' class='prev'>" + vars.textPrev + "</a><a title='" + vars.textNext + "' href='#' class='next'>" + vars.textNext + "</a></div>");
			slider.append(navHtml);
			slider.next = $('a.next',slider);
			slider.prev = $('a.prev',slider);
			slider.next.bind(eventType, function(event) {
				event.preventDefault();
				slider.nextSlide();
			});
			
			slider.prev.bind(eventType, function(event) {
				event.preventDefault();
				slider.prevSlide();
			});
		}
		
		slider.showHideNav = function(){
			if(slider.target < 0){
				slider.prev.show();
			} else {
				slider.prev.hide();
			}
		}
		
		slider.setup();
		$(window).bind("emadaptchange orientationchange", function(){
			setTimeout(function(){slider.init(false);},300);
		});
	}
	
	$.fn.csslider = function(options) {
		return this.each(function(){
			new $.csslider(this,options);
		});
	}
})(jQuery);