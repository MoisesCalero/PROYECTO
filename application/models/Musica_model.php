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
    
    public function update($id, $nombre_nuevo, $grupo_nuevo, $album_nuevo, $descripcion_nuevo, $genero_nuevo, $duracion_nuevo, $valoracion_nuevo, $fecha_nuevo)
    {
        $ok = false;
        
        $bean = R::findOne('musica', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);
        
        if ($ok) {
            $musica = R::load('pelicula', $id);
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
}