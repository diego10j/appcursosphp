<?php
require_once('../controladores/EstudianteCtrl.php');
include 'inc/templates/header.php';
include 'inc/funciones/funciones.php';

if (isset($_REQUEST['opcion'])) {
    $estudianteCtrl = new EstudianteCtrl();
    $estudianteCtrl->validarLogin($_POST['correo'],$_POST['clave']);
    return;
}

?>

<main class="text-center">
    <form class="form-signin" action="login.php?opcion=login" method="post">

    <?php
    //Despliega los mensajes de la validación realizada
    if (isset($_REQUEST['mensaje'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
                echo $_REQUEST['mensaje'] . ' <br> ';
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>

        <i class="mb-4 fas fa-chalkboard-teacher icono"></i>
        <h1 class="h3 mb-3 font-weight-normal">Iniciar Sessión</h1>
        <label for="correo" class="sr-only">Email</label>
        <input type="email" id="correo" name="correo" class="form-control" required autofocus>
        <label for="clave" class="sr-only">Contraseña</label>
        <input type="password" id="clave" name="clave" class="form-control" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
    </form>
</main>

<?php
include 'inc/templates/footer.php';
?>