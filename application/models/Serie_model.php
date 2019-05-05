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
}