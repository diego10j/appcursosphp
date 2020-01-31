<?php
require_once '../modelos/Estudiante.php';
class EstudianteCtrl
{
    private $estudiante;

    function __construct()
    {   
        $this->estudiante = new Estudiante();       
    }

    function registrar ($datos){ 
        $this->estudiante->guardar($datos);
    }
}
?>