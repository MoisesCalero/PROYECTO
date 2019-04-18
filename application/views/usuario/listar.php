<h1>Datos de usuario</h1>
<!-- <table class="table table-striped table-bordered">
	<tr>
		<th>Correo</th>
		<th>Nombre de usuario</th>
		<th>Clave</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Descripci�n</th>
		<th>Acciones</th>
	</tr>
		<tr>
			<td>
				<?= $usuario->correo ?>
			</td>

			<td>
				<?= $usuario->nombreUsuario ?>
			</td>

			<td>
				<?= $usuario->clave?>
			</td>
			
			<td>
				<?= $usuario->nombre?>
			</td>
						<td>
				<?= $usuario->apellidos?>
			</td>
						<td>
				<?= $usuario->descripcion?>
			</td>			
			<td class="form-inline text-center">
				<form action="<?=base_url()?>usuario/delete" method="post">
					<button><img src="<?=base_url()?>assets/img/trash.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
			</td>
		</tr>
</table> -->
<div class="container" style="margin-left: 10%">
<h2>Nombre de usuario: <?=$usuario->nombreUsuario?></h2><hr/>
<h2>Correo electrónico: <?=$usuario->correo?></h2><hr/>
<h1>Información personal</h1>
<h2>Nombre: <?=$usuario->nombre?></h2><hr/>
<h2>Apellidos: <?=$usuario->apellidos?></h2><hr/>
<h2>Descripción: <?=$usuario->descripcion?></h2><hr/>
<form action="<?=base_url()?>usuario/delete" method="post">
					<button>Eliminar mi cuenta</button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
				<form action="<?=base_url()?>usuario/update" method="post">
					<button>Editar mi cuenta</button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
				<form action="<?=base_url()?>usuario/logout" method="post">
					<button>Cerrar sesión</button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
</div>