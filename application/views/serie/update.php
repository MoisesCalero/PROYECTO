<body>
	<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>pelicula/updatePost" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Actualizar serie:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Correo electrónico:</label>
							<input type="mail" class="form-control" name="correo" required value="<?=$usuario->correo?>">
						
							<label><span>*</span>Nombre de usuario:</label>
							<input type="text" class="form-control form-control-sm" name="nombreUsuario" required value="<?=$usuario->nombreUsuario?>">
											
							
							<label><span>*</span>Contraseña:</label>
							<input type="password" class="form-control form-control-sm" name="clave" required value="<?=$usuario->clave?>">

							<label><span>*</span>Confirmar Contraseña:</label>
							<input type="password" class="form-control form-control-sm" name="claveRepe" required>
							
							<label>Nombre:</label>
							<input type="text" class="form-control form-control-sm" name="nombre" value="<?=$usuario->nombre?>">

							<label>Apellidos:</label>
							<input type="text" class="form-control form-control-sm" name="apellidos"  value="<?=$usuario->apellidos?>">

							<label>Fecha de Nacimiento:</label>
							<input type="date" class="form-control form-control-sm" name="fnac" >
							
							<label>Descripción:</label>
							<textarea class="form-control form-control-sm" name="descripcion"  value="<?=$usuario->descripcion?>"></textarea>

						</div>
					</div>
						<span style="margin-left: 15px;">*</span> Campos obligatiorios
						<input type="submit" class="btn btn-info" value="Crear" onclick="">
				</form>
				Rol
	<input type="text" name="rol" value="<?=$usuario->rol?>" disabled="true" />
	<a href="<?php base_url()?>usuario/mejorar"><button type="button" name="mejorar">Mejorar rol</button></a>
			</div>
				

	<!--Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>