<?php 

	include "../conexion.php";

	$conexion = $con;
    
	$email = $_POST["correo"];
	

	$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE usuario = '$email'");
	$sentencia->execute();
	$count = $sentencia->rowCount();
	
	if ($count>0) {
		header("Location: ../../view_nueva_contrania.php?email=".$email);
	}else{
		echo "<script>alert('El Correo No Existe');</script>";
		echo "<script>window.location.href = '../../view_recuperar_contrasenia.php';</script>";
	}

?>

