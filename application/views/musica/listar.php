<h2>Lista de música</h2>
		<?php foreach ($musicas as $musica): ?>
			<div class="card" style="width: 18rem;">
	  			<img class="card-img-top" src="<?=base_url() ?>assets/img/logo.png" alt="cartel">
			  <div class="card-body">
			    <h5 class="card-title"><?=$musica->nombre ?></h5>
			    <p class="card-text"><?= $musica->genero?></p>
			    <?php if($_SESSION['rol']=="administrador"): ?>
			    <form action="<?=base_url()?>musica/update" method="post">
			    <input type="hidden" name="id" value="<?=$musica->id ?>"/>
   			    <input type="submit" class="btn btn-primary btn-admin" value="Editar esta música"/>
			    </form>
			    <?php endif;?>
			    <form action="<?=base_url()?>musica/detalles" method="post">
			    <input type="hidden" name="id" value="<?=$musica->id ?>"/>
   			    <input type="submit" class="btn btn-primary" value="Más información..."/>
			    </form>
			  </div>
			</div>
			<?php endforeach;?>