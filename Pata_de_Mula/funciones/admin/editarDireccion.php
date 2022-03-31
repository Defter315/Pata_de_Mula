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
    $localidad = $_POST['localidad'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $numExterior = $_POST['numExterior'];
    $numInterior = $_POST['numInterior'];
    $codigoPostal = $_POST['codigoPostal'];
	
	$query = "UPDATE `domicilios` SET `localidad` = '$localidad', `colonia` = '$colonia', `calle` = '$calle', `numInterior` = '$numInterior', `numExterior` = '$numExterior', `codigoPostal` = '$codigoPostal' WHERE `domicilios`.`fk_persona` = $fk_persona";
	$res = mysqli_query($mysqli, $query);

	if ($res) {
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Guardado!",
		  text: "Cambios guardados con éxito.",
		  showConfirmButton: false,
		  timer: 1800
		})
		var pagina = "../../vistas/admin/listaEmpleados.php";
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