<?php

class Pelicula_model extends CI_Model
{
    public function crear($nombre, $descripcion, $genero, $duracion, $valoracion, $fecha)
    {
        $ok = false;
        
        $bean = R::findOne('pelicula', 'nombre=?', [
            $nombre
        ]);
        $ok = ($bean == null);
        
        // R::debug();
        if ($ok) {
            $pelicula= R::dispense('pelicula');
            $pelicula->nombre= $nombre;
            $pelicula->descripcion= $descripcion;
            $pelicula->genero = $genero;
            $pelicula->duracion = $duracion;
            $pelicula->valoracion = $valoracion;
            $pelicula->fecha= $fecha;
            R::store($pelicula);
        }
        return $ok;
    }    
    public function getPeliculaById($id)
    {
        return R::findOne('pelicula', 'id=?', [
            $id
        ]);
    }
    public function getPeliculaByNombre($nombre)
    {
        return R::findOne('pelicula', 'nombre=?', [
            $nombre
        ]);
    }
    public function listar()
    {
        return R::findAll('pelicula');
    }
    
    public function update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $duracion_nuevo, $valoracion_nuevo, $fecha_nuevo)
    {
        $ok = false;
        
        $bean = R::findOne('pelicula', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);
        
        if ($ok) {
            $pelicula = R::load('pelicula', $id);
            $pelicula->nombre = $nombre_nuevo;
            $pelicula->descripcion= $descripcion_nuevo;
            $pelicula->genero = $genero_nuevo;
            $pelicula->duracion = $duracion_nuevo;
            $pelicula->valoracion = $valoracion_nuevo;
            $pelicula->fecha = $fecha_nuevo;
            R::store($pelicula);
            // R::debug();
            
        }
        return $ok;
    }
    
    public function delete($id)
    {
        $pelicula = R::load('pelicula', $id);
        R::trash($pelicula);
    }
    public function crearComentario($idUsu, $idPeli, $comentario){
        $usuario=R::load('usuario', $idUsu);
        $pelicula=R::load('pelicula', $idPeli);
        $coment=R::dispense('comentariopelicula');
        $coment->usuario=$usuario;
        $coment->pelicula=$pelicula;
        $coment->comentario=$comentario;
        R::store($coment);
    }
    public function listarComentariosByPelicula($id){
        return R::findAll('comentariopelicula', 'pelicula_id=?', [$id]);
    }
    public function cambiarEstado($estado, $usuario, $pelicula){
        $ok = false;
        $bean = R::findOne('estadopelicula', 'pelicula=? and usuario=?', [
            $pelicula,
            $usuario
        ]);
        $ok = ($bean == null);
        if($ok){
            $est=R::dispense('estadopelicula');
            $est->usuario=$usuario;
            $est->pelicula=$pelicula;
            $est->estado=$estado;
            R::store($est);
        }
        else{
            $est = R::findOne('estadopelicula', 'pelicula=? and usuario=?', [
                $pelicula,
                $usuario
            ]);
            $est->estado=$estado;
            R::store($est);
        }
    }
}