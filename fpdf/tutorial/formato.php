<?php
require('../fpdf.php');
require('../../conexion.php');
//echo $_GET['id'];
$solicitud = $_GET['id'];
    $query = "SELECT * FROM `registro` where solicitud = '$solicitud' ";
	$resultado=$mysqli->query($query);
    $row = $resultado->fetch_assoc();
    $nombre = $row['nombre']." ".$row['apellidop']." ".$row['apellidom'];

$pdf = new FPDF('P','mm','A4',true);
$pdf->AddPage();
$pdf->SetFont('Arial','',11 );
$pdf->Image('fondoPDF.png',0,10,);
$pdf->SetXY(50, 49);
$pdf->Cell(120,5,$nombre,0);
$pdf->Cell(30,5,$row['solicitud'],0);


switch ($row['programa']) {
    case 'MAE':
        $programa = "Maestría en Administración Estratégica";
      break;
    case 'DAE':
        $programa = "Doctorado en Administración Estratégica";
      break;
    case 'DEF':
        $programa = "Doctorado en Estudios Fiscales";
      break;
    case 'MGP':
        $programa = "Maestría en Gestión y Práctica Fiscal";
    default:
        $programa = "No se definio";
  }

$pdf->SetXY(50, 55);
$pdf->Cell(120,5,$programa,0);
$pdf->Cell(30,5,substr($row['fecha'],0,11),0);


$pdf->SetXY(50, 60);
$pdf->Cell(120,5,$row['enfasis'],0);


$pdf->SetXY(50, 65);
$pdf->Cell(120,5,$row['mail'],0);

$pdf->SetXY(5, 82);
$pdf->Cell(200,5,$programa,0,0,'C');

$pdf->SetXY(5, 95);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(200,10,$row['solicitud'],0,0,'C');


//SEGUNDA PARTE
$pdf->SetFont('Arial','',11 );
$pdf->SetXY(50, 189);
$pdf->Cell(120,5,$nombre,1);
$pdf->Cell(30,5,$row['solicitud'],0);

$pdf->SetXY(50, 195);
$pdf->Cell(120,5,$programa,1);
$pdf->Cell(30,5,substr($row['fecha'],0,11),0);


$pdf->SetXY(50, 200);
$pdf->Cell(120,5,$row['enfasis'],0);


$pdf->SetXY(50, 205);
$pdf->Cell(120,5,$row['mail'],0);

$pdf->SetXY(5, 222);
$pdf->Cell(200,5,$programa,0,0,'C');

$pdf->SetXY(5, 235);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(200,10,$row['solicitud'],0,0,'C');


$pdf->Output();
?>
