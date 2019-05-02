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
}