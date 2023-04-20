<?php
require ('conexion.php');
//print_r($_POST);
$curp = strtoupper($_POST['folio']);
    $query = "SELECT * FROM `asistencia1` where Folio = '$curp' ";
	$resultado=$mysqli->query($query);
    $row = $resultado->fetch_assoc();
    $fila4=mysqli_num_rows($resultado);
    //echo $fila4;

    $query2 = "SELECT * FROM `basededatos` where curp = '$curp' ";
	$resul=$mysqli->query($query2);
    //$row = $resul->fetch_assoc();
    $fila1=mysqli_num_rows($resul);

    if($fila4 > 0){
        header ('Location:./asistencia.php?repetido=1');

    }elseif ($fila1 == 0){
        header ('Location:./asistencia.php?noexiste=1');
    }else{

        $query = "insert into asistencia1 (Folio, Asistencia, Fecha ) values ('".$_POST["folio"]."','Si',now() )";

        //$resultado = $mysqli->query($query);
        if ($mysqli->query($query) === TRUE) {
            $last_id = $mysqli->insert_id;
            //echo "New record created successfully. Last inserted ID is: " . $last_id;
            $id = $last_id;
            header ('Location:./asistencia.php?folio='.$curp);
            //echo $id;
        } else {
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }


            $recup = "SELECT * FROM `asistencia1` order by Fecha desc";
            $resultado=$mysqli->query($recup);
            $row = $resultado->fetch_assoc();
            
        while($row = $resultado->fetch_assoc()) { 
            ?>
            <h5><?php echo $row['Folio'] ?></h5>
            <?php
        }
    }

?>