<h2>Lista de series</h2>
<!--<div class="imagenes">
	<div id="carousel" class="carousel slide" data-ride="carousel">
 		 <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="fondo.png" alt="First slide" height="275px;">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="batman2.png" alt="Second slide" height="275px;">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="batman3.png" alt="Third slide" height="275px;">
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
		<div class="contenedor" align="center">
		<?php foreach ($series as $serie): ?>
			<div class="card" style="width: 18rem;">
	  			<img class="card-img-top" src="<?=base_url() ?>assets/img/logo.png" alt="cartel">
			  <div class="card-body">
			    <h5 class="card-title"><?=$serie->nombre ?></h5>
			    <p class="card-text"><?= $serie->descripcion?></p>
			    <?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"): ?>
			    <form action="<?=base_url()?>pelicula/update" method="post">
			    <input type="hidden" name="id" value="<?=$serie->id ?>"/>
   			    <input type="submit" class="btn btn-primary btn-admin" value="Editar esta película"/>
			    </form>
			    <?php endif;?>
			    <form action="<?=base_url()?>serie/detalles" method="post">
			    <input type="hidden" name="id" value="<?=$serie->id ?>"/>
   			    <input type="submit" class="btn btn-primary" value="Más información..."/>
			    </form>
			  </div>
			</div>
			<?php endforeach;?>
			
		</div>