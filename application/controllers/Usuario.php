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
    public function loginPost(){
        $nombreUsuario=isset($_POST['nombreUsuario']) && ! empty($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;
        $clave=isset($_POST['clave']) && ! empty($_POST['clave']) ? $_POST['clave'] : null;
        if($nombreUsuario!=null && $clave!=null){
            $this->load->model('usuario_model');
            $data['usuario']=$this->usuario_model->getUsuarioByNombre($nombreUsuario);
            if($data['usuario']!=null){
                if($data['usuario']->clave==$clave){
                    session_start();
                    $_SESSION['usuario']=$nombreUsuario;
                    $_SESSION['id']=$data['usuario']->id;
                    header("location: ../home/presentacion");
                }
            }
            else{
                //MENSAJE DE ERROR DE LOGIN INCORRECTO
            }
        }
    }
    public function crearPost()
    {
        $correo=isset($_POST['correo']) && ! empty($_POST['correo']) ? $_POST['correo'] : null;
        $nombreUsuario = isset($_POST['nombreUsuario']) && ! empty($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;
        $clave = isset($_POST['clave']) && ! empty($_POST['clave']) ? $_POST['clave'] : null;
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellidos = isset($_POST['apellidos']) && ! empty($_POST['apellidos']) ? $_POST['apellidos'] : null;
        $descripcion = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $rol="basico";
        
        if ($correo!=null && $nombreUsuario!=null && $clave!=null && $nombre!=null && $apellidos!=null && $descripcion!=null) {
            $this->load->model('usuario_model');
            $ok = $this->usuario_model->crear($correo, $nombreUsuario, $clave, $nombre, $apellidos, $descripcion, $rol);
            if ($ok) {
                $data=[];
                $data['usuario'] = $nombreUsuario;
                frame($this, 'usuario/crearOK', $data);
            } else {
                $data['usuario'] = $nombreUsuario;
                //Redirigir al formulario avisando del error(mejor hacerlo con ajax antes de enviarlo, asi no redirige a nada)
                frame($this, 'usuario/crearERROR', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    //------------------------------------------------------ME HE QUEDADO AQUI
    public function listar()
    {
        $this->load->model('usuario_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        //ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
        if($id!=null){
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
        }
        else{
            session_start();
            $nombre=$_SESSION['usuario'];
            $data['usuario']=$this->usuario_model->getUsuarioByNombre($nombre);
        }
        frame($this, 'usuario/listar', $data);
    }
    
    public function update()
    {
        //------------------CAMBIAR $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
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
        $correo_nuevo=isset($_POST['correo_nuevo']) && ! empty($_POST['correo_nuevo']) ? $_POST['correo_nuevo'] : null;
        $nombreUsuario_nuevo = isset($_POST['nombreUsuario_nuevo']) && ! empty($_POST['nombreUsuario_nuevo']) ? $_POST['nombreUsuario_nuevo'] : null;
        $clave_nuevo = isset($_POST['clave_nuevo']) && ! empty($_POST['clave_nuevo']) ? $_POST['clave_nuevo'] : null;
        $nombre_nuevo = isset($_POST['nombre_nuevo']) && ! empty($_POST['nombre_nuevo']) ? $_POST['nombre_nuevo'] : null;
        $apellidos_nuevo = isset($_POST['apellidos_nuevo']) && ! empty($_POST['apellidos_nuevo']) ? $_POST['apellidos_nuevo'] : null;
        $descripcion_nuevo = isset($_POST['descripcion_nuevo']) && ! empty($_POST['descripcion_nuevo']) ? $_POST['descripcion_nuevo'] : null;
        $rol=isset($_POST['rol_nuevo']) && ! empty($_POST['rol_nuevo']) ? $_POST['rol_nuevo'] : null;
        
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        
        if ($correo_nuevo!=null && $nombreUsuario_nuevo!=null && $clave_nuevo!=null && $nombre_nuevo!=null && $apellidos_nuevo!=null && $descripcion_nuevo!=null) {
            $this->load->model('usuario_model');
            $ok = $this->usuario_model->update($id, $correo_nuevo, $nombreUsuario_nuevo, $clave_nuevo, $nombre_nuevo, $apellidos_nuevo, $descripcion_nuevo, $rol);
            if ($ok) {
                session_start();
                $_SESSION['usuario']=$nombreUsuario_nuevo;
                redirect(base_url() . 'home/presentacion');
            } else {
                frame($this, 'usuario/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    
    public function delete() {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('usuario_model');
            session_start();
            $_SESSION['usuario']="";
            $_SESSION=[];
            $this->usuario_model->delete($id);
            header("location: ../home/presentacion");
        }
    }
    public function logout(){
        session_start();
        $_SESSION['usuario']="";
        $_SESSION=[];
        session_destroy();
        header("location: ../home/presentacion");
    }
}

?>