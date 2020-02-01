<?php
include 'vistas/inc/templates/header.php';
include 'vistas/inc/funciones/funciones.php';
//require_once('controladores/CursoCtrl.php');
//$cursoCtrl = new CursoCtrl();
?>

<main role="main">

  <section class="jumbotron text-center bg-light">
    <div class="container">
      <h1>AppCursos</h1>
      <p class="lead text-muted">Es una plataforma de aprendizaje en línea, dirigida para adultos profesionales.</p>
      <p>
        <a href="/vistas/registro.php" class="btn btn-primary my-2">Registrarse</a>
      </p>
    </div>
  </section>

  <div class="container">
  <div class="centrar-texto">
    <a href="https://github.com/diego10j/appcursosphp.git" target="_blank"><i class="fab fa-github icono-github"></i> Código
      Fuente</a>
  </div>
</div>

</main>

<?php
include 'vistas/inc/templates/footer.php';
?>