<?php 
session_start();
$nombre;
$idUsu;
//if(isset($_SESSION['usuario']))
if(isset($_SESSION['usuario'])&& $_SESSION['usuario']!=null && $_SESSION['usuario']!=""){
    $nombre=$_SESSION['usuario'];
    $idUsu=$_SESSION['id'];
}
else{
    $nombre=null;
}
$dir=base_url();
if($nombre!=null){
    //<li class="pulsable"><a href="{$dir}usuario/listar" id="${nombre}">${nombre}</a></li>;
    $enlace=<<<html
<form action="${dir}usuario/listar" method="post">
<input type="hidden" name="id" value="${idUsu}"/>
<li class="pulsable"><button>${nombre}</button></li>
</form>
html;
}
else{
    //session_destroy();
    $enlace="<li class='pulsable'><a href='{$dir}usuario/login'>Login</a></li>";
}
?>
<nav class="navbar navbar-default" role="navigation" >
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><img src="<?=base_url()?>assets/img/logo.png" width="50px" height="50px" alt="Logotipo"></li>
        </ul>
        <ul class="nav navbar-nav navbar-center">
            <li class="pulsable"><a href="#">Películas</a></li> 
            <li class="pulsable"><a href="#">Series</a></li>
            <li class="pulsable"><a href="#">Música</a></li>
            <li class="pulsable"><a href="#">Libros</a></li>

            <li class="buscador">
				 <form class="form-inline" style="margin-top: 8px;">
    				<input class="form-control mr-sm-2" type="search" placeholder="Búsqueda..." aria-label="Busqueda...">
    				<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="<?=base_url()?>assets/img/buscar.png" width="18px" height="18px" alt="Buscar"></button>
  				</form>
            <li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?=$enlace?>
        </ul>
    </div>
</nav>