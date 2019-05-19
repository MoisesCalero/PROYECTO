	<form action="<?=base_url()?>usuario/delete" method="post">
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
		<button class="btn btn-primary">Eliminar mi cuenta</button>
	</form>
	<form action="<?=base_url()?>usuario/update" method="post">
		<button class="btn btn-primary">Editar mi cuenta</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<form action="<?=base_url()?>usuario/logout" method="post">
		<button class="btn btn-primary">Cerrar sesión</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
		<form action="<?=base_url()?>usuario/listarTodo" method="post">
		<button class="btn btn-primary">Mostrar una lista de todos los usuarios</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<?php endif;?>
<h1><b>Perfil de <?=$usuario->nombreUsuario ?>: </b><img src="<?=base_url()?>assets/img/pp.png" alt="foto de perfil" id="fotoPerf" width="150px" height="150px;"></h1><hr>
		<div>
			<h2>Información personal:</h2>
			Nombre de usuario: <?=$usuario->nombreUsuario ?><br>
			Tipo de Usuario: <?=$usuario->rol ?><?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="basico"):?><form action="<?=base_url()?>usuario/upgrade" method="post">
		<button>Mejorar mi cuenta</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" /></form><?php endif; ?><br>
			Correo electronico: <?=$usuario->correo ?><br>
			Fecha de Nacimiento: <?=$usuario->fecha_nacimiento?><br>
			Teléfono: <?=$usuario->telefono ?><br>
			<hr>
		</div>
		<div>
			<h2>Favoritos:</h2> 
			<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title">Peliculas Favoritas:</h5>
				    <p class="card-text">-1</p>
				    <p class="card-text">-2</p>
				    <p class="card-text">-3</p>
				    <p class="card-text">-4</p>
				  </div>
			</div>
			<div class="card flo" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title">Series Favoritas:</h5>
				    <p class="card-text">-1</p>
				    <p class="card-text">-2</p>
				    <p class="card-text">-3</p>
				    <p class="card-text">-4</p>
				  </div>
			</div>
			<div class="card flo" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title">Libros Favoritos:</h5>
				    <p class="card-text">-1</p>
				    <p class="card-text">-2</p>
				    <p class="card-text">-3</p>
				    <p class="card-text">-4</p>
				  </div>
			</div><div class="card flo" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title">Musica Favorita:</h5>
				    <p class="card-text">-1</p>
				    <p class="card-text">-2</p>
				    <p class="card-text">-3</p>
				    <p class="card-text">-4</p>
				  </div>
			</div><hr>
		</div>
		<div>
			<h2>Actividad:</h2> 
			Valoracion media: <br>
			<div class="progress">
  				<div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
  				<div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
  				<div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
  				<div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
			</div> <br>
			<div class="completada"></div> Completadas <br>
			<div class="pausa"></div> En Pausa <br>
			<div class="dejada"></div> Dejadas <br>
			<div class="futuro"></div> En un futuro... <br>
		</div><hr/>
		<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium"):?>
		<div>
		<h2>Mis libros</h2>
		<hr/>
		</div>
		<div>
		<h2>Mi música</h2>
		<hr/>
		</div>
		<?php endif;?>
	</div>
	
	