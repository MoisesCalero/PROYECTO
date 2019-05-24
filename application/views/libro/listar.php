<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
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
<?php
if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium"):
?>
<form action="<?=base_url()?>libro/crear" method="post">
<input type="hidden" name="id" value="<?=$_SESSION['id']?>"/>
<input type="submit" class="btn btn-primary" value="Subir tu propio libro"/>
</form>
<?php endif;?>
<div class="tabla" id="tabs">
	<ul>
		<li><a href="#tabs-1">Todas</a></li>
		<li><a href="#tabs-2">Siguiendo</a></li>
		<li><a href="#tabs-3">Favoritas</a></li>
		<li><a href="#tabs-4">Pendientes</a></li>
		<li><a href="#tabs-5">Vistas</a></li>
		<li><a href="#tabs-6">Recomendaciones</a></li>
	</ul>

	<div id="tabs-1">
		<!-- Si quitas la class="principal", se coloca todo(MIRAR) -->
		<div class="principalSerie">
		
			<div class="principalSerie_section-1">
				<!--
				<h1>Lista de TODAS las series</h1>
				<span>Consulta a la BBDD para pintar las series...</span>
				-->
				<div class="containerSeries">
				<?php foreach($libros as $libro):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$libro->ruta_caratula?>" alt="<?=$libro->alt_image?>" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<h4><?= $libro->nombre?></</h4>
							<form action="<?=base_url()?>libro/detalles" method="POST">
							<input type="hidden" name="id" value="<?=$libro->id?>"/>
							<input type="submit" value="Detalles"/>
							</form>
						</div>
					</div>
				<?php endforeach;?>
				</div>
			</div>
			<!--FIN SECTION 1-->
			
			<div class="principalSerie_section-2">
				<h4>Filtrar...</h4>
				<!--GENERO-->
				<ul>
					<li>Genero... <br /> <select>
							<option>Serie1</option>
							<option>Serie2</option>
							<option>Serie3</option>
	 	 				</select>
					</li>

					<!--AÑO DE ESTRENO-->
					<li>Año de estreno...(Slider)<br/></li>

					<!--VALORACIÓN-->
					<li>Valoración... <br/> 
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</li>
				</ul>
				<!-- SECTION 2 -->
			</div>
		<!-- PRINCIPAL -->
		</div>
		<!-- TABS-1 -->
		</div>
		
		
		
		<div id="tabs-2">
			<h1>Siguiendo</h1>
		</div>
		<div id="tabs-3">
			<h1>Favoritas</h1>
		</div>
		<div id="tabs-4">
			<h1>Pendientes</h1>
		</div>
		<div id="tabs-5">
			<h1>Vistas</h1>
		</div>
		<div id="tabs-6">
			<h1>Recomendaciones</h1>
		</div>