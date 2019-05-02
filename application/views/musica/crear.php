<body>
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>musica/crearPost" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Crear música:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Nombre:</label>
							<input type="text" class="form-control" name="nombre" required>
						
							<label><span>*</span>Grupo:</label>
							<input type="text" class="form-control form-control-sm" name="grupo" required>
											
							<label>Álbum:</label>
							<input type="text" class="form-control form-control-sm" name="album" >
							
							<label>Género:</label>
							<input type="text" class="form-control form-control-sm" name="genero" >
							
							<label><span>*</span>Duración:</label>
							<input type="text" class="form-control form-control-sm" name="duracion" required>

							<label>Valoración:</label>
							<input type="text" class="form-control form-control-sm" name="valoracion" >

							<label><span>*</span>Fecha:</label>
							<input type="text" class="form-control form-control-sm" name="fecha" >
						</div>
					</div>
						<span style="margin-left: 15px;">*</span> Campos obligatiorios
						<input type="submit" class="btn btn-info" value="Crear" onclick="">
				</form>
			</div>
				

	<!--Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>