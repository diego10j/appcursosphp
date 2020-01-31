<?php
require_once("../lib/Conexion.php");
/**
 * Clase Curso
 */
class Curso
{
    private $db;

    function __construct()
    {
        $this->db = new Conexion();
    }

    function guardar($datos)
    {
        try {
            $sql = "INSERT INTO CURSO(titulo,descripcion,urlImagen,horas,fechaRegistro)VALUES (?,?,?,?,?)";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array(
                $datos['titulo'],
                $datos['descripcion'],
                $datos['urlImagen'],
                $datos['horas'],
                date("Y-m-d H:i:s")
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    function modificar($datos, $id)
    {
        try {
            $sql = "UPDATE CURSO  set  titulo=?, descripcion =?, urlImagen=?,horas=?, fechaModifica=?  WHERE idCurso = ? ";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array(
                $datos['titulo'],
                $datos['descripcion'],
                $datos['urlImagen'],
                $datos['horas'],
                date("Y-m-d H:i:s"),
                $id,
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }


    function eliminar($id)
    {
        try {
            $sql = "DELETE FROM CURSO where idCurso=?";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array($id));
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }


    function getCursoPorId($id)
    {
        try {
            $sql = "SELECT * FROM CURSO where idCurso = ?";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array($id));
            $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $datos;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    function getCursos()
    {
        $sql = 'SELECT * FROM CURSO ORDER BY titulo';
        $datos = $this->db->getConexion()->query($sql);
        return  $datos;
    }


    function getTotalCursos()
    {
        $sql = 'SELECT count(1) as total FROM CURSO';
        $sentencia = $this->db->getConexion()->prepare($sql);
        $sentencia->execute();
        $datos = $sentencia->fetch(PDO::FETCH_ASSOC);        
        if (isset($datos)) {            
            return $datos['total'];
        }
        return 0;
    }
}
