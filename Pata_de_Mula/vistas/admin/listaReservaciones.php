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
<title>Lista de Empleado</title>

<div class="container">
    <center>
        <h3 style="font-weight: bold;">Lista de reservaciones</h3>
    </center>
    <!-- Button trigger modal -->
    <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-circle-plus"></i>Agregar nueva</button></center>
    <hr>
    <table id="table_id" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Nombre del cliente</th>
                <th scope="col">Día</th>
                <th scope="col">Hora</th>
                <th scope="col">Personas</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody thead-light>
            <?php
            include("../../funciones/BD.php");
            $query = "SELECT P.*, D.nombres, D.apellidoPaterno, D.apellidoMaterno FROM reservaciones P 
            INNER JOIN personas D on P.fk_persona=D.id_persona";
            $resultado = $mysqli->query($query);
            foreach ($resultado as $result) {
                $datos = $result["nombres"] . "||" . $result["apellidoPaterno"] . "||" . $result["apellidoMaterno"] . "||" . $result["fechaRegistro"]; //Arreglo
                $datos1 = $result["id_reservacion"] . "||" .$result["nombreCliente"] . "||" . $result["telefono"] . "||" . $result["dia"] . "||" . $result["hora"]. "||" . $result["numPersonas"]; //Arreglo
            ?>
                <tr>
                    <td><?php echo $result['nombreCliente'] ?></td>
                    <td><?php echo $result['dia']; ?></td>
                    <td><?php echo $result['hora']; ?></td>
                    <td><?php echo $result['numPersonas']; ?></td>
                    <td><?php echo $result['telefono']; ?></td>

                    <td style="width: 170px;">
                        <a class="btn btn-primary btn-sm" href="#" id="Ver" onclick="MostrarInfo('<?php echo $datos ?>');" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Ver información">
                            <i class="fa-solid fa-user-tie"></i></a>
                        <a class="btn btn-warning btn-sm" href="#" id="Editar" onclick="MostrarInfo1('<?php echo $datos1 ?>');" data-bs-toggle="modal" data-bs-target="#EditarReservacion">
                            <i class="fa-solid fa-pencil"></i></i></a>
                        <a class="btn btn-danger btn-sm" href="../../funciones/admin/eliminarReservacion.php?id=<?php echo $result['id_reservacion']; ?>">
                            <i class="fa-solid fa-trash"></i></i></a>
                    </td>

                <?php } ?>
                </tr>

        </tbody>
    </table>
</div>


<!-- Modal para agregar reservacion -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva reservación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#addReservation" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../funciones/admin/agregarReservacion.php" method="POST">
                    <div class="row">
                        <input type="text" value="<?php echo $id_persona ?>" name="fk_persona" hidden>
                        <div class="col-8">
                            <label for="" class="form-label">Nombre del cliente</label>
                            <input type="text" class="form-control" id="" name="nombreCliente" aria-describedby="">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="" name="telefono" aria-describedby="" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Día</label>
                            <input type="date" class="form-control" id="" name="dia" aria-describedby="">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Hora</label>
                            <input type="time" class="form-control" id="" name="hora" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Número de personas</label>
                            <input type="number" class="form-control" id="" name="numPersonas" aria-describedby="" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para editar reservacion -->
<div class="modal fade" id="EditarReservacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditarReservacion" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditarReservacion">Editar reservación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#addReservation" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../funciones/admin/editarReservacion.php" method="POST">
                    <div class="row">
                        <input type="text" id="id_reservacion"value="" name="id_reservacion" hidden>
                        <div class="col-8">
                            <label for="" class="form-label">Nombre del cliente</label>
                            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" aria-describedby="">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefonou" name="telefono" aria-describedby="" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Día</label>
                            <input type="date" class="form-control" id="diau" name="dia" aria-describedby="">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Hora</label>
                            <input type="time" class="form-control" id="horau" name="hora" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Número de personas</label>
                            <input type="number" class="form-control" id="numPersonasu" name="numPersonas" aria-describedby="" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para ver el empleado -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Toma de la reservación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container px-3">
                    <div class="row gx-3">
                        <div class="col-4">
                            <div class="p-2 border bg-light">Nombre del empleado</div>
                        </div>
                        <div class="col-8">
                            <div class="p-2 border"><span id="nombreEmpleado"></span> <span id="apEmpleado"></span> <span id="amEmpleado"></span> </div>
                        </div>
                    </div>
                </div>
                <div class="container px-3">
                    <div class="row gx-3">
                        <div class="col-4">
                            <div class="p-2 border bg-light">Fecha de registro</div>
                        </div>
                        <div class="col-8">
                            <div class="p-2 border"><span id="fecha"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

</div>

<?php include("../../templates/admin/footer.php"); ?>