<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/detalles.css"/>
	<div class="fondo">
		<img src="<?=base_url()?>assets/img/pp.png" alt="portada" class="caratula">
		<?php if(isset($_SESSION['id'])):?>
		<div class="fav"><span id="fav" class="glyphicon glyphicon-heart-empty" onclick="cambiarIconoYEstado(<?=isset($_SESSION['id'])?$_SESSION['id']:null?>, <?=$libro->id?>, 'libro')"></span></div>
<?php endif;?>
		<h1 class="titulo"><span><?=$libro->nombre ?></span></h1>
		<!-- Valoraciones -->
		<div id="valoracion" style="margin-left:5%;">
		<?php if(isset($_SESSION['id'])):?>
			<span onclick="valorar(true, 1, <?=$_SESSION['id']?>, <?=$libro->id?>, 'libro')" id="estrella1" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 2, <?=$_SESSION['id']?>, <?=$libro->id?>, 'libro')" id="estrella2" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 3, <?=$_SESSION['id']?>, <?=$libro->id?>, 'libro')" id="estrella3" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 4, <?=$_SESSION['id']?>, <?=$libro->id?>, 'libro')" id="estrella4" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<span onclick="valorar(true, 5, <?=$_SESSION['id']?>, <?=$libro->id?>, 'libro')" id="estrella5" class="glyphicon glyphicon-star-empty" style="font-size: 25px; color: #ffcf00;"></span>
			<?php endif;?>
			<?php if(!isset($_SESSION['id'])):?>
			<span>Inicia sesión para dar tu valoración</span>
<?php endif;?>
		</div>
		<!-- Cambiar estado -->
		<?php if(isset($_SESSION['id'])):?>
		<select id="estado" class="form-control estado" onChange="enviarAjax(<?=isset($_SESSION['id'])?$_SESSION['id']:null?>, <?=$libro->id?>, 'libro')">
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
		<?=$libro->descripcion ?>
	</p>
	<p class="text-center">
		<?=$libro->descripcion ?>
	</p>
	<br/>
	<!-- Dejar un comentario -->
	<div id="comentarios">
	<h3>Comentarios</h3>
	<?php if(isset($_SESSION['id'])):?>
		<form action="" method="POST">
			<?php if(isset($_SESSION['id'])):?>
			<input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_SESSION['id']?>"/>
			<?php endif;?>
			<input type="hidden" name="idLibro" id="idLibro" value="<?=$libro->id?>"/>
			<label for="comment">Añadir un comentario:</label>
			<textarea style="resize: none; width:45%;" class="form-control" rows="6" id="comment" name="comentario"></textarea><br>
			<input type="button" onclick="enviarForm()" name="Publicar" class="btn-info" style="border-radius:5px;" value="Publicar"/>
		</form>
	<?php endif;?>
		<!-- Lista de los comentarios -->
		<div class="comentarios">
			<?php foreach ($libro->ownLibrocomentarioList as $comentario): ?>
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
	getEstado("<?=$_SESSION['id']?>", "<?=$libro->id?>", 'libro');
	getFavorito("<?=$_SESSION['id']?>", "<?=$libro->id?>", 'libro');
	getValoracion("<?=$_SESSION['id']?>", "<?=$libro->id?>", 'libro');
</script>