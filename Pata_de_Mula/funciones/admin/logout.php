<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/sweetalert.css">

    <title>Cerrando Sesion</title>
</head>

<body>
    <?php
    include("../../funciones/BD.php");

    session_start();
    $sesion="INSERT INTO `sesiones` (`fk_persona`, `fecha`, `motivo`) VALUES ('".$_SESSION["id_persona"]."', current_timestamp(), 'Salida')";
    $resultado = mysqli_query($mysqli, $sesion);
    if ($resultado > 0) {
        session_destroy();
        echo '<script>
        Swal.fire({
          type: "success",
          title: "¡Adiós!",
          text: "Cerraste sesión con exito.",
          showConfirmButton: false,
          timer: 1800
        })
        var pagina = "../../index.php";
        function redir(){
            location.href = pagina;
        }
        setTimeout("redir()", 1900);
        </script>';
    } else {
        echo 'error';
    }
    ?>
</body>

</html>