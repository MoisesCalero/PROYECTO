<h2>Nombre: <?=$pelicula->nombre?></h2><hr/>
<h2>Descripción: <?=$pelicula->descripcion?></h2><hr/>
<h2>Género: <?=$pelicula->genero?></h2><hr/>
<h2>Duración: <?=$pelicula->duracion?></h2><hr/>
<h2>Valoración: <?=$pelicula->valoracion?></h2><hr/>
<h2>Fecha: <?=$pelicula->fecha?></h2><hr/>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<form action="<?=base_url()?>pelicula/update" method="POST">
<input type="hidden" name="id" value="<?=$pelicula->id?>"/>
<input type="submit" value="EDITAR"/>
</form>
<?php endif;?>