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
                          <? //categoria::miga_cate($producto['id_categoria'],'',1);  ?>
                          <? miga($producto['id_categoria']) ?>
                         <li class="product">
                          <strong><?= $producto['nombre'] ?></strong>
                         </li>

                        </ul>
                       </div>
                </div>
                   
                  <div class="grid_18 em-main-wrapper">
                     <div class="product-view">
                      <div class="product-essential">
                       <form action="./product.html" method="post" id="product_addtocart_form">
                        <div class="no-display">
                           <input type="hidden" name="product" value="166">
                           <input type="hidden" name="related_product" id="related-products-field" value=""/>
                        </div>
                        <div class="product-img-box" style="width:480px;">
                           
                            <p class="product-image">
                            <a class="cloud-zoom" id="image_zoom" rel="zoomWidth: 380,zoomHeight: 380,adjustX: 10, adjustY:-4" href="<?= base_url().'uploads/productos/g'.$imagenes[0]['imagen'] ?>">
                            <img src="<?= base_url().'uploads/productos/b'.$imagenes[0]['imagen'] ?>" alt="" title="HTC Touch Diamond">
                            </a>
                            <a id="zoom-btn" rel="lightbox[em_lightbox]" href="<?= base_url().'uploads/productos/g'.$imagenes[0]['imagen'] ?>" title="HTC Touch Diamond">Zoom</a>
                           </p>

                           <div class="slider more-views slideshow-more-views">
                            <div id="slider_moreview">
                             <ul>
                              <!--li class="item">
                                 <a class="cloud-zoom-gallery" rel="
                                  useZoom:'image_zoom',               
                                  smallImage:'<?// $dirfilep.'m'.$producto['imagen'] ?>', 
                                  adjustX:5, adjustY:-5" onclick="return false" href="<?// $dirfilep.'g'.$producto['imagen'] ?>">
                                 <img width="70px" height="70px" src="<?// $dirfilep.'s'.$producto['imagen'] ?>" alt=""/>
                                 </a>
                                 <a class="no-display" href="<?// $dirfilep.'g'.$producto['imagen'] ?>" rel="lightbox[em_lightbox]">lightbox moreview</a>
                              </li -->

                              <? foreach($imagenes as $image){ ?>
                              
                              <li class="item">
                                 <a class="cloud-zoom-gallery" rel="
                                  useZoom:'image_zoom',               
                                  smallImage:'<?= base_url().'uploads/productos/m'.$image['imagen'] ?>', 
                                  adjustX:5, adjustY:-5" onclick="return false" href="<?= base_url().'uploads/productos/g'.$image['imagen'] ?>">
                                 <img width="70px" height="70px" src="<?= base_url().'uploads/productos/t'.$image['imagen'] ?>" alt=""/>
                                 </a>
                                 <a class="no-display" href="<?= base_url().'uploads/productos/g'.$image['imagen'] ?>" rel="lightbox[em_lightbox]">lightbox moreview</a>
                              </li>

                              <? } ?>

                             </ul>
                            </div>
                           </div>
                           <script type="text/javascript">
                            jQuery('.cloud-zoom-gallery').click(function () {
                            jQuery('#zoom-btn').attr('href', this.href);
                            });
                           </script>
                        </div>
                        <div class="product-shop no-related">
                           <div class="product-shop-wrapper ">
                            <div class="product-name">
                             <h1><?= $producto['nombre'] ?></h1>

                            </div>
                            <p><br><strong>Marca: </strong><?= $producto['marca'] ?></a></p>
                            <p><strong>Referencia: </strong><?= $producto['referencia'] ?></a></p>
                            
                            <p class="availability in-stock">Disponibilidad: <span>En stock</span></p>
                            <div class="price-box">
                             <span class="regular-price" id="product-price-166">
                              <span class="price">$<?= number_format($producto['precio'], 0, ',', '.') ?></span>                                    
                             </span>
                            </div>
                            <div class="short-description">
                             <h2>Descripción rápida</h2>
                             <div class="std"><?= $producto['entradilla'] ?></div>
                            </div>
                            <div class="add-to-box">
                             <div class="add-to-cart">
                              <label for="qty">Cantidad:</label>
                              <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                              <div class="qty-ctl">
                                 <button title="Aumentar Cantidad" onclick="changeQty(1); return false;" class="increase">Aumentar</button>
                                 <button title="Disminuir cantidad" onclick="changeQty(0); return false;" class="decrease">Disminuir</button>
                              </div>
                              <button type="button" title="Add to Cart" class="button btn-cart"><span><span>Agregar al carrito</span></span></button>
                              <script type="text/javascript">
                                 function changeQty(increase) {
                                var qty = parseInt($('qty').value);
                                if ( !isNaN(qty) ) {
                                  qty = increase ? qty+1 : (qty>1 ? qty-1 : 1);
                                  $('qty').value = qty;
                                }
                                 }
                              </script>
                             </div>
                             
                            </div>
                            
                           </div>
                        </div>
                        <div class="clearer"></div>
                       </form>
                       <script type="text/javascript">
                        //<![CDATA[
                          var productAddToCartForm = new VarienForm('product_addtocart_form');
                          productAddToCartForm.submit = function(button, url) {
                            if (this.validator.validate()) {
                              var form = this.form;
                              var oldUrl = form.action;
                        
                              if (url) {
                                 form.action = url;
                              }
                              var e = null;
                              try {
                                this.form.submit();
                              } catch (e) {
                              }
                              this.form.action = oldUrl;
                              if (e) {
                                throw e;
                              }
                        
                              if (button && button != 'undefined') {
                                button.disabled = true;
                              }
                            }
                          }.bind(productAddToCartForm);
                        
                          productAddToCartForm.submitLight = function(button, url){
                            if(this.validator) {
                              var nv = Validation.methods;
                              delete Validation.methods['required-entry'];
                              delete Validation.methods['validate-one-required'];
                              delete Validation.methods['validate-one-required-by-name'];
                              // Remove custom datetime validators
                              for (var methodName in Validation.methods) {
                                if (methodName.match(/^validate-datetime-.*/i)) {
                                  delete Validation.methods[methodName];
                                }
                              }
                        
                              if (this.validator.validate()) {
                                if (url) {
                                  this.form.action = url;
                                }
                                this.form.submit();
                              }
                              Object.extend(Validation.methods, nv);
                            }
                          }.bind(productAddToCartForm);
                        //]]>
                       </script>
                      </div>
                      <div class="details_tab product-collateral">
                       
                       <div class="box-collateral box-additional" style="background:#FFF; padding:15px">
                        <h2>Descripcion y caracteristicas</h2>
                        <?= $producto['descripcion'] ?>
                       </div>
                       
                       
                       
                       
                       
                      </div>
                     </div>
                     <script type="text/javascript">
                      var lifetime = 3600;
                      var expireAt = Mage.Cookies.expires;
                      if (lifetime > 0) {
                        expireAt = new Date();
                        expireAt.setTime(expireAt.getTime() + lifetime * 1000);
                      }
                      Mage.Cookies.set('external_no_cache', 1, expireAt);
                     </script>
                  </div>  
                                  
              <? include("includes/masvistos.php") ?>
            
              <div class="clear"></div>
               
               </div>
            </div>
            
            
            <? $this->load->view('site/includes/footer') ?>

            
            </div>
         </div>
      </div>
   </body>
</html>