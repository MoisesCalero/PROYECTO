<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
<h2>Lista de series</h2>
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
<script type="text/javascript">
        $(document).ready(function() {
            $("#tabs").tabs();
        });
</script>
<!--JAVASCRIPT PARA CREAR LOS SELECT-->
<script type="text/javascript">
    function pintarSelect(){
        opciones = ['--', 'Seguir', 'Favorita', 'Pendiente', 'Vista'];
    
        for(i = 0; i<document.getElementsByClassName("dvSerie").length; i++){
            /*CREAMOS EL SELECT*/
            select = document.createElement("select");
                select.setAttribute("id", "miSelect" + i);
                select.setAttribute("style", "position:absolute");
          	  document.getElementsByClassName("dvSerie")[i].appendChild(select);
    
            /*LLENAMOS EL SELECT*/
            for(var j = 0; j<opciones.length; j++){
                 document.getElementById("miSelect" + i).options[j] = new Option(opciones[j], opciones[j]);
            }
        }
    } 
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
					<?php foreach($series as $serie):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$serie->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
						<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$serie->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$serie->nombre?></h4></button>
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
				<h1>¡Vaya! No sigues ninguna serie aún.</h1>
				<?php endif;?>
				<?php foreach($seguidas as $seguida):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$seguida->serie->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
						<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$seguida->serie->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$seguida->serie->nombre?></h4></button>
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
							<img src="<?=base_url()?><?=$favorita->serie->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
					<div class="h4DvSerie">
					<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$favorita->serie->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$favorita->serie->nombre?></h4></button>
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
				<h1>¡Vaya! No tienes series pendientes aún.</h1>
				<?php endif;?>
				<?php foreach($pendientes as $pendiente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$pendiente->serie->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
						<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pendiente->serie->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$pendiente->serie->nombre?></h4></button>
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
				<h1>¡Vaya! No has terminado ninguna serie aún.</h1>
				<?php endif;?>
				<?php foreach($vistas as $vista):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$vista->serie->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
						<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$vista->serie->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$vista->serie->nombre?></h4></button>
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