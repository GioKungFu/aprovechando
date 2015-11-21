(function($) {

$.fn.selectUl = function(){    
    $('.toolbar-title select').css('display','none');
    $('.toolbar-switch .toolbar-dropdown').hover(
        function(){
            if ($(this).siblings().length > 1){
                $(this).parent().find('.toolbar-dropdown > ul').addClass('over');
            } else {
                $(this).addClass('over');
                // $('.toolbar-dropdown', this).css({width: $(this).width()+50});
            }

            $(this).parent().find('.toolbar-dropdown > ul').fadeIn(100).slideDown(100);
        },
        function(){
            var that = this;
            
            $(this).parent().find('.toolbar-dropdown > ul').fadeOut(100).slideUp(100, function(){
                if ($(this).siblings().length > 1){
                    $(that).parent().find('.toolbar-dropdown > ul').removeClass('over');
                } else {
                    $(that).removeClass('over');
                }
            });
        }
    );
}

$.fn.insertTitle = function(){
    $('<span class="current"/>').text($(this).find('option:selected').text())
    .insertBefore($(this));
}
$.fn.insertUl = function(){
    var numOptions = $(this).children().length;

    $('<div class="toolbar-dropdown"><span class="current"/><ul style="display:none" /></div>')
        .insertAfter($(this).toggleClass('.toolbar-switch').parent());

    var divSpan = $(this).toggleClass('.toolbar-switch').parent().parent().find('span');
    divSpan.append($(this).parent().children('select').find('option:selected').text());

    var divUl = $(this).toggleClass('.toolbar-switch').parent().parent().find('ul');
    for (var i = 0; i < numOptions; i++) {
        var text = '<li><a href ="'+$(this).find('option').eq(i).val()+'">'+$(this).find('option').eq(i).text()+'</a></li>';
       //$('<li />').text(text).appendTo(divUl);
       divUl.append(text);
    }

}


$.fn.selectUlManu = function(){    
    $('#sidebar_manu .toolbar-title select').css('display','none');
    $('#sidebar_manu .toolbar-dropdown').hover(
        function(){
            if ($(this).siblings().length > 1){
                $(this).parent().find('.toolbar-dropdown > ul').addClass('over');
            } else {
                $(this).addClass('over');
                // $('.toolbar-dropdown', this).css({width: $(this).width()+50});
            }

            $(this).parent().find('.toolbar-dropdown > ul').fadeIn(100).slideDown(100);
        },
        function(){
            var that = this;
            
            $(this).parent().find('.toolbar-dropdown > ul').fadeOut(100).slideUp(100, function(){
                if ($(this).siblings().length > 1){
                    $(that).parent().find('.toolbar-dropdown > ul').removeClass('over');
                } else {
                    $(that).removeClass('over');
                }
            });
        }
    );
}


$.fn.insertUlManu = function(){
    var numOptions = $(this).children().length;

    $('<div class="toolbar-dropdown"><span class="current"/><ul style="display:none" /></div>')
        .insertAfter($(this).toggleClass('toolbar-switch').parent());

    var divSpan = $(this).toggleClass('.toolbar-switch').parent().parent().find('span');
    divSpan.append($(this).parent().children('select').find('option:selected').text());

    var divUl = $(this).toggleClass('.toolbar-switch').parent().parent().find('ul');
    for (var i = 0; i < numOptions; i++) {
        var text = '<li><a href ="'+baseUrl+'catalogsearch/advanced/result/?name=&description=&sku=&price%5Bfrom%5D=&price%5Bto%5D=&manufacturer%5B%5D='+$(this).find('option').eq(i).val()+'">'+$(this).find('option').eq(i).text()+'</a></li>';
        
       //$('<li />').text(text).appendTo(divUl);
       divUl.append(text);
    }

}

$.fn.viewPC = function(){

    var isMobile = /iPhone|iPod|iPad|Phone|Mobile|Android|hpwos/i.test(navigator.userAgent);
    var isPhone = /iPhone|iPod|Phone|Android/i.test(navigator.userAgent);

    if(isMobile || isPhone)
        return false;
    return true;
}

$.fn.selectUlCategorySearch = function(){
    $('.input_cat .catsearch-dropdown').hover(
        function(){
            if ($(this).siblings().length > 1){
                $(this).parent().find('.catsearch-dropdown > ul').addClass('over');
            } else {
                $(this).addClass('over');
                // $('.toolbar-dropdown', this).css({width: $(this).width()+50});
            }

            $(this).parent().children('.catsearch-dropdown').children('ul').fadeIn(100).slideDown(100);
        },
        function(){
            var that = this;
            $(this).parent().children('.catsearch-dropdown').children('ul').fadeOut(100).slideUp(100, function(){
                if ($(this).parent().children().length > 1){
                    $(that).parent().children('.catsearch-dropdown').children('ul').removeClass('over');
                } else {
                    $(that).removeClass('over');
                }
            });
        }
    );

    $('.input_cat select').css('display','none');
}
$.fn.insertUlCategorySearch = function(){
    var $origSelect = $(this);
    var newId = $(this).attr('name') + '-ul';
    var numOptions = $(this).children().length;
    
    $('<div class="catsearch-dropdown"><span class="current"/><ul style="display:none" /></div>')
        .insertAfter($(this).toggleClass('.input_cat'));

    var divSpan = $(this).toggleClass('.input_cat').parent().parent().find('span.current');
    divSpan.append($(this).parent().children('select').find('option:selected').text());

    var divUl = $(this).toggleClass('.input_cat').parent().parent().find('ul');
    for (var i = 0; i < numOptions; i++) {
        var text = $(this).find('option').eq(i).text();
       $('<li />').text(text).appendTo(divUl);
    }
    
    $(this).parent().find('li').click(function() {
        var newSelect = $(this).index();
        var valSelect = $(this).text();
        $(this)
            .parent()
            .find('.unselected')
            .removeClass('unselected');
        $(this)
            .parent()
            .find('li')
            .not(this)
            .addClass('unselected');
        $($origSelect)
            .find('option:selected')
            .removeAttr('selected');
        $($origSelect)
            .find('option:eq(' + newSelect + ')')
            .attr('selected',true);
        $(this)
            .parent().parent()
            .find('.current').text(valSelect);
        $(this)
            .parent()
            .removeClass('over');
        //window.location.href = $($origSelect).find('option:eq(' + newSelect + ')').val();
        $(this).parent().fadeOut(100).slideUp(100);
    });

    // assuming that you don't want the 'select' visible:
    //$(this).hide();
    
    return $(this);
}


})(jQuery);