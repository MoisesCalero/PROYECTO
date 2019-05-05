<?php 

?>
<h1>MEJORAR MI CUENTA</h1>
<p>¿Quieres convertirte en usuario premium?</p>
<form action="<?=base_url()?>usuario/upgradePost" method="POST">
<input type="hidden" name="id" value="<?=$usuario->id?>"/>
<input type="submit" value="Mejorar mi cuenta"/>
</form>