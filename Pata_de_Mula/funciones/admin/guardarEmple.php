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
	$nombres = $_POST['nombres'];
	$apellidoPaterno = $_POST['apellidoPaterno'];
	$apellidoMaterno = $_POST['apellidoMaterno'];
	$genero = $_POST['genero'];
	$fechaNacimiento = $_POST['fechaNacimiento'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$telefono1 = $_POST['telefono1'];
	$telefono2 = $_POST['telefono2'];
	$CURP = $_POST['CURP'];
	$RFC = $_POST['RFC'];
	$estadoCivil = $_POST['estadoCivil'];
	$fk_tipoUsuario = $_POST['fk_tipoUsuario'];
	$numSeguro = $_POST['numSeguro'];
	$tipoSangre = $_POST['tipoSangre'];
	$areaTrabajo = $_POST['areaTrabajo'];
	$salario = $_POST['salario'];
	$nom = $_FILES['foto']['name'];
	$guardado = $_FILES['foto']['tmp_name'];

	$directorio = "../../assets/img/empleados/";
	$aleatorio = $nom;
	$ruta = $aleatorio;

	if (!file_exists($directorio)) {
		mkdir($directorio, 0777, true);
		if (file_exists($directorio)) {

			if (move_uploaded_file($guardado, '../../assets/img/empleados/' . $nom)) {
			}
		}
	} else {
		if (move_uploaded_file($guardado, $directorio . $aleatorio)) {
		} elseif (move_uploaded_file($guardado, $directorio . $aleatorio)) {
		}
	}
	$query = "INSERT INTO `personas` (`fk_tipoUsuario`, `fk_estado`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `genero`, `fechaNacimiento`, `email`, `usuario`, `password`, `telefono1`, `telefono2`, `foto`, `CURP`, `RFC`, `numSeguro`, `salario`, `estadoCivil`, `fechaRegistro`, `tipoSangre`, `areaTrabajo`) 
	VALUES ('$fk_tipoUsuario', '1', '$nombres', '$apellidoPaterno', '$apellidoMaterno', '$genero', '$fechaNacimiento', '$email', '$usuario', SHA1('$password'), '$telefono1', '$telefono2', '$ruta', '$CURP', '$RFC', '$numSeguro', '$salario', '$estadoCivil', current_timestamp(), '$tipoSangre', '$areaTrabajo')";
	$res = mysqli_query($mysqli, $query);

	if ($res) {
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Guardando!",
		  text: "Empleado registrado con éxito.",
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