<h2>Actualizar usuario</h2>
<form method="post" action="<?=base_url()?>usuario/updatePost">
	<input type="hidden" name="id" value="<?=$usuario->id?>"/>
	
	Correo electrónico
	<input type="text" name="correo_nuevo" required="required" value="<?=$usuario->correo?>" />
	<br />
	
	Nombre de usuario
	<input type="text" name="nombreUsuario_nuevo" required="required" value="<?=$usuario->nombreUsuario ?>" />
	<br />
	
	Contraseña
	<input type="password" name="clave_nuevo" required="required" value="<?=$usuario->clave?>" />
	<br />
	
	Nombre
	<input type="text" name="nombre_nuevo" value="<?=$usuario->nombre?>" />
	<br />
	
	Apellidos
	<input type="text" name="apellidos_nuevo" value="<?=$usuario->apellidos?>" />
	<br />
	
	Descripción
	<input type="text" name="descripcion_nuevo" value="<?=$usuario->descripcion?>" />
	<br />
	
	Rol
	<input type="text" name="rol" value="<?=$usuario->rol?>" disabled="true" />
	<a href="<?php base_url()?>usuario/mejorar"><button type="button" name="mejorar">Mejorar rol</button></a>
	<a href="<?php base_url()?>usuario/listar"><button type="button" name="listar">Listar</button></a>
	
	<input type="submit" />
</form>
