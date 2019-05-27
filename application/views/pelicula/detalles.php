<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/detalles.css"/>
	<div class="fondo">
		<img src="<?=base_url()?>assets/img/pp.png" alt="portada" class="caratula">
		<?php if(isset($_SESSION['id'])):?>
		<div class="fav"><span id="fav" class="glyphicon glyphicon-heart-empty" onclick="cambiarIconoYEstado(<?=isset($_SESSION['id'])?$_SESSION['id']:null?>, <?=$pelicula->id?>, 'pelicula')"></span></div>
<?php endif;?>
		<h1 class="titulo"><span><?=$pelicula->nombre ?></span></h1>
		<!-- Valoraciones -->
		<div id="valoracion" style="margin-left:5%;">
		<?php if(isset($_SESSION['id'])):?>
			<span onclick="valorar(true, 1, <?=$_SESSION['id']?>, <?=$pelicula->id?>, 'pelicula')" id="estrella1" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 2, <?=$_SESSION['id']?>, <?=$pelicula->id?>, 'pelicula')" id="estrella2" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 3, <?=$_SESSION['id']?>, <?=$pelicula->id?>, 'pelicula')" id="estrella3" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 4, <?=$_SESSION['id']?>, <?=$pelicula->id?>, 'pelicula')" id="estrella4" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 5, <?=$_SESSION['id']?>, <?=$pelicula->id?>, 'pelicula')" id="estrella5" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<?php endif;?>
			<?php if(!isset($_SESSION['id'])):?>
			<span>Inicia sesión para dar tu valoración</span>
<?php endif;?>
		</div>
		<!-- Cambiar estado -->
		<?php if(isset($_SESSION['id'])):?>
		<select id="estado" class="form-control estado" onChange="enviarAjax(<?=isset($_SESSION['id'])?$_SESSION['id']:null?>, <?=$pelicula->id?>, 'pelicula')">
			<option value="">Selecciona un estado...</option>
			<option value="seguir">Seguir</option>
			<option value="viendo">Viendo</option>
			<option value="terminada">Terminada</option>
			<option value="dejada">Dejada</option>
		</select>
<?php endif;?>
		<br>
  	</div>
	<br/>
	<p class="text-center">
		<?=$pelicula->descripcion ?>
	</p>
	<p class="text-center">
		<?=$pelicula->descripcion ?>
	</p>
	<br/>
	<p class="text-center"> 
		Trailer:
	</p>
	<iframe width="853" height="480" src="https://www.youtube.com/embed/2DRD4xSUbhM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<!-- Dejar un comentario -->
	<div id="comentarios">
	<h3>Comentarios</h3>
	<?php if(isset($_SESSION['id'])):?>
		<form action="" method="POST">
			<?php if(isset($_SESSION['id'])):?>
			<input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_SESSION['id']?>"/>
			<?php endif;?>
			<input type="hidden" name="idPeli" id="idPeli" value="<?=$pelicula->id?>"/>
			<label for="comment">Añadir un comentario:</label>
			<textarea style="resize: none; width:45%;" class="form-control" rows="6" id="comment" name="comentario"></textarea><br>
			<input type="button" onclick="enviarForm()" name="Publicar" class="btn-info" style="border-radius:5px;" value="Publicar"/>
		</form>
	<?php endif;?>
		<!-- Lista de los comentarios -->
		<div class="comentarios">
			<?php foreach ($pelicula->ownPeliculacomentarioList as $comentario): ?>
			<div class="comentIndividual">
				<img src="<?=base_url()?>assets/img/pp.png" alt="A" width="25" heigth="25" style="margin-left:7%;">
				<form action="<?=base_url()?>usuario/ver" method="POST">
				<input type="hidden" name="id" value="<?=$comentario->usuario->id?>"/>
				<input type="submit" class="btn btn-link" value="<?=$comentario->usuario->nombre_usuario?>"/>
				</form>
				<br/>
				<br/>
				<small>Comentó:</small>
			</div>
			<div class="comentIndividual2">
				<?=$comentario->comentario?><br/>
			</div>
			<hr/>
			<?php endforeach;?>
		</div>
	</div>
<script src="<?=base_url()?>assets/js/cargarDetalles.js">
//Cargar favoritas
</script>
<script>
	getEstado("<?=$_SESSION['id']?>", "<?=$pelicula->id?>", 'pelicula');
	getFavorito("<?=$_SESSION['id']?>", "<?=$pelicula->id?>", 'pelicula');
	getValoracion("<?=$_SESSION['id']?>", "<?=$pelicula->id?>", 'pelicula');
</script>