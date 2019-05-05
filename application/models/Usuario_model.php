<?php

class Usuario_model extends CI_Model
{

    public function crear($correo, $nombreUsuario, $clave, $nombre, $apellidos, $descripcion, $fnac, $rol)
    {
        $ok = false;

        $bean = R::findOne('usuario', 'nombre_usuario=?', [
            $nombreUsuario
        ]);
        $ok = ($bean == null);

        // R::debug();
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

    public function getUsuarioById($id)
    {
        return R::findOne('usuario', 'id=?', [
            $id
        ]);
    }

    public function getUsuarioByNombre($nombreUsuario)
    {
        return R::findOne('usuario', 'nombre_usuario=?', [
            $nombreUsuario
        ]);
    }

    public function update($id, $correo_nuevo, $nombreUsuario_nuevo, $clave_nuevo, $nombre_nuevo, $apellidos_nuevo, $descripcion_nuevo, $fnac_nuevo, $rol_nuevo)
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
            $usuario->clave = $clave_nuevo;
            $usuario->nombre = $nombre_nuevo;
            $usuario->apellidos = $apellidos_nuevo;
            $usuario->descripcion = $descripcion_nuevo;
            $usuario->fecha_nacimiento = $fnac_nuevo;
            $usuario->rol = $rol_nuevo;
            R::store($usuario);
            // R::debug();
        }
        return $ok;
    }

    public function delete($id)
    {
        $usuario = R::load('usuario', $id);
        R::trash($usuario);
    }
    public function mejorarCuenta($id){
        $usuario=R::load('usuario', $id);
        $usuario->rol="premium";
        R::store($usuario);
    }
}