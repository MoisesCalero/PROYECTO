<?php

class Musica_model extends CI_Model
{
    //CREAR NUEVA MÚSICA
    public function crear($nombre, $grupo, $album, $genero, $fecha, $idUsu, $imagen)
    {
        $ok = false;
        
        $bean = R::findOne('musica', 'nombre=?', [
            $nombre
        ]);
        $ok = ($bean == null);
        
        if ($ok) {
            $musica= R::dispense('musica');
            $musica->nombre = $nombre;
            $musica->grupo = $grupo;
            $musica->album = $album;
            $musica->genero = $genero;
            $musica->fecha= $fecha;
            $musica->usuario= R::load('usuario', $idUsu);
            //SUBIR UNA IMAGEN
            if($imagen["name"]!=null){
                $imageFileType=strtolower(pathinfo($imagen['name'],PATHINFO_EXTENSION));
                $imagen['name'] = $nombre.".".$imageFileType;
                $target_dir = "assets/img/caratulas/musica/";
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
                        $musica->ruta_caratula=$target_file;
                    }
                }
            }
            R::store($musica);
        }
        return $ok;
    }    
    //CARGAR MÚSICA A PARTIR DE SU ID
    public function getMusicaById($id)
    {
        return R::findOne('musica', 'id=?', [
            $id
        ]);
    }
    //CARGAR MÚSICA A PARTIR DE SU NOMBRE
    public function getMusicaByNombre($nombre)
    {
        return R::findOne('musica', 'nombre=?', [
            $nombre
        ]);
    }
    //LISTA DE TODA LA MÚSICA
    public function listar()
    {
        return R::findAll('musica');
    }
    //ACTUALIZAR MÚSICA
    public function update($id, $nombre_nuevo, $grupo_nuevo, $album_nuevo, $genero_nuevo, $duracion_nuevo, $fecha_nuevo, $idUsu, $imagen)
    {
        $ok = false;
        
        $bean = R::findOne('musica', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);
        
        if ($ok) {
            $musica = R::load('musica', $id);
            $musica->nombre = $nombre_nuevo;
            $musica->grupo= $grupo_nuevo;
            $musica->album= $album_nuevo;
            $musica->genero = $genero_nuevo;
            $musica->duracion = $duracion_nuevo;
            $musica->fecha = $fecha_nuevo;
            $musica->usuario = $idUsu;
            //SUBIR UNA IMAGEN
            if($imagen["name"]!=null){
                $imageFileType=strtolower(pathinfo($imagen['name'],PATHINFO_EXTENSION));
                $imagen['name'] = $nombre.".".$imageFileType;
                $target_dir = "assets/img/caratulas/musica/";
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
                        $musica->ruta_caratula=$target_file;
                    }
                }
            }
            R::store($musica);
            
        }
        return $ok;
    }
    //ELIMINAR MÚSICA
    public function delete($id)
    {
        $musica = R::load('musica', $id);
        R::trash($musica);
    }
