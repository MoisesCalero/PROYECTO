var peticion_http;
var peticion_httpFav;
var peticion_httpEstado;
var peticion_httpValoracion;
var peticion_httpComentario;
//Comprobar en el servidor si la película está en favoritos del usuario
function getFavorito(usuario, id, tipo){
	if(window.XMLHttpRequest){
		peticion_httpFav= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_httpFav= new ActiveXObject("Microsoft.XMLHTTP");
	}
	peticion_httpFav.open('POST', "cargaFavoritos" , true);         
	peticion_httpFav.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_httpFav.send("usuario="+usuario+"&"+tipo+"="+id);
	peticion_httpFav.onreadystatechange=comprobarFavorito;
}
//En caso de que esté en favoritos cambiar el icono
function comprobarFavorito(argument) {
	if (peticion_httpFav.readyState==4) {
		if (peticion_httpFav.status==200) {
			if(peticion_httpFav.responseText=="Encontrado"){
				document.getElementById("fav").className='glyphicon glyphicon-heart';
			}
		}
	}
}
//Comprobar en el servidor el estado en el que el usuario tiene guardada la película
function getEstado(usuario, id, tipo){
	if(window.XMLHttpRequest){
		peticion_httpEstado= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_httpEstado= new ActiveXObject("Microsoft.XMLHTTP");
	}
	peticion_httpEstado.open('POST', "cargaEstado" , true);         
	peticion_httpEstado.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_httpEstado.send("usuario="+usuario+"&"+tipo+"="+id);
	peticion_httpEstado.onreadystatechange=comprobarEstado;
}
//En caso de que tenga algún esado, cambiar la opción del select
function comprobarEstado(argument) {
	if (peticion_httpEstado.readyState==4) {
		if (peticion_httpEstado.status==200) {
			if(peticion_httpEstado.responseText=="seguir"){
				document.getElementById("estado").selectedIndex="1";
			}
			else if(peticion_httpEstado.responseText=="pendiente"){
				document.getElementById("estado").selectedIndex="2";
			}
			else if(peticion_httpEstado.responseText=="terminada"){
				document.getElementById("estado").selectedIndex="3";
			}
			else if(peticion_httpEstado.responseText=="dejada"){
				document.getElementById("estado").selectedIndex="4";
			}
			else{
				document.getElementById("estado").selectedIndex="0";
			}
		}
	}
}
//Cambiar el icono y el estado en la base de datos en función de si el usuario quiere añadir la
//película a favoritos o quitarla
function cambiarIconoYEstado(usuario, id, tipo){
	cambiarIcono();
	enviarAjaxFav(usuario, id, tipo);
}
//Cambiar el icono de favoritos
function cambiarIcono(){
	if(document.getElementById("fav").className=='glyphicon glyphicon-heart'){
		document.getElementById("fav").className='glyphicon glyphicon-heart-empty';
	}
	else{
		document.getElementById("fav").className='glyphicon glyphicon-heart';
	}		
}
//Enviar mediante AJAX el estado de una película
function enviarAjax(usuario, id, tipo){
	if(window.XMLHttpRequest){
		peticion_http= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_http= new ActiveXObject("Microsoft.XMLHTTP");
	}
	var estado=document.getElementById("estado").value;
	peticion_http.open('POST', "cambiaEstado" , true);         
	peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_http.send("estado="+estado+"&usuario="+usuario+"&"+tipo+"="+id);
	console.log(peticion_http);
	peticion_http.onreadystatechange=muestraContenido;
}
//Comprobar que se modifique correctamente el estado de favoritos
function muestraContenido(argument) {
	if (peticion_http.readyState==4) {
		if (peticion_http.status==200) {
			if(peticion_http.responseText=="error"){
				console.log("error");
			}
			else{
				console.log("bien");
			}
		}
	}
}
//Añadir mediante AJAX una película a favoritos
function enviarAjaxFav(usuario, id, tipo){
	if(window.XMLHttpRequest){
		peticion_http= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_http= new ActiveXObject("Microsoft.XMLHTTP");
	}
	peticion_http.open('POST', "Favoritos" , true);         
	peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_http.send("usuario="+usuario+"&"+tipo+"="+id);
	peticion_http.onreadystatechange=muestraContenido;
}
//Comprobar que se añade correctamente
function muestraContenido(argument) {
	if (peticion_http.readyState==4) {
		if (peticion_http.status==200) {
			if(peticion_http.responseText=="error"){
				console.log("error");
			}
			else{
				console.log("bien");
			}
		}
	}
}

