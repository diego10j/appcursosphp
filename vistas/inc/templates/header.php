<?php ob_start(); session_start(); ?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Actividad 2 Computación Cliente y Servidor">
  <title>AppCursos</title>
  <link rel="icon" type="image/jpeg" href="../../recursos/img/favicon.png" />
  <!-- Bootstrap CSS -->
  <link href="../../recursos/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="../../recursos/css/fontawesome-all.min.css" />
  <!-- Estilo de la página-->
  <link rel="stylesheet" href="../../recursos/css/style.css" />
</head>

<body>
  <!-- Navegacion-->
  <!-- As a heading -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">AppCursos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">

      <?php
      if (!isset($_SESSION['idEstudiante'])) {
      ?>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item px-2">
            <a href="/" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/vistas/registro.php">Registrarse</a>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <a class="btn btn-outline-success my-2 my-sm-0" href="/vistas/login.php">Iniciar sesión</a>
        </div>
      <?php
      } else {
      ?>

        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="admin.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="cursos.php" class="nav-link">Cursos</a>
          </li>
          <li class="nav-item px-2">
            <a href="estudiantes.php" class="nav-link">Estudiantes</a>
          </li>         
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="admin.php?salir=true" class="nav-link">
              <i  class="fas fa-user-times"></i> Cerrar sessión
            </a>
          </li>
        </ul>

      <?php
      }
      ?>
    </div>
  </nav>