<?php

class Usuario extends CI_Controller
{

    public function crear()
    {
        frame($this, 'usuario/crear');
    }

    public function login()
    {
        frame($this, 'usuario/login');
    }

    public function loginPost()
    {
        $nombreUsuario = isset($_POST['nombreUsuario']) && ! empty($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;
        $clave = isset($_POST['clave']) && ! empty($_POST['clave']) ? $_POST['clave'] : null;
        if ($nombreUsuario != null && $clave != null) {
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioByNombre($nombreUsuario);
            if ($data['usuario'] != null) {
                if ($data['usuario']->clave == $clave) {
                    session_start();
                    $_SESSION['usuario'] = $nombreUsuario;
                    $_SESSION['id'] = $data['usuario']->id;
                    $_SESSION['rol']=$data['usuario']->rol;
                    header("location: ../home/presentacion");
                }
                else{
                    header("location: ../usuario/login");
                }
            } else {
                header("location: ../usuario/login");
            }
        }
    }

    public function crearPost()
    {
        $correo = isset($_POST['correo']) && ! empty($_POST['correo']) ? $_POST['correo'] : null;
        $nombreUsuario = isset($_POST['nombreUsuario']) && ! empty($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;
        $clave = isset($_POST['clave']) && ! empty($_POST['clave']) ? $_POST['clave'] : null;
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellidos = isset($_POST['apellidos']) && ! empty($_POST['apellidos']) ? $_POST['apellidos'] : null;
        $descripcion = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $fnac = isset($_POST['fnac']) && ! empty($_POST['fnac']) ? $_POST['fnac'] : null;
        $rol = "basico";

        if ($correo != null && $nombreUsuario != null && $clave != null) {
            $this->load->model('usuario_model');
            $ok = $this->usuario_model->crear($correo, $nombreUsuario, $clave, $nombre, $apellidos, $descripcion, $fnac, $rol);
            if ($ok) {
                $data = [];
                $data['usuario'] = $nombreUsuario;
                frame($this, 'usuario/crearOK', $data);
            } else {
                // Redirigir al formulario avisando del error(mejor hacerlo con ajax antes de enviarlo, asi no redirige a nada)
                // Al estar hecho con AJAX no debería redirigir a nada
                // frame($this, 'usuario/crearERROR', $data);
            }
        } else {
            frame($this, "usuario/crearERROR");
        }
    }

    // ------------------------------------------------------ME HE QUEDADO AQUI
    public function listar()
    {
        $this->load->model('usuario_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data = null;
        // ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
        if ($id != null) {
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
        } else {
            session_start();
            $nombre = $_SESSION['usuario'];
            $data['usuario'] = $this->usuario_model->getUsuarioByNombre($nombre);
        }
        frame($this, 'usuario/listar', $data);
    }

    public function update()
    {
        // ------------------CAMBIAR $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            frame($this, 'usuario/update', $data);
        } else {
            redirect(base_url());
        }
    }

    public function updatePost()
    {
        $correo_nuevo = isset($_POST['correo']) && ! empty($_POST['correo']) ? $_POST['correo'] : null;
        $nombreUsuario_nuevo = isset($_POST['nombreUsuario']) && ! empty($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;
        $nombre_nuevo = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellidos_nuevo = isset($_POST['apellidos']) && ! empty($_POST['apellidos']) ? $_POST['apellidos'] : null;
        $descripcion_nuevo = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $fnac_nuevo = isset($_POST['fnac']) && ! empty($_POST['fnac']) ? $_POST['fnac'] : null;
        $rol_nuevo = isset($_POST['rol']) && ! empty($_POST['rol']) ? $_POST['rol'] : null;

        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;

        if ($correo_nuevo != null && $nombreUsuario_nuevo != null) {
            $this->load->model('usuario_model');
            $ok = $this->usuario_model->update($id, $correo_nuevo, $nombreUsuario_nuevo, $nombre_nuevo, $apellidos_nuevo, $descripcion_nuevo, $fnac_nuevo, $rol_nuevo);
            if ($ok) {
                session_start();
                $_SESSION['usuario'] = $nombreUsuario_nuevo;
                redirect(base_url() . 'home/presentacion');
            } else {
                frame($this, 'usuario/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    public function buscar(){
        $nombre=$_REQUEST['nombre'];
        $this->load->model('usuario_model');
        $ok=$this->usuario_model->getUsuarioByNombre($nombre);
        if($ok!=null){
            echo "error";
        }
        else{
            echo "ok";
        }
    }

    public function delete()
    {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('usuario_model');
            session_start();
            $_SESSION['usuario'] = "";
            $_SESSION = [];
            session_destroy();
            $this->usuario_model->delete($id);
            header("location: ../home/presentacion");
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION['usuario'] = "";
        $_SESSION = [];
        session_destroy();
        header("location: ../home/presentacion");
    }
    public function upgrade(){
        $id=isset($_POST['id']) && ! empty($_POST['id'])?$_POST['id']:null;
        if($id!=null){
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            frame($this, 'usuario/upgrade', $data);
        }
    }
    public function upgradePost(){
        $id=isset($_POST['id']) && ! empty($_POST['id'])?$_POST['id']:null;
        if($id!=null){
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->mejorarCuenta($id);
            frame($this, 'home/presentacion', $data);
        }
    }
    public function listarTodo(){
        $this->load->model('usuario_model');
        $usuarios = $this->usuario_model->listar();
        $data=[];
        $data['usuarios'] = $usuarios;
        frame($this, 'usuario/listarTodo', $data);
    }
}

?>