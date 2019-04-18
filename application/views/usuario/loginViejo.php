<h1>Login de usuario</h1>
<form action="<?=base_url()?>usuario/loginPost" method="POST">
Nombre de usuario: <input type="text" name="nombreUsuario" placeholder="nombre de usuario"/>
Contraseña: <input type="password" name="clave" placeholder="Contraseña"/>
<input type="submit" name="Enviar" value="Enviar"/>
</form>
<form action="<?=base_url()?>usuario/ayudaLogin">
¿Problemas de inicio de sesión?
</form>
<a href="<?=base_url()?>usuario/crear">Crear una cuenta nueva</a>