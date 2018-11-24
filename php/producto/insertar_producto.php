<?php 

	include "../conexion.php";

	$conexion = $con;



	
	$referencia = $_POST["referencia"];
	$nombre = $_POST["nombre"];
	$marca = $_POST["marca"];
	$valor = $_POST["valor"];
	$cantidad = $_POST["cantidad"];
	
	$sentencia = $conexion->prepare("INSERT INTO producto (referencia, nombre, marca, valor, cantidadStock) VALUES (?,?,?,?,?)");
	$sentencia->bindParam(1, $referencia);
	$sentencia->bindParam(2, $nombre);
	$sentencia->bindParam(3, $marca);
	$sentencia->bindParam(4, $valor);
	$sentencia->bindParam(5, $cantidad);
	
	if ($sentencia->execute()) {
			echo "Insertado";
			header("Location: ../../view_producto.php");
		
	}else{
			echo "Ocurrio un error";
			header("Location: index.php");
		}
	

?>