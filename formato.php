<?php
require('conexion.php');
//require('code128.php');
require('code39.php');

    $query = "SELECT * FROM `basededatos`";
	$resultado=$mysqli->query($query);
    //$pdf = new PDF_Code128('P','mm','Legal',true);
    $pdf=new PDF_Code39('P','mm','Legal',true);

    $i=1;
    $pdf->AddPage();
    $pdf->Image('img/diadelnino.png',0,0,216);

while($row = $resultado->fetch_assoc()){

    $nombre=mb_strtoupper($row['nombre']);
    $id=$row['Id'];
    $curp=$row['curp'];
    $cuantos=$row['hijos'];
    $area=$row['area'];
    $depen=$row['depen'];
    if($row['hijos'] == 1){
        $vale="VALE";
    }else{
        $vale="VALES";
    }

    $pdf->SetFont('Arial','',10);
    //$pdf->Image('img/fondoPDF.png',2,0);
    //$pdf->Code39(80,40,'CODE 39',1,10);

    switch ($i) {
        case 1:
            $pdf->SetFont('Arial','B',9);
            $pdf->SetXY(10, 131);
            $pdf->Cell(75,5,str_replace('?', 'Ñ', $nombre),0,0);

            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(10, 136);
            $pdf->Cell(75,4,$depen,0,0);
            $pdf->SetXY(10, 140);
            $pdf->MultiCell(75,4,$area,0,0);

            $pdf->SetFont('Arial','B',24);
            $pdf->SetXY(89, 130);
            $pdf->Cell(10,9,$cuantos,0,0,'C');

            
            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(89, 139);
            $pdf->Cell(10,4,$vale,0,0,'C');

            $pdf->Code39(15,148,$curp,0.7,8);
            
          break;
        case 2:

            $pdf->SetFont('Arial','B',9);
            $pdf->SetXY(118, 131);
            $pdf->Cell(75,5,str_replace('?', 'Ñ', $nombre),0,0);

            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(118, 136);
            $pdf->Cell(75,4,$depen,0,0);
            $pdf->SetXY(118, 140);
            $pdf->MultiCell(75,4,$area,0,0);

            $pdf->SetFont('Arial','B',24);
            $pdf->SetXY(197, 130);
            $pdf->Cell(10,9,$cuantos,0,0,'C');

            
            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(197, 139);
            $pdf->Cell(10,4,$vale,0,0,'C');

            $pdf->Code39(123,148,$curp,0.7,8);


          break;
        case 3:
            
            $pdf->SetFont('Arial','B',9);
            $pdf->SetXY(10, 301);
            $pdf->Cell(75,5,str_replace('?', 'Ñ', $nombre),0,0);

            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(10, 306);
            $pdf->Cell(75,4,$depen,0,0);
            $pdf->SetXY(10, 310);
            $pdf->MultiCell(75,4,$area,0,0);

            $pdf->SetFont('Arial','B',24);
            $pdf->SetXY(89, 301);
            $pdf->Cell(10,9,$cuantos,0,0,'C');

            
            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(89, 310);
            $pdf->Cell(10,4,$vale,0,0,'C');

            $pdf->Code39(15,318,$curp,0.7,8);


          break;
        case 4:

            $pdf->SetFont('Arial','B',9);
            $pdf->SetXY(118, 301);
            $pdf->Cell(75,5,str_replace('?', 'Ñ', $nombre),0,0);

            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(118, 306);
            $pdf->Cell(75,4,$depen,0,0);
            $pdf->SetXY(118, 310);
            $pdf->MultiCell(75,4,$area,0,0);

            $pdf->SetFont('Arial','B',24);
            $pdf->SetXY(197, 301);
            $pdf->Cell(10,9,$cuantos,0,0,'C');

            
            $pdf->SetFont('Arial','',6);
            $pdf->SetXY(197, 310);
            $pdf->Cell(10,4,$vale,0,0,'C');

            $pdf->Code39(123,318,$curp,0.7,8);


            
          break;
    } 

    if ($i==4){
        $i=0;
        $pdf->AddPage();
        $pdf->Image('img/diadelnino.png',0,0,216);
        }
    $i++;
}
    $pdf->Output('invitaciones.pdf', 'I');
?>
