<body>
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>musica/updatePost" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Crear música:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Nombre:</label>
							<input type="text" class="form-control" name="nombre" value="<?=$musica->nombre?>">
						
							<label><span>*</span>Grupo:</label>
							<input type="text" class="form-control form-control-sm" name="grupo" value="<?=$musica->grupo?>">
											
							<label>Álbum:</label>
							<input type="text" class="form-control form-control-sm" name="album" value="<?=$musica->album?>" >
							
							<label>Género:</label>
							<input type="text" class="form-control form-control-sm" name="genero" value="<?=$musica->genero?>" >
							
							<label><span>*</span>Duración:</label>
							<input type="text" class="form-control form-control-sm" name="duracion" value="<?=$musica->duracion?>">

							<label>Valoración:</label>
							<input type="text" class="form-control form-control-sm" name="valoracion" value="<?=$musica->valoracion?>" >

							<label><span>*</span>Fecha:</label>
							<input type="text" class="form-control form-control-sm" name="fecha" value="<?=$musica->fecha?>" >
							
							<input type="text" class="form-control form-control-sm" name="id" value="<?=$musica->id?>" >
						</div>
					</div>
						<span style="margin-left: 15px;">*</span> Campos obligatiorios
						<input type="submit" class="btn btn-info" value="Guardar cambios" onclick="">
				</form>
			</div>
				

	<!--Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>