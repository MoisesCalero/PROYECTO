<?php

class Libro_model extends CI_Model
{
    /* CREAR UN LIBRO NUEVO */
    public function crear($nombre, $descripcion, $genero, $numero_paginas, $autor, $editorial, $fecha, $idUsu, $imagen)
    {
        $ok = false;
        
        $bean = R::findOne('libro', 'nombre=?', [
            $nombre
        ]);
        $ok = ($bean == null);
        
        if ($ok) {
            $libro= R::dispense('libro');
            $libro->nombre= $nombre;
            $libro->descripcion= $descripcion;
            $libro->genero = $genero;
            $libro->numero_paginas = $numero_paginas;
            $libro->autor = $autor;
            $libro->editorial = $editorial;
            $libro->fecha= $fecha;
            $libro->usuario=R::load('usuario', $idUsu);
            //Subir una imagen
            if($imagen["name"]!=null){
                $imageFileType=strtolower(pathinfo($imagen['name'],PATHINFO_EXTENSION));
                $imagen['name'] = $nombre.".".$imageFileType;
                $target_dir = "assets/img/caratulas/libros/";
                $target_file = $target_dir . $imagen["name"];
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Comprobar el tamaño del archivo
                if ($imagen["size"] > 500000) {
                    echo "El tamaño del archivo es demasiado grande.";
                    $uploadOk = 0;
                }
                // Permitir ciertos formatos de archivo
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Lo sentimos, solo se pueden subir imágenes en formato jpg., png, jpeg o gif";
                    $uploadOk = 0;
                }
                // Comprobar si está todo bien
                if ($uploadOk == 0) {
                    echo "Ups, ha ocurrido un error, no es ha podido subir tu archivo.";
                // Si todo está bien, se intenta subir la imagen
                } else {
                    if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
                        $libro->ruta_caratula=$target_file;
                    }
                }
            }
            R::store($libro);
        }
        return $ok;
    }    
    //CARGAR UN LIBRO A PARTIR DE SU ID
    public function getLibroById($id)
    {
        return R::findOne('libro', 'id=?', [
            $id
        ]);
    }
    //CARGAR UN LIBRO A PARTIR DE SU NOMBRE
    public function getLibroByNombre($nombre)
    {
        return R::findOne('libro', 'nombre=?', [
            $nombre
        ]);
    }
    //LISTAR TODOS LOS LIBROS
    public function listar()
    {
        return R::findAll('libro');
    }
    //ACTUALIZAR UN LIBRO
    public function update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $numero_paginas_nuevo, $autor_nuevo, $editorial_nuevo, $fecha_nuevo, $imagen)
    {
        $ok = false;
        
        $bean = R::findOne('libro', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);
        
        if ($ok) {
            $libro = R::load('libro', $id);
            $libro->nombre= $nombre_nuevo;
            $libro->descripcion= $descripcion_nuevo;
            $libro->genero = $genero_nuevo;
            $libro->numero_paginas = $numero_paginas_nuevo;
            $libro->autor = $autor_nuevo;
            $libro->editorial = $editorial_nuevo;
            $libro->fecha= $fecha_nuevo;
            //SUBIR LA IMAGEN
            if(!empty($imagen)){
                $imageFileType=strtolower(pathinfo($imagen['name'],PATHINFO_EXTENSION));
                $imagen['name'] = $nombre.".".$imageFileType;
                $target_dir = "assets/img/caratulas/libros/";
                $target_file = $target_dir . $imagen["name"];
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Comprobar el tamaño del archivo
                if ($imagen["size"] > 500000) {
                    echo "El tamaño del archivo es demasiado grande.";
                    $uploadOk = 0;
                }
                // Permitir ciertos formatos de archivo
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Lo sentimos, solo se pueden subir imágenes en formato jpg., png, jpeg o gif";
                    $uploadOk = 0;
                }
                // Comprobar si está todo bien
                if ($uploadOk == 0) {
                    echo "Ups, ha ocurrido un error, no es ha podido subir tu archivo.";
                // Si todo está bien, se intenta subir la imagen
                } else {
                    if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
                        $libro->ruta_caratula=$target_file;
                    }
                }
            }
            R::store($libro);
            
        }
        return $ok;
    }
    //ELIMINAR UN LIBRO
    public function delete($id)
    {
        $libro = R::load('libro', $id);
        R::trash($libro);
    }
