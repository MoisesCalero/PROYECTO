
	<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>usuario/updatePost" method="POST" name="miForm">
					<div class="modal-header">						
						<h4 class="modal-title">Actualizar Usuario:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Correo electrónico:</label>
							<input type="mail" class="form-control" name="correo" id="correo" required value="<?=$usuario->correo?>">
						
							<label><span>*</span>Nombre de usuario:</label>
							<input type="text" class="form-control form-control-sm" name="nombreUsuario" id="nombreUsuario" required value="<?=$usuario->nombreUsuario?>">
											
							
							<label>Nombre:</label>
							<input type="text" class="form-control form-control-sm" name="nombre" id="nombre" value="<?=$usuario->nombre?>">

							<label>Apellidos:</label>
							<input type="text" class="form-control form-control-sm" name="apellidos" id="apellidos" value="<?=$usuario->apellidos?>">

							<label>Fecha de Nacimiento:</label>
							<input type="text" class="form-control form-control-sm" name="fnac" id="fnac" value="<?=$usuario->fecha_nacimiento?>">
							
							<label>Descripción:</label>
							<textarea class="form-control form-control-sm" name="descripcion" id="descripcion" value="<?=$usuario->descripcion?>"></textarea>
							
							<label>Rol:</label>
							<input type="hidden" class="form-control form-control-sm" name="rol" id="rol" value="<?=$usuario->rol?>"/>
														
							<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
							<br>
							<span style="margin-left: 15px;">*</span> Campos obligatiorios
							<br><br>
							<input type="button" class="btn btn-info" value="Crear" onclick="validarForm('usuario')" >
						</div>
					</div>
					
	</form>
			</div>
			
</div>