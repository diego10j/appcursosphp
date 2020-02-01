<?php
require_once('../controladores/CursoCtrl.php');
include 'inc/templates/header.php';
//session_start();
if (!isset($_SESSION['idEstudiante'])) {
  header("Location: ../index.php");
}

$cursoCtrl = new CursoCtrl();
if (isset($_REQUEST['eliminar'])) {
  $cursoCtrl->eliminar($_REQUEST['eliminar']);
}

?>

<!-- HEADER -->
<header class="py-2 container fw-200">
  <h1> <i class="fas fa-chalkboard-teacher"></i> Cursos</h1>
</header>

<!-- ACTIONS -->
<section class="py-2 mb-4 ">
  <div class="container">
    <div class="row">
      <div class="col-md-3 ml-auto">
        <a href="datosCurso.php" class="btn btn-success btn-block">
          <i class="fas fa-plus"></i> Crear Curso
        </a>
      </div>
    </div>
  </div>
</section>

<!-- LISTA CURSOS -->
<section id="users">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Listado de Cursos</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>CURSO</th>
                                <th></th>
                                <th>DESCRIPCION</th>
                                <th>HORAS</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $lista = $cursoCtrl->getCursos();
                            foreach ($lista as $curso) : ?>
                                <tr>
                                    <td> <img src="<?php echo $curso['urlImagen']; ?>" height="96"> </td>
                                    <td><?php echo $curso['titulo']; ?></td>
                                    <td><?php echo $curso['descripcion']; ?></td>
                                    <td><?php echo $curso['horas']; ?></td>
                                   
                                    <td> <a href="datosCurso.php?id=<?php echo $curso['idCurso']; ?>" class="btn btn-primary" role="button"><i
              class="far fa-edit"></i> </a> <a href="cursos.php?eliminar=<?php echo $curso['idCurso']; ?>" class="btn btn-danger"
            role="button"><i class="fas fa-trash-alt"></i> </a> </td>
                                  
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include 'inc/templates/footer.php';
?>