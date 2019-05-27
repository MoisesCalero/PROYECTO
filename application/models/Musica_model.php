<?php

class Musica_model extends CI_Model
{
    public function crear($nombre, $grupo, $album, $genero, $duracion, $valoracion, $fecha)
    {
        $ok = false;
        
        $bean = R::findOne('musica', 'nombre=?', [
            $nombre
        ]);
        $ok = ($bean == null);
        
        // R::debug();
        if ($ok) {
            $musica= R::dispense('musica');
            $musica->nombre = $nombre;
            $musica->grupo = $grupo;
            $musica->album = $album;
            $musica->genero = $genero;
            $musica->duracion = $duracion;
            $musica->valoracion = $valoracion;
            $musica->fecha= $fecha;
            R::store($musica);
        }
        return $ok;
    }    
    public function getMusicaById($id)
    {
        return R::findOne('musica', 'id=?', [
            $id
        ]);
    }
    public function getMusicaByNombre($nombre)
    {
        return R::findOne('musica', 'nombre=?', [
            $nombre
        ]);
    }
    public function listar()
    {
        return R::findAll('musica');
    }
    
    public function update($id, $nombre_nuevo, $grupo_nuevo, $album_nuevo, $genero_nuevo, $duracion_nuevo, $valoracion_nuevo, $fecha_nuevo)
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
            $musica->valoracion = $valoracion_nuevo;
            $musica->fecha = $fecha_nuevo;
            R::store($musica);
            // R::debug();
            
        }
        return $ok;
    }
    
    public function delete($id)
    {
        $musica = R::load('musica', $id);
        R::trash($musica);
    }
//Añadir un comentario a una película
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
//Listar los comentarios de una película
public function listarComentariosByMusica($id){
    return R::findAll('musicacomentario', 'musica_id=?', [$id]);
}
//Cambiar el estado de una película
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
//Añadir una película a favoritos
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
//Añadir una valoración de un usuario a una película
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
//Cargar las películas a partir de un estado
public function getMusicasEstado($estado, $id){
    return R::findAll('musicaestado', 'estado=? and usuario_id=?', [$estado, $id]);
}
//Cargas las películas favoritas de un usuario
public function getMusicasFavoritas($id){
    return R::findAll('musicafavorito', 'usuario_id=?', [$id]);
}
//Cargas el estado de favorito de una película de un usuario
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
//Cargar el estado de una película de un usuario
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
//Cargar la valoración de una película de un usuario
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
}