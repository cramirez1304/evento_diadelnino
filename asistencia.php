
<?php
	require ('conexion.php');
	
	//$echo $folio;
	
	//echo $row['nombre']
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="business corporate landing page" />
<meta name="keywords" content="business, corporate, marketing, seo, app landing page, software landing page, app page, registration form, login page, template" />
<meta name="author" content="Tansh" />
<title>SEPyC</title>
<link rel="shortcut icon" href="img/sinaloa.png" type="image/png" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
<!-- GOOGLE ICONS -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>

 <!-- PARA MODALES -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- PARA MODALES FIN -->

<!-- <link rel="stylesheet" media="screen" href="css/reset.css"/> -->
<link rel="stylesheet" media="screen" href="css/style.css"/>
<link rel="stylesheet" media="screen" href="css/nivo-slider.css"/>
<script src="js/modernizr-1.5.min.js" type="text/javascript"></script>
<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	function valida(dato){

		if (dato == 18){
			document.form.submit();
		}else{
			alert('Error en la CURP, favor de verificar');
			document.getElementById('curp').focus();
		}
	}
	//javascript:alert(document.getElementById('curp').value.length)
</script>	
<script type="text/javascript">
function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}
</script> 
</head>

<body>
<div id="wrapper"> 

        
	
  <div class="container">
		

  <!-- <div class=""><img src="img/banner.jpg" style="width:100%"></div> -->
  <hr>
  <h3 class="tinto">Registro asistentes y control de vales del evento del dia del niño </h3> <a href="asistencia.php" style="display:inline-block; float:right">RESTABLECER</a>
  <h6 class="tinto">SEPyC - Culiacán, Sinaloa, 26 de abril de 2023 </h6> 
		<hr>
		
	</div>				
	<div class="container">
	
	<?php
	if(isset($_GET['repetido'])){
	?>
	<section class="alert alert-warning" style="box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.3);">
	<?php
	}elseif (isset($_GET['noexiste'])){
		?>
			<section class="alert alert-danger" style="box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.3);">
		<?php
	}
	else{
		?>
		<section class="alert alert-primary" style="box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.3);">
		<?php
	}
	?>
<!-- -------------------------- -->
	<form  class="contact_form" name="form" id="form" method="post" action="asistir1.php"> 
        <div class="row">
					<div class="col-md-12 text-center">
						<h6> <i class="fa-solid fa-check-double"></i> Control de asistencia:</h6>
						<hr>
					</div>
			</div>  
        <div class="row">
					<div class="col-md-1 text-center">
						<!-- <label for="curp"> <strong>FOLIO:</strong> </label> -->
						<span class="material-symbols-outlined" style="font-size: 40px;">
							barcode_reader
						</span>
					</div>
					<div class="col-md-3">
						<input class="form-control form-control-sm" type="text" name="folio" id="folio" autofocus required >
					</div>
                    <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
					</div>

					<div class="col-md-6" style="">
                    	<h6 style="display: flex;
   align-items: center;"><?php 
							if(isset($_GET['folio'])){

								$folio = $_GET['folio'];
								$query = "SELECT * FROM `basededatos` where curp = '$folio'";
								$resultado=$mysqli->query($query);
								$row = $resultado->fetch_assoc();
									if ($row['hijos'] == 1){
										$vale="VALE";
									}else{
										$vale="VALES";
									}
								echo "<span class='badge badge-warning'><strong style='font-size:48px;'>".$row['hijos']."</strong> ".$vale."</span>";
								echo ' - ';
								echo $row['nombre'];
								}
						
							if(isset($_GET['repetido'])){
								//echo strtoupper('Folio ya esta registrado');
								echo "<h5>".strtoupper('CURP ya esta registrada')."</h5>";
							}
							if(isset($_GET['noexiste'])){
								echo "<h5>".strtoupper('CURP no existe en la Base de Datos')."</h5>";
							}
							?>
						</h6>
					</div>
        </div>
	</section>	
		<?php
		include('ver1.php');
		?>
	</div>
	</form>

  </div>

</div>
		
</div>

<div class="footer fixed-bottom">
		<div id="footer"> 
				
			<div class="row">
				<div class="col-md-4">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;© 2023 | Subdirección de Sistemas e Informática<br/>
						Culiacán, Sin. | Secretaria de Educación Pública y Cultura</p>

				</div>
				<div class="col-md-4 text-center">
					<img src="img/img_izq.png" alt="" width="150px">
				</div>
			
				<div class="col-md-4 text-right">
						<img src="img/LOGO_BLANCO.png" width="120px" alt="">
				</div>
				
			</div>
				
  </div>
</div>

<!-- MODAL PARA CURP YA REGISTRADA -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status de registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  			<div class="form-group text-center text-danger">
					<h5><strong> La CURP que ingresó ya se encuentra registrada como asistente al Congreso</strong></h5>
					<br>
					<h5>CURP: <?php echo $_GET['curp'];?></h5>
					<br>
					<h6>No es necesario se vuelva a registrar.</h6>
					
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!-- FIN DEL MODAL -->



<!-- MODAL PARA REGISTRO EXITOSO-->
<div class="modal fade" id="status" tabindex="-1" aria-labelledby="status" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status de registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				
				<div class="form-group text-center text-success">
					<h5>¡ Los datos se guardaron con éxito ! </h5>
					<h6>Su folio de registro es: </h6>
					<h4><strong><?php echo $_GET['id']; ?></strong></h4>
					<br>
					<h6><a href="/cifd_sepyc/formato.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="alert-link">¡Descarga el comprobante de registro aquí!</a></h6>

				</div>
				
      </div>
      <div class="modal-footer">
		<a href="/cifd_sepyc/formato.php?id=<?php echo $_GET['id']; ?>" target="_blank" type="button" class="btn btn-primary">Descargar comprobante</a>
	  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN DEL MODAL -->




<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="js/jquery.fancybox-1.3.4.js" type="text/javascript"></script> 
<script src="js/jquery.cycle.all.min.js" type="text/javascript"></script> 
<script src="js/twitter.js" type="text/javascript"></script> 
<script src="js/jquery.validate.js" type="text/javascript"></script> 
<script src="js/jquery.form.js" type="text/javascript"></script> 
<!-- <script src="js/cufon-yui.js" type="text/javascript"></script>  -->
<script src="js/Maven_Pro_500.font.js" type="text/javascript"></script> 
<script src="js/custom.js" type="text/javascript"></script> 
<script src="js/jquery-1.6.3.min" type="text/javascript"	></script>

	<script>
		$("#curp").keyup(function(){              
        var ta      =   $("#curp");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
});
	</script>

	<!-- <?php
		if(isset($_GET['id'])) {
			?>
			<script type="text/javascript">
      		jQuery(document).ready(function(){
      		jQuery('#status').modal('show');
    		});
			</script>
			<?php
		}

		if(isset($_GET['msg']) && $_GET['msg'] == 'Error1') {
			?>
			<script type="text/javascript">
      		jQuery(document).ready(function(){
      		jQuery('#exampleModal').modal('show');
    		});
			</script>
			<?php
		}
	?> -->
</body>
</html>