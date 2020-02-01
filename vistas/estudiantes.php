<?php
include 'inc/templates/header.php';
//session_start();
if (!isset($_SESSION['idEstudiante'])) {
    header("Location: ../index.php");
}
require_once('../controladores/EstudianteCtrl.php');

?>

<!-- HEADER -->
<header class="py-2 container fw-200">
    <h1> <i class="fas fa-user-graduate"></i> Estudiantes</h1>
</header>

<!-- DETALLE ESTUDIANTE CON  AJAX -->
<div class="py-4 container" id="detalleEstudiante">El Detalle del Estudiante se muestra aqui...</div>

<!-- LISTA ESTUDIANTES -->
<section id="users">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Listado de Estudiantes</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>CORREO</th>
                                <th>PAIS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $estudianteCtrl = new EstudianteCtrl();
                            $lista = $estudianteCtrl->getEstudiantes();
                            foreach ($lista as $estudiante) : ?>
                                <tr>
                                    <td> <img src="../../../recursos/img/avatars/<?php echo $estudiante['avatar']; ?>" height="64"> </td>
                                    <td><?php echo $estudiante['nombres']; ?></td>
                                    <td><?php echo $estudiante['apellidos']; ?></td>
                                    <td><?php echo $estudiante['correo']; ?></td>
                                    <td><?php echo $estudiante['pais']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" onclick="buscarEstudiante(<?php echo $estudiante['idEstudiante']; ?>)">
                                            <i class="fas fa-angle-double-right"></i> Detalle
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>




<script>
    /**Funcion que busca los datos de un estudiante y mediante ajax carga el contenido en la pantalla
     */
    function buscarEstudiante(id) {
        var xhttp;
        if (id == "") {
            document.getElementById("detalleEstudiante").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("detalleEstudiante").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "estudianteAjax.php?idEstudiante=" + id, true);
        xhttp.send();
    }
</script>

<?php
include 'inc/templates/footer.php';
?>