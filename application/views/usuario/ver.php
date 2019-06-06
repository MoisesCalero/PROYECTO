
<h1><b>Perfil de <?=$usuario->nombreUsuario ?>: </b><img src="<?=base_url()?>assets/img/usuarios/<?=$usuario->nombreUsuario?>.jpg" onerror="this.src='<?=base_url()?>assets/img/usuarios/pp.png';" alt="foto de perfil" id="fotoPerf" width="150px" height="150px;"></h1><hr>
		<div>
			<h2>Información personal:</h2>
			Nombre de usuario: <?=$usuario->nombreUsuario ?><br>
			Tipo de Usuario: <?=$usuario->rol ?><br>
			Correo electronico: <?=$usuario->correo ?><br>
			Fecha de Nacimiento: <?=$usuario->fecha_nacimiento?><br>
			Descripción: <?=$usuario->descripcion ?><br>
			<hr>
		</div>
		<div>
			<h2>Favoritos:</h2> 
			<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title">Películas Favoritas:</h5>
					<?php if($pelisFavoritas!=null):?>
					<?php foreach($pelisFavoritas as $pelicula):?>
					<form action="<?=base_url()?>pelicula/detalles" method="POST">
					<input type="hidden" name="id" value="<?=$pelicula->pelicula->id?>"/>
				    <input type="submit" class="card-text btn-link" value="<?=$pelicula->pelicula->nombre?>">
					</form>
					<?php endforeach;?>
					<?php endif;?>
				  </div>
			</div>
			<div class="card flo" style="width: 18rem;">
			<div class="card-body">
				    <h5 class="card-title">Series Favoritas:</h5>
					<?php if($seriesFavoritas!=null):?>
					<?php foreach($seriesFavoritas as $serie):?>
					<form action="<?=base_url()?>serie/detalles" method="POST">
					<input type="hidden" name="id" value="<?=$serie->serie->id?>"/>
				    <input type="submit" class="card-text btn-link" value="<?=$serie->serie->nombre?>">
					</form>
					<?php endforeach;?>
					<?php endif;?>
				  </div>
			</div>
			<div class="card flo" style="width: 18rem;">
			<div class="card-body">
				    <h5 class="card-title">Libros Favoritas:</h5>
					<?php if($librosFavoritos!=null):?>
					<?php foreach($librosFavoritos as $libro):?>
					<form action="<?=base_url()?>libro/detalles" method="POST">
					<input type="hidden" name="id" value="<?=$libro->libro->id?>"/>
				    <input type="submit" class="card-text btn-link" value="<?=$libro->libro->nombre?>">
					</form>
					<?php endforeach;?>
					<?php endif;?>
				  </div>
			</div>
			<div class="card flo" style="width: 18rem;">
			<div class="card-body">
				    <h5 class="card-title">Música Favoritas:</h5>
					<?php if($musicasFavoritas!=null):?>
					<?php foreach($musicasFavoritas as $musica):?>
					<form action="<?=base_url()?>musica/detalles" method="POST">
					<input type="hidden" name="id" value="<?=$musica->musica->id?>"/>
				    <input type="submit" class="card-text btn-link" value="<?=$musica->musica->nombre?>">
					</form>
					<?php endforeach;?>
					<?php endif;?>
				  </div>
			</div><hr>
		</div>
		<div>
			<h2>Actividad:</h2> 
			Valoracion media: <br>
			<div class="progress" >
				<div class="progress-bar progress-bar-success" id="siguiendo" role="progressbar" style="width:50%">Viendo</div>
				<div class="progress-bar progress-bar-info" id="completadas" role="progressbar" style="width:20%">Completadas</div>
				<div class="progress-bar progress-bar-danger" id="dejadas" role="progressbar" style="width:20%">Dejadas</div>
				<div class="progress-bar progress-bar" id="futuras" role="progressbar" style="width:10%">En un futuro</div>
			</div>
			<div class="completada"></div> Completadas <br>
			<div class="pausa"></div> En Pausa <br>
			<div class="dejada"></div> Dejadas <br>
			<div class="futuro"></div> En un futuro... <br>
		</div><hr/>
		<div>
		<h2>Mis libros</h2>
		<?php if($librosPropios!=null):?>
		<?php foreach($librosPropios as $libro)?>
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
<?php endif;?>
		<hr/>
		</div>
		<div>
		<h2>Mi música</h2>
		<?php if($musicasPropias!=null):?>
		<?php foreach($musicasPropias as $musica):?>
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
		<?php endif;?>
		<hr/>
		</div>
	</div>
	<script>
	window.onload=cogerDatos(<?=$usuario->id?>);

	</script>
	