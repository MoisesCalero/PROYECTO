<!-- Bienvenida del usuario comprobando si se ha iniciado sesión o no -->
<div class="principal">
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=null){
        echo "<h1>¡Bienvenido ".$_SESSION['usuario']."!</h1>";
    }
    else{
        echo "<h1>Bienvenido, inicia sesión o crea tu cuenta para acceder a nuestro contenido</h1>";
    }
    ?>
    </div>
    <!-- Parte de anuncios, que se cargarán dependiendo del rol del usuario -->
        <?php if(!isset($_SESSION['rol'])||(isset($_SESSION['rol'])&& $_SESSION['rol']!="premium")):?>
    <div class="anuncios">
        <div class="carrusel">
            <!--ANUNCIO1-->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicadores -->
                    <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?=base_url()?>assets/img/anuncio1.png" alt="Los Angeles">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/anuncio2.png" alt="Chicago">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/anuncio3.png" alt="New York">
                    </div>
                    </div>
                
                    <!-- Controles a la izquierda y a la derecha -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div><br>
            <!--ANUNCIO2-->
                <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel2" data-slide-to="1"></li>
                    <li data-target="#myCarousel2" data-slide-to="2"></li>
                    </ol>
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?=base_url()?>assets/img/anuncio1.png" alt="Los Angeles">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/anuncio2.png" alt="Chicago">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/anuncio3.png" alt="New York">
                    </div>
                    </div>
                
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
<br>
            <!--ANUNCIO3-->
                 <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                        <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel3" data-slide-to="1"></li>
                        <li data-target="#myCarousel3" data-slide-to="2"></li>
                        </ol>
                    
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?=base_url()?>assets/img/anuncio1.png" alt="Los Angeles">
                        </div>
                    
                        <div class="item">
                            <img src="<?=base_url()?>assets/img/anuncio2.png" alt="Chicago">
                        </div>
                    
                        <div class="item">
                            <img src="<?=base_url()?>assets/img/anuncio3.png" alt="New York">
                        </div>
                        </div>
                    
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel3" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel3" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                </div>
        </div>

    </div>
<?php endif;?>
<!-- Tabs con infomación sobre las películas más valoras, recomendadas y recientes -->
     <div class="secundaria" style="margin-top: 20px;" id="tabs">
        <ul>
            <li><a href="#tabs-1">Lo más valorado</a> </li>
            <li><a href="#tabs-2">Recomendaciones</a></li>
            <li><a href="#tabs-3">Añadido recientemente</a></li>
        </ul>
<!--Lo más valorado-->
<div id="tabs-1">
    <div id="acordeon_1">
        <!-- PELÍCULAS -->
        <h3>Películas</h3>
        <div>
            <div class="principalSerie_section-1 scroll" style="width: 90%;">
                <div class="containerSeries" >
                    <?php if(isset($pelisMasValoradas) && $pelisMasValoradas!=null):?>
                    <?php foreach($pelisMasValoradas as $masValorada):?>
                    <div class="dvSerie" style="width: 15%">
                        <div class="imgDvSerie">
                            <img src="<?=base_url()?><?=$masValorada->pelicula->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
                        </div>
                        <div class="h4DvSerie">
                        <form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$masValorada->pelicula->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$masValorada->pelicula->nombre?></h4></button>
							</form>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
        </div>
</div>	
</div>
        <!-- SERIES -->
		<h3>Series</h3>
		<div>
        <div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries">
            <?php if(isset($seriesMasValoradas) && $seriesMasValoradas!=null):?>
                <?php foreach($seriesMasValoradas as $masValorada):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$masValorada->serie->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$masValorada->serie->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$masValorada->serie->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
        <!-- MÚSICA -->
		<h3>Música</h3>
		<div>
        <div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries">
			<?php if(isset($musicasMasvaloradas) && $musicasMasValoradas!=null):?>
				<?php foreach($musicasMasValoradas as $masValorada):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$masValorada->musica->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$masValorada->musica->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$masValorada->musica->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
        <!-- LIBROS -->
		<h3>Libros</h3>
		<div>
        <div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries">
			<?php if(isset($librosMasValorados) && $librosMasValorados!=null):?>
				<?php foreach($librosMasValorados as $masValorada):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$masValorada->libro->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
                        <form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$masValorada->libro->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$masValorada->libro->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
	</div>
</div>

<!--RECOMENDACIONES-->
<div id="tabs-2">
	<div id="acordeon_2">
    <!-- PELÍCULAS -->
		<h3>Películas</h3>
		<div></div>
        <!-- SERIES -->
		<h3>Series</h3>
		<div></div>
        <!-- MÚSICA -->
		<h3>Música</h3>
		<div></div>
        <!-- LIBROS -->
		<h3>Libros</h3>
		<div></div>
	</div>
</div>


<!--AÑADIDO RECIENTEMENTE-->
<div id="tabs-3">
	<div id="acordeon_3">
    <!-- PELÍCULAS -->
		<h3>Películas</h3>
		<div>
		<div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries" >
			<?php if(isset($pelisRecientes) && $pelisRecientes!=null):?>
				<?php foreach($pelisRecientes as $reciente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$reciente->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>pelicula/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$reciente->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$reciente->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
        <!-- SERIES -->
		<h3>Series</h3>
        <div>
		<div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries" >
			<?php if(isset($seriesRecientes) && $seriesRecientes!=null):?>
				<?php foreach($seriesRecientes as $reciente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$reciente->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>serie/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$reciente->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$reciente->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
        <!-- MÚSICA -->
		<h3>Música</h3>
        <div>
		<div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries" >
			<?php if(isset($musicasRecientes) && $musicasRecientes!=null):?>
				<?php foreach($musicasRecientes as $reciente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$reciente->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>musica/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$reciente->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$reciente->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
        <!-- LIBROS -->
		<h3>Libros</h3>
        <div>
		<div class="principalSerie_section-1 scroll" style="width: 90%;">
			<div class="containerSeries" >
			<?php if(isset($librosRecientes) && $librosRecientes!=null):?>
				<?php foreach($librosRecientes as $reciente):?>
					<div class="dvSerie" style="width: 15%">
						<div class="imgDvSerie">
							<img src="<?=base_url()?><?=$reciente->ruta_caratula?>" onerror="this.src='<?=base_url()?>assets/img/404.png';" alt="Imagen no encontrada" width="100%", height="100%"/>
						</div>
						<div class="h4DvSerie">
							<form action="<?=base_url()?>libro/detalles" method="POST">
								<input type="hidden" name="id" value="<?=$reciente->id?>"/>
								<button type="submit" value="Detalles" class="btnTitulo"><h4><?=$reciente->nombre?></h4></button>
							</form>
						</div>
					</div>
				<?php endforeach;?>
                <?php endif;?>
			</div>
		</div>	
        </div>
	</div>
</div>




</div>