<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium"):?>
<!-- Comprobar el rol del usuario para verificar si puede crear un libro o no, en este caso
pueden acceder tanto usuarios premium como administradores -->

<!-- El botón es diferente para premium y administrador porque en el caso de un usuario premium
el libro se asociará a su usuario -->
<form action="<?=base_url()?>libro/crear" method="POST">
<input type="hidden" name="id" value="<?=$_SESSION['id']?>"/>
<input type="submit" class="btn btn-primary" value="Publicar un libro"/>
</form>
<?php endif;?>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<form action="<?=base_url()?>libro/crear" method="POST">
<input type="submit" class="btn btn-primary" value="Subir un libro"/>
</form>
<?php endif;?>
<!-- Cargar la lista de libros -->
<h2>Lista de libros</h2>
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
<!-- Tabs para navegar entre las distintas pestañas -->
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
					<?php foreach($libros as $libro):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$libro->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$libro->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$libro->nombre?></h4></button>
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
				<h1>¡Vaya! No sigues ningún libro aún.</h1>
				<?php endif;?>
				<?php foreach($seguidas as $seguida):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$seguida->libro->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$seguida->libro->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$seguida->libro->nombre?></h4></button>
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
							<img src="<?=base_url()?><?=$favorita->libro->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
					<div class="h4DvSerie">
						<form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$favorita->libro->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$favorita->libro->nombre?></h4></button>
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
				<h1>¡Vaya! No tienes libros pendientes aún.</h1>
				<?php endif;?>
				<?php foreach($pendientes as $pendiente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$pendiente->libro->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$pendiente->libro->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$pendiente->libro->nombre?></h4></button>
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
				<h1>¡Vaya! No has terminado ningún libro aún.</h1>
				<?php endif;?>
				<?php foreach($vistas as $vista):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$vista->libro->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$vista->libro->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$vista->libro->nombre?></h4></button>
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