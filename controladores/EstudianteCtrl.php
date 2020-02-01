<?php
require_once '../modelos/Estudiante.php';
require_once '../vistas/inc/funciones/funciones.php';
class EstudianteCtrl
{
    private $estudiante;

    function __construct()
    {
        $this->estudiante = new Estudiante();
    }

    /**
     * Valida y guarda los datos de un estudiante en la base de datos
     *
     * @param [type] $datos
     * @return void
     */
    function registrar($datos)
    {
        // Validaciones 
        $listMensajesError = array();
        //1 Valida Confirmar Correo
        $validacion1 = validarConfirmar(htmlspecialchars($_POST['correo']), htmlspecialchars($_POST['confirmaCorreo']));
        if (!$validacion1) {
            array_push($listMensajesError, 'Los correo eléctronicos ingresados no son iguales.');
        }
        //2 Valida Confirmar Contraseña
        $validacion2 = validarConfirmar(htmlspecialchars($_POST['clave']), htmlspecialchars($_POST['confirmaClave']));
        if (!$validacion2) {
            array_push($listMensajesError, 'Las Contraseñas ingresadas no son iguales.');
        }
        //3 Valida Seguridad Contraseña
        $mensajeError3 = "";
        $validacion3 = validarSeguridadClave(htmlspecialchars($_POST['clave']), $mensajeError3);
        if (!$validacion3) {
            array_push($listMensajesError, $mensajeError3);
        }

        if (count($listMensajesError) > 0) {
            session_start();
            //Guarda en session los valores POST para recuperarlos en el index.php
            $_SESSION['valores_post'] = $_POST;
            $_SESSION['mensajes'] = $listMensajesError;
            //Redirecciona al index.php y envia los mensajes de las validaciones
            header("Location: registro.php?mensajes=true");
        }
        $guardo = $this->estudiante->guardar($datos);
        if($guardo){
            header("Location: login.php?");
        }
    }

    /**
     * Validar Login al aplicativo
     *
     * @param [type] $correo
     * @param [type] $clave
     * @return void
     */
    function validarLogin($correo, $clave)
    {
        $usuario =  $this->estudiante->validarLogin($correo, $clave);

        if (isset($usuario)) {
            //inicio de sesion
            //session_start();
            //Crea variable de session
            $_SESSION['idEstudiante'] = $usuario['idEstudiante'];
            header("Location: admin.php");
        } else {
            header("Location: login.php?mensaje=El correo o la contraseña son incorrectos.");
        }
    }

    /**
     * Cerrar session y redirige a la pagina principal
     *
     * @return void
     */
    function cerrarSession()
    {
        session_start();
        unset($_SESSION['idEstudiante']); //destruye la sesión
        if (session_destroy()) // Destruye todas las sesiones
        {
            header("Location: ../index.php"); // Redireccionando a la pagina index.php
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
        return $this->estudiante->getEstudiantes();
    }

    function getEstudiantePorId($id)
    {
       return $this->estudiante->getEstudiantePorId($id);
    }

    function getTotalEstudiantes()
    {
        return $this->estudiante->getTotalEstudiantes();
    }
}
