<? $this->load->view('site/includes/tags') ?>
   
   </head>
   <body  class="checkout-cart-index adapt-3">
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
								<a href="<?= base_url() ?>" title="Home">Inicio</a>
								<span class="separator">/ </span>
							 </li>
							 <li class="shopping_cart">
								<strong>Carrito de compras</strong>
							 </li>
						  </ul>
					   </div>
				  </div>
				  <div class="grid_24 em-main-wrapper">
					  <div class="cart">
						  <div class="page-title title-buttons">
							 <h1>Carrito de compras</h1>
							 <ul class="checkout-types">
								<li>    <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout" onclick="window.location='./login.html';"><span><span>Proceed to Checkout</span></span></button></li>
							 </ul>
						  </div>
						  <form action="./cart.html" method="post">
							 <fieldset>
								<table id="shopping-cart-table" class="data-table cart-table">
								   <colgroup>
									  <col width="1">
									  <col>
									  <col width="1">
									  <col width="1">
									  <col width="1">
									  <col width="1">
									  <col width="1">
								   </colgroup>
								   <thead>
									  <tr class="first last">
										 <th rowspan="1"><span class="nobr">Imagen</span></th>
										 <th rowspan="1">Nombre del producto</th>
										 <th class="a-center" colspan="1"><span class="nobr">Precio</span></th>
										 <th rowspan="1" class="a-center">Cantidad</th>
										 <th class="a-center" colspan="1">Subtotal</th>
										 <th rowspan="1" class="a-center last">&nbsp;</th>
									  </tr>
								   </thead>
								   <tfoot>
									  <tr class="first last">
										 <td colspan="50" class="a-right last">
											<button type="button" title="Continue Shopping" class="button btn-continue" onclick="setLocation('<?= base_url() ?>main/productos')"><span><span>Continuar comprando</span></span></button>
											<button type="button"  title="Clear Shopping Cart" class="button btn-continue"   onclick="setLocation('<?= base_url() ?>producto/destruirCarrito')"><span><span>Vaciar el carrito de compras</span></span></button>
											<!--[if lt IE 8]>
											<input type="hidden" id="update_cart_action_container" />
											<script type="text/javascript">
											   //<![CDATA[
												   Event.observe(window, 'load', function()
												   {
													   // Internet Explorer (lt 8) does not support value attribute in button elements
													   $emptyCartButton = $('empty_cart_button');
													   $cartActionContainer = $('update_cart_action_container');
													   if ($emptyCartButton && $cartActionContainer) {
														   Event.observe($emptyCartButton, 'click', function()
														   {
															   $emptyCartButton.setAttribute('name', 'update_cart_action_temp');
															   $cartActionContainer.setAttribute('name', 'update_cart_action');
															   $cartActionContainer.setValue('empty_cart');
														   });
													   }
											   
												   });
											   //]]>
											</script>
											<![endif]-->
										 </td>
									  </tr>
								   </tfoot>
								   <tbody>
                                        <? 

                                        $subtotal = 0;
                                        $total = 0;

                                        if($numProductos == 0){ ?>
                                        <tr class="hide empty-cart">
                                            <td colspan="7">
                                                <span style="color:#67B08D"> Parece que su carrito de compras está vacío, intente buscar nuestros <a href="<?= site_url()?>main/productos">productos</a>.</span>
                                            </td>
                                        </tr>
                                        <? }else{ 

								  		for($p =0; $p<$nf; $p++){ 
								  			if($carrito['estado'][$p]){
								  			$subtotal = $carrito['precio'][$p] * $carrito['cantidad'][$p];	
								  			$total = $total + $subtotal;
								  			?>	
                                      
                                      <tr  class="last even">
										 <td><a href="<?= base_url() ?>main/producto/<?= $carrito['producto'][$p] ?>" title="<?= $carrito['nombre'][$p] ?>" class="product-image"><img src="<?= base_url().'uploads/productos/t'.$carrito['imagen'][$p] ?>" width="70" height="70" alt="<?= $carrito['nombre'][$p] ?>"/></a></td>
										 <td>
											<h2 class="product-name">
											   <a href="<?= base_url() ?>main/producto/<?= $carrito['producto'][$p] ?>"> <?= $carrito['nombre'][$p] ?></a>
											</h2>
										 </td>
										 <td class="a-right">
											<span class="cart-price">
											<span class="price">$<?= number_format($carrito['precio'][$p], 0, ',', '.') ?></span>                
											</span>
										 </td>
										 <td class="a-center">
											<div class="qty_cart">
											   <input id="cart[133][qty]" name="cart[133][qty]" value="<?= $carrito['cantidad'][$p] ?>" size="4" title="Qty" class="input-text qty" maxlength="12">
											   <div class="qty-ctl">
												  <button title="Increase Qty" onclick="qtyUp(133); return false;" class="increase">increase</button>
												  <button title="Decrease Qty" onclick="qtyDown(133); return false;" class="decrease">decrease</button>
											   </div>
											   <script type="text/javascript">
												  function qtyDown(id){
													  var qty_el = document.getElementById('cart[' + id + '][qty]');
													  var qty = qty_el.value;
													  if( !isNaN( qty ) && qty > 1 ){
														  qty_el.value--;
													  }         
													  return false;
												  }
												  
												  function qtyUp(id){
													  var qty_el = document.getElementById('cart[' + id + '][qty]');
													  var qty = qty_el.value; 
													  if( !isNaN( qty )) {
														  qty_el.value++;
													  }
													  return false;
												  }
											   </script>
											</div>
										 </td>
										 <td class="a-right">
											<span class="cart-price">
											<span class="price">$<?= number_format($subtotal, 0, ',', '.') ?></span>                            
											</span>
										 </td>
										 <td class="a-center last"><a href="#" title="Remove item" class="btn-remove btn-remove2" onClick="eliminar_fila(<?= $p?>)" >Eliminar item</a></td>
									  </tr>
									  <?  } 
										}
									   } ?>
								   </tbody>
								</table>
								<script type="text/javascript">decorateTable('shopping-cart-table')</script>
							 </fieldset>
						  </form>
						  <div class="cart-collaterals">
							 <div class="col2-set">
								<div class="col-1">
								   <div class="coupon-shipping">
									  <div class="shipping">
										 <h2>Costos de envio</h2>
										 <div class="shipping-form">
											<form action="./cart.html" method="post" id="shipping-zip-form">
											   <p>Los envios tienen un costo fijo de $20.000</p>
											   <ul class="form-list">
												  <li>
													 <div class="input-box">
														
													 </div>
												  </li>
											   </ul>
											   <div class="buttons-set">
												  <!-- button type="button" title="Get a Quote" onclick="coShippingMethodForm.submit()" class="button"><span><span>Get a Quote</span></span></button -->
											   </div>
											</form>
											 </div>
									  </div>
									  <form id="discount-coupon-form" action="" method="post">
										 <div class="discount">
											<h2>Descuentos</h2>
											<div class="discount-form">
											   <label for="coupon_code">No tenemos cupones de descuento activos.</label>
											   <input type="hidden" name="remove" id="remove-coupone" value="0">
											   <div class="input-box">
												  <input class="input-text" id="coupon_code" name="coupon_code" value="" disabled />
											   </div>
											   <div class="buttons-set">
												  <button type="button" title="Apply Coupon" class="button" disabled onclick="discountForm.submit(false)" value="Apply Coupon"><span><span>Aplicar</span></span></button>
											   </div>
											</div>
										 </div>
									  </form>
									  <script type="text/javascript">
										 //<![CDATA[
										 var discountForm = new VarienForm('discount-coupon-form');
										 discountForm.submit = function (isRemove) {
											 if (isRemove) {
												 $('coupon_code').removeClassName('required-entry');
												 $('remove-coupone').value = "1";
											 } else {
												 $('coupon_code').addClassName('required-entry');
												 $('remove-coupone').value = "0";
											 }
											 return VarienForm.prototype.submit.bind(discountForm)();
										 }
										 //]]>
									  </script>
								   </div>
								   <div class="totals">
									  <h2>Total Orden</h2>
									  <table id="shopping-cart-totals-table">
										 <colgroup>
											<col>
											<col width="1">
										 </colgroup>
										 <tfoot>
											<tr>
											   <td style="" class="a-right" colspan="1">
												  <strong>Total</strong>
											   </td>
											   <td style="" class="a-right">
												  <strong><span class="price">$<?= number_format($total+20000, 0, ',', '.') ?></span></strong>
											   </td>
											</tr>
										 </tfoot>
										 <tbody>
											<tr>
											   <td style="" class="a-right" colspan="1">
												  Subtotal    
											   </td>
											   <td style="" class="a-right">
												  <span class="price">$<?= number_format($total, 0, ',', '.') ?></span>    
											   </td>
											</tr>
										 </tbody>
										 <tbody>
											<tr>
											   <td style="" class="a-right" colspan="1">
												  Envío    
											   </td>
											   <td style="" class="a-right">
												  <span class="price">$20.000</span>    
											   </td>
											</tr>
										 </tbody>
									  </table>
									  <ul class="checkout-types">
										 <li><button type="button" title="Proceder a pagar" class="button btn-proceed-checkout btn-checkout" onclick="comprobar_sesion()"><span><span>Proceder a pagar</span></span></button></li>
									  </ul>
									   

								   </div>
									   <div class="totals" style="float: right; display:none" id="modo-pago">
									   	  <h5>Medios de Pago</h5>
										  <form name="confirmar" method="post" action="<?= base_url() ?>producto/compra">
										  <ul class="checkout-types">
											 <li><input type="radio"  id="product-1-1"  name="tipo_pago" value="pagosonline"> PagosOnLine </li>
											 <li><input type="radio"  id="product-1-2"  name="tipo_pago" value="giro"> Giro Nacional </li>
											 <li><input type="radio"  id="product-1-3"  name="tipo_pago" value="consignacion"> Consignación bancaria </li>
											 <li>&nbsp;</li>
										 	 <li><button type="submit" title="Confirmar" class="button btn-proceed-checkout btn-checkout" onclick=""><span><span>Confirmar</span></span></button></li>
										  </ul>
										  </form>
									   </div>

								</div>
							 </div>
							
                            
                             <div class="slider">
								<div class="crosssell" id="slider_crosell">
								   <h2>Based on your selection, you may be interested in the following items:</h2>
								   <ul class="products-grid" id="crosssell-products-list">
									  <li class="item odd" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="Apple MacBook Pro MA464LL/A 15.4&quot; Notebook PC">
										 <img style="height:280px;" src="<?= base_url() ?>resources/site/media/catalog/product/img_product_0028.jpg" alt="Apple MacBook Pro MA464LL/A 15.4&quot; Notebook PC"></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">Apple MacBook Pro MA464LL/A 15.4" Notebook PC</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-25">
											   <span class="price">$2,299.99</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:87%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/25/" class="r-lnk">3 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/25/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart" ><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="./#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
									  <li class="item even" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="AT&amp;T 8525 PDA">
										 <img width="280px;" height="280px;" src=".<?= base_url() ?>resources/site/media/catalog/product/img_product_0020.jpg" alt="AT&amp;T 8525 PDA"></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">AT&amp;T 8525 PDA</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-19">
											   <span class="price">$199.99</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:71%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/19/" class="r-lnk">3 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/19/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart" ><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
									  <li class="item odd" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="Nokia 2610 Phone"><img width="280px;" height="280px;" src="<?= base_url() ?>resources/site/media/catalog/product/img_product_0021.jpg" alt="Nokia 2610 Phone" style="width: 100%;"/></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">Nokia 2610 Phone</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-16">
											   <span class="price">$149.99</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:51%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/16/" class="r-lnk">3 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/16/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart" ><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="./#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
									  <li class="item even" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="Toshiba M285-E 14&quot;"><img width="280px;" height="280px;" src="<?= base_url() ?>resources/site/media/catalog/product/img_product_0022.jpg" alt="Toshiba M285-E 14&quot;" style="width: 100%;"/></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">Toshiba M285-E 14"</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-28">
											   <span class="price">$1,599.99</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:70%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/28/" class="r-lnk">2 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/28/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart" "><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="./#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
									  <li class="item odd" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="Samsung MM-A900M Ace"><img width="280px;" height="280px;" src="./media/catalog/product/img_product_0023.jpg" alt="Samsung MM-A900M Ace" style="width: 100%;"/></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">Samsung MM-A900M Ace</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-20">
											   <span class="price">$150.00</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:71%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/20/" class="r-lnk">5 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/20/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart" "><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="./#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
									  <li class="item even" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="BlackBerry 8100 Pearl"><img width="280px;" height="280px;" src="<?= base_url() ?>resources/site/media/catalog/product/img_product_0024.jpg" alt="BlackBerry 8100 Pearl" style="width: 100%;"/></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">BlackBerry 8100 Pearl</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-17">
											   <span class="price">$349.99</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:73%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/17/" class="r-lnk">1 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/17/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart" ><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="./#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
									  <li class="item last odd" style="margin-right: 20px; width: 280px">
										 <a class="product-image" href="./product.html" title="CN Clogs Beach/Garden Clog"><img width="280px;" height="280px;" src="<?= base_url() ?>resources/site/media/catalog/product/img_product_0025.jpg" alt="CN Clogs Beach/Garden Clog" style="width: 100%;"/></a>
										 <div class="product-details">
											<h3 class="product-name"><a href="./product.html">CN Clogs Beach/Garden Clog</a></h3>
											<div class="price-box">
											   <span class="regular-price" id="product-price-83">
											   <span class="price">$15.99</span>                                    </span>
											</div>
											<div class="ratings">
											   <div class="rating-box">
												  <div class="rating" style="width:62%"></div>
											   </div>
											   <p class="rating-links">
												  <a href="./review/product/list/id/83/" class="r-lnk">3 Review(s)</a>
												  <span class="separator">|</span>
												  <a href="./review/product/list/id/83/#review-form" class="r-lnk">Add Your Review</a>
											   </p>
											</div>
											<button type="button" title="Add to Cart" class="button btn-cart"><span><span>Add to Cart</span></span></button>
											<ul class="add-to-links">
											   <li><a href="./login.html" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li>
											   <li><span class="separator">|</span> <a href="./#" class="link-compare" title="Add to Compare">Add to Compare</a></li>
											</ul>
										 </div>
									  </li>
								   </ul>
								   <script type="text/javascript">decorateList('crosssell-products-list', 'none-recursive')</script>
								</div>
							 </div>
						  </div>
					   </div>
					</div>
                  
                  <div class="clear"></div>
               </div>
            </div>            
            
            
            
          <? $this->load->view('site/includes/footer') ?>

          <script type="text/javascript">

