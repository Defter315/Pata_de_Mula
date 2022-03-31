<?php
session_start();
if (!isset($_SESSION['id_persona'])) {
    header("Location: ../../index.php");
}
$id_persona=$_SESSION['id_persona'];
$tipoUsuario=$_SESSION['fk_tipoUsuario'];
$usuario=$_SESSION['usuario'];
?>
<title>Pata de Mula</title>
<?php include("../../templates/admin/header.php"); ?>
<?php include("../../funciones/BD.php"); ?>

<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="card text-white bg-info mb-3" style="width: 18rem;">
                <center>
                    <div class="card-header">Empleados Registrados</div>
                </center>
                <div class="card-body">
                    <?php
                    $numEmple = "SELECT COUNT(*)FROM personas";

                    $resultado = mysqli_query($mysqli, $numEmple);
                    while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <center>
                            <p class="card-text">
                            <h1><?php echo $row['COUNT(*)'] ?></h1>
                            </p>
                        <?php } ?>
                </div>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <center>
                    <div class="card-header">Empleados Activos</div>
                </center>
                <div class="card-body">
                    <?php
                    $numEmple = "SELECT COUNT(*)FROM personas where fk_estado=1";
                    $resultado = mysqli_query($mysqli, $numEmple);
                    while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <center>
                            <p class="card-text">
                            <h1><?php echo $row['COUNT(*)'] ?></h1>
                            </p>
                        </center>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <center>
                    <div class="card-header">Empleados Inactivos</div>
                </center>
                <div class="card-body">
                    <?php
                    $numEmple = "SELECT COUNT(*)FROM personas where fk_estado=2";
                    $resultado = mysqli_query($mysqli, $numEmple);
                    while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <center>
                            <p class="card-text">
                            <h1><?php echo $row['COUNT(*)'] ?></h1>
                            </p>
                        </center>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php include("../../funciones/tabla.php"); ?>

    </div>


    <?php include("../../templates/admin/footer.php"); ?>