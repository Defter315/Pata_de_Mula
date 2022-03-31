<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="../../assets/css/sweetalert.css">

    <title>Actualizando</title>
</head>
<body>

<?php 
	include ("../BD.php");

    $id = $_REQUEST['id'];
	$nombres = $_POST['nombres'];
	$apellidoPaterno = $_POST['apellidoPaterno'];
	$apellidoMaterno = $_POST['apellidoMaterno'];
	$genero = $_POST['genero'];
	$fechaNacimiento = $_POST['fechaNacimiento'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
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

	$query = "UPDATE `personas` SET `fk_tipoUsuario` = '$fk_tipoUsuario', `nombres` = '$nombres', `apellidoPaterno` = '$apellidoPaterno', `apellidoMaterno` = '$apellidoMaterno', `genero` = '$genero', `fechaNacimiento` = '$fechaNacimiento', `email` = '$email', `usuario` = '$usuario', `telefono1` = '$telefono1', `telefono2` = '$telefono2', `CURP` = '$CURP', `RFC` = '$RFC', `numSeguro` = '$numSeguro', `salario` = '$salario', `estadoCivil` = '$estadoCivil', `tipoSangre` = '$tipoSangre', `areaTrabajo` = '$areaTrabajo' WHERE `personas`.`id_persona`=$id ;";
    

	$res=mysqli_query($mysqli,$query);

	if($res){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Actualizado!",
		  text: "Empleado Actualizado con Exito.",
		  showConfirmButton: false,
		  timer: 1800
		})
		var pagina = "../../vistas/admin/listaEmpleados.php";
		function redir(){
			location.href = pagina;
		}
		setTimeout("redir()", 1900);
		</script>';
		}else{
			die("Error".mysqli_error($mysqli));
		}
?>
</body>
</html>	