//Añadir un comentario a una película
public function crearComentario($idUsu, $idLibro, $comentario){
    $usuario=R::load('usuario', $idUsu);
    $libro=R::load('libro', $idLibro);
    $coment=R::dispense('librocomentario');
    $coment->usuario=$usuario;
    $coment->libro=$libro;
    $coment->comentario=$comentario;
    $ok= R::store($coment);
    return $ok;
}
//Listar los comentarios de una película
public function listarComentariosByLibro($id){
    return R::findAll('librocomentario', 'libro_id=?', [$id]);
}
//Cambiar el estado de una película
public function cambiarEstado($estado, $usuario, $libro){
    $ok = false;
    $bean = R::findOne('libroestado', 'libro_id=? and usuario_id=?', [
        $libro,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('libroestado');
        $est->usuario=R::load('usuario', $usuario);
        $est->libro=R::load('libro', $libro);
        $est->estado=$estado;
        R::store($est);
    }
    else{
        $est = R::findOne('libroestado', 'libro_id=? and usuario_id=?', [
            $libro,
            $usuario
        ]);
        $est->estado=$estado;
        R::store($est);
    }
}
//Añadir una película a favoritos
public function Favorito($usuario, $libro){
    $ok = false;
    $bean = R::findOne('librofavorito', 'libro_id=? and usuario_id=?', [
        $libro,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('librofavorito');
        $est->usuario=R::load('usuario', $usuario);
        $est->libro=R::load('libro', $libro);
        R::store($est);
    }
    else{
        $est = R::findOne('librofavorito', 'libro_id=? and usuario_id=?', [
            $libro,
            $usuario
        ]);
        R::trash($est);
    }
}
//Añadir una valoración de un usuario a una película
public function cambiarValoracion($valor, $usuario, $libro){
    $ok = false;
    $bean = R::findOne('librovaloracion', 'libro_id=? and usuario_id=?', [
        $libro,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('librovaloracion');
        $est->usuario=R::load('usuario', $usuario);
        $est->libro=R::load('libro', $libro);
        $est->valor=$valor;
        R::store($est);
    }
    else{
        $est = R::findOne('librovaloracion', 'libro_id=? and usuario_id=?', [
            $libro,
            $usuario
        ]);
        $est->valor=$valor;
        R::store($est);
    }
}
//Cargar las películas a partir de un estado
public function getLibrosEstado($estado, $id){
    return R::findAll('libroestado', 'estado=? and usuario_id=?', [$estado, $id]);
}
//Cargas las películas favoritas de un usuario
public function getLibrosFavoritos($id){
    return R::findAll('librofavorito', 'usuario_id=?', [$id]);
}
//Cargas el estado de favorito de una película de un usuario
public function cargaFavorito($usuario, $libro){
    $ok=false;
    $bean= R::findAll('librofavorito', 'usuario_id=? and libro_id=?', [$usuario, $libro]);
    $ok=$bean!=null;
    if($ok){
        return "Encontrado";
    }
    else{
        return "No encontrado";
    }
}
//Cargar el estado de una película de un usuario
public function cargaEstado($usuario, $libro){
    $ok=false;
    $bean= R::findOne('libroestado', 'usuario_id=? and libro_id=?', [$usuario, $libro]);
    $ok=$bean!=null;
    if($ok){
        return $bean->estado;
    }
    else{
        return "nada";
    }
}
//Cargar la valoración de una película de un usuario
public function cargaValoracion($usuario, $libro){
    $ok=false;
    $bean= R::findOne('librovaloracion', 'usuario_id=? and libro_id=?', [$usuario, $libro]);
    $ok=$bean!=null;
    if($ok){
        return $bean->valor;
    }
    else{
        return "nada";
    }
}
//CARGAR LOS LIBROS MÁS VALORADOS
public function getLibrosMasValorados(){
    $ok=false;
    $bean= R::findAll('librovaloracion');
    $ok=$bean!=null;
    $libros=[];
    $media=null;
    if($ok){
        foreach($bean as $b){
            $this->load->model('libro_model');
            $media=$this->libro_model->getValoracionMedia($b->id);
            if($media>=4){
                array_push($libros, $b);
            }
        }
        return $libros;
    }
    else{
        return null;
    }
}
//CARGAR LA VALORACIÓN MEDIA DE UN LIBRO
public function getValoracionMedia($id){
    $ok=false;
    $bean= R::findAll('librovaloracion', 'libro_id=?', [$id]);
    $ok=$bean!=null;
    $media=0;
    if($ok){
        foreach ($bean as $b){
            $media+=$b->valor;
        }
        $media=$media/sizeof($bean);
        return $media;
    }
    else{
        return ;
    }
}
//CARGAR LOS LIBROS SUBIDOS POR UN USUARIO
public function getLibrosUsuario($id){
    $ok=false;
    $bean= R::findAll('libro', 'usuario_id=?', [$id]);
    $ok=$bean!=null;
    if($ok){
        return $bean;
    }
    else{
        return "";
    }
}
//CARGAR LOS 10 PRIMEROS LIBROS ORDENADOS POR SU FECHA DE PUBLICACIÓN(DEL MÁS NUEVO AL MÁS ANTIGUO)
public function getLibrosRecientes(){
    $ok=false;
    $bean= R::findAll('libro', 'order by fecha desc limit 10');
    $ok=$bean!=null;
    $media=null;
    if($ok){
        return $bean;
    }
    else{
        return null;
    }
}
//BUSCAR UN LIBRO A PARTIR DE UNA PARTE DE SU NOMBRE
public function buscaLibros($cadena){
    return R::findAll('libro', 'nombre LIKE ?', [$cadena."%"]);
}
}