<body>
<!-- Comprobar si el usuario tiene permiso para acceder, en caso de libros
podrán acceder usuarios administradores y premium -->
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']!="premium"):?>
<h1>No tienes permiso para entrar aquí</h1>
<?php endif;?>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="premium" || $_SESSION['rol']=="administrador"):?>
	<!-- Formulario de actualización de libro -->
	<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>libro/updatePost" method="POST" enctype="multipart/form-data" name="miForm">
					<div class="modal-header">						
						<h4 class="modal-title">Actualizar libro:</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						<label><span>*</span>Nombre:</label>
							<input type="mail" class="form-control" name="nombre" required value="<?=$libro->nombre?>" id="nombre">
						<div id="errorNombre"></div>
							<label><span>*</span>Descripción:</label>
							<input type="text" class="form-control form-control-sm" name="descripcion" required value="<?=$libro->descripcion?>" id="descripcion">
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

							<label>Número de páginas:</label>
							<input type="text" class="form-control form-control-sm" name="numero_paginas" value="<?=$libro->numeroPaginas?>" id="numeroPaginas">
							<div id="errorNumeroPaginas"></div>
							<?php if(isset($usuario) && $usuario!=null):?>
							<label>Autor:</label>
							<input type="<?php if(isset($usuario) && $usuario!=null):?>hidden<?php else:?>text<?php endif;?>" class="form-control form-control-sm" id="autor" name="autor" value="<?php if(isset($usuario)):?><?=$usuario->nombreUsuario?><?php else:?><?=$libro->autor?>" <?php endif;?> >
							<div id="errorAutor"></div>
							<input type="hidden" name="idUsu" value=<?=$usuario->id?>/>
							<?php endif;?>
							
							<label>Editorial:</label>
							<input type="text" class="form-control form-control-sm" name="editorial" value="<?=$libro->editorial ?>" id="editorial">
							<div id="errorEditorial"></div>
							<label>Fecha de publicación:</label>
							<input type="text" class="form-control form-control-sm" name="fecha" id="fecha" value="<?=$libro->fecha ?>">
							<div id="errorFecha"></div>
							<label><span>*</span>Imagen:</label>
                    		<input type="file" class="form-control form-control-sm" name="imagenLibro" id="imagenLibro">

							<input type="hidden" class="form-control form-control-sm" name="id" value="<?=$libro->id ?>">
							
							<br>
							<span style="margin-left: 15px;">*</span> Campos obligatiorios
							<br><br>
							<input type="button" class="btn btn-info" value="Crear" onclick="validarForm('libro')">
						</div>
					</div>
						
				</form>
			</div>
<?php endif;?>
</div>