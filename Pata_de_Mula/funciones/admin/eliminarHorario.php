<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="../../assets/css/sweetalert.css">

    <title>Eliminando</title>
</head>
<body>

<?php
	EliminarEmple($_GET['id']);

	function EliminarEmple($id){
		
		include '../BD.php';
		$sentencia = "DELETE from horarios where fk_persona='".$id."'";
		$resultado = mysqli_query($mysqli, $sentencia);
	
		if($resultado){                                    
			echo '<script>
			Swal.fire({
			  type: "success",
			  title: "¡Eliminado!",
			  text: "El horario de este empleado se eliminó con éxito",
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
}		                                           
?>	
</body>
</html>