//Añadir un comentario a la música
public function crearComentario($idUsu, $idMusica, $comentario){
    $usuario=R::load('usuario', $idUsu);
    $musica=R::load('musica', $idMusica);
    $coment=R::dispense('musicacomentario');
    $coment->usuario=$usuario;
    $coment->musica=$musica;
    $coment->comentario=$comentario;
    $ok= R::store($coment);
    return $ok;
}
//Listar los comentarios de una música
public function listarComentariosByMusica($id){
    return R::findAll('musicacomentario', 'musica_id=?', [$id]);
}
//Cambiar el estado de una música
public function cambiarEstado($estado, $usuario, $musica){
    $ok = false;
    $bean = R::findOne('musicaestado', 'musica_id=? and usuario_id=?', [
        $musica,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('musicaestado');
        $est->usuario=R::load('usuario', $usuario);
        $est->musica=R::load('musica', $musica);
        $est->estado=$estado;
        R::store($est);
    }
    else{
        $est = R::findOne('musicaestado', 'musica_id=? and usuario_id=?', [
            $musica,
            $usuario
        ]);
        $est->estado=$estado;
        R::store($est);
    }
}
//Añadir música a favoritos
public function Favorito($usuario, $musica){
    $ok = false;
    $bean = R::findOne('musicafavorito', 'musica_id=? and usuario_id=?', [
        $musica,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('musicafavorito');
        $est->usuario=R::load('usuario', $usuario);
        $est->musica=R::load('musica', $musica);
        R::store($est);
    }
    else{
        $est = R::findOne('musicafavorito', 'musica_id=? and usuario_id=?', [
            $musica,
            $usuario
        ]);
        R::trash($est);
    }
}
//Añadir una valoración de un usuario a una música
public function cambiarValoracion($valor, $usuario, $musica){
    $ok = false;
    $bean = R::findOne('musicavaloracion', 'musica_id=? and usuario_id=?', [
        $musica,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('musicavaloracion');
        $est->usuario=R::load('usuario', $usuario);
        $est->musica=R::load('musica', $musica);
        $est->valor=$valor;
        R::store($est);
    }
    else{
        $est = R::findOne('musicavaloracion', 'musica_id=? and usuario_id=?', [
            $musica,
            $usuario
        ]);
        $est->valor=$valor;
        R::store($est);
    }
}
//Cargar música a partir de un estado
public function getMusicasEstado($estado, $id){
    return R::findAll('musicaestado', 'estado=? and usuario_id=?', [$estado, $id]);
}
//Cargar la música favorita de un usuario
public function getMusicasFavoritas($id){
    return R::findAll('musicafavorito', 'usuario_id=?', [$id]);
}
//Cargar el estado de favorito de música de un usuario
public function cargaFavorito($usuario, $musica){
    $ok=false;
    $bean= R::findAll('musicafavorito', 'usuario_id=? and musica_id=?', [$usuario, $musica]);
    $ok=$bean!=null;
    if($ok){
        return "Encontrado";
    }
    else{
        return "No encontrado";
    }
}
//Cargar el estado de una música de un usuario
public function cargaEstado($usuario, $musica){
    $ok=false;
    $bean= R::findOne('musicaestado', 'usuario_id=? and musica_id=?', [$usuario, $musica]);
    $ok=$bean!=null;
    if($ok){
        return $bean->estado;
    }
    else{
        return "nada";
    }
}
//Cargar la valoración de una música de un usuario
public function cargaValoracion($usuario, $musica){
    $ok=false;
    $bean= R::findOne('musicavaloracion', 'usuario_id=? and musica_id=?', [$usuario, $musica]);
    $ok=$bean!=null;
    if($ok){
        return $bean->valor;
    }
    else{
        return "nada";
    }
}
//CARGAR LA MÚSICA MÁS VALORADA POR LOS USUARIOS
public function getMusicasMasValoradas(){
    $ok=false;
    $bean= R::findAll('musicavaloracion');
    $ok=$bean!=null;
    $musica=[];
    $media=null;
    if($ok){
        foreach($bean as $b){
            $this->load->model('musica_model');
            $media=$this->musica_model->getValoracionMedia($b->id);
            if($media>=4){
                array_push($musica, $b);
            }
        }
        return $musica;
    }
    else{
        return null;
    }
}
//CARGAR LA VALORACIÓN MEDIA DE UNA MÚSICA
public function getValoracionMedia($id){
    $ok=false;
    $bean= R::findAll('musicavaloracion', 'musica_id=?', [$id]);
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
//CARGAR LA MÚSICA SUBIDA POR UN USUARIO
public function getMusicasUsuario($id){
    $ok=false;
    $bean= R::findAll('musica', 'usuario_id=?', [$id]);
    $ok=$bean!=null;
    if($ok){
        return $bean;
    }
    else{
        return "";
    }
}
//CARGAR LA MÚSICA ORDENADA POR FECHA(DESDE LA MÁS RECIENTE)
public function getMusicasRecientes(){
    $ok=false;
    $bean= R::findAll('musica', 'order by fecha desc limit 10');
    $ok=$bean!=null;
    $media=null;
    if($ok){
        return $bean;
    }
    else{
        return null;
    }
}
//BUSCAR MÚSICA A PARTIR DE UNA PARTE DE SU TÍTULO
public function buscaMusica($cadena){
    return R::findAll('musica', 'nombre LIKE ?', [$cadena."%"]);
}
}