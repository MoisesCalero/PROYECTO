<h2>Registro de usuario</h2>

<form method="post" action="<?=base_url()?>usuario/crearPost">
<!-- Con JavaScript y AJAX se valida que el correo no esté ya en la base de datos, para que no se repitan -->
	Correo electrónico <input type="text" name="correo" required="required">	<br />

<!-- Con JavaScript y AJAX se valida que el usuario no esté ya en la base de datos, para que no se repitan -->
	Nombre de usuario	<input type="text" name="nombreUsuario" required="required">	<br />
	
<!-- Solo se enviará una de las claves, pero se valida con JavaScript si las contraseñas coinciden -->
	Contraseña	<input type="password" name="clave" required="required">	<br />
	Repite la contraseña	<input type="password" name="claveRepe" required="required">	<br />
<fieldset>
<legend>Información personal</legend>(no es necesaria)


	Nombre <input type="text" name="nombre">	<br />

	Apellido(s)	<input type="text" name="apellidos">	<br />
	Descripción<textarea name="descripcion"></textarea>
	
	<br/>
</fieldset>
	<input type="submit" />
</form>