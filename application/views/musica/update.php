<body>
<!-- Comprobar si un usuario tiene acceso o no, en este caso pueden acceder usuarios premium y 
administradores -->
<?php if(!isset($_SESSION['rol']) || isset($_SESSION['rol']) && $_SESSION['rol']!="premium"):?>
<h1>No tienes permiso para entrar aquí</h1>
<?php endif;?>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium" || $_SESSION['rol']=="administrador"):?>
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>musica/updatePost" method="POST" enctype="multipart/form-data" name="miForm">
					<div class="modal-header">						
						<h4 class="modal-title">Crear música:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Nombre:</label>
							<input type="text" class="form-control" name="nombre" value="<?=$musica->nombre?>" id="nombre">
						<div id="errorNombre"></div>
							<label>Grupo/Autor:</label>
							<input type="<?php if(isset($usuario)):?>hidden<?php else:?>text<?php endif;?>" class="form-control form-control-sm" name="autor" id="autor" <?php if(isset($usuario)):?>value="<?=$usuario->nombreUsuario?>" <?php endif;?> >
							<div id="errorAutor"></div>
							<?php if(isset($usuario)):?>
							<input type="hidden" name="idUsu" value=<?=$usuario->id?>/>
							<?php endif;?>		
							<label>Álbum:</label>
							<input type="text" class="form-control form-control-sm" name="album" id="album" value="<?=$musica->album?>" >
							<div id="errorAlbum"></div>
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
							<input type="text" class="form-control form-control-sm" name="duracion" id="duracion" value="<?=$musica->duracion?>">
							<div id="errorDuracion"></div>
							<label><span>*</span>Fecha:</label>
							<input type="text" class="form-control form-control-sm" name="fecha" id="fecha" value="<?=$musica->fecha?>" >
							<div id="errorFecha"></div>
							<label><span>*</span>Imagen:</label>
                    		<input type="file" class="form-control form-control-sm" name="imagenMusica" id="imagenMusica">

							<input type="hidden" class="form-control form-control-sm" name="id" value="<?=$musica->id?>" >
							<br>
							<span style="margin-left: 15px;">*</span> Campos obligatiorios
							<br><br>
						<input type="button" class="btn btn-info" value="Guardar cambios" onclick="validarForm('musica')">
						</div>
					</div>
						
				</form>
			</div>
<?php endif;?>
</div>