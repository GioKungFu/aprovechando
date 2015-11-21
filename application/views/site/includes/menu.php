<div class="wrapper_menu_hoz">
        <div class="container_24 ">
          <div class="grid_24 em-area05">
           <div class="menu-wrapper wrapper-5_4864">
            <div style="display: none;" class="menu-title-mobile" id="displayMenu_5_4864"><a href="javascript:void(0)">Categorías</a><span class="option">nav</span></div>
              <div class="em_nav" id="toogle_menu_5_4864">
                 <? menu_superior(0,0) ?>
             </div>
           </div>
           <script type="text/javascript">
            function toogleMenuPro_5_4864(){
              var $=jQuery;
              var container = $("#toogle_menu_5_4864");
              var textClick = $("#displayMenu_5_4864"); 
              if($("body").hasClass("adapt-0")==true || isPhone == true){
                textClick.show();
            container.hide();
            textClick.unbind('click');
                textClick.bind('click',function(){
                  container.slideToggle();
                });
              }else{
                textClick.hide();
                container.show();
              }
            };
            
            jQuery(document).ready(function(){
            toogleMenuPro_5_4864();
            });
            
            jQuery(window).bind('emadaptchange orientationchange', function() {
            toogleMenuPro_5_4864();
            });
           </script>
          </div>
          <div class="clear"></div>
        </div>
        </div>