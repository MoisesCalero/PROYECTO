<link href="<?=base_url()?>assets/css/login.css"/>
<div class="login-form">
    <form action="<?=base_url()?>usuario/loginPost" method="post">
        <h2 class="text-center"><img src="<?=base_url()?>assets/img/logo.png" alt="logo" width="50px" height="50px">Inicia sesión:</h2>   
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="nombreUsuario" placeholder="Usuario" required="required">
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="clave" placeholder="Contraseña" required="required">				
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block">Iniciar sesión</button>
        </div>
        <div class="clearfix">
            <br>
            <a href="<?=base_url()?>usuario/ayudaLogin" class="pull-right">¿No recuerdas la contraseña?</a>
        </div>
    </form>
    <p class="text-center text-muted small">¿No tinenes cuenta? <a href="<?=base_url()?>usuario/crear">Registrate aquí</a></p>
</div>