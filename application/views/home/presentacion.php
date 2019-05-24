    <div class="principal">
    <?php if(isset($_SESSION['usuario'])){
        echo "<h1>¡Bienvenido ".$_SESSION['usuario']."!</h1>";
    }
    else{
        echo "<h1>Bienvenido, inicia sesión o crea tu cuenta para acceder a nuestro contenido</h1>";
    }
    ?>
    </div>
    <?php if(!isset($_SESSION['rol'])||isset($_SESSION['rol'])&& $_SESSION['rol']!="premium"):?>
    <div class="anuncios">
        <div class="carrusel">
            <!--ANUNCIO1-->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?=base_url()?>assets/img/bat.jpg" alt="Los Angeles">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/logo.png" alt="Chicago">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/bat.jpg" alt="New York">
                    </div>
                    </div>
                
                    <!-- Left and right controls -->
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
                        <img src="<?=base_url()?>assets/img/1.jpg" alt="Los Angeles">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/2.jpg" alt="Chicago">
                    </div>
                
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/1.jpg" alt="New York">
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
                            <img src="<?=base_url()?>assets/img/1.jpg" alt="Los Angeles">
                        </div>
                    
                        <div class="item">
                            <img src="<?=base_url()?>assets/img/2.jpg" alt="Chicago">
                        </div>
                    
                        <div class="item">
                            <img src="<?=base_url()?>assets/img/1.jpg" alt="New York">
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

     <div class="secundaria" style="margin-top: 20px;" id="tabs">
        <ul>
            <li><a href="#tabs-1">Lo más visto</a> </li>
            <li><a href="#tabs-2">Recomendaciones</a></li>
            <li><a href="#tabs-3">Añadido recientemente</a></li>
        </ul>
<!--LO M�S VISTO-->
<div id="tabs-1">
	<div id="acordeon_1">
		<h3>Películas</h3>
		<div></div>
		<h3>Series</h3>
		<div></div>
		<h3>Música</h3>
		<div></div>
		<h3>Libros</h3>
		<div></div>
	</div>
</div>

<!--RECOMENDACIONES-->
<div id="tabs-2">
	<div id="acordeon_2">
		<h3>Peliculas</h3>
		<div></div>
		<h3>Series</h3>
		<div></div>
		<h3>Música</h3>
		<div></div>
		<h3>Libros</h3>
		<div></div>
	</div>
</div>


<!--A�ADIDO RECIENTEMENTE-->
<div id="tabs-3">
	<div id="acordeon_3">
		<h3>Peliculas</h3>
		<div></div>
		<h3>Series</h3>
		<div></div>
		<h3>Música</h3>
		<div></div>
		<h3>Libros</h3>
		<div></div>
    </div>
</div>
</div>
