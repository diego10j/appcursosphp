<?php
require_once('../controladores/EstudianteCtrl.php');
require_once('../controladores/CursoCtrl.php');
include 'inc/templates/header.php';
//session_start();
if (!isset($_SESSION['idEstudiante'])) {
  header("Location: ../index.php");
}
$estudianteCtrl = new EstudianteCtrl();
$cursoCtrl = new CursoCtrl();

if (isset($_REQUEST['salir'])) {
      $estudianteCtrl->cerrarSession();
      return;
}


?>

<!-- HEADER -->
<header class="py-2 container fw-200">
  <h1> <i class="fas fa-cog"></i> Dashboard</h1>
</header>

<!-- TOTAL DE ESTUDIANTES Y CURSOS -->
<section>
  <div class="py-4 container">
    <div class="row">
      <div class="col-md-6">
        <div class="card text-center bg-primary text-white mb-3">
          <div class="card-body">
            <h3>Cursos</h3>
            <h4 class="display-4">
              <i class="fas fa-chalkboard-teacher"></i> <?php echo $cursoCtrl->getTotalCursos(); ?>
            </h4>
            <a href="cursos.php" class="btn btn-outline-light btn-sm">Consultar</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center bg-info text-white mb-3">
          <div class="card-body">
            <h3>Estudiantes</h3>
            <h4 class="display-4">
              <i class="fas fa-user-graduate"></i> <?php echo $estudianteCtrl->getTotalEstudiantes(); ?>
            </h4>
            <a href="estudiantes.php" class="btn btn-outline-light btn-sm">Consultar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<p class="container py-4 centrar-texto ">
  Te gusta la página web ?  
<i onclick="cambiaIcono(this)" class="fa fa-thumbs-up icono-like"></i>

</p>


<script>
function cambiaIcono(icono) {
  if (icono.className === "fa fa-thumbs-up icono-like"){
    icono.className = "fa fa-thumbs-down icono-like text-danger";
  }
  else{
    icono.className = "fa fa-thumbs-up icono-like";
  }
}
</script>


<?php
include 'inc/templates/footer.php';
?>