//Cambiar los iconos de valoración de una película y enviarlo a través de AJAX
function valorar(est, valor, usuario, id, tipo){
	if(valor==1){
		document.getElementById("estrella1").className='glyphicon glyphicon-star';
		document.getElementById("estrella2").className='glyphicon glyphicon-star-empty';
		document.getElementById("estrella3").className='glyphicon glyphicon-star-empty';
		document.getElementById("estrella4").className='glyphicon glyphicon-star-empty';
		document.getElementById("estrella5").className='glyphicon glyphicon-star-empty';
	}
	else if(valor==2){
		document.getElementById("estrella1").className='glyphicon glyphicon-star';
		document.getElementById("estrella2").className='glyphicon glyphicon-star';
		document.getElementById("estrella3").className='glyphicon glyphicon-star-empty';
		document.getElementById("estrella4").className='glyphicon glyphicon-star-empty';
		document.getElementById("estrella5").className='glyphicon glyphicon-star-empty';
	}
	else if(valor==3){
		document.getElementById("estrella1").className='glyphicon glyphicon-star';
		document.getElementById("estrella2").className='glyphicon glyphicon-star';
		document.getElementById("estrella3").className='glyphicon glyphicon-star';
		document.getElementById("estrella4").className='glyphicon glyphicon-star-empty';
		document.getElementById("estrella5").className='glyphicon glyphicon-star-empty';
	}
	else if(valor==4){
		document.getElementById("estrella1").className='glyphicon glyphicon-star';
		document.getElementById("estrella2").className='glyphicon glyphicon-star';
		document.getElementById("estrella3").className='glyphicon glyphicon-star';
		document.getElementById("estrella4").className='glyphicon glyphicon-star';
		document.getElementById("estrella5").className='glyphicon glyphicon-star-empty';
	}
	else if(valor==5){
		document.getElementById("estrella1").className='glyphicon glyphicon-star';
		document.getElementById("estrella2").className='glyphicon glyphicon-star';
		document.getElementById("estrella3").className='glyphicon glyphicon-star';
		document.getElementById("estrella4").className='glyphicon glyphicon-star';
		document.getElementById("estrella5").className='glyphicon glyphicon-star';
	}
	if(est==true){
		enviarValoracion(usuario, id, valor, tipo);
	}
}
//Enviar mediante AJAX la valoración de una película
function enviarValoracion(usuario, id, valor, tipo){
	if(window.XMLHttpRequest){
		peticion_http= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_http= new ActiveXObject("Microsoft.XMLHTTP");
	}
	peticion_http.open('POST', "cambiaValoracion" , true);         
	peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_http.send("usuario="+usuario+"&"+tipo+"="+id+"&valoracion="+valor);
	peticion_http.onreadystatechange=muestraContenido;
}
//Coger la valoración de una película de la base de datos
function getValoracion(usuario, id, tipo){
	if(window.XMLHttpRequest){
		peticion_httpValoracion= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_httpValoracion= new ActiveXObject("Microsoft.XMLHTTP");
	}
	peticion_httpValoracion.open('POST', "cargaValoracion" , true);         
	peticion_httpValoracion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_httpValoracion.send("usuario="+usuario+"&"+tipo+"="+id);
	peticion_httpValoracion.onreadystatechange=comprobarValoracion;
}
//Comprobar la valoración y modificar los iconos
function comprobarValoracion(argument) {
	if (peticion_httpValoracion.readyState==4) {
		if (peticion_httpValoracion.status==200) {
			valorar(false, peticion_httpValoracion.responseText);
			}
		}
	}
		//Añadir un comentario
		function enviarForm(tipo){
			if(window.XMLHttpRequest){
				peticion_httpComentario= new XMLHttpRequest();
			}else if (window.ActiveXObject) {
				peticion_httpComentario= new ActiveXObject("Microsoft.XMLHTTP");
			}
			var usuario=document.getElementById("idUsuario").value;
			var pelicula=document.getElementById("idPeli").value;
			var comentario=document.getElementById("comment").value;
			peticion_httpComentario.open('POST', "crearComentario" , true);         
			peticion_httpComentario.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			peticion_httpComentario.send("comentario="+comentario+"&usuario="+usuario+"&"+tipo+"="+pelicula);
			peticion_httpComentario.onreadystatechange=muestraContenidoCom;
		}
		//Comprobar que se modifique correctamente el estado de favoritos
		function muestraContenidoCom(argument) {
			if (peticion_httpComentario.readyState==4) {
				if (peticion_httpComentario.status==200) {
						location.reload();
				}
			}
		}