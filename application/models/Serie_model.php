<?php

class Serie_model extends CI_Model
{
    public function crear($nombre, $descripcion, $genero, $duracion, $valoracion, $fecha, $temporadas, $capitulos)
    {
        $ok = false;
        
        $bean = R::findOne('serie', 'nombre=?', [
            $nombre
        ]);
        $ok = ($bean == null);
        
        // R::debug();
        if ($ok) {
            $serie= R::dispense('serie');
            $serie->nombre= $nombre;
            $serie->descripcion= $descripcion;
            $serie->genero = $genero;
            $serie->duracion = $duracion;
            $serie->valoracion = $valoracion;
            $serie->fecha= $fecha;
            $serie->temporadas=$temporadas;
            $serie->capitulos=$capitulos;
            R::store($serie);
        }
        return $ok;
    }    
    public function getSerieById($id)
    {
        return R::findOne('serie', 'id=?', [
            $id
        ]);
    }
    public function getSerieByNombre($nombre)
    {
        return R::findOne('serie', 'nombre=?', [
            $nombre
        ]);
    }
    public function listar()
    {
        return R::findAll('serie');
    }
    
    public function update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $duracion_nuevo, $valoracion_nuevo, $fecha_nuevo, $temporadas_nuevo, $capitulos_nuevo)
    {
        $ok = false;
        
        $bean = R::findOne('serie', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);
        
        if ($ok) {
            $serie = R::load('serie', $id);
            $serie->nombre = $nombre_nuevo;
            $serie->descripcion= $descripcion_nuevo;
            $serie->genero = $genero_nuevo;
            $serie->duracion = $duracion_nuevo;
            $serie->valoracion = $valoracion_nuevo;
            $serie->fecha = $fecha_nuevo;
            $serie->temporadas = $temporadas_nuevo;
            $serie->capitulos = $capitulos_nuevo;
            R::store($serie);
            // R::debug();
            
        }
        return $ok;
    }
    
    public function delete($id)
    {
        $serie = R::load('serie', $id);
        R::trash($serie);
    }
//Añadir un comentario a una película
public function crearComentario($idUsu, $idSerie, $comentario){
    $usuario=R::load('usuario', $idUsu);
    $serie=R::load('serie', $idSerie);
    $coment=R::dispense('seriecomentario');
    $coment->usuario=$usuario;
    $coment->serie=$serie;
    $coment->comentario=$comentario;
    $ok= R::store($coment);
    return $ok;
}
//Listar los comentarios de una película
public function listarComentariosBySerie($id){
    return R::findAll('seriecomentario', 'serie_id=?', [$id]);
}
//Cambiar el estado de una película
public function cambiarEstado($estado, $usuario, $serie){
    $ok = false;
    $bean = R::findOne('serieestado', 'serie_id=? and usuario_id=?', [
        $serie,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('serieestado');
        $est->usuario=R::load('usuario', $usuario);
        $est->serie=R::load('serie', $serie);
        $est->estado=$estado;
        R::store($est);
    }
    else{
        $est = R::findOne('serieestado', 'serie_id=? and usuario_id=?', [
            $serie,
            $usuario
        ]);
        $est->estado=$estado;
        R::store($est);
    }
}
//Añadir una película a favoritos
public function Favorito($usuario, $serie){
    $ok = false;
    $bean = R::findOne('seriefavorito', 'serie_id=? and usuario_id=?', [
        $serie,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('seriefavorito');
        $est->usuario=R::load('usuario', $usuario);
        $est->serie=R::load('serie', $serie);
        R::store($est);
    }
    else{
        $est = R::findOne('seriefavorito', 'serie_id=? and usuario_id=?', [
            $serie,
            $usuario
        ]);
        R::trash($est);
    }
}
//Añadir una valoración de un usuario a una película
public function cambiarValoracion($valor, $usuario, $serie){
    $ok = false;
    $bean = R::findOne('serievaloracion', 'serie_id=? and usuario_id=?', [
        $serie,
        $usuario
    ]);
    $ok = ($bean == null);
    if($ok){
        $est=R::dispense('serievaloracion');
        $est->usuario=R::load('usuario', $usuario);
        $est->serie=R::load('serie', $serie);
        $est->valor=$valor;
        R::store($est);
    }
    else{
        $est = R::findOne('serievaloracion', 'serie_id=? and usuario_id=?', [
            $serie,
            $usuario
        ]);
        $est->valor=$valor;
        R::store($est);
    }
}
//Cargar las películas a partir de un estado
public function getSeriesEstado($estado, $id){
    return R::findAll('serieestado', 'estado=? and usuario_id=?', [$estado, $id]);
}
//Cargas las películas favoritas de un usuario
public function getSeriesFavoritas($id){
    return R::findAll('seriefavorito', 'usuario_id=?', [$id]);
}
//Cargas el estado de favorito de una película de un usuario
public function cargaFavorito($usuario, $serie){
    $ok=false;
    $bean= R::findAll('seriefavorito', 'usuario_id=? and serie_id=?', [$usuario, $serie]);
    $ok=$bean!=null;
    if($ok){
        return "Encontrado";
    }
    else{
        return "No encontrado";
    }
}
//Cargar el estado de una película de un usuario
public function cargaEstado($usuario, $serie){
    $ok=false;
    $bean= R::findOne('serieestado', 'usuario_id=? and serie_id=?', [$usuario, $serie]);
    $ok=$bean!=null;
    if($ok){
        return $bean->estado;
    }
    else{
        return "nada";
    }
}
//Cargar la valoración de una película de un usuario
public function cargaValoracion($usuario, $serie){
    $ok=false;
    $bean= R::findOne('serievaloracion', 'usuario_id=? and serie_id=?', [$usuario, $serie]);
    $ok=$bean!=null;
    if($ok){
        return $bean->valor;
    }
    else{
        return "nada";
    }
}
}