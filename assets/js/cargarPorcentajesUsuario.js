var peticion_http;
	function cogerDatos(id){
	if(window.XMLHttpRequest){
		peticion_http= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_http= new ActiveXObject("Microsoft.XMLHTTP");
	}
	peticion_http.open('POST', "cogerPorcentajes" , true);         
	peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion_http.send("usuario="+id);
	peticion_http.onreadystatechange=estadosDeObras;
}
		function estadosDeObras(){
			if (peticion_http.readyState==4) {
		if (peticion_http.status==200) {
			var datos=peticion_http.responseText.split(",");
			
			var completadas = document.getElementById("completadas");
			var siguiendo = document.getElementById("siguiendo");
			var dejadas = document.getElementById("dejadas");  
			var futuras = document.getElementById("futuras");  
			var sumaTotal=parseInt(datos[0])+parseInt(datos[1])+parseInt(datos[2])+parseInt(datos[3]);

			var vistas=(datos[1]*100)/(sumaTotal);

			var seguidas=(datos[0]*100)/(sumaTotal);

			var dejada=(datos[3]*100)/(sumaTotal);

			var pendientes=(datos[2]*100)/(sumaTotal);

			completadas.style.width = vistas + '%'; 

			siguiendo.style.width = seguidas + '%'; 

			dejadas.style.width = dejada + '%'; 

			futuras.style.width = pendientes + '%'; 
		}
	}
}