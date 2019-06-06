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
		
function validarForm(tipo){
    if(tipo=="peli"){
        var validaNombre=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,40}$");
        var validaDescripcion=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,500}$");
        var validaDuracion=new RegExp("^[0-9]{1,3}$");
        var validaFecha=new RegExp("^[0-1]{1}[0-9]{1}/[0-3]{1}[0-9]{1}/[0-9]{0,4}$");

        var nombre=document.getElementById("nombre").value;
        var descripcion=document.getElementById("descripcion").value;
        var duracion=document.getElementById("duracion").value;
        var fecha=document.getElementById("fecha").value;
        if(!validaNombre.test(nombre)){
            document.getElementById("errorNombre").innerHTML="El nombre debe tener entre 1 y 50 caracteres.";
        }
        else{
            document.getElementById("errorNombre").innerHTML="";
        }
        if(!validaDescripcion.test(descripcion)){
            document.getElementById("errorDescripcion").innerHTML="La descripción contiene caracteres no permitidos.";
        }
        else{
            document.getElementById("errorDescripcion").innerHTML="";
        }
        if(!validaDuracion.test(duracion)){
            document.getElementById("errorDuracion").innerHTML="La duración debe estar entre 1 y 999";
        }
        else{
            document.getElementById("errorDuracion").innerHTML="";
        }
        if(!validaFecha.test(fecha)){
            document.getElementById("errorFecha").innerHTML="La fecha debe tener el formato mm/dd/aaaa";
        }
        else{
            document.getElementById("errorFecha").innerHTML="";
        }
        if(validaNombre.test(nombre) && validaDescripcion.test(descripcion) && validaDuracion.test(duracion) && validaFecha.test(fecha)){
            miForm.submit();
        }
    }

    if(tipo=="serie"){
        var validaNombre=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,50}$");
        var validaDescripcion=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,500}$");
        var validaDuracion=new RegExp("^[0-9]{1,3}$");
        var validaFecha=new RegExp("^[0-1]{1}[0-9]{1}/[0-3]{1}[0-9]{1}/[0-9]{0,4}$");
        var validaTemporadas=new RegExp("^[0-9]{1,2}$");
        var validaCapitulos=new RegExp("^[0-9]{1,3}$");

        var nombre=document.getElementById("nombre").value;
        var descripcion=document.getElementById("descripcion").value;
        var duracion=document.getElementById("duracion").value;
        var fecha=document.getElementById("fecha").value;
        var temporadas=document.getElementById("temporadas").value;
        var capitulos=document.getElementById("capitulos").value;

        if(!validaNombre.test(nombre)){
            document.getElementById("errorNombre").innerHTML="El nombre debe tener entre 1 y 50 caracteres.";
        }
        else{
            document.getElementById("errorNombre").innerHTML="";
        }
        if(!validaDescripcion.test(descripcion)){
            document.getElementById("errorDescripcion").innerHTML="La descripción contiene caracteres no permitidos.";
        }
        else{
            document.getElementById("errorDescripcion").innerHTML="";
        }
        if(!validaDuracion.test(duracion)){
            document.getElementById("errorDuracion").innerHTML="La duración debe estar entre 1 y 999";
        }
        else{
            document.getElementById("errorDuracion").innerHTML="";
        }
        if(!validaFecha.test(fecha)){
            document.getElementById("errorFecha").innerHTML="La fecha debe tener el formato dd/mm/aa";
        }
        else{
            document.getElementById("errorFecha").innerHTML="";
        }
        if(!validaTemporadas.test(temporadas)){
            document.getElementById("errorTemporada").innerHTML="Las temporadas deben estar entre 1 y 99.";
        }
        else{
            document.getElementById("errorTemporada").innerHTML="";
        }
        if(!validaCapitulos.test(capitulos)){
            document.getElementById("errorCapitulo").innerHTML="Los capítulos deben ser números entre 0 y 999.";
        }
        else{
            document.getElementById("errorCapitulo").innerHTML="";
        }
        if(validaNombre.test(nombre) && validaDescripcion.test(descripcion) && validaDuracion.test(duracion) && validaFecha.test(fecha) && validaTemporadas.test(temporadas) && validaCapitulos.test(capitulos)){
            miForm.submit();
        }
    }
    if(tipo=="musica"){
        var validaNombre=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,50}$");
        var validaAutor=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,20}$");
        var validaAlbum=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,40}$");
        var validaFecha=new RegExp("^[0-1]{1}[0-9]{1}/[0-3]{1}[0-9]{1}/[0-9]{0,4}$");

        var nombre=document.getElementById("nombre").value;
        var autor=document.getElementById("autor").value;
        var album=document.getElementById("album").value;
        var fecha=document.getElementById("fecha").value;
        if(!validaNombre.test(nombre)){
            document.getElementById("errorNombre").innerHTML="El nombre debe tener entre 1 y 50 caracteres.";
        }
        else{
            document.getElementById("errorNombre").innerHTML="";
        }
        if(!validaAutor.test(autor)){
            document.getElementById("errorAutor").innerHTML="La descripción contiene caracteres no permitidos.";
        }
        else{
            document.getElementById("errorAutor").innerHTML="";
        }
        if(!validaAlbum.test(album)){
            document.getElementById("errorAlbum").innerHTML="La duración debe estar entre 1 y 999";
        }
        else{
            document.getElementById("errorAlbum").innerHTML="";
        }
        if(!validaFecha.test(fecha)){
            document.getElementById("errorFecha").innerHTML="La fecha debe tener el formato mm/dd/aaaa";
        }
        else{
            document.getElementById("errorFecha").innerHTML="";
        }
        if(validaNombre.test(nombre) && validaAutor.test(autor) && validaAlbum.test(album) && validaFecha.test(fecha)){
            miForm.submit();
        }
    }
    if(tipo=="libro"){
        var validaNombre=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,50}$");
        var validaDescripcion=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,500}$");
        var validaFecha=new RegExp("^[0-3]{1}[0-9]{1}/[0-1]{1}[0-9]{1}/[0-9]{0,4}$");
        var validaNumeroPaginas=new RegExp("^[0-9]{1,3}$");
        var validaEditorial=new RegExp("^[a-zA-Z0-9ñÑçÇ.,\-_:; áéíóú]{1,50}$");

        var nombre=document.getElementById("nombre").value;
        var descripcion=document.getElementById("descripcion").value;
        var numeroPaginas=document.getElementById("numero_paginas").value;
        var editorial=document.getElementById("editorial").value;
        var fecha=document.getElementById("fecha").value;
        if(!validaNombre.test(nombre)){
            document.getElementById("errorNombre").innerHTML="El nombre debe tener entre 1 y 50 caracteres.";
        }
        else{
            document.getElementById("errorNombre").innerHTML="";
        }
        if(!validaDescripcion.test(descripcion)){
            document.getElementById("errorDescripcion").innerHTML="La descripción contiene caracteres no permitidos.";
        }
        else{
            document.getElementById("errorDescripcion").innerHTML="";
        }
        if(!validaNumeroPaginas.test(numeroPaginas)){
            document.getElementById("errorNumeroPaginas").innerHTML="El número de páginas debe estar entre 1 y 999";
        }
        else{
            document.getElementById("errorNumeroPaginas").innerHTML="";
        }
        if(!validaFecha.test(fecha)){
            document.getElementById("errorFecha").innerHTML="La fecha debe tener el formato mm/dd/aaaa";
        }
        else{
            document.getElementById("errorFecha").innerHTML="";
        }
        if(!validaEditorial.test(editorial)){
            document.getElementById("errorEditorial").innerHTML="La editorial debe contener entre 1 y 50 caracteres";
        }
        else{
            document.getElementById("errorEditorial").innerHTML="";
        }
        if(validaNombre.test(nombre) && validaDescripcion.test(descripcion) && validaNumeroPaginas.test(numeroPaginas) && validaFecha.test(fecha) && validaEditorial.test(editorial)){
            miForm.submit();
        }
    }
}
