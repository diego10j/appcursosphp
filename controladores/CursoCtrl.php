<?php
require_once '../modelos/Curso.php';
class CursoCtrl
{
    private $curso;

    function __construct()
    {
        $this->curso = new Curso();
    }

    function guardar($datos)
    {
        //Validaciones 
        $this->curso->guardar($datos);
    }


    function modificar($datos, $id)
    {
        $this->curso->modificar($datos, $id);
    }


    function eliminar($id)
    {
        $this->curso->eliminar($id);
    }

    function getCursos()
    {
        $this->curso->getCursos();
    }

    function getCursoPorId($id)
    {
        $this->curso->getCursoPorId($id);
    }

    function getTotalCursos()
    {
        return  $this->curso->getTotalCursos();
    }
}
