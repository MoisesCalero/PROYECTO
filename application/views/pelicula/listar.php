<h2>Lista de películas</h2>
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
		<?php foreach ($peliculas as $pelicula): ?>
			<div class="card" style="width: 18rem;">
	  			<img class="card-img-top" src="<?=base_url() ?>assets/img/logo.png" alt="cartel">
			  <div class="card-body">
			    <h5 class="card-title"><?=$pelicula->nombre ?></h5>
			    <p class="card-text"><?= $pelicula->descripcion?></p>
			    <form action="<?=base_url()?>pelicula/detalles" method="post">
			    <input type="hidden" name="id" value="<?=$pelicula->id ?>"/>
   			    <input type="submit" class="btn btn-primary" value="Más información..."/>
			    </form>
			  </div>
			</div>
			<?php endforeach;?>