<?php
require ('conexion.php');
$recup = "SELECT a.Fecha as a_Fecha, a.Folio, r.Id, r.nombre, r.area, r.hijos, r.depen, r.curp, r.cct  FROM asistencia1 as a INNER JOIN basededatos as r on a.Folio = r.curp order by a.Fecha desc LIMIT 0,5";
    $resultado=$mysqli->query($recup);
    //$row = $resultado->fetch_assoc();
    ?>
    <h6>Últimos 5 registros:</h6>
    <table class="table table-striped table-sm">
        <tr>
            <th>FOLIO</th>
            <th>NOMBRE</th>
            <th>CURP</th>
            <th>CCT</th>
            <th>HIJOS</th>
            <th>FECHA | HORA</th>
        </tr>
    
    <?php
    while($row = $resultado->fetch_assoc()) { 
        ?>
        <tr>
            <td><?php echo $row['Id'] ?></td>
            <td><?php echo str_replace('?', 'Ñ', $row['nombre'])?></td>
            <td><?php echo $row['curp'] ?></td>
            <td><?php
            echo $row['cct']
            ?></td>
            <td><?php echo "<strong>".$row['hijos']."</strong>"?></td>
                <?php
                    $fecha = date_create($row['a_Fecha']); 
                ?>
            <td><?php echo date_format ($fecha,"d/m/Y H:i:s") ;?></td>
            
        </tr>
        <?php
}
?>
</table>