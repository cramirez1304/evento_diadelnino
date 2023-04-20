<?php
require('../fpdf.php');

$pdf = new FPDF('P','mm','A4',true);
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Image('fondoPDF.png',0,10,);
$pdf->SetXY(50, 49);
$pdf->Cell(120,5,'Carlos Anselmo Ramirez Marin',1);
$pdf->Cell(30,5,'MAE00003',1);

$pdf->SetXY(50, 55);
$pdf->Cell(120,5,'Maestría en Administración Estratégica',1);
$pdf->Cell(30,5,'08-09-2022',1);


$pdf->SetXY(50, 60);
$pdf->Cell(120,5,'Gestión de Capital Humano',1);


$pdf->SetXY(50, 65);
$pdf->Cell(120,5,'carlos.ramirez@fca.uas.edu.mx',1);

$pdf->SetXY(5, 83);
$pdf->Cell(200,5,'Maestría en Administración Estratégica',1,0,'C');

$pdf->SetXY(5, 97);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(200,10,'MAE00003',1,0,'C');

$pdf->Output();
?>
