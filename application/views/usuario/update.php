
	<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>usuario/updatePost" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Actualizar Usuario:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Correo electrónico:</label>
							<input type="mail" class="form-control" name="correo" required value="<?=$usuario->correo?>">
						
							<label><span>*</span>Nombre de usuario:</label>
							<input type="text" class="form-control form-control-sm" name="nombreUsuario" required value="<?=$usuario->nombreUsuario?>">
											
							
							<label>Nombre:</label>
							<input type="text" class="form-control form-control-sm" name="nombre" value="<?=$usuario->nombre?>">

							<label>Apellidos:</label>
							<input type="text" class="form-control form-control-sm" name="apellidos"  value="<?=$usuario->apellidos?>">

							<label>Fecha de Nacimiento:</label>
							<input type="text" class="form-control form-control-sm" name="fnac" id="fnac" value="<?=$usuario->fecha_nacimiento?>">
							
							<label>Descripción:</label>
							<textarea class="form-control form-control-sm" name="descripcion"  value="<?=$usuario->descripcion?>"></textarea>
							
							<label>Rol:</label>
							<input type="hidden" class="form-control form-control-sm" name="rol" value="<?=$usuario->rol?>"/>
														
							<input type="hidden" name="id" value="<?=$usuario->id ?>"/>

						</div>
					</div>
					<span style="margin-left: 15px;">*</span> Campos obligatiorios
					
	<input type="submit" class="btn btn-info" value="Crear" onclick="" >
	</form>
			</div>
			
</div>

	<!--Bootstrap-->