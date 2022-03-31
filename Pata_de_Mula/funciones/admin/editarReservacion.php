<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../../assets/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../../assets/css/sweetalert.css">

	<title>Guardando</title>
</head>
<body>
	<?php
	include("../BD.php");
	$id_reservacion = $_POST['id_reservacion'];
    $nombreCliente = $_POST['nombreCliente'];
    $numPersonas = $_POST['numPersonas'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $telefono = $_POST['telefono'];
	
	$query = "UPDATE `reservaciones` SET `nombreCliente` = '$nombreCliente', `numPersonas` = '$numPersonas', `dia` = '$dia', `hora` = '$hora', `telefono` = '$telefono' WHERE `reservaciones`.`id_reservacion` = $id_reservacion";
	$res = mysqli_query($mysqli, $query);

	if ($res) {
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Guardado!",
		  text: "Cambios realizados correctamente",
		  showConfirmButton: false,
		  timer: 1800
		})
		var pagina = "../../vistas/admin/listaReservaciones.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1900);
		</script>';
	} else {
		die("Error" . mysqli_error($mysqli));
	}
	?>
</body>

</html>