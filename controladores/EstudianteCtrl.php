<?php
require_once '../modelos/Estudiante.php';
class EstudianteCtrl
{
    private $estudiante;

    function __construct()
    {
        $this->estudiante = new Estudiante();
    }

    function registrar($datos)
    {
   // Validaciones 
   $listMensajesError = array();
   //1 Valida Confirmar Correo
   $validacion1 = validarConfirmar(htmlspecialchars($_POST['txtEmail']), htmlspecialchars($_POST['txtConfirmaEmail']));
   if (!$validacion1) {
       array_push($listMensajesError, 'Los correo eléctronicos ingresados no son iguales.');
   }
   //2 Valida Confirmar Contraseña
   $validacion2 = validarConfirmar(htmlspecialchars($_POST['txtClave']), htmlspecialchars($_POST['txtConfirmaClave']));
   if (!$validacion2) {
       array_push($listMensajesError, 'Las Contraseñas ingresadas no son iguales.');
   }
   //3 Valida Seguridad Contraseña
   $mensajeError3 = "";
   $validacion3 = validarSeguridadClave(htmlspecialchars($_POST['txtClave']), $mensajeError3);
   if (!$validacion3) {
       array_push($listMensajesError, $mensajeError3);
   }  
     
   
   if (count($listMensajesError) > 0) {
       //Guarda en session los valores POST para recuperarlos en el index.php
       $_SESSION['valores_post'] = $_POST;
       $_SESSION['mensajes'] = $listMensajesError;
       //Redirecciona al index.php y envia los mensajes de las validaciones
       header("Location: registro.php?mensajes=true");
   }
   
   
   


        $this->estudiante->guardar($datos);
    }

    function validarLogin($correo, $clave)
    {
        $usuario =  $this->estudiante->validarLogin($correo, $clave);

        if (isset($usuario)) {
            //inicio de sesion
            session_start();
            //Crea variable de session
            $_SESSION['idEstudiante'] = $usuario['idEstudiante'];
            header("Location: admin.php");
        } else {
            header("Location: login.php?mensaje=El correo o la contraseña son incorrectos.");
        }
    }

    function cerrarSession()
    {
        session_start();
        unset($_SESSION['idEstudiante']); //destruye la sesión
        if (session_destroy()) // Destruye todas las sesiones
        {
            header("Location: index.php"); // Redireccionando a la pagina index.php
        }
    }


    function modificar($datos, $id)
    {
        $this->estudiante->modificar($datos, $id);
    }


    function eliminar($id)
    {
        $this->estudiante->eliminar($id);
    }


    function getEstudiantes()
    {
        $this->estudiante->getEstudiantes();
    }

    function getEstudiantePorId($id)
    {
        $this->estudiante->getEstudiantePorId($id);
    }

    function getTotalEstudiantes()
    {
        return $this->estudiante->getTotalEstudiantes();
    }
}
