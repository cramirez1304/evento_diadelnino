<?php
require ('conexion.php');

    $query = "select count(Id) from `asistencia1`";
	$resultado=$mysqli->query($query);
    $row = $resultado->fetch_row();
    //echo "REGISTROS:".$row[0];
    $registros = $row[0];

    echo "<br>";
    $query = "SELECT sum(r.hijos) as a_hijos, a.Folio, r.Id, r.nombre, r.area, r.hijos, r.depen, r.curp, r.cct  FROM asistencia1 as a INNER JOIN basededatos as r on a.Folio = r.curp";
    //$query = "select sum(Id) from `asistencia1`";
	$resultado=$mysqli->query($query);
    $row = $resultado->fetch_row();
    //echo "SUMA:".$row[0];
    $suma = $row[0];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/sinaloa.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <title>SEPyC</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <hr>
                <h3 class="tinto">Registro asistentes y control de vales del evento del dia del niño </h3>
                <h6 class="tinto">SEPyC - Culiacán, Sinaloa, 26 de abril de 2023 </h6> 
            <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card" style="">
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <p class="fs-1">
                                Registros (CURP): <br> 
                                <span class="badge rounded-pill text-bg-primary">
                                <strong><?php echo $registros ?></strong>
                                </span> 
                            </p>
                        </div>
                    </div>
                </div> 
                
                <div class="card" style="">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <p class="fs-1">
                                Vales entregados: <br>
                                <span class="badge rounded-pill text-bg-danger">
                                <strong><?php echo $suma ?></strong>  
                                </span>  
                            </p>
                        </div>
                    </div>
                </div> 
                
            </div>
        </div>
    </div>
    <script>
  //Cuando la página esté cargada completamente
  $(document).ready(function(){
    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 10000);
  });
  function refrescar(){
    //Actualiza la página
    location.reload();
  }
</script>
</body>
</html>