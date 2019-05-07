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
		margin-left:35%;
	}
	.fav{
		color:white;
		font-size: 50px;
		padding:15px;
		margin-top: 1%;
		margin-right:1%;
		float: right;
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
  	  		<iframe src="https://www.youtube.com/watch?v=vak9ZLfhGnQ" frameborder="0"></iframe>
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