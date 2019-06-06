<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
<!-- Comprobar el rol del usuario para que pueda publicar su propia música -->
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium"):?>
<form action="<?=base_url()?>musica/crear" method="POST">
<input type="hidden" name="id" value="<?=$_SESSION['id']?>"/>
<input type="submit" class="btn btn-primary" value="Publicar música"/>
</form>
<?php endif;?>
<!-- Comprobar si el usuario es administrador para que pueda publicar música -->
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<form action="<?=base_url()?>musica/crear" method="POST">
<input type="submit" class="btn btn-primary" value="Publicar música"/>
</form>
<?php endif;?>

<h2>Lista de música</h2>
<script type="text/javascript">
        $(document).ready(function() {
            $("#tabs").tabs();
        });
</script>
<!-- Tabs para navegar entre las pestañas -->
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
					<?php foreach($musicas as $musica):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$musica->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$musica->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$musica->nombre?></h4></button>
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
				<h1>¡Vaya! No sigues ninguna música aún.</h1>
				<?php endif;?>
				<?php foreach($seguidas as $seguida):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$seguida->musica->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$seguida->musica->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$seguida->musica->nombre?></h4></button>
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
							<img src="<?=base_url()?><?=$favorita->musica->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
					<div class="h4DvSerie">
						<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$favorita->musica->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$favorita->musica->nombre?></h4></button>
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
<!-- Pestaña de películas pendientes -->
<div id="tabs-4">
	<div class="principalSerie">
		<div class="principalSerie_section-1">
			<div class="containerSeries">
			<?php if($pendientes==null):?>
				<h1>¡Vaya! No tienes música pendiente aún.</h1>
				<?php endif;?>
				<?php foreach($pendientes as $pendiente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$pendiente->musica->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pendiente->musica->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$pendiente->musica->nombre?></h4></button>
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
				<h1>¡Vaya! No has terminado nada de música aún.</h1>
				<?php endif;?>
				<?php foreach($vistas as $vista):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$vista->musica->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$vista->musica->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$vista->musica->nombre?></h4></button>
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