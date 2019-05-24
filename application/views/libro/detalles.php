<style>
	body{
    	background-color: #E3E3E3;
    }
	.container{
		background-color: #fdffee;
		margin-top:2%;
		margin-bottom: 2%;
		border-radius: 5px;
		padding: 10px;
	}
	.logo{
		height: 300px;
		width:95%;
		border-radius: 5px;
		opacity: 0.8;
		
	}
	.caratula{
		height: 30%;
		width: 20%;
		margin-left: 2%;
		margin-top: 2%;
		border-radius: 5px;
		border:5px solid white;
	}
	.fondo{
		 background-image: url("foto.png");
		 background-size: 100%;
		 background-repeat: no-repeat;
		 margin-right:1%;
		 width: 100%;
		 opacity: 0.9;
	}
	.titulo{
		color:white;
		padding:15px;
		display: block;
		margin-bottom: 2%;
		
		margin-top: 6%;
		margin-right: 65%;
	}
	.estado{
		margin-left:2%; 
		width: 125px;
		margin-top:2%;
		margin-left:85%;
	}
	iframe{
		margin-left:17%;
	}
	.fav{
		color:white;
		font-size: 50px;
		padding:15px;
		margin-top: 1%;
		margin-right:1%;
		float: right;
	}
	#comentarios{
		margin-left:17%;
		margin-top:5%;
	}
	.comentarios{
		margin-top:3%;
	}
</style>
			<div class="fondo">
				<img src="<?=base_url()?>assets/img/pp.png" alt="portada" class="caratula">
			 	 <div class="fav"><span id="fav" class="glyphicon glyphicon-heart-empty" onclick="cambiarIcono()"></span></div>

				<h1 class="titulo"><span><?=$libro->nombre ?></span></h1>
				<select name="estado" class="form-control estado">
					<option value="">Selecciona</option>
					<option value="seguir">Seguir</option>
					<option value="viendo">Viendo</option>
					<option value="pausa">En pausa</option>
					<option value="dejada">Dejada</option>
				</select>
				<br>
  	  		</div>
			<br>
  	  		<p class="text-center">
  	  			<?=$libro->descripcion ?>
  	  		</p>
  	  		<p class="text-center">
  	  			<?=$libro->descripcion ?>
  	  		</p><br>
  	  		<p class="text-center"> 
  	  			Trailer:
  	  		</p>
  	  		<iframe width="853" height="480" src="https://www.youtube.com/embed/2DRD4xSUbhM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br/>
				<div id="comentarios">
				Añadir un comentario:
				<form action="<?=base_url()?>libro/crearComentario" method="POST">
				<?php if(isset($_SESSION['id'])):?>
				<input type="hidden" name="idUsuario" value="<?=$_SESSION['id']?>"/>
				<?php endif;?>
				<input type="hidden" name="idLibro" value="<?=$libro->id?>"/>
				<input type="text" name="comentario"/>
				<input type="submit" name="Publicar"/>
				</form>
				<div class="comentarios">
					<?php foreach ($libro->ownComentariolibroList as $comentario): ?>
					<form action="<?=base_url()?>usuario/ver" method="POST">
					<input type="hidden" name="id" value="<?=$comentario->usuario->id?>"/>
					<input type="submit" id="enlaceBoton" value="<?=$comentario->usuario->nombre_usuario?>"/>
				</form> ha comentado: <?=$comentario->comentario?><br/>
					<?php endforeach;?>
				</div>
				</div>
<script>
	function cambiarIcono(){
		//Cambia icono y a�ade a favoritos
		if(document.getElementById("fav").className=='glyphicon glyphicon-heart'){
			document.getElementById("fav").className='glyphicon glyphicon-heart-empty';
			
		}
		else{
			document.getElementById("fav").className='glyphicon glyphicon-heart';
			
		}
			
	}
</script>