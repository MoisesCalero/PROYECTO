<?php if(isset($_SESSION['rol']) && $_SESSION['rol']!="administrador"):?>
<h1>No tienes permiso para entrar aquí</h1>
<?php endif;?>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<h2>Lista de usuarios</h2>
<table class="table table-bordered table-hover">
	
	<thead style="background-color:#373a3c; color:white;">
		<tr>
			<th>Nombre de usuario</th>
			<th>Correo</th>
			<th>Rol</th>
			<th>Acciones</th>
		</tr>
	</thead>
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
					<button ><span class="glyphicon glyphicon-pencil" style="color:black;"></span></button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
				<form action="<?=base_url()?>usuario/delete" method="post">
					<button ><span class="glyphicon glyphicon-trash" style="color:black;"></span></button>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
				</form>
			</td>
			</tr>
			<?php endforeach;?>
</table>
<?php endif;?>