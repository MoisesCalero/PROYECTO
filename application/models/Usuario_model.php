<?php

class Usuario_model extends CI_Model
{
    //CREAR UN USUARIO
    public function crear($correo, $nombreUsuario, $clave, $nombre, $apellidos, $descripcion, $fnac, $rol)
    {
        $ok = false;

        $bean = R::findOne('usuario', 'nombre_usuario=?', [
            $nombreUsuario
        ]);
        $ok = ($bean == null);

        if ($ok) {
            $usuario = R::dispense('usuario');
            $usuario->correo = $correo;
            $usuario->nombreUsuario = $nombreUsuario;
            $usuario->clave = $clave;
            $usuario->nombre = $nombre;
            $usuario->apellidos = $apellidos;
            $usuario->descripcion = $descripcion;
            $usuario->fecha_nacimiento = $fnac;
            $usuario->rol = "basico";
            R::store($usuario);
        }
        return $ok;
    }
    //CAMBIAR LA CONTRASEÑA DE UN USUARIO
    public function updatePassword($id, $claveNueva)
    {
        $ok = false;
        $bean = R::findOne('usuario', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);

        if ($ok) {
            $usuario = R::load('usuario', $id);
            $usuario->clave = $claveNueva;
            R::store($usuario);
        }
        return $ok;
    }
    //CARGAR UN USUARIO A PARTIR DE SU ID
    public function getUsuarioById($id)
    {
        return R::findOne('usuario', 'id=?', [
            $id
        ]);
    }
    //CARGAR UN USUARIO A PARTIR DE SU NOMBRE
    public function getUsuarioByNombre($nombreUsuario)
    {
        return R::findOne('usuario', 'nombre_usuario=?', [
            $nombreUsuario
        ]);
    }
    //CAMBIAR LA IMAGEN DE PERFIL DE UN USUARIO
    public function cambiarImagen($id, $imagen){
        $imageFileType=strtolower(pathinfo($imagen['name'],PATHINFO_EXTENSION));
        $imagen['name']=$id.".".$imageFileType;
        $target_dir = "assets/img/usuarios/";
        $target_file = $target_dir . basename($imagen["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check file size
        if ($imagen["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg"/* && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"*/ ) {
            echo "Lo sentimos, solo se pueden subir imágenes en formato jpg.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
                return "ok";
                echo "The file ". basename( $imagen["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                return "error";
            }
        }
    }
    //ACTUALIZAR UN USUARIO
    public function update($id, $correo_nuevo, $nombreUsuario_nuevo, $nombre_nuevo, $apellidos_nuevo, $descripcion_nuevo, $fnac_nuevo, $rol_nuevo)
    {
        $ok = false;

        $bean = R::findOne('usuario', 'id=?', [
            $id
        ]);
        $ok = ($bean != null);

        if ($ok) {
            $usuario = R::load('usuario', $id);
            $usuario->correo = $correo_nuevo;
            $usuario->nombreUsuario = $nombreUsuario_nuevo;
            $usuario->nombre = $nombre_nuevo;
            $usuario->apellidos = $apellidos_nuevo;
            $usuario->descripcion = $descripcion_nuevo;
            $usuario->fecha_nacimiento = $fnac_nuevo;
            $usuario->rol = $rol_nuevo;
            R::store($usuario);
        }
        return $ok;
    }
    //ELIMINAR UN USUARIO
    public function delete($id)
    {
        $usuario = R::load('usuario', $id);
        R::trash($usuario);
    }
    //MEJORAR LA CUNETA DE UN USUARIO Y PASARSE A PREMIUM
    public function mejorarCuenta($id){
        $usuario=R::load('usuario', $id);
        $usuario->rol="premium";
        R::store($usuario);
    }
    //CARGAR UNA LISTA DE TODOS LOS USUARIOS
    public function listar() {
        return R::findAll('usuario');
    }
    //CARGAR LOS PORCENTAJES DE LOS DISTINTOS ESTADOS DE LAS PELÍCULAS, SERIES Y DEMÁS QUE SIGUE EL USUARIO
    public function getPorcentajes($id){
        $seguidas=0;
        $vistas=0;
        $pendientes=0;
        $dejadas=0;
        $total=[];
        
        $porcentajePelisSeguidas=R::count('peliculaestado', 'estado=? and usuario_id=?', ["seguir", $id]);
        $porcentajePelisVistas=R::count('peliculaestado', 'estado=? and usuario_id=?', ["terminada", $id]);
        $porcentajePelisPendientes=R::count('peliculaestado', 'estado=? and usuario_id=?', ["pendiente", $id]);
        $porcentajePelisDejadas=R::count('peliculaestado', 'estado=? and usuario_id=?', ["dejada", $id]);
        
        $porcentajeSeriesSeguidas=R::count('serieestado', 'estado=? and usuario_id=?', ["seguir", $id]);
        $porcentajeSeriesVistas=R::count('serieestado', 'estado=? and usuario_id=?', ["terminada", $id]);
        $porcentajeSeriesPendientes=R::count('serieestado', 'estado=? and usuario_id=?', ["pendiente", $id]);
        $porcentajeSeriesDejadas=R::count('serieestado', 'estado=? and usuario_id=?', ["dejada", $id]);
        
        $porcentajeLibrosSeguidos=R::count('libroestado', 'estado=? and usuario_id=?', ["seguir", $id]);
        $porcentajeLibrosVistos=R::count('libroestado', 'estado=? and usuario_id=?', ["terminada", $id]);
        $porcentajeLibrosPendientes=R::count('libroestado', 'estado=? and usuario_id=?', ["pendiente", $id]);
        $porcentajeLibrosDejados=R::count('libroestado', 'estado=? and usuario_id=?', ["dejada", $id]);
        
        $porcentajeMusicasSeguidas=R::count('musicaestado', 'estado=? and usuario_id=?', ["seguir", $id]);
        $porcentajeMusicasVistas=R::count('musicaestado', 'estado=? and usuario_id=?', ["terminada", $id]);
        $porcentajeMusicasPendientes=R::count('musicaestado', 'estado=? and usuario_id=?', ["pendiente", $id]);
        $porcentajeMusicasDejadas=R::count('musicaestado', 'estado=? and usuario_id=?', ["dejada", $id]);
        
        $seguidas=$porcentajePelisSeguidas+$porcentajeLibrosSeguidos+$porcentajeMusicasSeguidas+$porcentajeSeriesSeguidas;
        $vistas=$porcentajePelisVistas+$porcentajeLibrosVistos+$porcentajeMusicasVistas+$porcentajeSeriesVistas;
        $pendientes=$porcentajePelisPendientes+$porcentajeLibrosPendientes+$porcentajeMusicasPendientes+$porcentajeSeriesPendientes;
        $dejadas=$porcentajePelisDejadas+$porcentajeLibrosDejados+$porcentajeMusicasDejadas+$porcentajeSeriesDejadas;

        echo $seguidas.",".$vistas.",".$pendientes.",".$dejadas;
    }
}