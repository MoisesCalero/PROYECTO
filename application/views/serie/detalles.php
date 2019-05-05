<h2>Nombre: <?=$serie->nombre?></h2><hr/>
<h2>Descripción: <?=$serie->descripcion?></h2><hr/>
<h2>Género: <?=$serie->genero?></h2><hr/>
<h2>Duración: <?=$serie->duracion?></h2><hr/>
<h2>Valoración: <?=$serie->valoracion?></h2><hr/>
<h2>Fecha: <?=$serie->fecha?></h2><hr/>
<h2>Temporadas: <?=$serie->temporadas?></h2><hr/>
<h2>Capítulos: <?=$serie->capitulos?></h2><hr/>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<form action="<?=base_url()?>serie/update" method="POST">
<input type="hidden" name="id" value="<?=$serie->id?>"/>
<input type="submit" value="EDITAR"/>
</form>
<?php endif;?>