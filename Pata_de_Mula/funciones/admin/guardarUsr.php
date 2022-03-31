<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="../../assets/css/sweetalert.css">

    <title>Guargando</title>
</head>
<body>
<?php 
	include ("../BD.php");

	$id = $_REQUEST['id'];

	$usuario = $_POST['usuario'];
	$password = sha1($_POST['password']);
    $tipo_usuario = $_POST['tipo_usuario'];

	$query = "UPDATE empleados SET usuario='$usuario',password='$password',tipo_usuario='$tipo_usuario' WHERE id='$id' ";
    

	$res=mysqli_query($mysqli,$query);

	if($res){
		echo '<script>
		Swal.fire({
		  type: "success",
		  title: "¡Guardando!",
		  text: "Usuario Registrado Correctamente.",
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
			die("Error".mysql_error($mysqli));
		}		
 ?>
</body>
</html>
