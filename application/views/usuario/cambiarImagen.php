<div class="modal-dialog">
	<div class="modal-content">
		<form action="<?=base_url()?>usuario/cambiarImagenPost" method="POST" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Modificar foto de perfil:</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label><span>*</span>Imagen:</label>
                    <input type="file"	class="form-control" name="imagen" id="imagen" required>
                    <input type="hidden" class="form-control" name="id" value="<?=$_SESSION['usuario']?>">
                    <br><br>
					<input	type="submit" class="btn btn-info" value="Crear" onclick="">
				</div>
			</div>
		</form>
	</div>
</div>