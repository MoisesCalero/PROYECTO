<body>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']!="administrador"):?>
<h1>No tienes permiso para entrar aquí</h1>
<?php endif;?>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>pelicula/updatePost" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Actualizar película:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Nombre:</label>
							<input type="text" class="form-control" name="nombre" value="<?=$pelicula->nombre?>" id="nombre">
						<div id="errorNombre"></div>
							<label><span>*</span>Descripción:</label>
							<input type="text" class="form-control form-control-sm" name="descripcion" value="<?=$pelicula->descripcion?>" id="descripcion">
						<div id="errorDescripcion"></div>
						<label>Género:</label>
							<select name="genero" id="genero" class="form-control form-control-sm" required>
							<option value="accion">Acción</option>
							<option value="animacion">Animación</option>
							<option value="aventuras">Aventuras</option>
							<option value="cienciaficcion">Ciencia ficción</option>
							<option value="misterio">Misterio</option>
							<option value="terror">Terror</option>
							<option value="accion">Acción</option>
							<option value="fantasia">Fantasía</option>
							<option value="superheroes">Superhéroes</option>
							<option value="romantica">Romántica</option>
							<option value="drama">Drama</option>
							<option value="comedia">Comedia</option>
							<option value="thriller">Thriller</option>
							</select>

							<label><span>*</span>Duración:</label>
							<input type="text" class="form-control form-control-sm" name="duracion" value="<?=$pelicula->duracion?>" id="duracion">
							<div id="errorDuracion"></div>
							<label><span>*</span>Fecha:</label>
							<input type="text" class="form-control form-control-sm" name="fecha" id="fecha" value="<?=$pelicula->fecha?>" id="fecha">
							<div id="errorFecha"></div>
							<label><span>*</span>Imagen:</label>
                    		<input type="file" class="form-control form-control-sm" name="imagenPeli" id="imagenPeli">

							<input type="hidden" class="form-control form-control-sm" name="id" value="<?=$pelicula->id?>" >
							<br>
							<span style="margin-left: 15px;">*</span> Campos obligatiorios
							<br><br>
						<input type="button" class="btn btn-info" value="Guardar cambios" onclick="validarForm('peli')">
						</div>
					</div>
						
				</form>
			</div>
<?php endif;?>
</div>