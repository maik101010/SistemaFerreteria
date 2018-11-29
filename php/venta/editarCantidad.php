<?php 

	include "../conexion.php";

	$conexion = $con;


	$id = $_POST["id"];
	$id_producto = $_POST["id_producto"];
	$stockActual = $_POST["stockActual"];

	$cantidad = $_POST["cantidad"];
	$cantidadAntigua = $_POST["cantidad_antigua"];
	$con = 0;
		

	//---Validamos que tengamos al menos un producto en el stock
	if ($stockActual>0) {
		//--- Si la cantidad dada es mayor a la antigua
		if ($cantidad>$cantidadAntigua) {
			//Recorremos desde la antigua hasta la cantidad dada
			for ($i=$cantidadAntigua; $i <$cantidad ; $i++) { 
				$con++;				
			}
			$sentencia = $conexion->prepare("UPDATE venta_temp SET cantidadSolicitada = ? WHERE id = '$id'");
			$sentencia->bindParam(1, $cantidad);

			$valorActual = $stockActual - $con;
			echo "stock Actual: ".$valorActual ;

			$sentencia2 = $conexion->prepare("UPDATE producto SET cantidadStock = ? WHERE id = '$id_producto'");
			$sentencia2->bindParam(1, $valorActual);

			if ($sentencia->execute() && $sentencia2->execute()) {
				
				//echo "Actualizado ";
			    header("Location: ../../view_venta.php");
			}


		}else if ($cantidad<$cantidadAntigua) {
			for ($i=$cantidad; $i <$cantidadAntigua ; $i++) { 
				$con++;				
			}
			$sentencia = $conexion->prepare("UPDATE venta_temp SET cantidadSolicitada = ? WHERE id = '$id'");
			$sentencia->bindParam(1, $cantidad);
			
			$valorActual = $stockActual + $con;
			//echo "stock Actual: ".$valorActual ;

			$sentencia2 = $conexion->prepare("UPDATE producto SET cantidadStock = ? WHERE id = '$id_producto'");
			$sentencia2->bindParam(1, $valorActual);

			if ($sentencia->execute() && $sentencia2->execute()) {
				
				//echo "Actualizado ";
			    header("Location: ../../view_venta.php");
			}
		}
		
	}

		
	

	
	
	// if ($sentencia->execute() && $sentencia2->execute()) {
	// 		echo "Actualizado";
	// 		header("Location: ../../view_producto.php");
		
	// }else{
	// 		echo "Ocurrio un error";
	// 		//header("Location: index.php");
	// 	}
	

