<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
<h2>Lista de música</h2>
<?php
if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium"):
?>
<form action="<?=base_url()?>musica/crear" method="post">
<input type="hidden" name="id" value="<?=$_SESSION['id']?>"/>
<input type="submit" class="btn btn-primary" value="Subir tu propia música"/>
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
				<?php foreach($musicas as $musica):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$musica->ruta_caratula?>" alt="<?=$musica->alt_image?>" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<h4><?= $musica->nombre?></</h4>
							<form action="<?=base_url()?>musica/detalles" method="POST">
							<input type="hidden" name="id" value="<?=$musica->id?>"/>
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