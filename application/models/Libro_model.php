<?php

class Libro_model extends CI_Model
{
    public function crear($nombre, $descripcion, $genero, $numero_paginas, $autor, $editorial, $valoracion, $fecha)
    {
        $ok = false;
        
        $bean = R::findOne('libro', 'nombre=?', [
            $nombre
        ]);
        $ok = ($bean == null);
        
        // R::debug();
        if ($ok) {
            $libro= R::dispense('libro');
            $libro->nombre= $nombre;
            $libro->descripcion= $descripcion;
            $libro->genero = $genero;
            $libro->numero_paginas = $numero_paginas;
            $libro->autor = $autor;
            $libro->editorial = $editorial;
            $libro->valoracion = $valoracion;
            $libro->fecha= $fecha;
            R::store($libro);
        }
        return $ok;
    }    
    public function getLibroById($id)
    {
        return R::findOne('libro', 'id=?', [
            $id
        ]);
    }
    public function getLibroByNombre($nombre)
    {
        return R::findOne('libro', 'nombre=?', [
            $nombre
        ]);
    }
    public function listar()
    {
        return R::findAll('libro');
    }
    
    public function update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $numero_paginas_nuevo, $autor_nuevo, $editorial_nuevo, $valoracion_nuevo, $fecha_nuevo)
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
            $libro->valoracion = $valoracion_nuevo;
            $libro->fecha= $fecha_nuevo;
            R::store($libro);
            // R::debug();
            
        }
        return $ok;
    }
    
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
}