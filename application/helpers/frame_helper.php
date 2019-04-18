<?php
/**
 * 
 * @param object $c
 * @param string $path_to_view
 * @param string $datos
 */
function frame($c,$path_to_view,$datos=[]) {
    $c->load->view('_templates/head',$datos);
    $c->load->view('_templates/nav',$datos);
    $c->load->view($path_to_view,$datos);
    $c->load->view('_templates/end',$datos);
}
?>