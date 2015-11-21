/**
 * EMThemes
 *
 * @license commercial software
 * @copyright (c) 2013 Codespot Software JSC - EMThemes.com. (http://www.emthemes.com)
 */

(function($) {

if (typeof EM == 'undefined') EM = {};
if (typeof EM.tools == 'undefined') EM.tools = {};


var isMobile = /iPhone|iPod|iPad|Phone|Mobile|Android|hpwos/i.test(navigator.userAgent);
var isPhone = /iPhone|iPod|Phone|Android/i.test(navigator.userAgent);


var domLoaded = false, 
	windowLoaded = false, 
	last_adapt_i, 
	last_adapt_width;
/**
 * Fix iPhone/iPod auto zoom-in when text fields, select boxes are focus
 */
function fixIPhoneAutoZoomWhenFocus() {
	var viewport = $('head meta[name=viewport]');
	if (viewport.length == 0) {
		$('head').append('<meta name="viewport" content="width=device-width, initial-scale=1.0"/>');
		viewport = $('head meta[name=viewport]');
	}
	
	var old_content = viewport.attr('content');
	
	function zoomDisable(){
		viewport.attr('content', old_content + ', user-scalable=0');
	}
	function zoomEnable(){
		viewport.attr('content', old_content);
	}
	
	$("input[type=text], textarea, select").mouseover(zoomDisable).mousedown(zoomEnable);
}


/**
 * Function called when layout size changed by adapt.js
 */
function whenAdapt(i, width) {
	$('body').removeClass('adapt-0 adapt-1 adapt-2 adapt-3 adapt-4 adapt-5 adapt-6')
		.addClass('adapt-'+i);
    if (FREEZED_TOP_MENU !=0 && isPhone == false){
    	var sticky_navigation = function(){
    		var scroll_top = $(window).scrollTop();
            if($('body').hasClass('adapt-0') == false){
                if (scroll_top > 150) {
                    $('.em-area05').addClass('fixed-top');
        		} else {
                    $('.em-area05').removeClass('fixed-top');
        		} 
            }else {
                $('.em-area05').removeClass('fixed-top');
    		}    		  
    	};
    	$(window).scroll(function() {
    		 sticky_navigation();
    	});
    }
    if($('body').hasClass('adapt-0') == true){
        $('.em-area05').removeClass('fixed-top');
    }
};


/**
 * Callback function called when stylesheet is changed by adapt.js
 */
ADAPT_CONFIG.callback = function(i, width) {
	last_adapt_i = i;
	last_adapt_width = width;
	
	whenAdapt(last_adapt_i, last_adapt_width);
};

/**
*   Add class mobile
**/
function addClassMobile(){
    if(isMobile == true){
        jQuery('body').addClass('mobile-view');
    }
};

$(document).ready(function() {
	domLoaded = true;  
	isMobile && fixIPhoneAutoZoomWhenFocus();
	alternativeProductImage();
	// safari hack: remove bold in h5, .h5
	if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
		$('h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6').css('font-weight', 'normal');
	}
	addClassMobile();	
    backToTop();
    if(jQuery('body').viewPC()){
        toolbarSearch();
		toolbar();
	}
    doAddtoButton();
    setupReviewLink();
    if (FREEZED_TOP_MENU !=0 && isPhone == false){persistentMenu();}
    if(!isPhone){
		if(PRODUCTSGRID_POSITION_ABSOLUTE=="fitRows"){
			jQuery('.category-products ul.products-grid .item').css('margin-right','15px');
		}
	}
    if(DETAILS_TAB != 0){decorateProductCollateralTabs();}
	//handleAddToCart();
});

$(window).bind('load', function() {
	windowLoaded = true;
	responsive();
	whenAdapt(last_adapt_i, last_adapt_width);
    setTimeout(function(){toogleFooterInfo();},300);	    
    doSlider('#upsell-product-table',1,0,'horizontal');
    doSlider('#slider_crosell',1,0,'horizontal');
    doSlider('#slider_moreview',1,0,'horizontal');
    initIsotope();
    noticeClose();
});

$(window).bind('emadaptchange', function () {
    toogleFooter();
    if (typeof em_slider!=='undefined')
        em_slider = new EM_Slider(em_slider.config);
    var tm;
    clearTimeout(tm);
    tm = setTimeout(initIsotope, 500);
});

})(jQuery);

