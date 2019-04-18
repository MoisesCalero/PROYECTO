<?php
class Home extends CI_Controller {
    public function presentacion() {
        $datos['nombre'] = isset($_GET['nombre'])?$_GET['nombre']:'JohnDoe';
        frame($this,'home/presentacion');
    }
    public function adios() {
        frame($this,'home/adios');
    }
    public function index() {
        $this->presentacion();
    }
}
?>