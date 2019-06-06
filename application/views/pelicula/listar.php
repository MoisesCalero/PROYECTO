<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
<h2>Lista de películas</h2>
<script type="text/javascript">
        $(document).ready(function() {
            $("#tabs").tabs();
        });
</script>
<div class="tabla" id="tabs">
	<ul>
		<li><a href="#tabs-1">Todas</a></li>
		<li><a href="#tabs-2">Siguiendo</a></li>
		<li><a href="#tabs-3">Favoritas</a></li>
		<li><a href="#tabs-4">Pendientes</a></li>
		<li><a href="#tabs-5">Vistas</a></li>
		<li><a href="#tabs-6">Recomendaciones</a></li>
	</ul>
	<!-- Pestaña de todas las películas -->
	<div id="tabs-1">
		<div class="principalSerie">
			<div class="principalSerie_section-1">
				<div class="containerSeries">
					<?php foreach($peliculas as $pelicula):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$pelicula->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pelicula->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$pelicula->nombre?></h4></button>
							</form>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
			<!--Parte de la derecha, filtros y ordenación-->
			<div class="principalSerie_section-2">
				<h2><strong>Filtrar:</strong></h2>
				<!--GENERO-->
				<ul>
					<li><strong><h4>Filtrar por Genero:</h4> </strong>
					<select class="form-control" style="width:55%; margin-left:15%;">
							<option>Serie1</option>
							<option>Serie2</option>
							<option>Serie3</option>
	 	 				</select>
					</li>

					<!--VALORACIÓN-->
					<li><strong><h4>Valoración:</h4> </strong>
						<select class="form-control" style="width:55%; margin-left:15%;">
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
	</div>
</div>
		<!-- Pestaña de películas seguidas -->
<div id="tabs-2">
	<div class="principalSerie">
		<div class="principalSerie_section-1">
			<div class="containerSeries">
			<?php if($seguidas==null):?>
				<h1>¡Vaya! No sigues ninguna peli aún.</h1>
				<?php endif;?>
				<?php foreach($seguidas as $seguida):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$seguida->pelicula->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<h4><?= $seguida->pelicula->nombre?></</h4>
							<form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pelicula->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$seguida->pelicula->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>	
		<!--Parte de la derecha, filtros y ordenación-->
		<div class="principalSerie_section-2">
				<h2><strong>Filtrar:</strong></h2>
				<!--GENERO-->
				<ul>
					<li><strong><h4>Filtrar por Genero:</h4> </strong>
					<select class="form-control" style="width:55%; margin-left:15%;">
							<option>Serie1</option>
							<option>Serie2</option>
							<option>Serie3</option>
	 	 				</select>
					</li>

					<!--VALORACIÓN-->
					<li><strong><h4>Valoración:</h4> </strong>
						<select class="form-control" style="width:55%; margin-left:15%;">
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
	</div>
		</div>
<!-- Pestaña de películas favoritas -->
		<div id="tabs-3">
			<div class="principalSerie">
			<div class="principalSerie_section-1">
				<div class="containerSeries">
				<?php if($favoritas==null):?>
				<h1>¡Vaya! No has agregado nada a favoritos aún.</h1>
				<?php endif;?>
				<?php foreach($favoritas as $favorita):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$favorita->pelicula->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
					<div class="h4DvSerie">
						<h4><?= $favorita->pelicula->nombre?></</h4>
						<form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pelicula->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$favorita->pelicula->nombre?></h4></button>
							</form>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
		<!--Parte de la derecha, filtros y ordenación-->
		<div class="principalSerie_section-2">
				<h2><strong>Filtrar:</strong></h2>
				<!--GENERO-->
				<ul>
					<li><strong><h4>Filtrar por Genero:</h4></strong>
					<select class="form-control" style="width:55%; margin-left:15%;">
							<option>Serie1</option>
							<option>Serie2</option>
							<option>Serie3</option>
	 	 				</select>
					</li>

					<!--VALORACIÓN-->
					<li><strong><h4>Valoración:</h4> </strong>
						<select class="form-control" style="width:55%; margin-left:15%;">
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
	</div>
</div>
<!-- Pestaña de películas pendientes -->
<div id="tabs-4">
	<div class="principalSerie">
		<div class="principalSerie_section-1">
			<div class="containerSeries">
			<?php if($pendientes==null):?>
				<h1>¡Vaya! No tienes pelis pendientes aún.</h1>
				<?php endif;?>
				<?php foreach($pendientes as $pendiente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$pendiente->pelicula->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<h4><?= $pendiente->pelicula->nombre?></</h4>
							<form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pelicula->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$pendiente->pelicula->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
		<!--Parte de la derecha, filtros y ordenación-->
		<div class="principalSerie_section-2">
				<h2><strong>Filtrar:</strong></h2>
				<!--GENERO-->
				<ul>
					<li><strong><h4>Filtrar por Genero:</h4> </strong>
					<select class="form-control" style="width:55%; margin-left:15%;">
							<option>Serie1</option>
							<option>Serie2</option>
							<option>Serie3</option>
	 	 				</select>
					</li>

					<!--VALORACIÓN-->
					<li><strong><h4>Valoración:</h4> </strong>
						<select class="form-control" style="width:55%; margin-left:15%;">
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
	</div>
</div>
<!-- Lista de películas vistas -->
<div id="tabs-5">
	<div class="principalSerie">	
		<div class="principalSerie_section-1">
			<div class="containerSeries">
			<?php if($vistas==null):?>
				<h1>¡Vaya! No has terminado ninguna peli aún.</h1>
				<?php endif;?>
				<?php foreach($vistas as $vista):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$vista->pelicula->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<h4><?= $vista->pelicula->nombre?></</h4>
							<form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pelicula->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$vista->pelicula->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
		</div>
	</div>
	<!--Parte de la derecha, filtros y ordenación-->
	<div class="principalSerie_section-2">
				<h2><strong>Filtrar:</strong></h2>
				<!--GENERO-->
				<ul>
					<li><strong><h4>Filtrar por Genero:</h4> </strong>
					<select class="form-control" style="width:55%; margin-left:15%;">
							<option>Serie1</option>
							<option>Serie2</option>
							<option>Serie3</option>
	 	 				</select>
					</li>

					<!--VALORACIÓN-->
					<li><strong><h4>Valoración:</h4> </strong>
						<select class="form-control" style="width:55%; margin-left:15%;">
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
	</div>
</div>
		<div id="tabs-6">
			<h1>Recomendaciones</h1>
		</div>
			  </div>
			</div>