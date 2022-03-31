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


<div class="container">
    <center>
        <h3 style="font-weight: bold;">Registrar empleado</h3>
    </center>

    <form enctype="multipart/form-data" action="../../funciones/admin/guardarEmple.php" method="POST">

        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre(s)" required>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="#" name="apellidoPaterno" placeholder="Apellido paterno" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="#" name="apellidoMaterno" maxlength="18" placeholder="Apellido materno" required="required">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="#" name="CURP" placeholder="CURP">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="#" name="RFC" maxlength="18" placeholder="RFC" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" id="#" name="numSeguro" maxlength="10" placeholder="Número de seguro (NDS)" required="required">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Fecha de nacimiento</span>
                    <input type="date" class="form-control" id="#" name="fechaNacimiento" required="required">
                </div>
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" id="#" name="telefono1" maxlength="18" placeholder="Telefono 1" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" id="#" name="telefono2" placeholder="Teléfono 2 (opcional)">
            </div>
        </div>
<hr>
        <div class="form-row">
            <div class="form-group col-md-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" class="form-control" id="#" name="email" placeholder="Correo Electrónico" required="required">
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">☌</span>
                    <input type="text" class="form-control" id="#" name="usuario" placeholder="Nombre de usuario" required="required">
                </div>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" id="#" name="password" placeholder="Contraseña" required="required"></input>
            </div>
            <div class="form-group col-md-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="#" name="salario" placeholder="Salario" required="required">
                    <span class="input-group-text">.00</span>
                </div>

            </div>

        </div>
        <hr>
        <br>
        <div class="form-row">
            <div class="form-group col-md-2">
                <select id="inputState" class="form-select" name="genero" required="required">
                    <option style="display: none;" selected value="Seleccionar">Genero</option>
                    <option value='Masculino'>Masculino</option>
                    <option value='Femenino'>Femenino</option>
                    <option value='Indefinido'>Indefinido</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <select name="fk_tipoUsuario" id="inputState" class="form-select"  required>
                    <option selected>Tipo de Contrato</option>
                    <?php
                    $sql = 'SELECT*FROM tipousuarios WHERE tipo!="Cliente" ORDER BY tipo ASC';
                    $resultado = mysqli_query($mysqli, $sql);
                    while ($dato = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <option value="<?php echo $dato["id_tipoUsuario"] ?>">
                            <?php echo $dato["tipo"] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <select id="inputState" class="form-select" name="areaTrabajo" required="required">
                    <option style="display: none;" selected value="Seleccionar">Área de trabajo</option>
                    <option value='Gerencia'>Gerencia</option>
                    <option value='Recursos Humanos'>Recursos Humanos</option>
                    <option value="Cocina">Cocina</option>
                    <option value='Atencion a clientes'>Atencion a clientes</option>


                </select>
            </div>
            <div class="form-group col-md-2">
                <select id="inputState" class="form-select" name="tipoSangre" required="required">
                    <option style="display: none;" selected value="Seleccionar">Tipo de Sangre</option>
                    <option value='A+'>A+</option>
                    <option value='A-'>A-</option>
                    <option value='B+'>B+</option>
                    <option value='B-'>B-</option>
                    <option value='AB+'>AB+</option>
                    <option value='AB-'>AB-</option>
                    <option value='O+'>O+</option>
                    <option value='O-'>O-</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <select id="inputState" class="form-select" name="estadoCivil" required="required">
                    <option style="display: none;" selected value="Seleccionar">Estado Civil</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Soltero">Casado</option>
                        <option value="Soltero">Unión libre</option>
                        <option value="Soltero">Viudo</option>
                </select>
            </div>
        </div>
        <center>
            <div class="form-group">
                <label for="imagen">Cargar Foto</label>
                <input type="file" name="foto" id="foto" accept="image/*">
            </div>
        </center>

        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar">

    </form>
    <div>


        <?php include("../../templates/admin/footer.php"); ?>