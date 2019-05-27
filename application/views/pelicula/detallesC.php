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
		margin-left:22%;
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
		margin-left:22%;
		margin-top:5%;
	}
	.comentarios{
		margin-top:3%;
		background-color:white;
		width:75%;
		
	}
	.comentIndividual{
		
		width:10%;
		display: inline-block;
		padding:15px;
		height:10%;
		margin-bottom:-2%;
		word-break: break-all;
		height:30%;
	}
	.comentIndividual2{
		
		display: inline-block;
		padding:15px;
		height:10%;
		margin-bottom:8%;
		height:30%;
		word-break: break-all;
	}
	.btn-link{
		display:inline-block;
	}
	
</style>
		<div class="fondo">
				<img src="<?=base_url()?>assets/img/pp.png" alt="portada" class="caratula">
			 	 <div class="fav"><span id="fav" class="glyphicon glyphicon-heart-empty" onclick="cambiarIcono()"></span></div>

				<h1 class="titulo"><span><?=$pelicula->nombre ?></span></h1>
				<select name="estado" class="form-control estado">
					<option>Selecciona</option>
					<option>Viendo</option>
					<option>En pausa</option>
					<option>Dejada</option>
					<option>Planeando ver</option>
				</select>	
				<br>
  	  		</div>
			<br>
  	  		<p class="text-center">
  	  			<?=$pelicula->descripcion ?>
  	  		</p>
  	  		<p class="text-center">
  	  			<?=$pelicula->descripcion ?>
  	  		</p><br>
  	  		<p class="text-center"> 
  	  			Trailer:
  	  		</p>
  	  		<iframe width="853" height="480" src="https://www.youtube.com/embed/2DRD4xSUbhM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
			<div id="comentarios">
				
				<form action="<?=base_url()?>pelicula/crearComentario" method="POST">
				<?php if(isset($_SESSION['id'])):?>
				<input type="hidden" name="idUsuario" value="<?=$_SESSION['id']?>"/>
				<?php endif;?>
				<input type="hidden" name="idPeli" value="<?=$pelicula->id?>"/>
				<label for="comment">Añadir un comentario:</label>
  					<textarea style="resize: none; width:45%;" class="form-control" rows="6" id="comment" name="comentario"></textarea><br>
				<input type="submit" name="Publicar" class="btn-info" style="border-radius:5px;" value="Publicar"/>
				</form>
				
				<div class="comentarios">
					
					<?php foreach ($pelicula->ownComentarioList as $comentario): ?>
						<div>
							
						</div>
						<div class="comentIndividual">
						<img src="<?=base_url()?>assets/img/pp.png" alt="A" width="25" heigth="25" style="margin-left:7%;">
							<form action="<?=base_url()?>usuario/ver" method="POST">
								<input type="hidden" name="id" value="<?=$comentario->usuario->id?>"/>
								<input type="submit" class="btn btn-link" value="<?=$comentario->usuario->nombre_usuario?>"/>
							</form><br><br>
							<small>Comentó:</small>
						</div>
						<div class="comentIndividual2">
							 <?=$comentario->comentario?><br/>
						</div>
						<hr>
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