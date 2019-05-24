function comprobarUsuario(){
	enviarAjax();
}
var peticion_http;
		function enviarAjax(){
			if(window.XMLHttpRequest){
				peticion_http= new XMLHttpRequest();
			}else if (window.ActiveXObject) {
				peticion_http= new ActiveXObject("Microsoft.XMLHTTP");
			}
			var nombre=document.getElementById("nombreUsuario").value;
			peticion_http.open('POST', "buscar" , true);         
			peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
			peticion_http.send("nombre="+nombre);

			peticion_http.onreadystatechange=muestraContenido;
		}
		function muestraContenido(argument) {
			if (peticion_http.readyState==4) {
				if (peticion_http.status==200) {
					if(peticion_http.responseText=="error"){
						document.getElementById("usuExiste").innerHTML="EL USUARIO YA EXISTE";
					}
					else{
						document.getElementById("usuExiste").innerHTML="Usuario no existente";
					}
					}
				}
			}
		function compararClaves(){
			var clave=document.getElementById("clave").value;
			var claveRepe=document.getElementById("claveRepe").value;
			if(clave==claveRepe){
				document.getElementById("errorClave").innerHTML="Las claves coinciden";
			}
			else{
				document.getElementById("errorClave").innerHTML="Las claves no coinciden";
			}
		}
		