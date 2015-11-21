<? $this->load->view('site/includes/tags') ?>
   
   </head>
   <body class="cms-index-index cms-galabigshop-home adapt-3">
     
     <div class="wrapper">
         <div class="page one-column">
            
            <? $this->load->view('site/includes/header') ?>

            <div class="wrapper_content">
               <div class="container_24 ">
                  <div class="grid_24 em-area01">
                     <div class="widget widget-static-block ">
                        <div class="special-gift" style="background-color: #f06287;">
                           <p><span class="gift"><img src="<?= base_url() ?>resources/site/skin/galabigshop/images/icon_gift.png" alt="sample-banner"/></span>Hoy tenemos un regalo especial para nuestros clientes. <a title="Login to your account" href="./login.html">Ingresa a tu cuenta</a> y descubrelo <span class="close"><img src="<?= base_url() ?>resources/site/skin/galabigshop/images/icons_close.png" alt="sample-banner"/></span></p>
                        </div>
                        <div class="home-top-information">
                           <div class="grid_8 alpha">
                              <p><img src="<?= base_url() ?>resources/site/skin/galabigshop/images/icon_info_search.png" alt="sample-banner"/></p>
                              <p class="info-title">Todas las marcas</p>
                              <p class="phone">Temporius auterm quibusdam</p>
                           </div>
                           <div class="grid_8">
                              <p><img src="<?= base_url() ?>resources/site/skin/galabigshop/images/icon_info_shipping.png" alt="sample-banner"/></p>
                              <p class="info-title">Envios rapidos</p>
                              <p class="phone">Temporius auterm quibusdam</p>
                           </div>
                           <div class="grid_8 omega">
                              <p><img src="<?= base_url() ?>resources/site/skin/galabigshop/images/icon_info_support.png" alt="sample-banner"/></p>
                              <p class="info-title">24/7 Ayuda &amp; Soporte</p>
                              <p class="phone">Temporius auterm quibusdam</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>

            <div class="wrapper_content">
               <div class="wrapper_area0203">
                  <div class="container_24">
                     <div class="inner_slideshow">
                        <div class="grid_24">
                           <div class="widget widget-static-block menu">
                               <div class="menu-title">Categorías</div>
                               <div class="menu-content">
                                  <div class="menu-wrapper wrapper-4_3959">
                                     <div style="display: none;" class="menu-title-mobile" id="displayMenu_4_3959"><a href="javascript:void(0)">Categorías</a><span class="option">nav</span></div>
                                     <div class="em_nav" id="toogle_menu_4_3959">
                                        <ul class="vnav ">
                                       <!-- 0 -->
                                           <!-- 0 -->
                                           <? foreach ($categorias as $categoria){ ?>
                                           <li class="menu-item-link menu-item-depth-0  menu-item-parent">
                                              <a href="<?= base_url() ?>main/productos"><span><?= $categoria['nombre'] ?></span>
                                              </a>
                                           </li>
                                           <? } ?>
                                           <!-- 0 -->
                                       <!-- 0 -->
                                        </ul>
                                     </div>
                                  </div>
                                  <script type="text/javascript">
                                     function toogleMenuPro_4_3959(){
                                         var $=jQuery;
                                         var container = $("#toogle_menu_4_3959");
                                         var textClick = $("#displayMenu_4_3959");  
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
                                     toogleMenuPro_4_3959();
                                     });
                                     
                                     jQuery(window).bind('emadaptchange orientationchange', function() {
                                     toogleMenuPro_4_3959();
                                     });
                                  </script>
                               </div>
                            </div>
                           <style type="text/css">
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:880px; height:340px;}
                              @media only screen and (min-width: 1200px)  {
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:880px; height:340px;}
                              }
                              @media only screen and (min-width: 1000px) and (max-width: 1199px) {
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:700px; height:270px;}
                              }
                              @media only screen and (min-width: 600px) and (max-width: 999px) {
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:520px; height:200px;}
                              }
                              @media only screen and (min-width: 450px) and (max-width: 599px) {
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:430px; height:166px;}
                              }
                              @media only screen and (min-width: 380px) and (max-width: 449px) {
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:300px; height:115px;}
                              }
                              @media only screen and (min-width: 0px) and (max-width: 379px) {
                              #rev_slider_1_1490, #rev_slider_1_1490_wrapper { width:280px; height:108px;}
                              }
                            </style>
                            <div id="rev_slider_1_1490_wrapper" class="rev_slider_wrapper" style="margin:0px auto;background-color:#ffffff;padding:10px;margin-top:0px;margin-bottom:0px;">
                                           <div id="rev_slider_1_1490" class="rev_slider" style="display:none;">
                                              <ul>
                                                
                                                <? foreach ($slides as $imagen){?>

                                                 <!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->
                                                 <li data-transition="demo" data-slotamount="7" data-link="category.html" data-delay="5000">
                                                    <img src=" <?= base_url().'uploads/slides/b'.$imagen['imagen']?>" alt=""/>
                                                    <? if( isset($imagen['referencia']) && $imagen['referencia'] != "" ){ ?> 
                                                    <div class="caption lft bkg_color" data-x="0" data-y="250" data-speed="1000" data-start="500" data-easing="easeInOutExpo">
                                                       <p>bkg_color</p>
                                                    </div>
                                                    <? } ?>
                                                    <? if(isset($imagen['referencia']) &&  $imagen['referencia'] != "" ){ ?> 
                                                    <div class="caption lfl " data-x="20" data-y="258" data-speed="1000" data-start="1500" data-easing="easeInOutQuint">
                                                       <p style="font-size:370%;color:#fff;font-family:Roboto;font-weight:200;line-height:1"><?=nvl($imagen['referencia'])?></p>
                                                    </div>
                                                    <? } ?>
                                                    <!--div class="caption lfr " data-x="20" data-y="309" data-speed="1000" data-start="2000" data-easing="easeInOutCubic">
                                                       <p style="font-family:Roboto;color:#fff;font-size:130%;font-weight:300;font-style:italic;line-height:1"><?=nvl($imagen['vinculo'])?></p>
                                                    </div-->
                                                    <? if( isset($imagen['referencia']) &&  $imagen['vinculo'] != "" ){ ?> 
                                                    <div class="caption lfb btn" data-x="585" data-y="285" data-speed="1000" data-start="3000" data-easing="easeInOutBounce"><a href="#" style="line-height:1;font-weight:400;font-family:Roboto;"><?=nvl($imagen['vinculo'])?></a></div>
                                                    <? } ?>
                                                 </li>

                                                <? } ?> 

                                              </ul>
                                              <div class="tp-bannertimer"></div>
                                           </div>
                            </div>
                           <script type="text/javascript">
                              var tpj=jQuery;
                                            tpj.noConflict();
                                        
                              var revapi1;
                              
                              tpj(window).load(function() {
                              
                              if (tpj.fn.cssOriginal != undefined)
                                tpj.fn.css = tpj.fn.cssOriginal;
                              
                              if(tpj('#rev_slider_1_1490').revolution == undefined)
                                revslider_showDoubleJqueryError('#rev_slider_1_1490');
                              else
                                 revapi1 = tpj('#rev_slider_1_1490').show().revolution(
                                {
                                    delay:5000,
                                    startwidth:880,
                                    startheight:340,
                                    hideThumbs:200,
                                    
                                    thumbWidth:100,
                                    thumbHeight:50,
                                    thumbAmount:5,
                                    
                                    navigationType:"bullet",
                                    navigationArrows:"none",
                                    navigationStyle:"round",
                                    
                                    touchenabled:"on",
                                    onHoverStop:"on",
                                    
                                    navigationHAlign:"center",
                                    navigationVAlign:"bottom",
                                    navigationHOffset:0,
                                    navigationVOffset:20,
                                    
                                    soloArrowLeftHalign:"left",
                                    soloArrowLeftValign:"center",
                                    soloArrowLeftHOffset:"20",
                                    soloArrowLeftVOffset:"0",
                              
                                    soloArrowRightHalign:"right",
                                    soloArrowRightValign:"center",
                                    soloArrowRightHOffset:"20",
                                    soloArrowRightVOffset:"0",
                                    
                                    shadow:0,
                                    fullWidth:"off",
                              
                                    stopLoop:"off",
                                    stopAfterLoops:-1,
                                    stopAtSlide:-1,
                              
                                    shuffle:"off",
                                    
                                    hideSliderAtLimit:0,
                                    hideCaptionAtLimit:0,
                                    hideAllCaptionAtLilmit:0
                                });
                              });
                           </script>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="wrapper_content">
               <div class="container_24 ">
                  <div class="grid_24 em-main-wrapper">
                     <div class="tabs-widget ">
                       <div class="tabs_wrapper" id="emtabs_9eb7b1ac299035218a7c9843074e5146">
                          <!--ul class="tabs_control">
                             <li>
                                <a href="#tab_emtabs_9eb7b1ac299035218a7c9843074e5146_1"> <span class="icon tab_emtabs_9eb7b1ac299035218a7c9843074e5146_1"></span>All</a>
                             </li>
                             <li>
                                <a href="#tab_emtabs_9eb7b1ac299035218a7c9843074e5146_2"> <span class="icon tab_emtabs_9eb7b1ac299035218a7c9843074e5146_2"></span>Electronics</a>
                             </li>
                             <li>
                                <a href="#tab_emtabs_9eb7b1ac299035218a7c9843074e5146_3"> <span class="icon tab_emtabs_9eb7b1ac299035218a7c9843074e5146_3"></span>Fashion</a>
                             </li>
                             <li>
                                <a href="#tab_emtabs_9eb7b1ac299035218a7c9843074e5146_4"> <span class="icon tab_emtabs_9eb7b1ac299035218a7c9843074e5146_4"></span>Office</a>
                             </li>
                             <li>
                                <a href="#tab_emtabs_9eb7b1ac299035218a7c9843074e5146_5"> <span class="icon tab_emtabs_9eb7b1ac299035218a7c9843074e5146_5"></span>Daily Deals</a>
                             </li>
                          </ul -->
                          <div class="tab_content">
                             <div id="tab_emtabs_9eb7b1ac299035218a7c9843074e5146_1" class="tab-item content_tab_emtabs_9eb7b1ac299035218a7c9843074e5146_1">
                                <div class="category-products">
                                   <div class="widget em-widget-products-grid custom" id="ajaxproducts-99">
                                      <div class="widget-products">
                                         <ul class="ajax-product products-grid last even">
                                            
                                            <? foreach ($destacados as $destacado) { ?>


                                            <li class="box  item first" style=" width:280px; ">
                                               <!--show label product - label extension is required-->
                                               <span class="productlabels_icons">
                                               <span class="label new">
                                               <? if($destacado['estado'] == 'Nuevo y Destacado'){ ?>
                                               <span>Nuevo</span>
                                               <? } ?>
                                               </span>
                                               <? if($destacado['precio_oferta'] != 0){ ?>
                                               <span class="label bestseller">
                                               <span>Oferta</span>
                                               </span>
                                               <? } ?>
                                               </span>                                              
                                               <a href="<?= base_url() ?>main/producto/<?= $destacado['id_producto']?>/<?= url_title($destacado['nombre']) ?>" title="<?= $destacado['nombre'] ?>" class="product-image">                         
                                               <img src="<?= base_url().'uploads/productos/s'.$destacado['foto'] ?>" alt=" <?= $destacado['nombre'] ?>" style="width: 100%;"/></a>
                                               <div class="product-shop">
                                                  <div class="f-fix">
                                                     <!--product name-->
                                                     <h3 class="product-name"><a href="<?= base_url() ?>main/producto/<?= $destacado['id_producto']?>/<?= url_title($destacado['nombre']) ?>" title="<?= $destacado['nombre'] ?> "> <?= $destacado['nombre'] ?></a></h3>
                                                     <!--product description-->
                                                     <div class="price_review">
                                                        <? if($destacado['precio_oferta'] == 0){ ?>
                                                        <!--product price-->
                                                        <div class="price-box">
                                                           <span class="regular-price" id="product-price-45-widget-new-list">
                                                              <span class="price">$<?= number_format($destacado['precio'], 0, ',', '.') ?></span>                                    
                                                           </span>
                                                        </div>
                                                        <? }else{ ?>
                                                        <!--product price-->
                                                        <div class="price-box">
                                                           <p class="old-price">
                                                            <span class="price-label">Precio Normal</span>
                                                            <span class="price" id="old-price-157-widget-new-list">
                                                            $<?= number_format($destacado['precio'], 0, ',', '.') ?></span>
                                                           </p>
                                                           <p class="special-price">
                                                            <span class="price-label">Precio de Oferta</span>
                                                            <span class="price" id="product-price-157-widget-new-list">
                                                            $<?= number_format($destacado['precio_oferta'], 0, ',', '.') ?></span>
                                                           </p>
                                                        </div>
                                                        <? } ?>
                                                        <!--product reviews-
                                                        <div class="ratings">
                                                           <div class="rating-box">
                                                              <div class="rating" style="width:67%"></div>
                                                           </div>
                                                           <span class="amount"><a href="#" onclick="setLocation('./product.html')">1 Review(s)</a></span>
                                                        </div>-->
                                                     </div>
                                                     <div class="actions js-addcart hover-slide" name="product_0" style="display: none;">
                                                        <!--product add to cart-->
                                                        <div class="actions-cart"><form action="<?= base_url() ?>main/carrito" method="post"><input type="hidden" name="id_producto" value="<?= $destacado['id_producto'] ?>"><button type="submit" title="Add to Cart" class="button btn-cart" ><span><span>Agregar al carrito</span></span></button></form></div>
                                                        <!--product add to compare-wishlist-->
                                                        <ul class="add-to-links">
                                                           <!--li><a href="./login.html" class="link-wishlist" title="Add to Wishlist"><span class="text">Add to Wishlist</span></a></li>
                                                           <li><span class="separator">|</span><a href="#" class="link-compare" title="Add to Compare"><span class="text">Add to Compare</span></a></li -->
                                                        </ul>
                                                     </div>
                                                  </div>
                                               </div>
                                            </li>
                                            <? } ?>

                                         </ul>
                                      </div>
                                   </div>
                                   <!--p class="load-more-image">
                                      <a class="load-more" id="ajaxproducts-99-next" href="#">Load more</a>
                                   </p -->
                                   <script type="text/javascript">
                                      jQuery('#ajaxproducts-99 .widget-products ul.products-grid').infinitescroll({
                                        navSelector     : "#ajaxproducts-99-next:last",
                                        nextSelector    : "#ajaxproducts-99-next:last",
                                        itemSelector    : "#ajaxproducts-99 .widget-products ul.products-grid li.item",
                                        dataType        : 'html',
                                        loading: {
                                            img             : "<?= base_url() ?>resources/site/skin/galabigshop/images/ajax-loader.gif",
                                        },
                                        maxPage         : 4,
                                                        state           : {
                                            isPaused : true
                                        },
                                                        path: function(index) {
                                            return './ajaxproduct.html';
                                        }
                                      }, function(newElements, data, url){
                                                            jQuery("#ajaxproducts-99-next:last").show();
                                                        setTimeout(function(){
                                            afterLoadAjax('#ajaxproducts-99');                    
                                                   },500);
                                         });
                                                jQuery('#ajaxproducts-99-next').click(function(){
                                        jQuery('#ajaxproducts-99 .widget-products ul.products-grid').infinitescroll('retrieve');
                                        return false;
                                      });
                                            
                                   </script>
                                </div>
                                <script type="text/javascript">
                                   decorateGeneric($$('ul.products-grid'),['last','first','odd','even']);
                                </script>   
                             </div>
                          </div>
                       </div>
                    </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            
            <? $this->load->view('site/includes/footer') ?>
            
            </div>
         </div>
      </div>
   </body>
</html>