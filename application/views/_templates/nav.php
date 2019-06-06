<?php
	if(session_id() == '' || !isset($_SESSION)) {
		// session isn't started
		session_start();
	}
$nombre;
$idUsu;
// if(isset($_SESSION['usuario']))
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != null && $_SESSION['usuario'] != "") {
    $nombre = $_SESSION['usuario'];
    $idUsu = $_SESSION['id'];
} else {
    $nombre = null;
}
$dir = base_url();
if ($nombre != null) {
    // <li class="pulsable"><a href="{$dir}usuario/listar" id="${nombre}">${nombre}</a></li>;
    $enlace = <<<html
<li class="pulsable" >
<form action="${dir}usuario/listar" method="post">
<input type="hidden" name="id" value="${idUsu}"/>
<button id="botonTamanio"><span class="usu">${nombre}</span></button>
</form></li>
html;
} else {
    // session_destroy();
    $enlace = "<li class='pulsable '><a href='{$dir}usuario/login'>Login</a></li>";
}
?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/nav.css">
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<a href="<?=base_url()?>"><li><img src="<?=base_url()?>assets/img/logo.png" width="50px"
				height="50px" alt="Logotipo"></li></a>
		</ul>
		<ul class="nav navbar-nav navbar-center">
			<li class="pulsable"><a href="<?=base_url() ?>pelicula/listar">Películas</a></li>
			<li class="pulsable"><a href="<?=base_url() ?>serie/listar">Series</a></li>
			<li class="pulsable"><a href="<?=base_url() ?>musica/listar">Música</a></li>
			<li class="pulsable"><a href="<?=base_url() ?>libro/listar">Libros</a></li>
            <?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" onmouseover="this.style.backgroundColor='#4660CB';" onmouseout="this.style.backgroundColor='#5475ff';">Administrador
                <span class="caret"></span></a>
                <ul class="dropdown-menu" style="background-color: #5475ff;">
                <li ><a href="<?=base_url() ?>pelicula/crear" onmouseover="this.style.backgroundColor='#4660CB';" onmouseout="this.style.backgroundColor='#5475ff';">Películas</a></li>
                <li ><a href="<?=base_url() ?>serie/crear" onmouseover="this.style.backgroundColor='#4660CB';" onmouseout="this.style.backgroundColor='#5475ff';">Series</a></li>
                <li ><a href="<?=base_url() ?>libro/crear" onmouseover="this.style.backgroundColor='#4660CB';" onmouseout="this.style.backgroundColor='#5475ff';">Libros</a></li>
                <li ><a href="<?=base_url() ?>musica/crear" onmouseover="this.style.backgroundColor='#4660CB';" onmouseout="this.style.backgroundColor='#5475ff';">Música</a></li>
                <li ><a href="<?=base_url()?>usuario/listarTodo" onmouseover="this.style.backgroundColor='#4660CB';" onmouseout="this.style.backgroundColor='#5475ff';">Lista de Usuarios</a></li>
                </ul>
            </li>
<?php endif;?>
		</ul>
		<ul class="nav navbar-nav navbar-right" id="botonLogin" >
		<li class="buscadorLi" >
            <div class="buscador" style="margin-right:100px;">
                <form class="form-inline" style="margin-top: 8px;margin-left: 1%;">
                    <input class="form-control mr-sm-2 inputBusqueda" type="search" onkeyup=" buscarResultados('<?=base_url()?>home/cargaResultados');" placeholder="Búsqueda..." aria-label="Busqueda..." id="npt" >
                </form>
            </div>
            <div id="divBusqueda" hidden style="width:300px;overflow-y: scroll;overflow-x:hidden; height:300px;">
                <div id="buscaPelis" class="text-center"></div>
                <div id="buscaSeries" class="text-center"></div>
                <div id="buscaMusica" class="text-center"></div>
                <div id="buscaLibros" class="text-center"></div>
            </div>
        </li>
            <?=$enlace?>
        </ul>
	</div>
</nav>
<div class="container">