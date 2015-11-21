         <div class="grid_6 em-col-right em-sidebar">
             
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
             
             <div class="block_banner">
              <div class="widget widget-static-block ">
               <div><a title="sample_banner" href="#"><img class="fluid" src="<?= base_url() ?>resources/site/media/wysiwyg/banner_left.png" alt="sample_banner"></a></div>
              </div>
             </div>

         </div>