<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.css">
</head>

<body>

    <?php

    require "funciones/BD.php";
    session_start();
    if ($_POST) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = "SELECT id_persona, fk_tipoUsuario, usuario, password FROM personas WHERE usuario='$usuario'";
        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;
        if ($num > 0) {
            $row = $resultado->fetch_assoc();
            $password_bd = $row['password'];
            $pass_c = sha1($password);
            if ($password_bd == $pass_c) {
                $_SESSION['id_persona'] = $row['id_persona'];
                $_SESSION['fk_tipoUsuario'] = $row['fk_tipoUsuario'];
                $_SESSION['usuario'] = $row['usuario'];
                $sesion = "INSERT INTO `sesiones` (`fk_persona`, `fecha`, `motivo`) 
                VALUES ('" . $_SESSION["id_persona"] . "', current_timestamp(), 'Entrada')";
                $resultado = mysqli_query($mysqli, $sesion);


                echo '<script>
            Swal.fire({
            type: "success",
            title: "¡Bienvenido!",
            text: "Iniciaste sesión con Exito.",
            showConfirmButton: false,
            timer: 1800
            })
            var pagina = "vistas/admin/principal.php";
            function redir(){
                location.href = pagina;
            }
            setTimeout("redir()", 1900);
            </script>';
            } else {
                echo '<script>
            Swal.fire({
            type: "error",
              title: "¡Adiós!",
              text: "La contraseña es Incorrecta.",
              showConfirmButton: false,
              timer: 1800
            })
            var pagina = "index.php";
            function redir(){
                location.href = pagina;
            }
            setTimeout("redir()", 1900);
            </script>';
            }
        } else {
            echo '<script>
            Swal.fire({
            type: "error",
              title: "¡Adiós!",
              text: "El usuario no Existe.",
              showConfirmButton: false,
              timer: 1800
            })
            var pagina = "index.php";
            function redir(){
                location.href = pagina;
            }
            setTimeout("redir()", 1900);
            </script>';
        }
    }
    ?>

    <style>
        img {
            width: 100%;
        }

        body {
            background: url(assets/img/fondos/fondo2.png);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
        }
    </style>

    <body>

        <div id="layotAuthentication">
            <div id="layourAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class=".card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4"><b>
                                                <h3>Bienvenido</h3>
                                            </b>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group"><input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Usuario" /></div><br>
                                            <div class="form-group"><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Password" /></div>
                                            <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Entrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

    </body>

</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>