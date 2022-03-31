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
    /* SQL para horarios*/
    $sql = "SELECT * FROM `horarios` WHERE fk_persona='" . $id . "'";
    $horario = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($horario);
    /* SQL para domicilio*/
    $sql1 = "SELECT * FROM `domicilios` WHERE fk_persona='" . $id . "'";
    $domicilio = mysqli_query($mysqli, $sql1);
    $row1 = mysqli_fetch_assoc($domicilio);
?>
    <title>Empleado <?php echo $result['nombres']; ?></title>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="text-align: center">
                <?php echo "<img  src='../../assets/img/empleados/";
                echo $result['foto'];
                echo "'class='img-thumbnail'>";
                ?>
                <div class="alert alert-secondary" role="alert" style="text-align: left">
                    Rol: <?php echo $result['tipo'] ?><br>
                    Estado: <?php echo $result['nombre'] ?>
                </div>
                <!---//--- HORARIO ---//--->
                <div class="card">
                    <h5 class="card-header">Horario</h5>
                    <?php
                    if (mysqli_num_rows($horario) > 0) { //Si la consulta tiene mas de 0 registros
                    ?>
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-6">
                                    Entrada
                                </div>
                                <div class="col-6">
                                <?php echo $row['entrada'] ?>
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-6">
                                    Salida
                                </div>
                                <div class="col-6">
                                <?php echo $row['salida'] ?>
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-6">
                                    Descanso
                                </div>
                                <div class="col-6">
                                <?php echo $row['diaDescanso'] ?>
                                </div>
                            </div><br>
                            <div style="text-align: right; padding-bottom: 20px; padding-right: 20px;">
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTime"><i class="fa fa-edit fa-lg"></i></a>
                                <a class="btn btn-danger" href="../../funciones/admin/eliminarHorario.php?id=<?php echo $row['fk_persona']; ?>" title="Eliminar Horario">
                                    <i class="fa fa-trash fa-lg"></i></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-solid fa-face-sad-tear"></i> Aún no hay datos</h5>
                            <p class="card-text">Si desea asignar horario, pulse el botón de Agregar</p>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTime"><i class="fa-solid fa-circle-plus"></i> Agregar</a>
                        </div>
                    <?php } ?>
                </div>
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
                                    <div class="p-2 border bg-light">Estado civil</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['estadoCivil']; ?></div>
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
                                    <div class="p-2 border bg-light">CURP</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['CURP']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">RFC</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['RFC']; ?></div>
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
                                    <div class="p-2 border"><?php echo $result['telefono1']; ?> <?php echo $result['telefono2']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Número de seguro</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['numSeguro'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-3">
                            <div class="row gx-3">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">Tipo de sangre</div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border"><?php echo $result['tipoSangre'] ?></div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                    <div style="text-align: right; padding-bottom: 30px; padding-right: 30px;">
                        <a class="btn btn-warning edit" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Editar Empleado">
                            <i class="fa fa-edit fa-lg"></i> Editar</a>
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
                            <div style="text-align: right; padding-bottom: 20px; padding-right: 20px;">
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAddress"><i class="fa fa-edit fa-lg"></i> Editar</a>
                                <a class="btn btn-danger" href="../../funciones/admin/eliminarDireccion.php?id=<?php echo $row1['fk_persona']; ?>" title="Eliminar Horario">
                                    <i class="fa fa-trash fa-lg"></i> Eliminar</a>
                            </div>
                        </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-face-sad-tear"></i> Aún no hay datos</h5>
                <p class="card-text">Si desea agregar una dirección, pulse el botón de Agregar</p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddress"><i class="fa-solid fa-circle-plus"></i> Agregar</a>
            <?php } ?>
            </div>

        </div>
    </div>
    </div>
<?php } ?>
<?php include("modals.php"); ?>
<?php include("../../templates/admin/footer.php"); ?>