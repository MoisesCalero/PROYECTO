<?php

class Pelicula extends CI_Controller
{
    public function crear()
    {
        frame($this, 'pelicula/crear');
    }
    public function crearPost()
    {
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $genero = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $valoracion = isset($_POST['valoracion']) && ! empty($_POST['valoracion']) ? $_POST['valoracion'] : null;
        $fecha = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        if ($nombre!=null && $descripcion!=null && $genero!=null && $duracion!=null && $valoracion!=null && $fecha!=null) {
            $this->load->model('pelicula_model');
            $ok = $this->pelicula_model->crear($nombre, $descripcion, $genero, $duracion, $valoracion, $fecha);
            if ($ok) {
                $data=[];
                $data['pelicula'] = $nombre;
                frame($this, 'pelicula/crearOK', $data);
            } else {
                $data['pelicula'] = $nombre;
                //Redirigir al formulario avisando del error(mejor hacerlo con ajax antes de enviarlo, asi no redirige a nada)
                frame($this, 'pelicula/crearError', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    public function listar()
    {
        $this->load->model('pelicula_model');
       $data=null;
       $data['seguidas']=null;
       $data['pendientes']=null;
       $data['vistas']=null;
       $data['peliculas'] = $this->pelicula_model->listar();
       session_start();
       if(isset($_SESSION['id'])){
           $data['seguidas']=$this->pelicula_model->getPeliculasEstado('seguir', $_SESSION['id']);
            $data['pendientes']=$this->pelicula_model->getPeliculasEstado('viendo', $_SESSION['id']);
            $data['vistas']=$this->pelicula_model->getPeliculasEstado('terminada', $_SESSION['id']);
            $data['favoritas']=$this->pelicula_model->getPeliculasFavoritas($_SESSION['id']);
        }
        frame($this, 'pelicula/listar', $data);
    }
    public function detalles(){
        $this->load->model('pelicula_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        if($id!=null){
            $data['pelicula'] = $this->pelicula_model->getPeliculaById($id);
        }
        frame($this, 'pelicula/detalles', $data);
    }
    public function update()
    {
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('pelicula_model');
            $data['pelicula'] = $this->pelicula_model->getPeliculaById($id);
            frame($this, 'pelicula/update', $data);
        } else {
            redirect(base_url());
        }
    }
    
    public function updatePost()
    {
        $nombre_nuevo = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion_nuevo = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $genero_nuevo = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion_nuevo = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $valoracion_nuevo = isset($_POST['valoracion']) && ! empty($_POST['valoracion']) ? $_POST['valoracion'] : null;
        $fecha_nuevo = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        
        if ($nombre_nuevo!=null && $descripcion_nuevo!=null && $genero_nuevo!=null && $duracion_nuevo!=null && $valoracion_nuevo!=null && $fecha_nuevo!=null) {
            $this->load->model('pelicula_model');
            $ok = $this->pelicula_model->update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $duracion_nuevo, $valoracion_nuevo, $fecha_nuevo);
            if ($ok) {
                redirect(base_url() . 'pelicula/listar');
            } else {
                frame($this, 'pelicula/crearError');
            }
        } else {
            // Mensaje ERROR
        }
    }
    
    public function delete() {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('pelicula_model');
            $this->pelicula_model->delete($id);
            header("location: ../pelicula/listar");
        }
    }
    public function crearComentario(){
        $usuario=$_REQUEST['usuario'];
        $pelicula=$_REQUEST['pelicula'];
        $comentario=$_REQUEST['comentario'];
        if ($usuario!=null && $pelicula!=null && $comentario !=null) {
            $this->load->model('pelicula_model');
            $ok = $this->pelicula_model->crearComentario($usuario, $pelicula, $comentario);
            if (!$ok) {
                echo "Error, estaria bien que esto llevara a una redirección de error o un alert";
            } else {
                
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Cambiar el estado de la película
    public function cambiaEstado(){
        $estado=$_POST['estado'];
        $usuario=$_POST['usuario'];
        $pelicula=$_POST['peli'];
        $this->load->model('pelicula_model');
        $ok=$this->pelicula_model->cambiarEstado($estado, $usuario, $pelicula);
    }
    //Añadir película a favoritos
    public function Favoritos(){
        $usuario=$_POST['usuario'];
        $pelicula=$_POST['peli'];
        $this->load->model('pelicula_model');
        $ok=$this->pelicula_model->Favorito($usuario, $pelicula);
    }
    //Cambiar la valoración de una película
    public function cambiaValoracion(){
        $valor=$_POST['valoracion'];
        $usuario=$_POST['usuario'];
        $pelicula=$_POST['pelicula'];
        $this->load->model('pelicula_model');
        $ok=$this->pelicula_model->cambiarValoracion($valor, $usuario, $pelicula);
    }
    //Cargar los favoritos de un usuario al acceder a una película en concreto
    public function cargaFavoritos(){
        $usuario=$_REQUEST['usuario'];
        $pelicula=$_REQUEST['pelicula'];
        $this->load->model('pelicula_model');
        $ok=$this->pelicula_model->cargaFavorito($usuario, $pelicula);
        echo $ok;
    }
    //Cargar el estado de una película al entrar
    public function cargaEstado(){
        $usuario=$_REQUEST['usuario'];
        $pelicula=$_REQUEST['pelicula'];
        $this->load->model('pelicula_model');
        $ok=$this->pelicula_model->cargaEstado($usuario, $pelicula);
        echo $ok;
    }
    //Cargar la valoración de una película al entrar
    public function cargaValoracion(){
        $usuario=$_REQUEST['usuario'];
        $pelicula=$_REQUEST['pelicula'];
        $this->load->model('pelicula_model');
        $ok=$this->pelicula_model->cargaValoracion($usuario, $pelicula);
        echo $ok;
    }
}

?>