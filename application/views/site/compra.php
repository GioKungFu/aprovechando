<? $this->load->view('site/includes/tags') ?>
   
   </head>
   <body class="catalog-category-view categorypath-furniture-html category-furniture adapt-3">
      <div class="wrapper ">
         <div class="page two-columns-right">

          <? $this->load->view('site/includes/header') ?>

          <? $this->load->view('site/includes/menu') ?>

            
        
            <div class="wrapper_content">
               <div class="container_24 ">
				   <div class="grid_24 em-breadcrumbs">
					  <div class="breadcrumbs">
						 <ul>
							<li class="home">
							   <a href="<?= base_url() ?>" title="Home">Inicio</a>
							   <span class="separator">/ </span>
							</li>
							<li class="register">
							   <strong>Confirmación de compra</strong>
							</li>
						 </ul>
					  </div>
				   </div>
				   <div class="grid_24 em-main-wrapper">
					  <div class="std">
						 <div class="page-head">
							<h3>Gracias por su compra !</h3>
						 </div>
						 <? if (isset($form)) { ?>
						 <div class="col3-set">
							<div class="col-1">
							   <p style="line-height: 1.2em;"><small>Usted ha elegido comprar a través de Pagos Online.</small></p>
							   <p style="color: #888; font: 1.2em/1.4em georgia, serif;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta.</p>
							</div>
							<div class="col-2">
								   <p>	
								   		 Redireccionando al modulo de pagos, por favor espere un momento...<br><br><?= $form ?>
								   		
								   </p>	
							</div>
							<div class="col-3">
							   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta. Suspendisse convallis felis ac enim. Vivamus tortor nisl, lobortis in, faucibus et, tempus at, dui. Nunc risus. Proin scelerisque augue. Nam ullamcorper</p>
							   <p><strong style="color: #de036f;">Maecenas ullamcorper, odio vel tempus egestas, dui orci faucibus orci, sit amet aliquet lectus dolor et quam. Pellentesque consequat luctus purus.</strong></p>
							   <p>Nunc et risus. Etiam a nibh. Phasellus dignissim metus eget nisi.</p>
							   <div class="divider">&nbsp;</div>
							   <p>To all of you, from all of us at   Store - Thank you and Happy eCommerce!</p>
							   <p style="line-height: 1.2em;"><strong style="font: italic 2em Georgia, serif;">John Doe</strong><br/><small>Some important guy</small></p>
							</div>
						 </div>
						 <? } 
						 if($giro){ ?>
						 <div class="col3-set">
							<div class="col-1">
							   <p style="line-height: 1.2em;"><small>Usted ha elegido comprar a través de Giro Nacional.</small></p>
							   <p style="color: #888; font: 1.2em/1.4em georgia, serif;">Para realizar el pago debe hacer un giro a nombre de.... Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta.</p>
							</div>
							<div class="col-2">
							   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta. Suspendisse convallis felis ac enim. Vivamus tortor nisl, lobortis in, faucibus et, tempus at, dui. Nunc risus. Proin scelerisque augue. Nam ullamcorper</p>
							   <p><strong style="color: #de036f;">Maecenas ullamcorper, odio vel tempus egestas, dui orci faucibus orci, sit amet aliquet lectus dolor et quam. Pellentesque consequat luctus purus.</strong></p>
							   <p>Nunc et risus. Etiam a nibh. Phasellus dignissim metus eget nisi.</p>
							   <div class="divider">&nbsp;</div>
							   <p>To all of you, from all of us at  Demo Store - Thank you and Happy eCommerce!</p>
							   <p style="line-height: 1.2em;"><strong style="font: italic 2em Georgia, serif;">John Doe</strong><br/><small>Some important guy</small></p>
							</div>
							<div class="col-3">
							   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta. Suspendisse convallis felis ac enim. Vivamus tortor nisl, lobortis in, faucibus et, tempus at, dui. Nunc risus. Proin scelerisque augue. Nam ullamcorper</p>
							   <p><strong style="color: #de036f;">Maecenas ullamcorper, odio vel tempus egestas, dui orci faucibus orci, sit amet aliquet lectus dolor et quam. Pellentesque consequat luctus purus.</strong></p>
							   <p>Nunc et risus. Etiam a nibh. Phasellus dignissim metus eget nisi.</p>
							   <div class="divider">&nbsp;</div>
							   <p>To all of you, from all of us at  Store - Thank you and Happy eCommerce!</p>
							   <p style="line-height: 1.2em;"><strong style="font: italic 2em Georgia, serif;">John Doe</strong><br/><small>Some important guy</small></p>
							</div>
						 </div>

						 <? }
						 
						 if($consignacion){ ?>
						 <div class="col3-set">
							<div class="col-1">
							   <p style="line-height: 1.2em;"><small>Usted ha elegido comprar a través de Consignación Bancaria.</small></p>
							   <p style="color: #888; font: 1.2em/1.4em georgia, serif;">Para realizar el pago debe hacer una consignación a nombre de.... Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta.</p>
							</div>
							<div class="col-2">
							   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta. Suspendisse convallis felis ac enim. Vivamus tortor nisl, lobortis in, faucibus et, tempus at, dui. Nunc risus. Proin scelerisque augue. Nam ullamcorper</p>
							   <p><strong style="color: #de036f;">Maecenas ullamcorper, odio vel tempus egestas, dui orci faucibus orci, sit amet aliquet lectus dolor et quam. Pellentesque consequat luctus purus.</strong></p>
							   <p>Nunc et risus. Etiam a nibh. Phasellus dignissim metus eget nisi.</p>
							   <div class="divider">&nbsp;</div>
							   <p>To all of you, from all of us at  Demo Store - Thank you and Happy eCommerce!</p>
							   <p style="line-height: 1.2em;"><strong style="font: italic 2em Georgia, serif;">John Doe</strong><br/><small>Some important guy</small></p>
							</div>
							<div class="col-3">
							   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi luctus. Duis lobortis. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta nec, tempus vitae, iaculis semper, pede. Cras vel libero id lectus rhoncus porta. Suspendisse convallis felis ac enim. Vivamus tortor nisl, lobortis in, faucibus et, tempus at, dui. Nunc risus. Proin scelerisque augue. Nam ullamcorper</p>
							   <p><strong style="color: #de036f;">Maecenas ullamcorper, odio vel tempus egestas, dui orci faucibus orci, sit amet aliquet lectus dolor et quam. Pellentesque consequat luctus purus.</strong></p>
							   <p>Nunc et risus. Etiam a nibh. Phasellus dignissim metus eget nisi.</p>
							   <div class="divider">&nbsp;</div>
							   <p>To all of you, from all of us at  Store - Thank you and Happy eCommerce!</p>
							   <p style="line-height: 1.2em;"><strong style="font: italic 2em Georgia, serif;">John Doe</strong><br/><small>Some important guy</small></p>
							</div>
						 </div>

						 <? }
						 ?>
					  </div>
				   </div>
				   <div class="clear"></div>
				   

				   <div class="clear"></div>
				</div>
            </div>
            
            
            
            <? $this->load->view('site/includes/footer') ?>


            
            </div>
         </div>
      </div>


<script type="text/javascript">

	<? if (isset($form)) { ?>
	jQuery(document).ready(function(){

    	jQuery("#form_pago").submit();
	  		 
	});
	<? } ?>


</script>

   </body>
</html>