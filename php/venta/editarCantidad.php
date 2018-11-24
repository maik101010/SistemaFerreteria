<?php 

	include "../conexion.php";

	$conexion = $con;


	$id = $_POST["id"];
	$cantidad = $_POST["cantidad"];

	$valorAntiguo = $_POST["valorAntiguo"];

	$valorActual = $valorAntiguo - $cantidad;

	
	$sentencia = $conexion->prepare("UPDATE venta_temp SET cantidadSolicitada = ? WHERE id = '$id'");
	$sentencia->bindParam(1, $cantidad);

	$sentencia2 = $conexion->prepare("UPDATE producto SET cantidadStock = ? WHERE id = '$id'");
	$sentencia2->bindParam(1, $valorActual);
	
	if ($sentencia->execute() && $sentencia2->execute()) {
			echo "Actualizado";
			header("Location: ../../view_producto.php");
		
	}else{
			echo "Ocurrio un error";
			//header("Location: index.php");
		}
	

