<h2>Lista de usuarios</h2>
<table class="table table-striped table-bordered">
	<tr>
		<th>Nombre de usuario</th>
		<th>Correo</th>
		<th>Rol</th>
		<th>Acciones</th>
	</tr>
	
	<?php foreach ($usuarios as $usuario): ?>
		<tr>
			<td>
				<?= $usuario->nombreUsuario ?>
			</td>

			<td>
				<?= $usuario->correo ?>
			</td>

			<td>
				<?= $usuario->rol?>
			</td>
			
			<td class="form-inline text-center">
				<form action="<?=base_url()?>usuario/update" method="post">
					<button><img src="<?=base_url()?>assets/img/edit.png" width="10" height="15"/>Editar</button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
				<form action="<?=base_url()?>usuario/delete" method="post">
					<button><img src="<?=base_url()?>assets/img/trash.png" width="10" height="15"/>Eliminar</button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
			</td>
		</tr>
	<?php endforeach;?>
</table>