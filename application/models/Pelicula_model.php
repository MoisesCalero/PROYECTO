<?php

class Pelicula_model extends CI_Model
{
    //Crear una película
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
    //Cargar una película por id
    public function getPeliculaById($id)
    {
        return R::findOne('pelicula', 'id=?', [
            $id
        ]);
    }
    //Cargar una película por nombre
    public function getPeliculaByNombre($nombre)
    {
        return R::findOne('pelicula', 'nombre=?', [
            $nombre
        ]);
    }
    //Listar películas
    public function listar()
    {
        return R::findAll('pelicula');
    }
    //Actualizar una película
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
    //Eliminar una película
    public function delete($id)
    {
        $pelicula = R::load('pelicula', $id);
        R::trash($pelicula);
    }
    //Añadir un comentario a una película
    public function crearComentario($idUsu, $idPeli, $comentario){
        $usuario=R::load('usuario', $idUsu);
        $pelicula=R::load('pelicula', $idPeli);
        $coment=R::dispense('peliculacomentario');
        $coment->usuario=$usuario;
        $coment->pelicula=$pelicula;
        $coment->comentario=$comentario;
        $ok= R::store($coment);
        return $ok;
    }
    //Listar los comentarios de una película
    public function listarComentariosByPelicula($id){
        return R::findAll('peliculacomentario', 'pelicula_id=?', [$id]);
    }
    //Cambiar el estado de una película
    public function cambiarEstado($estado, $usuario, $pelicula){
        $ok = false;
        $bean = R::findOne('peliculaestado', 'pelicula_id=? and usuario_id=?', [
            $pelicula,
            $usuario
        ]);
        $ok = ($bean == null);
        if($ok){
            $est=R::dispense('peliculaestado');
            $est->usuario=R::load('usuario', $usuario);
            $est->pelicula=R::load('pelicula', $pelicula);
            $est->estado=$estado;
            R::store($est);
        }
        else{
            $est = R::findOne('peliculaestado', 'pelicula_id=? and usuario_id=?', [
                $pelicula,
                $usuario
            ]);
            $est->estado=$estado;
            R::store($est);
        }
    }
    //Añadir una película a favoritos
    public function Favorito($usuario, $pelicula){
        $ok = false;
        $bean = R::findOne('peliculafavorito', 'pelicula_id=? and usuario_id=?', [
            $pelicula,
            $usuario
        ]);
        $ok = ($bean == null);
        if($ok){
            $est=R::dispense('peliculafavorito');
            $est->usuario=R::load('usuario', $usuario);
            $est->pelicula=R::load('pelicula', $pelicula);
            R::store($est);
        }
        else{
            $est = R::findOne('peliculafavorito', 'pelicula_id=? and usuario_id=?', [
                $pelicula,
                $usuario
            ]);
            R::trash($est);
        }
    }
    //Añadir una valoración de un usuario a una película
    public function cambiarValoracion($valor, $usuario, $pelicula){
        $ok = false;
        $bean = R::findOne('peliculavaloracion', 'pelicula_id=? and usuario_id=?', [
            $pelicula,
            $usuario
        ]);
        $ok = ($bean == null);
        if($ok){
            $est=R::dispense('peliculavaloracion');
            $est->usuario=R::load('usuario', $usuario);
            $est->pelicula=R::load('pelicula', $pelicula);
            $est->valor=$valor;
            R::store($est);
        }
        else{
            $est = R::findOne('peliculavaloracion', 'pelicula_id=? and usuario_id=?', [
                $pelicula,
                $usuario
            ]);
            $est->valor=$valor;
            R::store($est);
        }
    }
    //Cargar las películas a partir de un estado
    public function getPeliculasEstado($estado, $id){
        return R::findAll('peliculaestado', 'estado=? and usuario_id=?', [$estado, $id]);
    }
    //Cargas las películas favoritas de un usuario
    public function getPeliculasFavoritas($id){
        return R::findAll('peliculafavorito', 'usuario_id=?', [$id]);
    }
    //Cargas el estado de favorito de una película de un usuario
    public function cargaFavorito($usuario, $pelicula){
        $ok=false;
        $bean= R::findAll('peliculafavorito', 'usuario_id=? and pelicula_id=?', [$usuario, $pelicula]);
        $ok=$bean!=null;
        if($ok){
            return "Encontrado";
        }
        else{
            return "No encontrado";
        }
    }
    //Cargar el estado de una película de un usuario
    public function cargaEstado($usuario, $pelicula){
        $ok=false;
        $bean= R::findOne('peliculaestado', 'usuario_id=? and pelicula_id=?', [$usuario, $pelicula]);
        $ok=$bean!=null;
        if($ok){
            return $bean->estado;
        }
        else{
            return "nada";
        }
    }
    //Cargar la valoración de una película de un usuario
    public function cargaValoracion($usuario, $pelicula){
        $ok=false;
        $bean= R::findOne('peliculavaloracion', 'usuario_id=? and pelicula_id=?', [$usuario, $pelicula]);
        $ok=$bean!=null;
        if($ok){
            return $bean->valor;
        }
        else{
            return "nada";
        }
    }
}