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
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>
        <h1>ANUNCIOS</h1>

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