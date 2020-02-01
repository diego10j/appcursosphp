<?php
require_once('../controladores/EstudianteCtrl.php');
require_once('../controladores/CursoCtrl.php');
include 'inc/templates/header.php';
//session_start();
if (!isset($_SESSION['idEstudiante'])) {
    header("Location: ../index.php");
}
$cursoCtrl = new CursoCtrl();
if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    if ($opcion == 'guardar') {
        $cursoCtrl->guardar($_POST);
        return;
    } elseif ($opcion == 'modificar') {
        $cursoCtrl->modificar($_POST, $_POST['idCurso']);
        return;
    }
}

if (isset($_REQUEST['id'])) {
    $curso = $cursoCtrl->getCursoPorId($_REQUEST['id']);
}


?>

<!-- HEADER -->
<header class="py-2 container fw-200">
    <h1> <i class="fas fa-chalkboard-teacher"></i> Crear Curso</h1>
</header>


<section class="py-2 container">
    <?php if (isset($_REQUEST['id'])) { ?>
        <form action="datosCurso.php?opcion=modificar" method="post">
        <?php } else { ?>
            <form action="datosCurso.php?opcion=guardar" method="post">
            <?php }
            ?>
            <div class="form-group">
                <label for="titulo">Título: <span class="text-danger">*</span></label>
                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título del Curso" required value="<?php echo isset($curso['titulo']) ? $curso['titulo'] : '' ; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción: <span class="text-danger">*</span></label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción del Curso" required value="<?php echo isset($curso['descripcion']) ? $curso['descripcion'] : '' ; ?>">
            </div>
            <div class="form-group">
                <label for="urlImagen">Url Imágen: <span class="text-danger">*</span></label>
                <input type="text" id="urlImagen" name="urlImagen" class="form-control" placeholder="Url Imágen del Curso" required value="<?php echo isset($curso['urlImagen']) ? $curso['urlImagen'] : '' ; ?>">
            </div>
            <div class="form-group">
                <label for="horas">Horas: <span class="text-danger">*</span></label>
                <input type="number" id="horas" name="horas" class="form-control" required value="<?php echo isset($curso['horas']) ? $curso['horas'] : '' ; ?>">
            <input type="hidden" id="idCurso" name="idCurso" value="<?php echo isset($curso['idCurso']) ? $curso['idCurso'] : '' ; ?>">
            <br>
            <input type="submit" value="Guardar" class="py-2 btn btn-success">
            </form>
</section>


<?php
include 'inc/templates/footer.php';
?>