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
	$fk_persona = $_POST['fk_persona'];
    $nombreCliente = $_POST['nombreCliente'];
    $numPersonas = $_POST['numPersonas'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $telefono = $_POST['telefono'];
	
	$query = "INSERT INTO `reservaciones` (`fk_persona`, `nombreCliente`, `numPersonas`, `dia`, `hora`, `telefono`, `fechaRegistro`) 
    VALUES ('$fk_persona', '$nombreCliente', '$numPersonas', '$dia', '$hora', '$telefono', current_timestamp());";
	$res = mysqli_query($mysqli, $query);

	if ($res) {
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Guardado!",
		  text: "Reservación guardada correctamente",
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