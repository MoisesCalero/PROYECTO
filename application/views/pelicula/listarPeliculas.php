<link href="<?=base_url()?>assets/css/listaPeliculas.css"/>
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

	<div id="tabs-1">
		<!-- Si quitas la class="principal", se coloca todo(MIRAR) -->
		<div class="principalSerie">
		
			<div class="principalSerie_section-1">
				<!--
				<h1>Lista de TODAS las series</h1>
				<span>Consulta a la BBDD para pintar las series...</span>
				-->
				<div class="containerSeries">
				<?php foreach($peliculas as $pelicula):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$pelicula->ruta_caratula?>" alt="<?=$pelicula->alt_image?>" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<h4><?= $pelicula->nombre?></</h4>
							<form action="<?=base_url()?>pelicula/detalles" method="POST">
							<input type="hidden" name="id" value="<?=$pelicula->id?>"/><br>
							<input type="submit" value="Detalles" class="btn btn-info" style="margin-right:23%;margin-top:2%;"/>
							</form>
						</div>
					</div>
				<?php endforeach;?>
				</div>
			</div>
			<!--FIN SECTION 1-->
			
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
		<!-- PRINCIPAL -->
		</div>
		<!-- TABS-1 -->
		</div>
		
		
		<?php if($seguidas!=null):?>
		<div id="tabs-2">
			<!-- Si quitas la class="principal", se coloca todo(MIRAR) -->
		<div class="principalSerie">
		
		<div class="principalSerie_section-1">
			<!--
			<h1>Lista de TODAS las series</h1>
			<span>Consulta a la BBDD para pintar las series...</span>
			-->
			<div class="containerSeries">
			<?php foreach($seguidas as $seguida):?>
				<div class="dvSerie" style="width: 15%">
					<div class="imgDvSerie">
						<img src="<?=base_url()?><?=$seguida->pelicula->ruta_caratula?>" alt="<?=$seguida->pelicula->alt_image?>" width="100%", height="100%"/>
					</div>
					<div class="h4DvSerie">
						<h4><?= $seguida->pelicula->nombre?></</h4>
						<form action="<?=base_url()?>pelicula/detalles" method="POST">
						<input type="hidden" name="id" value="<?=$seguida->pelicula->id?>"/>
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
	<!-- TABS-2 -->
		</div>
	<?php endif;?>
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
<!--
			    <form action="<?=base_url()?>serie/detalles" method="post">
			    <!-- <input type="hidden" name="id" value="<?=$serie->id ?>"/>
   			    <input type="submit" class="btn btn-primary" value="Más información..."/>
			    </form>
				-->
			  </div>
			</div>