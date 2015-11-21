<? $this->load->view('site/includes/tags') ?>

</head>
<body>

<? $this->load->view('site/includes/header') ?>


<section id="Guia">
    <div class="areaGuia auto_margin">
        <div class="url"><a href="<?= base_url() ?>main/">Inicio</a>  /  Contenidos</div>
        <h1> <?= $contenido['titulo'] ?></h1>
    </div>
</section>

<section id="Main">
    <div class="areaContents auto_margin">

        <div class="iContt">
           

            <?= $contenido['contenido'] ?>
            <p class="clear"></p>
        </div>
    </div>
</section>
<div class="mtop" style="margin-top: -16px;"></div>



<? $this->load->view('site/includes/footer') ?>



</body>
</html>
