<h2>Nombre: <?=$musica->nombre?></h2><hr/>
<h2>Grupo: <?=$musica->grupo?></h2><hr/>
<h2>Álbum: <?=$musica->album?></h2><hr/>
<h2>Género: <?=$musica->genero?></h2><hr/>
<h2>Duración: <?=$musica->duracion?></h2><hr/>
<h2>Valoración: <?=$musica->valoracion?></h2><hr/>
<h2>Fecha: <?=$musica->fecha?></h2><hr/>
<?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="administrador"):?>
<form action="<?=base_url()?>musica/update" method="POST">
<input type="hidden" name="id" value="<?=$musica->id?>"/>
<input type="submit" value="EDITAR"/>
</form>
<?php endif;?>