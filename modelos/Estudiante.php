<?php
require_once("../lib/Conexion.php");
/**
 * Clase Estudiante
 */
class Estudiante
{
    private $db;

    function __construct()
    {
        $this->db = new Conexion();
    }

    function guardar($datos)
    {
        try {
            $sql = "INSERT INTO ESTUDIANTE(nombres,apellidos,correo,fechaNacimiento,telefono,pais,provincia,codigoPostal,direccion,genero,clave,avatar,fechaRegistro)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array(
                $datos['nombres'],
                $datos['apellidos'],
                $datos['correo'],
                $datos['fechaNacimiento'],
                $datos['telefono'],
                $datos['pais'],
                $datos['provincia'],
                $datos['codigoPostal'],
                $datos['direccion'],
                $datos['genero'],
                $datos['clave'],
                'av-' . $datos['avatar'] . '.png',
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
            $sql = "UPDATE ESTUDIANTE  set  nombres=?, apellidos =?, correo=?,fechaNacimiento=?, telefono=?, pais=? , provincia=? , codigoPostal=? , direccion=? , genero=? , clave=? , avatar=? , fechaModifica=?  WHERE idEstudiante = ? ";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array(
                $datos['nombres'],
                $datos['apellidos'],
                $datos['correo'],
                $datos['fechaNacimiento'],
                $datos['telefono'],
                $datos['pais'],
                $datos['provincia'],
                $datos['codigoPostal'],
                $datos['direccion'],
                $datos['genero'],
                $datos['clave'],
                'av-' . $datos['avatar'] . '.png',
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
            $sql = "DELETE FROM ESTUDIANTE where idEstudiante=?";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array($id));
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }


    function getEstudiantePorId($id)
    {
        try {
            $sql = "SELECT * FROM ESTUDIANTE where idEstudiante = ?";
            $sentencia = $this->db->getConexion()->prepare($sql);
            $sentencia->execute(array($id));
            $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $datos;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    function getEstudiantes()
    {
        $sql = 'SELECT * FROM ESTUDIANTE ORDER BY apellidos,nombres';
        $fila=$this->db->getConexion()->query($sql);
        return  $fila;
    }


    function validarLogin($correo, $clave)
    {
        $sql = 'SELECT * FROM ESTUDIANTE WHERE correo = ?';
        $sentencia = $this->db->getConexion()->prepare($sql);
        $sentencia->execute(array($correo));
        $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
        if (isset($datos)) {
            $claveUsuario = $datos['clave'];
            if ($clave == $claveUsuario) {
                return $datos;
            }
        }
    }

    function getTotalEstudiantes()
    {
        $sql = 'SELECT count(1) as total FROM ESTUDIANTE';
        $sentencia = $this->db->getConexion()->prepare($sql);
        $sentencia->execute();
        $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
        if (isset($datos)) {
            return isset($datos['total']) ? $datos['total'] : 0;
        }
        if (isset($datos)) {            
            return $datos['total'];
        }
        return 0;
    }
}
