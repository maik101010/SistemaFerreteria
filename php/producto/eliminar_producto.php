<?php 

	include "../conexion.php";

	$conexion = $con;



	$id = $_GET["id"];


	$count = $conexion->exec("DELETE FROM producto WHERE id = '$id'");
	
	
	if ($count>0) {
		//
		
		header("Location: ../../view_producto.php");
		
		
	}else{
			echo "Ocurrio un error";
			header("Location: index.php");
		}
	

?>