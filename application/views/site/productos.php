<? $this->load->view('site/includes/tags') ?>
   
   </head>
   <body class="catalog-category-view categorypath-furniture-html category-furniture adapt-3">
      <div class="wrapper ">
         <div class="page two-columns-right">

       <? $this->load->view('site/includes/header') ?>
    
             <? $this->load->view('site/includes/menu') ?>
    
                
       <div class="wrapper_content">
               <div class="container_24 ">
                  <div class="clear"></div>
                  
                  <div class="grid_24 em-breadcrumbs">
                      <div class="breadcrumbs">
                        <ul>
                         <li class="home">
                          <a href="<?= base_url() ?>" title="Ir al inicio">Inicio</a>
                           <span class="separator">/ </span>
                         </li>
                          <? // miga($producto['id_categoria']) ?>
                         <li class="product">
                          <strong>Productos</strong>
                         </li>

                        </ul>
                       </div>
                  </div>


                  <div class="grid_18 push_6 em-main-wrapper">
                      <div class="category-list-products">
                        <div class="toolbar">
               <div class="toolbar-option">
                <p class="amount">
                 Items 1 to 15 of 37 total                    
                </p>
                <div class="limiter toolbar-switch">
                 <div class="toolbar-title">
                  <label>Show</label>
                  <select class="show" onchange="setLocation(this.value)">
                     <option value="#">
                      9         per page                
                     </option>
                     <option value="#" selected="selected">
                      15          per page                
                     </option>
                     <option value="#">
                      30          per page                
                     </option>
                  </select>
                 </div>
                </div>
                <div class="pages">
                 <strong>Page:</strong>
                 <ol>
                  <li class="current">1</li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li>
                     <a class="next i-next" href="#" title="Next">
                     <span>Next page</span>
                     <img src=".<?= base_url() ?>resources/site/skin/galabigshop/images/pager_arrow_right.gif" alt="Next" class="v-middle">
                     </a>
                  </li>
                 </ol>
                </div>
               </div>
               <div class="sorter">
                 <div class="sort-by">
                 <div class="sort-by toolbar-switch">
                  <div class="toolbar-title">
                     <label>Sort By</label>
                     <select class="sortby" name="sortby" onchange="setLocation(this.value)">
                      <option value="#" selected="selected">
                       Position                    
                      </option>
                      <option value="#">
                       Name                    
                      </option>
                      <option value="#">
                       Price                    
                      </option>
                     </select>
                  </div>
                  <a href="#" title="Set Descending Direction"><img src=".<?= base_url() ?>resources/site/skin/galabigshop/images/i_asc_arrow.gif" alt="Set Descending Direction" class="v-middle"></a>
                 </div>
                </div>
               </div>
               <div style="clear:both"></div>
            </div>
            
            <div class="category-products" id="category-products-ajax">
               <ul class="products-grid list-infinite">
                
                                            
                                            <? foreach ($destacados as $destacado) { ?>


                                            <li class="item-products item box" style="width :280px;">
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
                                                           <span class="price">$<?= number_format($destacado['precio'], 0, ',', '.') ?></span>                                    </span>
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
                                                        <div class="actions-cart"><button type="button" title="Add to Cart" class="button btn-cart" ><span><span>Agregar al carrito</span></span></button></div>
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
               
               <div style="display:none" class="toolbar-bottom">
                <div class="toolbar">
                 <div class="toolbar-option">
                  <p class="amount">
                     Items 1 to 15 of 37 total                    
                  </p>
                  <div class="limiter toolbar-switch">
                     <div class="toolbar-title">
                      <label>Show</label>
                      <select class="show .toolbar-switch" onchange="setLocation(this.value)">
                       <option value="#">
                        9         per page                
                       </option>
                       <option value="#" selected="selected">
                        15          per page                
                       </option>
                       <option value="#">
                        30          per page                
                       </option>
                      </select>
                     </div>
                     <div class="toolbar-dropdown">
                      <span class="current">
                      15          per page                </span>
                      <ul style="display:none">
                       <li><a href="#">
                        9         per page                </a>
                       </li>
                       <li><a href="#">
                        15          per page                </a>
                       </li>
                       <li><a href="#">
                        30          per page                </a>
                       </li>
                      </ul>
                     </div>
                  </div>
                  <div class="pages">
                     <strong>Page:</strong>
                     <ol>
                      <li class="current">1</li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li>
                       <a class="next i-next" href="#" title="Next">
                       <span>Next page</span>
                       <img src=".<?= base_url() ?>resources/site/skin/galabigshop/images/pager_arrow_right.gif" alt="Next" class="v-middle">
                       </a>
                      </li>
                     </ol>
                  </div>
                 </div>
                 <div class="sorter">
                  <p class="view-mode">
                     <label>View as:</label>
                     <strong title="Grid" class="grid">Grid</strong>&nbsp;
                     <a href="./furniture.html?mode=list" title="List" class="list">List</a>&nbsp;
                  </p>
                  <div class="sort-by">
                     <div class="sort-by toolbar-switch">
                      <div class="toolbar-title">
                       <label>Sort By</label>
                       <select class="sortby .toolbar-switch" name="sortby" onchange="setLocation(this.value)">
                        <option value="#" selected="selected">
                           Position                    
                        </option>
                        <option value="#">
                           Name                    
                        </option>
                        <option value="#">
                           Price                    
                        </option>
                       </select>
                      </div>
                      <div class="toolbar-dropdown">
                       <span class="current">
                       Position                    </span>
                       <ul style="display:none">
                        <li><a href="#">
                           Position                    </a>
                        </li>
                        <li><a href="#">
                           Name                    </a>
                        </li>
                        <li><a href="#">
                           Price                    </a>
                        </li>
                       </ul>
                      </div>
                      <a href="#" title="Set Descending Direction"><img src=".<?= base_url() ?>resources/site/skin/galabigshop/images/i_asc_arrow.gif" alt="Set Descending Direction" class="v-middle"></a>
                     </div>
                  </div>
                 </div>
                 <div style="clear:both"></div>
                </div>
               </div>
            </div>
                        <p class="load-more-image">
                           <a class="load-more" id="category-products-ajax-next" href="#">Load more</a>
                        </p>
                        <script type="text/javascript">
                           if($$('.toolbar .toolbar-option .pages ol li a')){
                            jQuery('#category-products-ajax .list-infinite').infinitescroll({
                              navSelector   : "#category-products-ajax-next:last",
                              nextSelector  : "#category-products-ajax-next:last",
                              itemSelector  : "#category-products-ajax .list-infinite li.item",
                              dataType    : 'html',
                                      loading: {
                           img        : ".<?= base_url() ?>resources/site/skin/galabigshop/images/ajax-loader.gif",
                           },
                              maxPage         : $$('.toolbar-bottom .toolbar .toolbar-option .pages ol li a').length,
                                                    state     : {
                                isPaused : true
                              },
                                                    path: function(index) {
                                return './ajaxproduct_category.html';
                              }
                            }, function(newElements, data, url){
                                                      jQuery("#category-products-ajax-next:last").show();
                                                    setTimeout(function(){
                                  afterLoadAjax('#category-products-ajax');
                                      },500);
                            });
                                                jQuery('#category-products-ajax-next').click(function(){
                              jQuery('#category-products-ajax .list-infinite').infinitescroll('retrieve');
                              return false;
                            });
                                              } 
                        </script>
                     </div>
                  </div>
                  <div class="grid_6 pull_18 em-col-left em-sidebar">
                     
             <div class="no_quickshop block block-related">
              <div class="block-title">
               <strong><span>Productos mas vistos</span></strong>
              </div>
              <div class="block-content">
               <ol class="mini-products-list" id="block-related">
               
                <? foreach ($masvistos as $visto) { ?>
                <li class="item odd">            
                   <div class="product">
                    <a href="<?= base_url() ?>main/producto/<?= $visto['id_producto']?>/<?= url_title($visto['nombre']) ?>" title="<?= $visto['nombre']?>" class="product-image"><img src="<?= base_url().'uploads/productos/t'.$visto['foto'] ?>" width="70" height="70" alt="<?= $visto['nombre']?>"></a>
                    <div class="product-details">
                     <p class="product-name"><a href="<?= base_url() ?>main/producto/<?= $visto['id_producto']?>/<?= url_title($visto['nombre']) ?>"><?= $visto['nombre'] ?></a></p>
                     <div class="price-box">
                      <span class="regular-price" id="product-price-162-related">
                      <span class="price">$<?= number_format($visto['precio'], 0, ',', '.') ?></span>                                    </span>
                     </div>
                     
                    </div>
                   </div>
                </li>
                <? } ?>
               
               </ol>
               <script type="text/javascript">decorateList('block-related', 'none-recursive')</script>
              </div>
             </div>

 

                     <div class="block block-layered-nav">
             <div class="block-title">
              <strong><span>Shop By</span></strong>
              <div class="icon_tab"></div>
             </div>
             <div class="block-content">
              <p class="block-subtitle">Shopping Options</p>
              <dl id="narrow-by-list">
               <dt class="category odd toogle-icon">Category</dt>
               <dd class="category odd" style="display: none;">
                <ol>
                   <li>
                    <a href="./category.html">Living Room</a>
                    (24)
                   </li>
                   <li>
                    <a href="./category.html">Bedroom</a>
                    (13)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_category(){
                  jQuery('#narrow-by-list dd.category').css('display','none');
                jQuery('#narrow-by-list dt.category').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.category').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.category").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_category();
                });
               </script>
               <dt class="contrast_ratio even toogle-icon">Contrast Ratio</dt>
               <dd class="contrast_ratio even" style="display: none;">
                <ol>
                   <li>
                    <a href="./category.html">10000:1</a>
                    (4)
                   </li>
                   <li>
                    <a href="./category.html">1500:1</a>
                    (3)
                   </li>
                   <li>
                    <a href="./category.html">3000:1</a>
                    (3)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_contrast_ratio(){
                  jQuery('#narrow-by-list dd.contrast_ratio').css('display','none');
                jQuery('#narrow-by-list dt.contrast_ratio').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.contrast_ratio').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.contrast_ratio").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_contrast_ratio();
                });
               </script>
               <dt class="price_shopby_default odd toogle-icon">Price</dt>
               <dd class="price_shopby_default odd" style="display: none;">
                <ol>
                   <li>
                    <a href="./category.html"><span class="price">$0.00</span> - <span class="price">$999.99</span></a>
                    (33)
                   </li>
                   <li>
                    <a href="./category.html"><span class="price">$2,000.00</span> - <span class="price">$2,999.99</span></a>
                    (3)
                   </li>
                   <li>
                    <a href="./category.html"><span class="price">$4,000.00</span> and above</a>
                    (1)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_price_shopby_default(){
                  jQuery('#narrow-by-list dd.price_shopby_default').css('display','none');
                jQuery('#narrow-by-list dt.price_shopby_default').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.price_shopby_default').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.price_shopby_default").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_price_shopby_default();
                });
               </script>
               <dt class="color even toogle-icon">Color</dt>
               <dd class="color even" style="display: none;">
                <ol>
                   <li>
                    <a href="./category.html">Black</a>
                    (7)
                   </li>
                   <li>
                    <a href="./category.html">Brown</a>
                    (6)
                   </li>
                   <li>
                    <a href="./category.html">Green</a>
                    (1)
                   </li>
                   <li>
                    <a href="./category.html">Red</a>
                    (5)
                   </li>
                   <li>
                    <a href="./category.html">Silver</a>
                    (4)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_color(){
                  jQuery('#narrow-by-list dd.color').css('display','none');
                jQuery('#narrow-by-list dt.color').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.color').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.color").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_color();
                });
               </script>
               <dt class="brand odd toogle-icon">Brand</dt>
               <dd class="brand odd" style="display: none;">
                <ol>
                   <li>
                    Acer                        (0)
                   </li>
                   <li>
                    Apple                        (0)
                   </li>
                   <li>
                    Dell                        (0)
                   </li>
                   <li>
                    Gateway                        (0)
                   </li>
                   <li>
                    IBM                        (0)
                   </li>
                   <li>
                    <a href="./category.html">Sony</a>
                    (1)
                   </li>
                   <li>
                    Toshiba                        (0)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_brand(){
                  jQuery('#narrow-by-list dd.brand').css('display','none');
                jQuery('#narrow-by-list dt.brand').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.brand').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.brand").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_brand();
                });
               </script>
               <dt class="manufacturer even toogle-icon">Manufacturer</dt>
               <dd class="manufacturer even" style="display: none;">
                <ol>
                   <li>
                    <a href="./category.html">AMD</a>
                    (5)
                   </li>
                   <li>
                    <a href="./category.html">Apple</a>
                    (3)
                   </li>
                   <li>
                    <a href="./category.html">Crucial</a>
                    (6)
                   </li>
                   <li>
                    <a href="./category.html">HTC</a>
                    (1)
                   </li>
                   <li>
                    <a href="./category.html">Intel</a>
                    (5)
                   </li>
                   <li>
                    <a href="./category.html">Logitech</a>
                    (4)
                   </li>
                   <li>
                    <a href="./category.html">Microsoft</a>
                    (4)
                   </li>
                   <li>
                    <a href="./category.html">Seagate</a>
                    (5)
                   </li>
                   <li>
                    <a href="./category.html">Western Digital</a>
                    (5)
                   </li>
                   <li>
                    <a href="./category.html">LG</a>
                    (4)
                   </li>
                   <li>
                    <a href="./category.html">Samsung</a>
                    (3)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_manufacturer(){
                  jQuery('#narrow-by-list dd.manufacturer').css('display','none');
                jQuery('#narrow-by-list dt.manufacturer').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.manufacturer').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.manufacturer").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_manufacturer();
                });
               </script>
               <dt class="shoe_type last odd toogle-icon">Shoe Type</dt>
               <dd class="shoe_type last odd" style="display: none;">
                <ol>
                   <li>
                    <a href="./category.html">Sandal</a>
                    (1)
                   </li>
                </ol>
               </dd>
               <script type="text/javascript">
                function toogleShopby_shoe_type(){
                  jQuery('#narrow-by-list dd.shoe_type').css('display','none');
                jQuery('#narrow-by-list dt.shoe_type').addClass('toogle-icon');
                  jQuery('#narrow-by-list dt.shoe_type').on('click', function(){
                    jQuery(this).toggleClass("active").parent().find("dd.shoe_type").slideToggle();
                  });
                };
                
                jQuery(document).ready(function(){
                toogleShopby_shoe_type();
                });
               </script>
              </dl>
              <script type="text/javascript">decorateDataList('narrow-by-list')</script>
             </div>
          </div>
                     <div class="block_banner">
                        <div class="widget widget-static-block ">
                           <div><a title="sample_banner" href="#"><img class="fluid" src="<?= base_url() ?>resources/site/media/wysiwyg/banner_left.png" alt="sample_banner"></a></div>
                        </div>
                     </div>
                     
                     <div class="block block-list block-compare">
                        <div class="block-title">
                           <strong><span>Compare Products                    </span></strong>
                        </div>
                        <div class="block-content">
                           <p class="empty">You have no items to compare.</p>
                        </div>
                     </div>
                     <script type="text/javascript">
                        //<![CDATA[
                            function validatePollAnswerIsSelected()
                            {
                                var options = $$('input.poll_vote');
                                for( i in options ) {
                                    if( options[i].checked == true ) {
                                        return true;
                                    }
                                }
                                return false;
                            }
                        //]]>
                     </script>
                     
                     <div class="block block-poll">
                        <div class="block-title">
                           <strong><span>Community Poll</span></strong>
                        </div>
                        <form id="pollForm" action="./index.html" method="post" onsubmit="return validatePollAnswerIsSelected();">
                           <div class="block-content">
                              <p class="block-subtitle">What is your favorite  feature?</p>
                              <ul id="poll-answers">
                                 <li class="odd">
                                    <input type="radio" name="vote" class="radio poll_vote" id="vote_5" value="5">
                                    <span class="label"><label for="vote_5">Layered Navigation</label></span>
                                 </li>
                                 <li class="even">
                                    <input type="radio" name="vote" class="radio poll_vote" id="vote_6" value="6">
                                    <span class="label"><label for="vote_6">Price Rules</label></span>
                                 </li>
                                 <li class="odd">
                                    <input type="radio" name="vote" class="radio poll_vote" id="vote_7" value="7">
                                    <span class="label"><label for="vote_7">Category Management</label></span>
                                 </li>
                                 <li class="last even">
                                    <input type="radio" name="vote" class="radio poll_vote" id="vote_8" value="8">
                                    <span class="label"><label for="vote_8">Compare Products</label></span>
                                 </li>
                              </ul>
                              <script type="text/javascript">decorateList('poll-answers');</script>
                              <div class="actions">
                                 <button type="submit" title="Vote" class="button"><span><span>Vote</span></span></button>
                              </div>
                           </div>
                        </form>
                     </div>
                     
                     <div class="block block-tags">
                        <div class="block-title">
                           <strong><span>Popular Tags</span></strong>
                        </div>
                        <div class="block-content">
               <ul class="tags-list">
                <li><a href="#" style="font-size:98.333333333333%;">Camera</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">Hohoho</a></li>
                <li><a href="#" style="font-size:145%;">SEXY</a></li>
                <li><a href="#" style="font-size:75%;">Tag</a></li>
                <li><a href="#" style="font-size:121.66666666667%;">Test</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">bones</a></li>
                <li><a href="#" style="font-size:110%;">cool</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">cool t-shirt</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">crap</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">good</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">green</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">hip</a></li>
                <li><a href="#" style="font-size:75%;">laptop</a></li>
                <li><a href="#" style="font-size:75%;">mobile</a></li>
                <li><a href="#" style="font-size:75%;">nice</a></li>
                <li><a href="#" style="font-size:75%;">notebook</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">phone</a></li>
                <li><a href="#" style="font-size:98.333333333333%;">red</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">tight</a></li>
                <li><a href="#" style="font-size:86.666666666667%;">young</a></li>
               </ul>
               <div class="actions">
                <a href="#">View All Tags</a>
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
   </body>
</html>