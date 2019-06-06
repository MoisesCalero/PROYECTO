var peticion_http;
    function buscarResultados(url){
    if(window.XMLHttpRequest){
		peticion_http= new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		peticion_http= new ActiveXObject("Microsoft.XMLHTTP");
    }
    var palabra=document.getElementById("npt").value;
    if(palabra!=""){ 
        peticion_http.open('POST', url, true);
        //peticion_http.setRequestHeader('Access-Control-Allow-Origin:', '*');
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticion_http.setRequestHeader("Content-Type", "text/xml");
        peticion_http.send("cadena="+palabra);
        peticion_http.onreadystatechange=muestraResultados;
    }
    if(palabra==""){
        document.getElementById("divBusqueda").hidden=true;
    }
   
    
}
function muestraResultados(){
    if (peticion_http.readyState==4) {
		if (peticion_http.status==200) {
            document.getElementById("buscaPelis").innerHTML="<u><h4 class='categoriaBusc'>Películas</h4></u>";
            document.getElementById("buscaSeries").innerHTML="<u><h4 class='categoriaBusc'>Series</h4></u>";
            document.getElementById("buscaMusica").innerHTML="<u><h4 class='categoriaBusc'>Música</h4></u>";
            document.getElementById("buscaLibros").innerHTML="<u><h4 class='categoriaBusc'>Libros</h4></u>";

            document.getElementById("divBusqueda").hidden=false;
            parser = new DOMParser();
            var xml=parser.parseFromString(peticion_http.response, "text/xml");
            var peliculas=xml.getElementsByTagName("peliculas")[0];
            var series=xml.getElementsByTagName("series")[0];
            var musicas=xml.getElementsByTagName("musicas")[0];
            var libros=xml.getElementsByTagName("libros")[0];
        for(var i=0;i<peliculas.childNodes.length;i++){
        document.getElementById("buscaPelis").innerHTML+="<form action='/CAGALO/pelicula/detalles' class='obras' method='post'><input type='hidden' name='id' value='"+peliculas.childNodes[i].getElementsByTagName("id")[0].innerHTML+"'/><input type='submit' class='btn-link obras pel' value='"+peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML+"'/></form>";
            //Comprobación para cambiar el tamaño de la fuente si excede un numero de letras
                if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=0){
                    document.getElementsByClassName("pel")[i].style.fontSize="31px";
                }
                if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=10){
                    document.getElementsByClassName("pel")[i].style.fontSize="28px";
                }
                if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=20){
                    document.getElementsByClassName("pel")[i].style.fontSize="23px";
                }
                if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=30){
                    document.getElementsByClassName("pel")[i].style.fontSize="13px";
                }
                if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=35){
                    document.getElementsByClassName("pel")[i].style.fontSize="9px";
                }
            }
        for(var i=0;i<series.childNodes.length;i++){
            document.getElementById("buscaSeries").innerHTML+="<form action='/CAGALO/serie/detalles' class='obras' method='post'><input type='hidden' id='ser' name='id' value='"+series.childNodes[i].getElementsByTagName("id")[0].innerHTML+"'/><input type='submit' class='btn-link obras ser' value='"+series.childNodes[i].getElementsByTagName("nombre")[0].innerHTML+"'/></form>";
            //Comprobación para cambiar el tamaño de la fuente si excede un numero de letras
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=0){
                document.getElementsByClassName("ser")[i].style.fontSize="31px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=10){
                document.getElementsByClassName("ser")[i].style.fontSize="28px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=20){
                document.getElementsByClassName("ser")[i].style.fontSize="23px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=30){
                document.getElementsByClassName("ser")[i].style.fontSize="13px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=35){
                document.getElementsByClassName("ser")[i].style.fontSize="9px";
            }
        
        }
        for(var i=0;i<musicas.childNodes.length;i++){
                document.getElementById("buscaMusica").innerHTML+="<form action='/CAGALO/musica/detalles' class='obras' method='post'><input type='hidden' id='mus' name='id' value='"+musicas.childNodes[i].getElementsByTagName("id")[0].innerHTML+"'/><input type='submit' class='btn-link obras mus' value='"+musicas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML+"'/></form>";
                //Comprobación para cambiar el tamaño de la fuente si excede un numero de letras
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=0){
                document.getElementsByClassName("mus")[i].style.fontSize="31px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=10){
                document.getElementsByClassName("mus")[i].style.fontSize="28px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=20){
                document.getElementsByClassName("mus")[i].style.fontSize="23px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=30){
                document.getElementsByClassName("mus")[i].style.fontSize="13px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=35){
                document.getElementsByClassName("mus")[i].style.fontSize="9px";
            }
        }
        for(var i=0;i<libros.childNodes.length;i++){
                    document.getElementById("buscaLibros").innerHTML+="<form action='/CAGALO/libro/detalles' class='obras' method='post'><input type='hidden' id='lib' name='id' value='"+libros.childNodes[i].getElementsByTagName("id")[0].innerHTML+"'/><input type='submit' class='btn-link obras lib' value='"+libros.childNodes[i].getElementsByTagName("nombre")[0].innerHTML+"'/></form>";
                    //Comprobación para cambiar el tamaño de la fuente si excede un numero de letras
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=0){
                document.getElementsByClassName("lib")[i].style.fontSize="31px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=10){
                document.getElementsByClassName("lib")[i].style.fontSize="28px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=20){
                document.getElementsByClassName("lib")[i].style.fontSize="23px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=30){
                document.getElementsByClassName("lib")[i].style.fontSize="13px";
            }
            if(peliculas.childNodes[i].getElementsByTagName("nombre")[0].innerHTML.length>=35){
                document.getElementsByClassName("lib")[i].style.fontSize="9px";
            }
        }
}
	}
}
