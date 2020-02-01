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
        $guardo = $this->curso->guardar($datos);
        if ($guardo) {
            header("Location: cursos.php");
        }
    }


    function modificar($datos, $id)
    {
        $modifico =  $this->curso->modificar($datos, $id);
        if ($modifico) {
            header("Location: cursos.php");
        }
    }


    function eliminar($id)
    {
        $elimino=  $this->curso->eliminar($id);
        if ($elimino) {
            header("Location: cursos.php");
        }
    }

    function getCursos()
    {
        return  $this->curso->getCursos();
    }

    function getCursoPorId($id)
    {
        return $this->curso->getCursoPorId($id);
    }

    function getTotalCursos()
    {
        return  $this->curso->getTotalCursos();
    }
}
