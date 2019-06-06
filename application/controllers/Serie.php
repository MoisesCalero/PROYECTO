<?php

class Serie extends CI_Controller
{
    //Redirige a la función de listar
    public function index() {
        $this->listar();
    }
    //Redirige al formulario de creación de una serie
    public function crear()
    {
        frame($this, 'serie/crear');
    }
    //Recibe los datos del formulario y si son correctos, crea la serie
    public function crearPost()
    {
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $genero = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $fecha = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        $temporadas= isset($_POST['temporadas']) && ! empty($_POST['temporadas']) ? $_POST['temporadas'] : null;
        $capitulos = isset($_POST['capitulos']) && ! empty($_POST['capitulos']) ? $_POST['capitulos'] : null;
        $imagenes=isset($_FILES['imagenSerie'])&& ! empty($_FILES['imagenSerie'])?$_FILES['imagenSerie']:null;
        if ($nombre!=null && $descripcion!=null && $genero!=null && $duracion!=null && $fecha!=null && $temporadas!=null && $capitulos!=null) {
            $this->load->model('serie_model');
            $ok = $this->serie_model->crear($nombre, $descripcion, $genero, $duracion, $fecha, $temporadas, $capitulos, $imagenes);
            if ($ok) {
                $data=[];
                $data['serie'] = $nombre;
                frame($this, 'serie/crearOK', $data);
            } else {
                $data['serie'] = $nombre;
                frame($this, 'serie/crearERROR', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Carga una lista de todas las series
    public function listar()
    {
        $this->load->model('serie_model');
        $data=null;
        $data['seguidas']=null;
        $data['pendientes']=null;
        $data['vistas']=null;
        $data['series'] = $this->serie_model->listar();
        session_start();
        if(isset($_SESSION['id'])){
            $data['seguidas']=$this->serie_model->getSeriesEstado('seguir', $_SESSION['id']);
             $data['pendientes']=$this->serie_model->getSeriesEstado('viendo', $_SESSION['id']);
             $data['vistas']=$this->serie_model->getSeriesEstado('terminada', $_SESSION['id']);
             $data['favoritas']=$this->serie_model->getSeriesFavoritas($_SESSION['id']);
         }
            frame($this, 'serie/listar', $data);
    }
    //Carga los detalles de una serie en concreto
    public function detalles(){
        $this->load->model('serie_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        $data['mediaValoracion']=null;
        if($id!=null){
            $data['serie'] = $this->serie_model->getSerieById($id);
            $data['mediaValoracion']=$this->serie_model->getValoracionMedia($id);
        }
        frame($this, 'serie/detalles', $data);
    }
    //Redirige al formulario de actualización de un usuario
    public function update()
    {
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('serie_model');
            $data['serie'] = $this->serie_model->getSerieById($id);
            frame($this, 'serie/update', $data);
        } else {
            redirect(base_url());
        }
    }
    //Recibe los datos del formulario y si son correctos, actualiza la serie
    public function updatePost()
    {
        $nombre_nuevo = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion_nuevo = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $genero_nuevo = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion_nuevo = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $fecha_nuevo = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        $temporadas_nuevo = isset($_POST['temporadas']) && ! empty($_POST['temporadas']) ? $_POST['temporadas'] : null;
        $capitulos_nuevo = isset($_POST['capitulos']) && ! empty($_POST['capitulos']) ? $_POST['capitulos'] : null;
        $imagenes=isset($_FILES['imagenSerie'])&& ! empty($_FILES['imagenSerie'])?$_FILES['imagenSerie']:null;
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        
        if ($nombre_nuevo!=null && $descripcion_nuevo!=null && $genero_nuevo!=null && $duracion_nuevo!=null && $fecha_nuevo!=null && $temporadas_nuevo!=null && $capitulos_nuevo!=null) {
            $this->load->model('serie_model');
            $ok = $this->serie_model->update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $duracion_nuevo, $fecha_nuevo, $temporadas_nuevo, $capitulos_nuevo, $imagenes);
            if ($ok) {
                redirect(base_url() . 'serie/listar');
            } else {
                frame($this, 'serie/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Elimina una serie
    public function delete() {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('serie_model');
            $this->serie_model->delete($id);
            header("location: ../serie/listar");
        }
    }
    //Recibe información de una serie y un usuario y crea un comentario
    public function crearComentario(){
        $usuario=$_REQUEST['usuario'];
        $serie=$_REQUEST['serie'];
        $comentario=$_REQUEST['comentario'];
        if ($usuario!=null && $serie!=null && $comentario !=null) {
            $this->load->model('serie_model');
            $ok = $this->serie_model->crearComentario($usuario, $serie, $comentario);
            if (!$ok) {
                echo "Error, estaria bien que esto llevara a una redirección de error o un alert";
            } else {
                
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Cambiar el estado de la serie
    public function cambiaEstado(){
        $estado=$_POST['estado'];
        $usuario=$_POST['usuario'];
        $serie=$_POST['serie'];
        $this->load->model('serie_model');
        $ok=$this->serie_model->cambiarEstado($estado, $usuario, $serie);
    }
    //Añadir serie a favoritos
    public function Favoritos(){
        $usuario=$_POST['usuario'];
        $serie=$_POST['serie'];
        $this->load->model('serie_model');
        $ok=$this->serie_model->Favorito($usuario, $serie);
    }
    //Cambiar la valoración de una serie
    public function cambiaValoracion(){
        $valor=$_POST['valoracion'];
        $usuario=$_POST['usuario'];
        $serie=$_POST['serie'];
        $this->load->model('serie_model');
        $ok=$this->serie_model->cambiarValoracion($valor, $usuario, $serie);
    }
    //Cargar los favoritos de un usuario al acceder a una serie en concreto
    public function cargaFavoritos(){
        $usuario=$_REQUEST['usuario'];
        $serie=$_REQUEST['serie'];
        $this->load->model('serie_model');
        $ok=$this->serie_model->cargaFavorito($usuario, $serie);
        echo $ok;
    }
    //Cargar el estado de una serie al entrar
    public function cargaEstado(){
        $usuario=$_REQUEST['usuario'];
        $serie=$_REQUEST['serie'];
        $this->load->model('serie_model');
        $ok=$this->serie_model->cargaEstado($usuario, $serie);
        echo $ok;
    }
    //Cargar la valoración de una serie al entrar
    public function cargaValoracion(){
        $usuario=$_REQUEST['usuario'];
        $serie=$_REQUEST['serie'];
        $this->load->model('serie_model');
        $ok=$this->serie_model->cargaValoracion($usuario, $serie);
        echo $ok;
    }
}

?>