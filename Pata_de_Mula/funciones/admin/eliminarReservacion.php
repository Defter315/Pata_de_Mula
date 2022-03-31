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
	Eliminar($_GET['id']);

	function Eliminar($id){
		
		include '../BD.php';
		$sentencia = "DELETE FROM reservaciones WHERE id_reservacion='".$id."'";
		$resultado = mysqli_query($mysqli, $sentencia);
	
		if($resultado){                                    
			echo '<script>
			Swal.fire({
			  type: "success",
			  title: "¡Eliminado!",
			  text: "La reservación se eliminó con éxito",
			  showConfirmButton: false,
			  timer: 1800
			})
			var pagina = "../../vistas/admin/listaReservaciones.php";
			function redir(){
				location.href = pagina;
			}
			setTimeout("redir()", 2000);
			</script>';
				}else{
			die("Error".mysqli_error($mysqli));
		}  	
}		                                           
?>	
</body>
</html>
