<?php
class Libro extends CI_Controller
{
    
    public function crear()
    {
        frame($this, 'libro/crear');
    }
    public function crearPost()
    {
        $nombre = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $genero = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $numero_paginas = isset($_POST['numero_paginas']) && ! empty($_POST['numero_paginas']) ? $_POST['numero_paginas'] : null;
        $autor = isset($_POST['autor']) && ! empty($_POST['autor']) ? $_POST['autor'] : null;
        $editorial = isset($_POST['editorial']) && ! empty($_POST['editorial']) ? $_POST['editorial'] : null;
        $valoracion = isset($_POST['valoracion']) && ! empty($_POST['valoracion']) ? $_POST['valoracion'] : null;
        $fecha = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        if ($nombre!=null && $descripcion!=null && $genero!=null && $numero_paginas!=null && $autor!=null && $editorial!=null && $valoracion!=null && $fecha!=null) {
            $this->load->model('libro_model');
            $ok = $this->libro_model->crear($nombre, $descripcion, $genero, $numero_paginas, $autor, $editorial, $valoracion, $fecha);
            if ($ok) {
                $data=[];
                $data['libro'] = $nombre;
                frame($this, 'libro/crearOK', $data);
            } else {
                $data['libro'] = $nombre;
                //Redirigir al formulario avisando del error(mejor hacerlo con ajax antes de enviarlo, asi no redirige a nada)
                frame($this, 'libro/crearERROR', $data);
            }
        } else {
            // Mensaje ERROR
        }
    }
    //------------------------------------------------------ME HE QUEDADO AQUI
    public function listar()
    {
        $this->load->model('libro_model');
       $data=null;
        //ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
       
            $data['libros'] = $this->libro_model->listar();
            frame($this, 'libro/listar', $data);
    }
    public function detalles(){
        $this->load->model('libro_model');
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $data=null;
        //ESTO LISTARA SOLO EL USUARIO ACTIVO,CON SU INFORMACION ����NO TODOS LOS USUARIOS!!!
        if($id!=null){
            $data['libro'] = $this->libro_model->getLibroById($id);
        }
        frame($this, 'libro/detalles', $data);
    }
    public function update()
    {
        //------------------CAMBIAR $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        $id = (isset($_POST['id']) && ! empty($_POST['id'])) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('libro_model');
            $data['libro'] = $this->libro_model->getLibroById($id);
            frame($this, 'libro/update', $data);
        } else {
            redirect(base_url());
        }
    }
    
    public function updatePost()
    {
        $nombre_nuevo = isset($_POST['nombre']) && ! empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion_nuevo = isset($_POST['descripcion']) && ! empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $genero_nuevo = isset($_POST['genero']) && ! empty($_POST['genero']) ? $_POST['genero'] : null;
        $numero_paginas_nuevo = isset($_POST['numero_paginas']) && ! empty($_POST['numero_paginas']) ? $_POST['numero_paginas'] : null;
        $autor_nuevo = isset($_POST['autor']) && ! empty($_POST['autor']) ? $_POST['autor'] : null;
        $editorial_nuevo = isset($_POST['editorial']) && ! empty($_POST['editorial']) ? $_POST['editorial'] : null;
        $valoracion_nuevo = isset($_POST['valoracion']) && ! empty($_POST['valoracion']) ? $_POST['valoracion'] : null;
        $fecha_nuevo = isset($_POST['fecha']) && ! empty($_POST['fecha']) ? $_POST['fecha'] : null;
        
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        
        if ($nombre_nuevo!=null && $descripcion_nuevo!=null && $genero_nuevo!=null && $numero_paginas_nuevo!=null && $autor_nuevo!=null && $editorial_nuevo!=null && $valoracion_nuevo!=null && $fecha_nuevo!=null) {
            $this->load->model('libro_model');
            $ok = $this->libro_model->update($id, $nombre_nuevo, $descripcion_nuevo, $genero_nuevo, $numero_paginas_nuevo, $autor_nuevo, $editorial_nuevo, $valoracion_nuevo, $fecha_nuevo);
            if ($ok) {
                redirect(base_url() . 'libro/listar');
            } else {
                frame($this, 'libro/updateERROR');
            }
        } else {
            // Mensaje ERROR
        }
    }
    
    public function delete() {
        $id = isset($_POST['id']) && ! empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('libro_model');
            $this->libro_model->delete($id);
            header("location: ../libro/listar");
        }
    }
}

?>