<?php
$DateAndTime = date('d-m-Y h:i:s a', time());  

?>

<?php 

require './fpdf/fpdf.php';
class PDF extends FPDF{
	function Header()
	{	
		//Arial Bold 15
		$this->SetFont('Arial','B',15);
		//Movernos a la derecha
		$this->Cell(70);
	}

}
$id=$_REQUEST['id'];
include("../../funciones/BD.php");
$query = "SELECT * FROM personas WHERE id_persona = '$id'";
$resultado = $mysqli->query($query);



/*$pdf = new FPDF('P','mm','A4');*/
$pdf = new FPDF('P','mm','letter');
$pdf->AliasNbPages();



while($row = $resultado->fetch_assoc()){

$pdf->AddPage();

$pdf->SetDrawColor(155,162,180);


$pdf->Image("../../assets/img/logos/logo-dark.png",130,10,80,60);
$pdf->SetFont('Courier','',20);
$pdf->SetXY(6,15);
$pdf->Cell(100,0, utf8_decode('Nomina: '),0,0,'');

$pdf->SetFont('Courier','',16);
$pdf->SetXY(6,25);
$pdf->Cell(100,0, utf8_decode($row['nombres'].' '.$row['apellidoPaterno'].' '.$row['apellidoMaterno']),0,0,'');	
$pdf->line(5,30,115, 30);

$pdf->SetFont('Courier','',12);
$pdf->SetXY(140,15);
$pdf->Cell(100,0, utf8_decode($DateAndTime),0,0,'');



$pdf->SetXY(12,52);
$pdf->Cell(100,0, utf8_decode('Nº de Telefono:   '.$row['telefono1']),0,0,'');

$pdf->SetXY(12,60);
$pdf->Cell(100,0, utf8_decode('No° de seguro:    '.$row['numSeguro']),0,0,'');

$pdf->SetXY(12,68);
$pdf->Cell(100,0, utf8_decode('No° RFC:          '.$row['RFC']),0,0,'');

//Tipo de Usuario
if($row['fk_tipoUsuario'] == 1){
$pdf->SetXY(12,76);
$pdf->Cell(100,0, utf8_decode('Area de trabajo:  Administrador'),0,0,'');
	}
	if($row['fk_tipoUsuario'] == 2){
		$pdf->SetXY(12,76);
		$pdf->Cell(100,0, utf8_decode('Area de trabajo:  Cliente'),0,0,'');
			}
			if($row['fk_tipoUsuario'] == 3){
				$pdf->SetXY(12,76);
				$pdf->Cell(100,0, utf8_decode('Area de trabajo:  Mesero'),0,0,'');
					}
					if($row['fk_tipoUsuario'] == 4){
						$pdf->SetXY(12,76);
						$pdf->Cell(100,0, utf8_decode('Area de trabajo:  Capitan de meseros'),0,0,'');
							}
							if($row['fk_tipoUsuario'] == 5){
								$pdf->SetXY(12,76);
								$pdf->Cell(100,0, utf8_decode('Area de trabajo:  Cajero'),0,0,'');
									}

//Cuadricula de Información
$pdf->Line(10, 48, 10, 100); //Vertical 
$pdf->line(10,48,110, 48);
$pdf->line(10,55,110, 55);
$pdf->line(10,63,110, 63);
$pdf->Line(55, 48, 55, 100); //Vertical 
$pdf->line(10,71,110, 71);
$pdf->line(10,79,110, 79);
$pdf->line(10,100,110, 100);
$pdf->Line(110, 48, 110, 100); //Vertical 

//******************************//

$pdf->SetXY(12,95);
$pdf->Cell(100,0, utf8_decode('Monto a Recibir:         $'.$row['salario']),0,0,'');


$pdf->SetXY(140,100);
$pdf->Cell(100,0, utf8_decode('_________________________'),0,0,'');
$pdf->SetXY(165,108);
$pdf->Cell(100,0, utf8_decode('Firma'),0,0,'');
}

$pdf->Output(); 

?>