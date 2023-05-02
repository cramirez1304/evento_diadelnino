<?php
require ('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INCIDENCIAS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- PARA MODALES -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- PARA MODALES FIN -->

</head>
<body>
    <div class="container">
        <hr>    
        <?php
        if (isset($_GET['insert']) && $_GET['insert'] == 1){
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Registro guardado con éxito !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        if (isset($_GET['insert']) && $_GET['insert'] == 2){
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Registro eliminado con éxito !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        ?>
        <h3 class="tinto">Registro asistentes y control de vales del evento del dia del niño </h3>
        <h6 class="tinto">SEPyC - Culiacán, Sinaloa, 26 de abril de 2023 </h6> 
        <hr>

        <div class="row">
            <div class="col-sm-12 text-center">
                <h6> <i class="fa-solid fa-screwdriver-wrench"></i> Captura de incindencias:</h6>
                <hr>
            </div>
        </div>
        <form name="form_incidencias" id="form_incidencias" action="guardaincidencia.php" method="post">

        <div class="row justify-content-md-center">
            <div class="col-sm-4 offset-md-2">
                <h5>CURP:</h5>
                <input class="form-control form-control-sm" type="text" name="curp" id="curp" autofocus required >
            </div>
            <div class="col-sm-1">
                <h5>CANT.</h5>
                <input class="form-control form-control-sm" type="number" name="cant" id="cant" autofocus required >
            </div>
            <div class="col-sm-3">
                <h5>&nbsp;</h5>
            <button type="submit" class="btn btn-primary btn-sm "><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </div>

        </form>

        <?php
        $query = "SELECT * FROM `incidencias` order by curp asc";
        $resultado=$mysqli->query($query);
        ?>
        <div class="row">
            <div class="col-sm-8 offset-md-2">
            <hr>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">CURP</th>
                    <th scope="col" class="text-center">CANT</th>
                    <th scope="col" class="text-center">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    while($row = $resultado->fetch_assoc()){
                        $i++;
                    ?>
                    <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $row['curp'];?></td>
                    <td class="text-center"><?php echo $row['cant'];?></td>
                    <td class="text-center">
                        <!-- <a href="eliminar.php?Id=<?php echo $row['Id'];?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a> -->
                    <!-- Button trigger modal -->
                    <a href="eliminar.php?Id=<?php echo $row['Id']?>" type="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['Id']?>" title="Eliminar">
                    <i class="fa-solid fa-trash"></i>
                    </a>
                    </body>
                    <!-- Modal -->

                    <!-- MODAL -->
                    <div class="modal fade" id="exampleModal<?php echo $row['Id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-trash"></i> Eliminar registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            Estas seguro que deseas eliminar el registro de:
                            <h5><?php echo $row['curp']?></h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="eliminar.php?Id=<?php echo $row['Id']?>" type="button" class="btn btn-danger">Eliminar registro</a>
                        </div>
                        </div>
                    </div>
                    </div>
                    </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>