/**
 * Adjust elements to make it responsive
 *
 * Adjusted elements:
 * - Image of product items in products-grid scale to 100% width
 */
function responsive() {
    var $=jQuery;
	
	// resize products-grid's product image to full width 100% {{{
	var position = $('.products-grid .item').css('position');
	if (position != 'absolute' && position != 'fixed' && position != 'relative')
		$('.products-grid .item').css('position', 'relative');
		
	var img = $('.products-grid .item .product-image img');
	if (!(img.parent().parent().parent().parent().hasClass("category-products"))){
		img.each(function() {
			img.data({
				'width': $(this).width(),
				'height': $(this).height()
			})
		});
		img.removeAttr('width').removeAttr('height').css('width', '100%');
	};
	$('.custom-logo').each(function() {
		$(this).css({
			'max-width': $(this).width(),
			'width': '100%'
		});
	});
};

/**
 * Change the alternative product image when hover
 */
function alternativeProductImage() {
    var $=jQuery;
    var tm;
    function swap() {
        clearTimeout(tm);
        setTimeout(function() {
            el = $(this).find('img[data-alt-src]');
            var newImg = $(el).data('alt-src');
            var oldImg = $(el).attr('src');
            $(el).attr('src', newImg).data('alt-src', oldImg);
        }.bind(this), 200);
    }

    $('.item .product-image img[data-alt-src]').parents('.item').bind('mouseenter', swap).bind('mouseleave', swap);
};

function showAgreementPopup(e) {		
	jQuery('#checkout-agreements label.a-click').parent().parent().children('.agreement-content').show()
		.css({
			'left': (parseInt(document.viewport.getWidth()) - jQuery('#checkout-agreements label.a-click').parent().parent().children('.agreement-content').width())/2 +'px',
			'top': (parseInt(document.viewport.getHeight()) - jQuery('#checkout-agreements label.a-click').parent().parent().children('.agreement-content').height())/2 + 'px'
	});	
};

/**
 *   After Layer Update
 **/
window.afterLayerUpdate = function () {
    var $=jQuery;
    if($('body').viewPC()){
        toolbar();
    }
    alternativeProductImage();
    qs({
        itemClass: '.products-grid li.item, .products-list li.item, li.item .cate_product, .product-upsell-slideshow li.item, .mini-products-list li.item, #crosssell-products-list li.item', //selector for each items in catalog product list,use to insert quickshop image
        aClass: 'a.product-image', //selector for each a tag in product items,give us href for one product
        imgClass: '.product-image img' //class for quickshop href
    });
    doAddtoButton();
    initIsotope();    
};


function hideAgreementPopup(e) {
	//$('opc-agreement-popup-overlay').hide();
	jQuery('#checkout-agreements .agreement-content').hide();
	
};

function toolbar(){
    var $=jQuery;

    $('.show').each(function(){
        $(this).insertUl();
        $(this).selectUl();
    });
    $('.sortby').each(function(){
        //$(this).insertTitle();
        $(this).insertUl();
        $(this).selectUl();
    });
};

function afterLoadAjax(id){
	responsive();
    doAddtoButton();
	if(!isPhone){
		if(PRODUCTSGRID_POSITION_ABSOLUTE=="fitRows"){
			jQuery(id + ' ul.products-grid .item').css('margin-right','15px');
		}
		var temp = jQuery(id + ' ul.products-grid li.item');	
	    temp.each(function(){
			if(!(jQuery(this).hasClass('isotope-item'))){
				jQuery(id + ' ul.products-grid').isotope( 'insert', jQuery(this));
			}
		});
	};    
    alternativeProductImage();
    qs({
		itemClass: '.products-grid li.item, .products-list li.item, li.item .cate_product, .product-upsell-slideshow li.item, .mini-products-list li.item, #crosssell-products-list li.item', //selector for each items in catalog product list,use to insert quickshop image
		aClass: 'a.product-image', //selector for each a tag in product items,give us href for one product
		imgClass: '.product-image img' //class for quickshop href
	});
    handleAddToCart();
};

