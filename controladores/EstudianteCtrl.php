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
               
        $datos['genero'] = null;
        if($datos['masculino']){
            $datos['genero'] = 'MASCULINO';
        }
        if($datos['femenino']){
            $datos['genero'] = 'FEMENINO';
        }
        $this->estudiante->guardar($datos);
    }
}
?>