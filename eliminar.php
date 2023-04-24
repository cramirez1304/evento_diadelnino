<?php
require ('conexion.php');

$inser = "delete from incidencias where Id = '".$_GET['Id']."' ";
$resul = $mysqli->query($inser);

header ('Location:./backoffice.php?insert=2');
?>