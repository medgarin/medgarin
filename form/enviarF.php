<?php 
	include_once('conexion.php');
	$name  = $_POST['name'];
	$domicilio  = $_POST['domicilio'];
	$email  = $_POST['email'];

	if(mysql_query("INSERT INTO afileate (name, domicilio, email) VALUES('$name', '$domicilio', '$email')") )
		echo "Felicidades Afileación exitosa.";
	else
		echo "Ups, ocurrio un error, intenta de nuevo.";
?>