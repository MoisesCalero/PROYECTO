<?php

class Musica extends CI_Controller
{
    
    public function crear()
    {
        $id=isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        $data=[];
        if($id!=null){
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->getUsuarioById($id);
        }
        frame($this, 'musica/crear', $data);
    }
    public function crearPost()
    {
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $album = isset($_POST['album']) && ! empty($_POST['album']) ? $_POST['album'] : null;
        $grupo = isset($_POST['grupo']) && ! empty($_POST['grupo']) ? $_POST['grupo'] : null;
        $genero = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $valoracion = isset($_POST['valoracion']) && ! empty($_POST['valoracion']) ? $_POST['valoracion'] : null;
        $fecha = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        if ($nombre!=null && $album!=null && $grupo!=null && $genero!=null && $duracion!=null && $valoracion!=null && $fecha!=null) {
            $this->load->model('musica_model');
            $ok = $this->musica_model->crear($nombre, $album, $grupo, $genero, $duracion, $valoracion, $fecha);
            if ($ok) {
                $data=[];
                $data['musica'] = $nombre;
                frame($this, 'musica/crearOK', $data);
            } else {
                $data['musica'] = $nombre;
                //Redirigir al formulario avisando del error(mejor hacerlo con ajax antes de enviarlo, asi no redirige a nada)
                frame($this, 'musica/crearERROR', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    //------------------------------------------------------ME HE QUEDADO AQUI
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
    public function detalles(){
        $this->load->model('musica_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        //ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
        if($id!=null){
            $data['musica'] = $this->musica_model->getMusicaById($id);
        }
        frame($this, 'musica/detalles', $data);
    }
    public function update()
    {
        //------------------CAMBIAR $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('musica_model');
            $data['musica'] = $this->musica_model->getMusicaById($id);
            frame($this, 'musica/update', $data);
        } else {
            redirect(base_url());
        }
    }
    
    public function updatePost()
    {
        $nombre_nuevo = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $album_nuevo = isset($_POST['album']) && ! empty($_POST['album']) ? $_POST['album'] : null;
        $grupo_nuevo = isset($_POST['grupo']) && ! empty($_POST['grupo']) ? $_POST['grupo'] : null;
        $genero_nuevo = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $duracion_nuevo = isset($_POST['duracion']) && ! empty($_POST['duracion']) ? $_POST['duracion'] : null;
        $valoracion_nuevo = isset($_POST['valoracion']) && ! empty($_POST['valoracion']) ? $_POST['valoracion'] : null;
        $fecha_nuevo = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        
        if ($nombre_nuevo!=null && $album_nuevo!=null && $grupo_nuevo!=null && $genero_nuevo!=null && $duracion_nuevo!=null && $valoracion_nuevo!=null && $fecha_nuevo!=null) {
            $this->load->model('musica_model');
            $ok = $this->musica_model->update($id, $nombre_nuevo, $album_nuevo, $grupo_nuevo, $genero_nuevo, $duracion_nuevo, $valoracion_nuevo, $fecha_nuevo);
            if ($ok) {
                redirect(base_url() . 'musica/listar');
            } else {
                frame($this, 'musica/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    
    public function delete() {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('musica_model');
            $this->musica_model->delete($id);
            header("location: ../musica/listar");
        }
    }
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
    //Cambiar el estado de la película
    public function cambiaEstado(){
        $estado=$_POST['estado'];
        $usuario=$_POST['usuario'];
        $musica=$_POST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cambiarEstado($estado, $usuario, $musica);
    }
    //Añadir película a favoritos
    public function Favoritos(){
        $usuario=$_POST['usuario'];
        $musica=$_POST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->Favorito($usuario, $musica);
    }
    //Cambiar la valoración de una película
    public function cambiaValoracion(){
        $valor=$_POST['valoracion'];
        $usuario=$_POST['usuario'];
        $musica=$_POST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cambiarValoracion($valor, $usuario, $musica);
    }
    //Cargar los favoritos de un usuario al acceder a una película en concreto
    public function cargaFavoritos(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cargaFavorito($usuario, $musica);
        echo $ok;
    }
    //Cargar el estado de una película al entrar
    public function cargaEstado(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cargaEstado($usuario, $musica);
        echo $ok;
    }
    //Cargar la valoración de una película al entrar
    public function cargaValoracion(){
        $usuario=$_REQUEST['usuario'];
        $musica=$_REQUEST['musica'];
        $this->load->model('musica_model');
        $ok=$this->musica_model->cargaValoracion($usuario, $musica);
        echo $ok;
    }
}

?>