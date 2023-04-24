<?php
require ('conexion.php');
$curp=$_POST['curp'];
$cant=$_POST['cant'];

    $inser = "insert into incidencias (curp, cant) values ('".$curp."', '".$cant."') ";
    $resul = $mysqli->query($inser);

    header ('Location:./backoffice.php?insert=1');

?>