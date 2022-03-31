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
        <h3 style="font-weight: bold;">Lista de empleados</h3>
    </center>
    <!-- Button trigger modal-->
    <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Empleados Inactivos</button></center>
    <hr>
    <table id="table_id" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Nombre completo</th>
                <th scope="col">CURP</th>
                <th scope="col">RFC</th>
                <th scope="col">Rol</th>
                <th scope="col">Sueldo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody thead-light>
            <?php
            include("../../funciones/BD.php");
            $query = "SELECT P.*, D.tipo FROM personas P 
            INNER JOIN tipousuarios D on P.fk_tipoUsuario=D.id_tipoUsuario WHERE P.fk_estado=1 AND P.fk_tipoUsuario!=2";
            $resultado = $mysqli->query($query);
            foreach ($resultado as $result) {
            ?>
                <tr>
                    <td><?php echo $result['nombres'] ?> <?php echo $result['apellidoPaterno']; ?> <?php echo $result['apellidoMaterno']; ?></td>
                    <td><?php echo $result['CURP']; ?></td>
                    <td><?php echo $result['RFC']; ?></td>
                    <td><?php echo $result['tipo']; ?></td>
                    <td>$ <?php echo number_format($result["salario"], 2) ?></td>

                    <td style="width: 170px;"><a class="btn btn-primary btn-sm" href="infoEmpleado.php?id=<?php echo $result['id_persona']; ?>" title="Ver información">
                        <i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-danger btn-sm" href="../../funciones/admin/eliminarEmple.php?id=<?php echo $result['id_persona']; ?>" title="Borrar">
                        <i class="fa-solid fa-trash"></i></i></a>
                        <a class="btn btn-success btn-sm" href="Nomina.php?id=<?php echo $result['id_persona']; ?>" title="Generar Nomina">
                        <i class="fa fa-address-card fa-lg"></i></a>
                    </td>

                <?php } ?>
                </tr>

        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Empleados Inactivos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table_id" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">CURP</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Sueldo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody thead-light>
                        <?php
                        include("../../funciones/BD.php");
                        $query = "SELECT P.*, D.tipo FROM personas P 
                        INNER JOIN tipousuarios D on P.fk_tipoUsuario=D.id_tipoUsuario WHERE P.fk_estado=2 AND P.fk_tipoUsuario!=2";
                        $resultado = $mysqli->query($query);
                        foreach ($resultado as $result) {
                        ?>
                            <tr>

                                <td><?php echo $result['nombres'] ?> <?php echo $result['apellidoPaterno']; ?> <?php echo $result['apellidoMaterno']; ?></td>
                                <td><?php echo $result['CURP']; ?></td>
                                <td><?php echo $result['RFC']; ?></td>
                                <td><?php echo $result['tipo']; ?></td>
                                <td>$ <?php echo number_format($result["salario"], 2) ?></td>

                                <td><a class="btn btn-warning " href="infoEmpleado.php?id=<?php echo $resul['id_persona']; ?>" title="Información del Empleado">
                                        <i class="fa fa-user fa-lg"></i></a>
                                </td>

                            <?php } ?>
                            </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<?php include("../../templates/admin/footer.php"); ?>