function toogleFooterInfo(){
    var $ = jQuery;
	toogleFooter();
    var container = $("#toogle_footer_info");
    if ($("body").hasClass("cms-index-index")){	         
        container.hide();
        $("#display_footer_info").show();
        if(isMobile == true){
            $("#display_footer_info").click(
                function( event ){
                    event.preventDefault();
                    if (container.is( ":visible" )){
                        container.slideUp(100);
                        $("#display_footer_info").toggleClass('hidden-arrow');
                        $("#display_footer_info").html('Show');
                    } else {
                        container.slideDown(100);
                        $("#display_footer_info").removeClass('hidden-arrow');
                        $("#display_footer_info").html('Hide');
                    }
                }
            );
        }else{
            $("#display_footer_info").parent('.widget-static-block').parent('.em-area04').hover(
				function( event ){
				    event.preventDefault();
                    if (container.is( ":visible" )){
                        container.slideUp(100);
                        $("#display_footer_info").toggleClass('hidden-arrow');
                        $("#display_footer_info").html('Show');
                    } else {
                        container.slideDown(100);
                        $("#display_footer_info").removeClass('hidden-arrow');
                        $("#display_footer_info").html('Hide');
                    }
				}
			);
        }
    }else{
        container.show();
        $("#display_footer_info").hide();
    }
      
};

// Back to top
function backToTop(){
    var $=jQuery;
    // hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	$('#back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

};

function toolbarSearch(){
    var $=jQuery;
	$('.cat-search').each(function(){
		$(this).insertUlCategorySearch();
		$(this).selectUlCategorySearch();
	});
    $('#select-store').each(function(){
		$(this).insertUl();
		$(this).selectUl();
	});
};

/**
*   Toogle Footer Information Mobile View
**/
function toogleFooter(){
    if(isPhone==true || jQuery('body').hasClass('adapt-0') == true){
        jQuery('#footer-information ul').css('display','none');
        jQuery('#footer-information p.h5').addClass('toogle-icon');
        jQuery('#footer-information p.h5').unbind('click');
		jQuery('#footer-information p.h5').on('click', function(){
			jQuery(this).toggleClass("active").parent().find("ul").slideToggle();
		});		
    }else{
        jQuery('#footer-information p.h5').removeClass('toogle-icon');
        jQuery('#footer-information p.h5').removeClass('active');
        jQuery('#footer-information ul').css('display','block');
    }
};

function decorateProductCollateralTabs() {
    var $=jQuery;
    $('.details_tab').addClass('tab_content').each(function(i) {
        $(this).wrap('<div class="tabs_wrapper_details collateral_wrapper" />');
        var tabs_wrapper = $(this).parent();
        var tabs_control = $(document.createElement('ul')).addClass('tabs_control').insertBefore(this);
        
        $('.box-collateral', this).addClass('tab-item').each(function(j) {
        	var id = 'box_collateral_'+i+'_'+j;
        	$(this).addClass('content_'+id);
        	tabs_control.append('<li><h2><a href="#'+id+'">'+$('h2', this).html()+'</a></h2></li>');
        });            
        initToggleTabs(tabs_wrapper);
    });
};

function doAddtoButton(){	
	var $ = jQuery;
    if(isMobile == true){
        $('.products-grid li.item a.product-image').attr('href','javascript:void(0)');
    }
    $('.products-grid').slideUpDown({
		divHover : '.hover-slide'
	});
};

/**
*   showReviewTab
**/
function showReviewTab() {
	var $ = jQuery;
	
	var reviewTab = $('.tabs_control li:contains('+ review +')');
	if (reviewTab.size()) {
		// scroll to review tab
		$('html, body').animate({
			 scrollTop: reviewTab.offset().top
		}, 500);
		 
		 // show review tab
		reviewTab.click();
	} else if ($('#customer-reviews').size()) {
		// scroll to customer review
		$('html, body').animate({ scrollTop: $('#customer-reviews').offset().top }, 500);
	} else {
		return false;
	}
	return true;
};

