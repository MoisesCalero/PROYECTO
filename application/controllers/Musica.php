<?php

class Musica extends CI_Controller
{
    //Redirige a la función de listar
    public function index() {
        $this->listar();
    }
    //Redirige al formulario de creación de música
    public function crear()
    {
        $id=isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        $data=[];
        if($id!=null){
            session_start();
            if(isset($_SESSION['id']) && $_SESSION['id']==$id){
                $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
            }
            else{
                frame($this, "musica/error");
            }
        }
        frame($this, 'musica/crear', $data);
    }
    //Recibe los datos del formulario y si son correctos, crea música nueva
    public function crearPost()
    {
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $album = isset($_POST['album']) && ! empty($_POST['album']) ? $_POST['album'] : null;
        $grupo = isset($_POST['autor']) && ! empty($_POST['autor']) ? $_POST['autor'] : null;
        $genero = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $fecha = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        $idUsu=isset($_POST['idUsu']) && ! empty($_POST['idUsu']) ? $_POST['idUsu'] : null;
        $imagenes=isset($_FILES['imagenMusica'])&& ! empty($_FILES['imagenMusica'])?$_FILES['imagenMusica']:null;

        if ($nombre!=null && $album!=null && $grupo!=null && $genero!=null && $fecha!=null) {
            $this->load->model('musica_model');
            $ok = $this->musica_model->crear($nombre, $album, $grupo, $genero, $fecha, $idUsu, $imagenes);
            if ($ok) {
                $data=[];
                $data['musica'] = $nombre;
                frame($this, 'musica/crearOK', $data);
            } else {
                $data['musica'] = $nombre;
                frame($this, 'musica/crearERROR', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Carga una lista de toda la música
    public function listar()
    {
        $this->load->model('musica_model');
        $data=null;
        $data['seguidas']=null;
        $data['pendientes']=null;
        $data['vistas']=null;
        $data['musicas'] = $this->musica_model->listar();
        session_start();
        if(isset($_SESSION['id'])){
            $data['seguidas']=$this->musica_model->getMusicasEstado('seguir', $_SESSION['id']);
             $data['pendientes']=$this->musica_model->getMusicasEstado('viendo', $_SESSION['id']);
             $data['vistas']=$this->musica_model->getMusicasEstado('terminada', $_SESSION['id']);
             $data['favoritas']=$this->musica_model->getMusicasFavoritas($_SESSION['id']);
         }
            frame($this, 'musica/listar', $data);
    }
    //Carga los detalles de una música en concreto
    public function detalles(){
        $this->load->model('musica_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        $data['mediaValoracion']=null;
        if($id!=null){
            $data['musica'] = $this->musica_model->getMusicaById($id);
            $data['mediaValoracion']=$this->musica_model->getValoracionMedia($id);
        }
        frame($this, 'musica/detalles', $data);
    }
    //Redirige al formulario de actualizar música con sus datos
    public function update()
    {
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('musica_model');
            $data['musica'] = $this->musica_model->getMusicaById($id);
            frame($this, 'musica/update', $data);
        } else {
            redirect(base_url());
        }
    }
    //Recibe los datos del formulario y si son correctos, actualiza la música
    public function updatePost()
    {
        $nombre_nuevo = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $album_nuevo = isset($_POST['album']) && ! empty($_POST['album']) ? $_POST['album'] : null;
        $grupo_nuevo = isset($_POST['grupo']) && ! empty($_POST['grupo']) ? $_POST['grupo'] : null;
        $genero_nuevo = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion_nuevo = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $fecha_nuevo = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        $imagenes=isset($_FILES['imagenMusica'])&& ! empty($_FILES['imagenMusica'])?$_FILES['imagenMusica']:null;
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        
        if ($nombre_nuevo!=null && $album_nuevo!=null && $grupo_nuevo!=null && $genero_nuevo!=null && $duracion_nuevo!=null && $fecha_nuevo!=null) {
            $this->load->model('musica_model');
            $ok = $this->musica_model->update($id, $nombre_nuevo, $album_nuevo, $grupo_nuevo, $genero_nuevo, $duracion_nuevo, $fecha_nuevo, $imagenes);
            if ($ok) {
                redirect(base_url() . 'musica/updateOK');
            } else {
                frame($this, 'musica/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Elimina la música
    public function delete() {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('musica_model');
            $this->musica_model->delete($id);
            header("location: ../musica/listar");
        }
    }
    //Recibe información sobre el usuario y la música y añade un comentario nuevo
    public function crearComentario(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $comentario=$_REQUEST['comentario'];
        if ($usuario!=null && $musica!=null && $comentario !=null) {
            $this->load->model('musica_model');
            $ok = $this->musica_model->crearComentario($usuario, $musica, $comentario);
            if (!$ok) {
                echo "Error, estaria bien que esto llevara a una redirección de error o un alert";
            } else {
                
            }
        } else {
            // Mensaje ERROR
        }
    }
    //Cambiar el estado de la música
    public function cambiaEstado(){
        $estado=$_POST['estado'];
        $usuario=$_POST['usuario'];
        $musica=$_POST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cambiarEstado($estado, $usuario, $musica);
    }
    //Añadir música a favoritos
    public function Favoritos(){
        $usuario=$_POST['usuario'];
        $musica=$_POST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->Favorito($usuario, $musica);
    }
    //Cambiar la valoración de una música
    public function cambiaValoracion(){
        $valor=$_POST['valoracion'];
        $usuario=$_POST['usuario'];
        $musica=$_POST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cambiarValoracion($valor, $usuario, $musica);
    }
    //Cargar los favoritos de un usuario al acceder a una música en concreto
    public function cargaFavoritos(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cargaFavorito($usuario, $musica);
        echo $ok;
    }
    //Cargar el estado de una música al entrar
    public function cargaEstado(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cargaEstado($usuario, $musica);
        echo $ok;
    }
    //Cargar la valoración de una música al entrar
    public function cargaValoracion(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cargaValoracion($usuario, $musica);
        echo $ok;
    }
}

?>