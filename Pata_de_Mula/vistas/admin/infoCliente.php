<?php
session_start();
if (!isset($_SESSION['id_persona'])) {
    header("Location: ../../index.php");
}
$id_persona = $_SESSION['id_persona'];
$tipoUsuario = $_SESSION['fk_tipoUsuario'];
$usuario = $_SESSION['usuario'];
?>
<?php include("../../templates/admin/header.php"); ?>
<?php
$mysqli = emple($_REQUEST['id']);

function emple($id)
{
    include '../../funciones/BD.php';
    /* SQL para información general */
    $sentencia = "SELECT P.*, D.tipo, E.nombre FROM personas P 
    INNER JOIN tipousuarios D on P.fk_tipoUsuario=D.id_tipoUsuario 
    INNER JOIN estados E on P.fk_estado=E.id_estado WHERE P.fk_estado=1 AND P.id_persona='" . $id . "'";
    $resultado = mysqli_query($mysqli, $sentencia);
    $result = mysqli_fetch_assoc($resultado);
    /* SQL para domicilio*/
    $sql1 = "SELECT * FROM `domicilios` WHERE fk_persona='" . $id . "'";
    $domicilio = mysqli_query($mysqli, $sql1);
    $row1 = mysqli_fetch_assoc($domicilio);
?>
    <title>Cliente <?php echo $result['nombres']; ?></title>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="text-align: center">
                <?php echo "<img  src='../../assets/img/empleados/";
                echo $result['foto'];
                echo "'class='img-thumbnail'>";
                ?>
            </div>
            <div class="col-md-8">
                <!---//--- INFORMACIÓN GENERAL---//--->
                <div class="card">
                    <h5 class="card-header">Información general</h5>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $result['nombres'] ?> <?php echo $result['apellidoPaterno']; ?> <?php echo $result['apellidoMaterno']; ?></h5>
                        <p class="card-text">
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Género</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['genero']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Fecha de nacimiento</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['fechaNacimiento']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Email</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['email']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Usuario</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['usuario']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Teléfono</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['telefono1']; ?>, <?php echo $result['telefono2']; ?></div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div><br>
                <!---//--- Domicilio ---//--->
                <div class="card">
                    <h5 class="card-header">Domicilio</h5>
                    <?php
                    if (mysqli_num_rows($domicilio) > 0) { //Si la consulta tiene mas de 0 registros
                    ?>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="container px-3">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="p-2 border bg-light">Localidad</div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-2 border"><?php echo $row1['localidad'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container px-3">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="p-2 border bg-light">Colonia</div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-2 border"><?php echo $row1['colonia'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container px-3">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="p-2 border bg-light">Calle</div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-2 border"><?php echo $row1['calle'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container px-3">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="p-2 border bg-light">Número Interior</div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-2 border"><?php echo $row1['numInterior'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container px-3">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="p-2 border bg-light">Número exterior</div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-2 border"><?php echo $row1['numExterior'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container px-3">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="p-2 border bg-light">Código Postal</div>
                                    </div>
                                    <div class="col-8">
                                        <div class="p-2 border"><?php echo $row1['codigoPostal'] ?></div>
                                    </div>
                                </div>
                            </div>

                            </p>
                            
                        </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-face-sad-tear"></i> Aún no hay datos</h5>
                <p class="card-text">El cliente aún no agrega su domicilio</p>
            <?php } ?>
            </div>

        </div>
    </div>
    </div>
<?php } ?>
<?php include("modals.php"); ?>
<?php include("../../templates/admin/footer.php"); ?>