/*
			jQuery(document).ready(function() {
			    
			    jQuery('input[type=checkbox]').live('click', function(){
			        var parent = jQuery(this).parent().attr('id');
			        jQuery('#'+parent+' input[type=checkbox]').removeAttr('checked');
			        jQuery(this).attr('checked', 'checked');
			    });

			});

*/			
			function eliminar_fila(id){
				jQuery.post('<?= site_url()?>producto/borrarProductoCarrito', 
						{ id : id },
						function(data){
						  if(data == "1"){
							  
							/* getCarrito('producto-tabla_carrito');
							
							 if(jQuery("#shopping-cart-table").length){
								
								
								var precio_prod= parseInt(jQuery("#precio_val"+id).html());
								var total= parseInt(jQuery("#total_val").html());
								
								pr_total= total-precio_prod;
							
							jQuery("#total_val").html(pr_total);
							 pr_total= number_format (pr_total, 0, '.', '.') ;
							jQuery("#total_tt").html("$"+pr_total);
							
							//jQuery("#sub-cart .close").click();
							
							deleteHeaderRow();
							
							//jQuery("#prod"+id+"").remove(); 
							 }
						  
						 
						 */
						 window.location = "<?= site_url()?>main/carrito";
						 }

						 });

			}



			function comprobar_sesion(){
				
				jQuery.post('<?= site_url()?>cliente/comprobarSesion', 
						{ id : 0 },
						function(data){
						  if(data == "1"){
							  
							jQuery("#modo-pago").css("display", "block");	
						
						  }else{

						  	 window.location = "<?= site_url()?>main/registro";
						  }

						 });

			}


          </script>
            
            
         </div>
      </div>


   </body>
</html>