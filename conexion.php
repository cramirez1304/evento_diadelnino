<?php
//header("Content-Type: text/html;charset=utf-8");
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("localhost","root","","evento"); 


	//printf("Initial character set: %s\n", mysqli_character_set_name($mysqli));
	/* change character set to utf8mb4 */
	mysqli_set_charset($mysqli, "utf8mb4");

	//printf("Current character set: %s\n", mysqli_character_set_name($mysqli));
	

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>