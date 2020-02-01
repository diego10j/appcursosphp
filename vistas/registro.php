<?php
require_once('../controladores/EstudianteCtrl.php');
if (isset($_REQUEST['opcion'])) {
    $estudianteCtrl = new EstudianteCtrl();
    $estudianteCtrl->registrar($_POST);
    return;
}

include 'inc/templates/header.php';
require_once 'inc/funciones/funciones.php';

//Si se redirecciona por algun error de validación
if (isset($_REQUEST['mensajes'])) {
    //Recupera mensajes
    session_start();
    $listaMensajes = $_SESSION['mensajes'];
    //Recupera valores Post

    if (isset($_SESSION['valores_post'])) {
        $_POST = $_SESSION['valores_post'];
        $_SERVER['REQUEST_METHOD'] = 'POST';
    }
}
//Recupera valores de campos del formulario previamente enviados 
$avatar = isset($_POST['avatar']) ? $_POST['avatar'] : '0';
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$confirmaCorreo = isset($_POST['confirmaCorreo']) ? $_POST['confirmaCorreo'] : '';
$clave = isset($_POST['clave']) ? $_POST['clave'] : '';
$confirmaClave = isset($_POST['confirmaClave']) ? $_POST['confirmaClave'] : '';
$fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$pais = isset($_POST['pais']) ? $_POST['pais'] : '';
$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
$codigoPostal = isset($_POST['codigoPostal']) ? $_POST['codigoPostal'] : '';
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$aceptar = isset($_POST['aceptar']) ? $_POST['aceptar'] : '';
?>

<main class="contenedor seccion contenido-centrado">
    <h2 class="fw-200 centrar-texto">Formulario de Registro</h2>
    <div class="alert alert-primary" role="alert">
        Por favor ingresa tus datos, recuerda que los campos con <span class="text-danger">*</span> son obligatorios.
    </div>
    <?php
    //Despliega los mensajes de la validación realizada
    if (isset($_REQUEST['mensajes'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong>Detalle de validaciones:</strong></p>
            <?php
            foreach ($listaMensajes as $mensaje) {
                echo $mensaje . ' <br> ';
            }
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>

    <form action="registro.php?opcion=guardar" method="post">
        <fieldset>
            <legend>Información de Usuario</legend>

            <div align="center">
                <label for="avatar">Seleccione un Avatar:</label>
                <input type="hidden" id="avatar" name="avatar" value="0">
                <div id="carouselAvatar" class="carousel slide avatar" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item <?php if ($avatar === '0') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-0.png" class="d-block w-100" alt="Avatar 1">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '1') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-1.png" class="d-block w-100" alt="Avatar 2">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '2') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-2.png" class="d-block w-100" alt="Avatar 3">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '3') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-3.png" class="d-block w-100" alt="Avatar 4">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '4') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-4.png" class="d-block w-100" alt="Avatar 5">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '5') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-5.png" class="d-block w-100" alt="Avatar 6">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '6') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-6.png" class="d-block w-100" alt="Avatar 7">
                        </div>
                        <div class="carousel-item <?php if ($avatar === '7') {
                                                        echo 'active';
                                                    } ?>">
                            <img src="../../../recursos/img/avatars/av-7.png" class="d-block w-100" alt="Avatar 8">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselAvatar" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselAvatar" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">Nombres: <span class="text-danger">*</span></label>
                    <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Tu Nombre" required value="<?php echo $nombres ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos </label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Tu Apellido" value="<?php echo $apellidos ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="correo">E-mail: <span class="text-danger">*</span></label>
                    <input type="email" id="correo" name="correo" class="form-control" placeholder="Tu Correo electrónico" required value="<?php echo $correo ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirmaCorreo">Confirmar E-mail: <span class="text-danger">*</span> </label>
                    <input type="email" id="confirmaCorreo" name="confirmaCorreo" class="form-control" placeholder="Confirma tu Correo electrónico" required value="<?php echo $confirmaCorreo ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="clave">Contraseña: <span class="text-danger">*</span></label>
                    <input type="password" id="clave" name="clave" class="form-control" required value="<?php echo $clave ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirmaClave">Confirmar Contraseña: <span class="text-danger">*</span></label>
                    <input type="password" id="confirmaClave" name="confirmaClave" class="form-control" required value="<?php echo $confirmaClave ?>">
                </div>
            </div>
        </fieldset>
        <hr>

        <fieldset>
            <legend>Información Personal</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fechaNacimiento">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" require value="<?php echo $fechaNacimiento ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="telefono">Teléfono: <span class="text-danger">*</span></label>
                    <input type="tel" id="telefono" name="telefono" class="form-control" pattern="[0-9]{10}" maxlength="10" placeholder="Ejemplo: 0983113543" required value="<?php echo $telefono ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="pais">País:<span class="text-danger">*</span></label>
                    <select class="custom-select d-block w-100" id="pais" name="pais" required>
                        <option value="">Seleccione...</option>
                        <?php
                        //Carga las opciones de paises
                        foreach (getPaises() as $paisLista) { ?>
                            <option value="<?= $paisLista ?>" <?= $pais == $paisLista  ? ' selected="selected"' : ''; ?>><?= $paisLista ?></option>
                        <?php
                        } ?>

                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un País.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="provincia">Provincia:<span class="text-danger">*</span></label>
                    <select id="provincia" name="provincia" class="form-control" required> </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="codigoPostal">Código postal: </label>
                    <input type="number" class="form-control" id="codigoPostal" name="codigoPostal" value="<?php echo $codigoPostal ?>">
                    <div class="invalid-feedback">
                        Por favor ingresa un Código postal.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Tu Dirección" required value="<?php echo $direccion ?>">
            </div>

            <div class="form-row">
                <div class="col">
                    <p>Género: </p>
                </div>
                <div class="col">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="masculino" name="genero" value="MASCULINO" class="custom-control-input" <?= $genero == 'MASCULINO' ? ' checked' : ''; ?>>
                        <label class="custom-control-label" for="masculino">Masculino</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="femenino" name="genero" value="FEMENINO" class="custom-control-input" <?= $genero == 'FEMENINO' ? ' checked' : ''; ?>>
                        <label class="custom-control-label" for="femenino">Femenino</label>
                    </div>
                </div>
            </div>

        </fieldset>
        <hr>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="aceptar" name="aceptar" required <?= $aceptar == 'on' ? ' checked="checked"' : ''; ?>>
                <label class="form-check-label" for="aceptar">
                    Acepto Términos y condiciones.
                </label>
            </div>
        </div>

        <input type="submit" value="Enviar" class="btn btn-primary">

    </form>
</main>



<?php
include 'inc/templates/footer.php';
?>

<script>
    //Carga la imagen seleccionada en el input hidden del avatar, para guardar el valor y pasarlo en el formulario
    $('#carouselAvatar').bind('slide.bs.carousel', function(e) {
        var numImagen = e.to;
        console.log("Avatar seleccionado: " + numImagen);
        $("#avatar").val(numImagen);
    });

    //Carga las Provincias al combo usando jquery
    $(document).ready(function(){
    $("#pais").on('change', function () {
        $("#pais option:selected").each(function () {
            pais=$(this).val();
            $.post("inc/funciones/provincias.php", { pais: pais }, function(data){
                $("#provincia").html(data);
            });			
        });
   });
});
</script>


