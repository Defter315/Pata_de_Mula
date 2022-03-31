<!--Modal Editar Información General-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Editar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $mysqli = VerEmple($_REQUEST['id']);

                function VerEmple($id)
                {
                    include '../../funciones/BD.php';
                    /* Extraer información general */
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

                    <div class="container">
                        <form enctype="multipart/form-data" action="../../funciones/admin/editarEmple.php?id=<?php echo $result['id_persona']; ?>" method="POST">
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $result['nombres']; ?>" placeholder="Nombre(s)" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="#" name="apellidoPaterno" value="<?php echo $result['apellidoPaterno']; ?>" placeholder="Apellido paterno" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="#" name="apellidoMaterno" value="<?php echo $result['apellidoMaterno']; ?>" maxlength="18" placeholder="Apellido materno" required="required">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="#" value="<?php echo $result['CURP']; ?>" name="CURP" placeholder="CURP">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="#" name="RFC" maxlength="18" value="<?php echo $result['RFC']; ?>" placeholder="RFC" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" id="#" name="numSeguro" maxlength="10" value="<?php echo $result['numSeguro']; ?>" placeholder="Número de seguro (NDS)" required="required">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">F.N</span>
                                        <input type="date" class="form-control" id="#" value="<?php echo $result['fechaNacimiento']; ?>" name="fechaNacimiento" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" id="#" value="<?php echo $result['telefono1']; ?>" name="telefono1" maxlength="18" placeholder="Telefono 1" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" id="#" value="<?php echo $result['telefono2']; ?>" name="telefono2" placeholder="Teléfono 2 (opcional)">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" id="#" value="<?php echo $result['email']; ?>" name="email" placeholder="Correo Electrónico" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">☌</span>
                                        <input type="text" class="form-control" id="#" value="<?php echo $result['usuario']; ?>" name="usuario" placeholder="Nombre de usuario" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="#" value="<?php echo sha1($result['password']); ?>" name="password" placeholder="Contraseña" required disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="#" value="<?php echo $result['salario']; ?>" name="salario" placeholder="Salario" required="required">
                                        <span class="input-group-text">.00</span>
                                    </div>

                                </div>

                            </div>
                            <hr>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-select" name="genero" required="required">
                                        <option style="display: none;" selected value="<?php echo $result['genero']; ?>"><?php echo $result['genero']; ?>"</option>
                                        <option value='Masculino'>Masculino</option>
                                        <option value='Femenino'>Femenino</option>
                                        <option value='Indefinido'>Indefinido</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select name="fk_tipoUsuario" id="inputState" class="form-select" required>
                                        <option selected value="<?php echo $result['fk_tipoUsuario']; ?>"><?php echo $result['tipo']; ?></option>
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
                                        <option value="<?php echo $result['areaTrabajo']; ?>"><?php echo $result['areaTrabajo']; ?></option>
                                        <option value='Gerencia'>Gerencia</option>
                                        <option value='Recursos Humanos'>Recursos Humanos</option>
                                        <option value="Cocina">Cocina</option>
                                        <option value='Atencion a clientes'>Atencion a clientes</option>


                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-select" name="tipoSangre" required="required">
                                        <option selected value="<?php echo $result['tipoSangre']; ?>"><?php echo $result['tipoSangre']; ?></option>
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
                                <div class="form-group col-md-3">
                                    <select id="inputState" class="form-select" name="estadoCivil" required="required">
                                        <option selected value="<?php echo $result['estadoCivil']; ?>"><?php echo $result['estadoCivil']; ?></option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Soltero">Casado</option>
                                        <option value="Soltero">Unión libre</option>
                                        <option value="Soltero">Viudo</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar">
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal para agregar Horario -->
<div class="modal fade" id="addTime" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Asignar horario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../funciones/admin/agregarHorario.php" method="POST">
                    <div class="row">
                        <input type="text" name="fk_persona" value=" <?php echo $id; ?>" hidden>
                        <div class="col-6">
                            <label for="" class="form-label">Hora de entrada</label>
                            <input type="time" class="form-control" id="" name="entrada" aria-describedby="" required>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Hora de salida</label>
                            <input type="time" class="form-control" id="" name="salida" aria-describedby="" required>
                        </div><br>
                        <div class="col-12">
                            <label for="" class="form-label">Día de descanso</label>
                            <select id="inputState" class="form-select" name="diaDescanso" required="required">
                                <option selected value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para editar Horario -->
<div class="modal fade" id="editTime" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar horario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../funciones/admin/editarHorario.php" method="POST">
                    <div class="row">
                        <input type="text" name="fk_persona" value=" <?php echo $id; ?>" hidden>
                        <div class="col-6">
                            <label for="" class="form-label">Hora de entrada</label>
                            <input type="time" class="form-control" id="" name="entrada" value="<?php echo $row['entrada'] ?>" aria-describedby="" required>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Hora de salida</label>
                            <input type="text" class="form-control" id="" name="salida" value="<?php echo $row['salida'] ?> " aria-describedby="" required>
                        </div><br>
                        <div class="col-12">
                            <label for="" class="form-label">Día de descanso</label>
                            <select id="inputState" class="form-select" name="diaDescanso" required="required">
                                <option selected value="<?php echo $row['diaDescanso']; ?>"><?php echo $row['diaDescanso'] ?></option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal de usuario -->
<div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <form action="../../funciones/admin/guardarUsr.php?id=<?php echo $resul['id']; ?>" method="POST">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="#" name="nombre" placeholder="Nombre Completo" required="required" value="<?php echo $resul['nombre'];
                                                                                                                                                        echo $resul['apellidos']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="#" name="usuario" placeholder="Usuario" required="required" value="<?php echo $resul['usuario']; ?>">
                            </div>

                        </div>
                        <br>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" id="#" name="password" placeholder="Password" required="required">

                            </div>
                            <div class="form-group col-md-6">
                                <select id="inputState" class="custom-select my-1 mr-sm-2" name="tipo_usuario" required="required">
                                    <option style="display: none;" selected value="Seleccionar">Tipo de Usuario</option>
                                    <option value='1'>Gerente</option>
                                    <option value='2'>Recursos Humanos</option>
                                    <option value='3'>Cajero</option>
                                    <option value='4'>Cosinero</option>
                                    <option value='5'>Capitan de meseros</option>
                                    <option value='6'>Mesoro</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary " value="Registrar">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Agregar Dirección--->
<div class="modal fade" id="addAddress" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar domicilio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../funciones/admin/agregarDireccion.php" method="POST">
                    <div class="row">
                        <input type="text" name="fk_persona" value=" <?php echo $id; ?>" hidden>
                        <div class="col-4">
                            <label for="" class="form-label">Localidad</label>
                            <input type="text" class="form-control" id="" name="localidad" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Colonia</label>
                            <input type="text" class="form-control" id="" name="colonia" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="" name="calle" aria-describedby="" required>
                        </div>
                    </div> <br>

                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Número exterior</label>
                            <input type="number" class="form-control" id="" name="numExterior" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Número interior (opcional)</label>
                            <input type="number" class="form-control" id="" name="numInterior" aria-describedby="">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">C.P</label>
                            <input type="number" class="form-control" id="" name="codigoPostal" aria-describedby="" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Editar Dirección--->
<div class="modal fade" id="editAddress" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar domicilio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../funciones/admin/editarDireccion.php" method="POST">
                    <div class="row">
                        <input type="text" name="fk_persona" value=" <?php echo $id; ?>" hidden>
                        <div class="col-4">
                            <label for="" class="form-label">Localidad</label>
                            <input type="text" class="form-control" value="<?php echo $row1['localidad'] ?>" id="" name="localidad" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Colonia</label>
                            <input type="text" class="form-control" value="<?php echo $row1['colonia'] ?>" id="" name="colonia" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Calle</label>
                            <input type="text" class="form-control" value="<?php echo $row1['calle'] ?>" id="" name="calle" aria-describedby="" required>
                        </div>
                    </div> <br>

                    <div class="row">
                        <div class="col-4">
                            <label for="" class="form-label">Número exterior</label>
                            <input type="number" class="form-control" value="<?php echo $row1['numExterior'] ?>" id="" name="numExterior" aria-describedby="" required>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Número interior (opcional)</label>
                            <input type="number" class="form-control" value="<?php echo $row1['numInterior'] ?>" id="" name="numInterior" aria-describedby="">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">C.P</label>
                            <input type="number" class="form-control" value="<?php echo $row1['codigoPostal'] ?>" id="" name="codigoPostal" aria-describedby="" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php } ?>