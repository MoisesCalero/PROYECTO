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
                frame($this, 'pelicula/crearERROR', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    //------------------------------------------------------ME HE QUEDADO AQUI
    public function listar()
    {
        $this->load->model('pelicula_model');
       $data=null;
        //ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
       
            $data['peliculas'] = $this->pelicula_model->listar();
            frame($this, 'pelicula/listar', $data);
    }
    public function detalles(){
        $this->load->model('pelicula_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        //ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
        if($id!=null){
            $data['pelicula'] = $this->pelicula_model->getPeliculaById($id);
        }
        frame($this, 'pelicula/detalles', $data);
    }
    public function update()
    {
        //------------------CAMBIAR $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
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
                frame($this, 'pelicula/updateERROR');
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
}

?>