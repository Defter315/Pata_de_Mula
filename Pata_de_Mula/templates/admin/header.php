<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/320abee79c.js" crossorigin="anonymous"></script> 
    <script src="../../assets/js/chart.min.js"></script>
</head>
<body>
<?php 
include '../../funciones/BD.php';
@session_start();

if(isset($_SESSION["id_persona"]))
{
	$resultado1 = mysqli_query($mysqli, "SELECT * FROM personas WHERE id_persona = '".$_SESSION["id_persona"]."' LIMIT 1");
	$datos = $resultado1->fetch_assoc();
}
?>

<?php
if ((isset($_SESSION['id_persona']) && $datos['fk_tipoUsuario'] == 1)) { ?>

       <!--menu lateral-->
<div id="sidebar" class="sidebar">
    <a href="#" class="boton-cerrar" onclick="ocultar()">&times;</a>
    <img src="../../assets/img/logos/logo-dark.png" width="200px" height="200px" style="padding-top:20px; text-align:center; display: block; margin:auto;">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu">


        <li class="nav-item">
        <a href="../../vistas/admin/principal.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
        </li>
        <hr>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-folder-tree"></i> Categorías
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Alimentos</a></li>
                <li><a class="dropdown-item" href="#">Ingredientes</a></li>
            </ul>
        </li>
        <hr>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-lines"></i> Menú
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Ingredientes</a></li>
            <li><a class="dropdown-item" href="#">Alimentos</a></li>

          </ul>
        </li>
        <hr>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-bell-concierge"></i> Ordenes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Nueva orden</a></li>
            <li><a class="dropdown-item" href="#">Lista de ordenes</a></li>
            <li><a class="dropdown-item" href="#">Áreas de venta</a></li>
          </ul>
        </li>
        <hr>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-book-open-reader"></i> Mesas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Agregar Mesa</a></li>
            <li><a class="dropdown-item" href="#">Lista de Mesas</a></li>
          </ul>
        </li>
        <hr>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-headset"></i> Servicios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../../vistas/admin/listaReservaciones.php">Reservaciones</a></li>
            <li><a class="dropdown-item" href="#">Entrega a domicilio</a></li>
          </ul>
        </li>
        <hr>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user-group"></i> Clientes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!--<li><a class="dropdown-item" href="#">Agregar Cliente</a></li>-->
            <li><a class="dropdown-item" href="../../vistas/admin/listaClientes.php">Lista de Clientes</a></li>
          </ul>
        </li>
        <hr>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user-tie"></i> Empleados
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../../vistas/admin/registroEmpleado.php">Agregar Empleado</a></li>
            <li><a class="dropdown-item" href="../../vistas/admin/listaEmpleados.php">Lista de Empleados</a></li>
          </ul>
        </li>
      </ul>
</div>

 <!- -->
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()">
<h3><i class="fas fa-align-justify"></i></h3></a>
<a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()"></a>
     <ul class="navbar-nav nav navbar-nav pull-xs-right">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
     
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hola, <strong><?php echo $datos['nombres'],' ', $datos['apellidoPaterno'] ?></strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
         
            <a class="dropdown-item" href="../../funciones/admin/logout.php">Cerrar Sesión</a>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>  
<div id="contenido">

         
                                                         <!--Menu Recursos Hamanos-->

<?php }elseif (isset($_SESSION['id_persona']) && $datos['fk_tipoUsuario'] == 5) { ?>


    <!--menu lateral-->
<div id="sidebar" class="sidebar">
<a href="#" class="boton-cerrar" onclick="ocultar()">&times;</a>
    <img src="../../assets/img/logos/logo-dark.png"  margin="100px" width="250px" height="200px"><hr>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu">
        <li class="nav-item">
        <a href="../../vistas/admin/principal.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
        </li>
        <hr>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user-tie"></i> Empleados
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../../vistas/admin/registroEmpleado.php">Agregar Empleado</a></li>
            <li><a class="dropdown-item" href="../../vistas/admin/listaEmpleados.php">Lista de Empleados</a></li>
          </ul>
        </li>
        <hr>
 
      </ul>
</div>
 <!--menu -->



<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()">
<h3><i class="fas fa-align-justify"></i></h3></a>
<a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()"></a>
     <ul class="navbar-nav nav navbar-nav pull-xs-right">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
     

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hola, <strong><?php echo $datos['nombres'],' ', $datos['apellidoPaterno'] ?></strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
         
            <a class="dropdown-item" href="../../funciones/admin/logout.php">Cerrar Sesión</a>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>  
<div id="contenido">



<?php } ?>
<br>