function setupReviewLink() {
	jQuery('.product-view .product-essential .r-lnk').click(function (e) {
		if (showReviewTab())
			e.preventDefault();
	});
};

function persistentMenu() {
	var $ = jQuery;
    var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop();        
        if($('body').hasClass('adapt-0') == false){
            if (scroll_top > 150) {
                $('.em-area05').addClass('fixed-top');
    		} else {
                $('.em-area05').removeClass('fixed-top');
    		} 
        }else {
            $('.em-area05').removeClass('fixed-top');
		}    		  
	};
	$(window).scroll(function() {
		 sticky_navigation();
	});
    if($('body').hasClass('adapt-0') == true){
        $('.em-area05').removeClass('fixed-top');
    }
};

function doSlider($e, $move, $circular, $direction){
    if(jQuery($e + ' ul > li').size()>1){
        jQuery($e + ' > ul').addClass('slides');
        jQuery($e).csslider({
            move : $move,
            circular : $circular,
            direction : $direction,
            parentHidden : 'div.slider'
        });
    }
};

function initIsotope(){
	if(!isPhone){	
	var itemwidth = jQuery('.category-products ul.products-grid li').first().width();
	
	jQuery.Isotope.prototype._getMasonryGutterColumns = function() {
	    var gutter = this.options.masonry && this.options.masonry.gutterWidth || 0;
	        containerWidth = this.element.width();
	  
	    this.masonry.columnWidth = this.options.masonry && this.options.masonry.columnWidth ||
	                  // or use the size of the first item
	                  this.$filteredAtoms.outerWidth(true) ||
	                  // if there's no items, use size of container
	                  containerWidth;

	    this.masonry.columnWidth += gutter;

	    this.masonry.cols = Math.floor( ( containerWidth + gutter ) / this.masonry.columnWidth );
	    this.masonry.cols = Math.max( this.masonry.cols, 1 );
	  };

	  jQuery.Isotope.prototype._masonryReset = function() {
	    // layout-specific props
	    this.masonry = {};
	    // FIXME shouldn't have to call this again
	    this._getMasonryGutterColumns();
	    var i = this.masonry.cols;
	    this.masonry.colYs = [];
	    while (i--) {
	      this.masonry.colYs.push( 0 );
	    }
	  };

	  jQuery.Isotope.prototype._masonryResizeChanged = function() {
	    var prevSegments = this.masonry.cols;
	    // update cols/rows
	    this._getMasonryGutterColumns();
	    // return if updated cols/rows is not equal to previous
	    return ( this.masonry.cols !== prevSegments );
	  };
	jQuery('.category-products ul.products-grid').isotope({
		itemSelector : '.item',
		masonry : {
	      },
	      layoutMode : PRODUCTSGRID_POSITION_ABSOLUTE,
	});

	}	
};

function noticeClose(){
    jQuery(".special-gift .close").bind('click',function(){
		jQuery(".special-gift").toggle();
	})    
};

/* Handle Add to Cart 
function handleAddToCart(){
	jQuery('body').on('click', '.btn-cart',function(e) {
		if (typeof e !== 'undefined') e.preventDefault();
        		
		// Notify Cart
		var cartURL = './ajaxcart.html';
		jQuery.ajax({
			type: 'GET',
			url: cartURL,
			beforeSend: function () {
			},
			success: function (data) {			 
				changeHtmlCart(data);
			},
			dataType: "html"
		});
	});
};
*/
var cart_box;
function changeHtmlCart(data){
    jQuery('.wrapper_end').append(data);
    cart_box = new LightboxAJC('containerDiv');
    cart_box.open();
    jQuery('body').on('click', '#closeLink',function(e) {
		if (typeof e !== 'undefined') e.preventDefault();
        cart_box.close();
	});  	
};