<?php 

	include "../conexion.php";

	$conexion = $con;


	$id = $_POST["id"];

	$referencia = $_POST["referencia"];
	$nombre = $_POST["nombre"];
	$marca = $_POST["marca"];
	$valor = $_POST["valor"];
	$cantidad = $_POST["cantidad"];
	
	$sentencia = $conexion->prepare("UPDATE producto set referencia = ?, nombre = ?, marca = ?, valor = ?, cantidadStock=? WHERE id = '$id'");
	$sentencia->bindParam(1, $referencia);
	$sentencia->bindParam(2, $nombre);
	$sentencia->bindParam(3, $marca);
	$sentencia->bindParam(4, $valor);
	$sentencia->bindParam(5, $cantidad);

	if ($sentencia->execute()) {
			echo "Actualizado";
			header("Location: ../../view_producto.php");
		
	}else{
			echo "Ocurrio un error";
			header("Location: index.php");
		}
	

?>