            <div class="wrapper_header">
               <div class="">
                  <div class="header-container">
                     <div class="header-top">
                        <div class="container_24">
                           <div class="inner_top">
                              <div class="grid_24">
                                 <div class="header-top-left">
                                    <p class="welcome-msg"></p>
                                    <ul class="links">
                                       <li class="login_login"><a title="Log In" href="<?= base_url() ?>main/registro">Ingresa</a></li>
                                       <li class="login_signup"><span> o </span><a title="Register" href="<?= base_url() ?>main/registro">Registrate</a></li>
                                    </ul>
                                 </div>
                                 <div class="header-top-right">
                                    <ul class="links">
                                       <li class="first"><a href="" title="My Account">Mi cuenta</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="header-bottom">
                        <div class="container_24">
                           <div class="inner_bottom">
                              <div class="grid_24">
                                 <div class="header-bottom-left"><a href="<?= base_url() ?>" title="Aprovechando  " class="logo"><strong>Aprovechando  </strong>
                                  <img src="<?= base_url() ?>resources/site/skin/galabigshop/images/logo_cop.png" alt="Aprovechando"/></a>
                                 </div>
                                 <div class="header-bottom-middle">
                                    <form id="search_mini_form" action="" method="get">
                                       <div class="form-search">
                                          <div class="input_cat">
                                             <?=  menu_principal() ?>
                                          </div>
                                          <div class="input_search">
                                             <input id="search" type="text" name="q" value="" class="input-text" maxlength="128" autocomplete="off">
                                             <button type="submit" title="Search" class="button"><span><span>Buscar</span></span></button>
                                             <div id="search_autocomplete" class="search-autocomplete" style="display: none;"></div>
                                             <script type="text/javascript">
                                                //<![CDATA[
                                                    var searchForm = new Varien.searchForm('search_mini_form', 'search', '');
                                                //]]>
                                             </script>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                          <div class="header-bottom-right">
                            <div class="dropdown-cart no_quickshop top-cart-inner" id="click">
                             <div class="summary block-title link-top-cart" id="link-top-cart">
                              <a id="topcartlink" class="amount" href="<?= base_url() ?>main/carrito"><span>Carrito (Ver)</span></a>
                              <span class="arrow-box">&nbsp;</span>
                             </div>
                             <!-- div class="top-cart-content" id="top_cart" style="display: none;">
                              <div class="block block-cart-top">
                               <div class="block-content">
                                <ol id="cart-sidebar" class="mini-products-list">
                                   <li class="item odd">
                                    <a href="./product.html" title=" Olympus Stylus 750 7.1MP Digital Camera" class="product-image">
                                    <img src="<?= base_url() ?>resources/site/media/catalog/product/img_product_002.jpg" width="70" alt=" Olympus Stylus 750 7.1MP Digital Camera"/></a>
                                    <div class="product-details">
                                     <a href="#" title="Remove This Item" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" class="btn-remove">Remove This Item</a>
                                     <a href="./product.html" title="Edit item" class="btn-edit">Edit item</a>
                                     <p class="product-name"><a href="./product.html"> Olympus Stylus 750 7.1MP Digital Camera</a></p>
                                     <span class="price">$161.94</span>                    
                                     x <strong>1</strong>
                                    </div>
                                   </li>
                                   <li class="item last even">
                                    <a href="./product.html" title=" Argus QC-2185 Quick Click 5MP Digital Camera" class="product-image">
                                    <img src="<?= base_url() ?>resources/site/media/catalog/product/img_product_003.jpg" width="70" alt=" Argus QC-2185 Quick Click 5MP Digital Camera"/></a>
                                    <div class="product-details">
                                     <a href="#" title="Remove This Item" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" class="btn-remove">Remove This Item</a>
                                     <a href="./product.html" title="Edit item" class="btn-edit">Edit item</a>
                                     <p class="product-name"><a href="./product.html"> Argus QC-2185 Quick Click 5MP Digital Camera</a></p>
                                     <span class="price">$37.49</span>                    
                                     x <strong>1</strong>
                                    </div>
                                   </li>
                                </ol>
                                <div class="summary">
                                   <div class="subtotal">
                                    <p class="amount"><a href="./cart.html">2 items</a></p>
                                    <span class="price">$199.43</span>                                
                                    <div class="price-tax"></div>
                                   </div>
                                </div>
                                <div class="actions">
                                   <button type="button" title="Checkout" class="button" onclick="setLocation('./login.html')"><span><span>Checkout</span></span></button>  
                                   <p class="go-cart"><a href="./cart.html"><span>Go to Shopping Cart</span></a></p>
                                </div>
                               </div>
                              </div>
                             </div -->
                            </div>
                                  <script type="text/javascript">//<![CDATA[
                                    jQuery(function($) {     
                                       var container = $("#top_cart");
                                      if(isMobile == true){
                                        $('#topcartlink').attr('href','javascript:void(0)');
                                        $("#link-top-cart").click(
                                          function( event ){
                                            container.slideToggle();
                                            $(this).toggleClass('click_top_cart');
                                          }
                                        );
                                      }else{
                                        // Hide Cart
                                        var timeout = null;
                                        function hideCart() {
                                          if (timeout)
                                          clearTimeout(timeout);
                                          timeout = setTimeout(function() {
                                          timeout = null;
                                          $('#top_cart').slideUp(300);
                                          $('#topcartlink').removeClass('over');
                                          }, 200);
                                        }
                                        
                                        // Show Cart
                                        function showCart() {       
                                          if (timeout)
                                          clearTimeout(timeout);
                                          timeout = setTimeout(function() {
                                          timeout = null;
                                          $('#top_cart').slideDown(300);
                                          $('#topcartlink').addClass('over');
                                          }, 200);
                                        }
                                        // Link Cart         
                                         $('#link-top-cart')
                                         .bind('mouseover', showCart)
                                         .bind('click', showCart)
                                         .bind('mouseout', hideCart);
                                        
                                        // Cart Content
                                         $('#top_cart')
                                         .bind('mouseover', showCart)
                                         .bind('click', hideCart)
                                         .bind('mouseout', hideCart);
                                      }
                                      
                                    });
                                  //]]>
                                  </script>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <p id="back-top" style="display: none;"><a title="Back to Top" href="#top">Ir al inicio</a></p>
               </div>
            </div>
