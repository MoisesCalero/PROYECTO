<h2>Nombre: <?=$libro->nombre?></h2><hr/>
<h2>Descripción: <?=$libro->descripcion?></h2><hr/>
<h2>Número de páginas: <?=$libro->numero_paginas?></h2><hr/>
<h2>Autor: <?=$libro->autor?></h2><hr/>
<h2>Editorial: <?=$libro->editorial?></h2><hr/>
<h2>Valoración: <?=$libro->valoracion?></h2><hr/>
<h2>Fecha: <?=$libro->fecha?></h2><hr/>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<form action="<?=base_url()?>libro/update" method="POST">
<input type="hidden" name="id" value="<?=$libro->id?>"/>
<input type="submit" value="EDITAR"/>
</form>
<?php endif;?>