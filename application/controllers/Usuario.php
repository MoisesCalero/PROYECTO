<?php

class Usuario extends CI_Controller
{
    //Redirige al formulario de creación de un usuario
    public function crear()
    {
        frame($this, 'usuario/crear');
    }
    //Redirige al formulario de login
    public function login()
    {
        frame($this, 'usuario/login');
    }
    //Recibe los datos y si son correctos, inicia la sesión del usuario
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
                    header("location: ".base_url());
                }
                else{
                    header("location: ../usuario/login");
                }
            } else {
                header("location: ../usuario/login");
            }
        }
    }
    //Redirige al formulario para cambiar la imagen de perfil del usuario
    public function cambiarImagen(){
        frame($this, 'usuario/cambiarImagen');
    }
    //Recibe la imagen y si es correcto, cambia la imagen de perfil
    public function cambiarImagenPost(){
        $id=isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        $imagenes=$_FILES['imagen'];
        
        if($id!=null){
            $this->load->model('usuario_model');
            $res=$this->usuario_model->cambiarImagen($id, $imagenes);
            if($res=="ok"){
                header("location: ".base_url());
            }
    }
}
    //Recibe los datos del usuario, y si son correctos crea un usuario nuevo
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
                frame($this, 'usuario/crearERROR', $data);
            }
        } else {
            frame($this, "usuario/crearERROR");
        }
    }
    //Carga los datos del usuario que ha iniciado la sesión
    public function listar()
    {
        $this->load->model('usuario_model');
        $this->load->model('pelicula_model');
        $this->load->model('serie_model');
        $this->load->model('libro_model');
        $this->load->model('musica_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data = null;
        $data['pelisFavoritas']=null;
        $data['musicasFavoritas']=null;
        $data['librosFavoritos']=null;
        $data['seriesFavoritas']=null;
        $data['librosPropios']=null;
        $data['musicasPropias']=null;
        if ($id != null) {
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            $data['pelisFavoritas']= $this->pelicula_model->getPeliculasFavoritas($id);
            $data['musicasFavoritas']= $this->musica_model->getMusicasFavoritas($id);
            $data['librosFavoritos']= $this->libro_model->getLibrosFavoritos($id);
            $data['seriesFavoritas']= $this->serie_model->getSeriesFavoritas($id);
            $data['librosPropios']=$this->libro_model->getLibrosUsuario($id);
            $data['musicasPropias']=$this->musica_model->getMusicasUsuario($id);
        }
        session_start();
        if($_SESSION['id']!=$id){
            frame($this, "usuario/error");
        }
        else{
            frame($this, 'usuario/listar', $data);
        }
    }
    //Carga los datos de un usuario, solo con permiso de lectura, no puede modificar nada
    public function ver()
    {
        $this->load->model('usuario_model');
        $this->load->model('pelicula_model');
        $this->load->model('serie_model');
        $this->load->model('libro_model');
        $this->load->model('musica_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data = null;
        $data['pelisFavoritas']=null;
        $data['musicasFavoritas']=null;
        $data['librosFavoritos']=null;
        $data['seriesFavoritas']=null;
        $data['librosPropios']=null;
        $data['musicasPropias']=null;
        if ($id != null) {
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            $data['pelisFavoritas']= $this->pelicula_model->getPeliculasFavoritas($id);
            $data['musicasFavoritas']= $this->musica_model->getMusicasFavoritas($id);
            $data['librosFavoritos']= $this->libro_model->getLibrosFavoritos($id);
            $data['seriesFavoritas']= $this->serie_model->getSeriesFavoritas($id);
            $data['librosPropios']=$this->libro_model->getLibrosUsuario($id);
            $data['musicasPropias']=$this->musica_model->getMusicasUsuario($id);
        } else {
        }
        frame($this, 'usuario/ver', $data);
    }
    //Redirige al formulario para actualizar un usuario
    public function update()
    {
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            frame($this, 'usuario/update', $data);
        } else {
            redirect(base_url());
        }
    }
    //Recibe los datos del formulario y si son correctos, actualiza un usuario
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
                redirect(base_url() . 'usuario/updateOK');
            } else {
                frame($this, 'usuario/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Redirige aal formulario de actualizar contraseña
    public function updatePassword()
    {
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            frame($this, 'usuario/updatePassword', $data);
        } else {
            redirect(base_url());
        }
    }
    //Recibe los datos y si son correctos, cambia la contraseña
    public function updatePasswordPost()
    {
        $claveAnt = isset($_POST['claveAnt']) && ! empty($_POST['claveAnt']) ? $_POST['claveAnt'] : null;
        $claveNueva = isset($_POST['claveNueva']) && ! empty($_POST['claveNueva']) ? $_POST['claveNueva'] : null;
        $claveNuevaRepe = isset($_POST['claveNuevaRepe']) && ! empty($_POST['claveNuevaRepe']) ? $_POST['claveNuevaRepe'] : null;
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;

        if ($claveAnt!=null && $claveNueva!=null) {
            $this->load->model('usuario_model');
            $usuario=$this->usuario_model->getUsuarioById($id);
            if($usuario!=null){
                if($usuario->clave==$claveAnt){
                    $ok = $this->usuario_model->updatePassword($id,$claveNueva);
                    if ($ok) {
                        frame($this, 'usuario/updatePasswordOK');
                    } else {
                        frame($this, 'usuario/updateERROR');
                    }
                }
                else{
                    //ERROR
                }
            }
           
        } else {
            // Mensaje ERROR
        }
    }
    //Busca un usuario a partir de su nombre
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
    //Elimina un usuario
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
            header("location: ".base_url());
        }
    }
    //Cierra la sesión del usuario activo
    public function logout()
    {
        session_start();
        $_SESSION['usuario'] = "";
        $_SESSION = [];
        session_destroy();
        header("location: ".base_url());
    }
    //Redirige a formulario de mejora de cuenta de usuario
    public function upgrade(){
        $id=isset($_POST['id']) && ! empty($_POST['id'])?$_POST['id']:null;
        if($id!=null){
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            frame($this, 'usuario/upgrade', $data);
        }
    }
    //Recibe los datos del formulario y si son correctos, mejora el rol del usuario
    public function upgradePost(){
        $id=isset($_POST['id']) && ! empty($_POST['id'])?$_POST['id']:null;
        if($id!=null){
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->mejorarCuenta($id);
            //revisar
            session_start();
            session_destroy();
            frame($this, 'usuario/login');
        }
    }
    //Cargar una lista de todos los usuarios
    public function listarTodo(){
        $this->load->model('usuario_model');
        $usuarios = $this->usuario_model->listar();
        $data=[];
        $data['usuarios'] = $usuarios;
        frame($this, 'usuario/listarTodo', $data);
    }
    //Cargar los porcentajes del total de número de series, pelis y demás que han sido vistas, dejadas... por un usuario
    public function cogerPorcentajes(){
        $usuario=$_REQUEST['usuario'];
        $this->load->model('usuario_model');
        $porcentajes=$this->usuario_model->getPorcentajes($usuario);
        echo $porcentajes;
    }
}

?>