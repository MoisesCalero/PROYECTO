<div class="boton-acciones" style="float:left; display:flex; flex-direction:row;">
	<form action="<?=base_url()?>usuario/update" method="post">
		<button class="btn btn-primary">Editar mi cuenta</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<form action="<?=base_url()?>usuario/cambiarImagen" method="post">
		<button class="btn btn-primary">Cambiar mi imagen de perfil</button>
	</form>

	<button class="btn btn-primary" data-toggle="modal" data-target="#modalBorrarCuenta">Eliminar mi cuenta</button>
<!--Modal de Borrar cuenta-->
<div class="modal fade" id="modalBorrarCuenta" tabindex="-1" role="dialog" aria-labelledby="modalBorrarCuenta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">¿Desea borrar la cuenta?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <div class="modal-body">
        Con esta acción su cuenta sera eliminada por completo y sera imposible recuperarla.¿Está seguo?
      </div>
      <div class="modal-footer">
	  <form action="<?=base_url()?>usuario/delete" method="post">
	  	<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
		<button type="submit" class="btn btn-primary">Confirmar</button>
	  </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!---->
	<button class="btn btn-primary" data-toggle="modal" data-target="#modalCerrarSesion">Cerrar sesión</button>	
<!--Modal de cerrar sesion-->
<div class="modal fade" id="modalCerrarSesion" tabindex="-1" role="dialog" aria-labelledby="modalCerrarSesion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cerrar sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <div class="modal-body">
        Con esta acción cerrara la sesión.
      </div>
      <div class="modal-footer">
	  <form action="<?=base_url()?>usuario/logout" method="post">
		<button type="submit" class="btn btn-primary">Confirmar</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	  </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!---->
		<form action="<?=base_url()?>usuario/updatePassword" method="post">
		<button class="btn btn-primary">Cambiar mi contraseña</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="basico"):?><form action="<?=base_url()?>usuario/upgrade" method="post">
		<button class="btn btn-primary">Mejorar mi cuenta</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" /></form><?php endif; ?>
	</div><br/><br/>
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
		<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium"):?>
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
		<?php endif;?>
	</div>
	<script>
	window.onload=cogerDatos(<?=$_SESSION['id']?>);
	</script>
	