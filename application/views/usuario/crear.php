<script src="<?=base_url()?>assets/js/compruebaUsuario.js"></script>
<div class="modal-dialog">
	<div class="modal-content">
		<form action="<?=base_url()?>usuario/crearPost" method="POST" name="miForm">
			<div class="modal-header">
				<h4 class="modal-title">Crear Usuario:</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label><span>*</span>Correo electrónico:</label> <input type="mail"
						class="form-control" name="correo" id="correo" required>
						<label><span>*</span>Nombre
						de usuario:</label> <input type="text"
						class="form-control form-control-sm" name="nombreUsuario" id="nombreUsuario" required onkeyup="comprobarUsuario()">

						<div id="usuExiste"></div>

					<label><span>*</span>Contraseña:</label> <input type="password"
						class="form-control form-control-sm" name="clave" id="clave" required>
						 <label><span>*</span>Confirmar
						Contraseña:</label> <input type="password"
						class="form-control form-control-sm" name="claveRepe" id="claveRepe" required onkeyup="compararClaves()">
						<div id="errorClave"></div>
						 <label>Nombre:</label>
					<input type="text" class="form-control form-control-sm"
						name="nombre"> <label>Apellidos:</label> <input type="text"
						class="form-control form-control-sm" name="apellidos" id="apellidos"> <label>Fecha
						de Nacimiento:</label> <input type="text"
						class="form-control form-control-sm" name="fnac" id="fnac"> <label>Descripción:</label>
					<textarea class="form-control form-control-sm" name="descripcion"></textarea>
					 <br>
					<span style="margin-left: 15px;">*</span> Campos obligatiorios  <br> <br><input
				type="submit" class="btn btn-info" value="Crear" onclick="validarForm('usuario')">
				</div>
			</div>
			
		</form>
	</div>
</div>