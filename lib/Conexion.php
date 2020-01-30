<?php
require_once "../config/config.php";
/**
 * Clase Conexion
 */
class Conexion
{
    private $servidor = DB_SERVIDOR;
    private $usuario = DB_USUARIO;
    private $clave = DB_CLAVE;
    private $nombreBase = DB_NOMBREBASE;
    private $db;
    private $error;

    public function __construct()
    {
        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Crear PDO instance
        try {
            $dsn = 'mysql:host=' . $this->servidor . ';dbname=' . $this->nombreBase;
            $this->db = new PDO($dsn, $this->usuario, $this->clave, $opciones);
            $this->db->exec('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            $this->error = "Error en la conexión a la base de datos: " . utf8_encode($e->getMessage());
            echo $this->error;
        }
    }

    public function __destruct()
    {
        $this->db = null;
        $this->error = null;
    }


    public function getConexion()
    {
        return $this->db;
    }

    public function isConnectado()
    {
        if ($this->error != null) {
            return false;
        } else {
            return true;
        }
    }
    
}
?>