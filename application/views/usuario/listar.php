<h1>Datos de usuario</h1>
<div class="container" style="margin-left: 10%">
	<h2>Nombre de usuario: <?=$usuario->nombreUsuario?></h2>
	<hr />
	<h2>Correo electrónico: <?=$usuario->correo?></h2>
	<hr />
	<h1>Información personal</h1>
	<h2>Nombre: <?=$usuario->nombre?></h2>
	<hr />
	<h2>Apellidos: <?=$usuario->apellidos?></h2>
	<hr />
	<h2>Descripción: <?=$usuario->descripcion?></h2>
	<h2>Fecha de nacimiento: <?=$usuario->fecha_nacimiento?></h2>
	<hr />
	<form action="<?=base_url()?>usuario/delete" method="post">
		<button>Eliminar mi cuenta</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<form action="<?=base_url()?>usuario/update" method="post">
		<button>Editar mi cuenta</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
	<form action="<?=base_url()?>usuario/logout" method="post">
		<button>Cerrar sesión</button>
		<input type="hidden" name="id" value="<?=$usuario->id ?>" />
	</form>
</div>