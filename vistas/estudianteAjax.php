<?php
//Consulta los datos de un estudiante por id y despliega los datos para que sean desplegados en pantalla mediante un evento Ajax
session_start();
if (!isset($_SESSION['idEstudiante'])) {
    header("Location: ../index.php");
}

require_once('../controladores/EstudianteCtrl.php');
$estudianteCtrl = new EstudianteCtrl();
$idEstudiante = $_GET['idEstudiante'];
$estudiante = $estudianteCtrl->getEstudiantePorId($idEstudiante);
?> 

<div class="row mb-2">
        <div class="col-md-12">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><?php echo $estudiante['nombres']; ?> <?php echo $estudiante['apellidos']; ?></strong>
              <p class="card-text mb-auto">
                    <strong>CORREO : </strong> <?php echo $estudiante['correo']; ?> <br/> 
                    <strong>FECHA NACIMIENTO : </strong> <?php echo $estudiante['fechaNacimiento']; ?> <br/> 
                    <strong>TELEFONO : </strong> <?php echo $estudiante['telefono']; ?> <br/> 
                    <strong>PAIS : </strong> <?php echo $estudiante['pais']; ?> <br/> 
                    <strong>PROVINCIA : </strong> <?php echo $estudiante['provincia']; ?> <br/> 
                    <strong>DIRECCIÓN : </strong> <?php echo $estudiante['direccion']; ?> <br/> 
                    <strong>GENERO : </strong> <?php echo $estudiante['genero']; ?> <br/> 
                    <strong>FECHA REGISTRO : </strong> <?php echo $estudiante['fechaRegistro']; ?> <br/> 
              </p>
             
              
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="../../../recursos/img/avatars/<?php echo $estudiante['avatar']; ?>" alt="Avatar" height="256">
          </div>
        </div>
      </div>
    </div>