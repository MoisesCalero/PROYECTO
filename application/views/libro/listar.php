<h2>Lista de libros</h2>
<!--<div class="imagenes">
 <div id="carousel" class="carousel slide" data-ride="carousel">
 		 <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="<?=base_url()?>assets/img/bat.jpg" alt="First slide" height="275px;">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="<?=base_url()?>assets/img/res.jpg" alt="Second slide" height="275px;">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="<?=base_url()?>assets/img/bat.jpg" alt="Third slide" height="275px;">
			    </div>
 	 	</div>
	  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Anterior</span>
	  </a>
	  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Siguiente</span>
	  </a>
	</div>
</div> -->
		<?php foreach ($libros as $libro): ?>
			<div class="card" style="width: 18rem;">
	  			<img class="card-img-top" src="<?=base_url() ?>assets/img/logo.png" alt="cartel">
			  <div class="card-body">
			    <h5 class="card-title"><?=$libro->nombre ?></h5>
			    <p class="card-text"><?= $libro->descripcion?></p>
			    <?php if(isset($_SESSION['rol']) && isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"): ?>
			    <form action="<?=base_url()?>libro/update" method="post">
			    <input type="hidden" name="id" value="<?=$libro->id ?>"/>
   			    <input type="submit" class="btn btn-primary btn-admin" value="Editar este libro"/>
			    </form>
			    <?php endif;?>
			    <form action="<?=base_url()?>libro/detalles" method="post">
			    <input type="hidden" name="id" value="<?=$libro->id ?>"/>
   			    <input type="submit" class="btn btn-primary" value="Más información..."/>
			    </form>
			  </div>
			</div>
			<?php endforeach;?>