<?php 

	include "../conexion.php";

	$conexion = $con;
	$conexion2 = $con;

	$producto_id = $_POST["id_producto"];
	$fecha = date("Y-m-d");
	$cantidad = $_POST["cantidadSolicitada"];


	$consulta = $conexion->query("SELECT * FROM producto where id = '$producto_id'");
    foreach ($consulta as $row) {
    	$valor = $row["cantidadStock"];

    }

    $total = $valor - $cantidad;

    $estado = 0;
	$sentencia = $conexion->prepare("INSERT INTO venta (cantidadSolicitada, fecha, producto_id, estado) VALUES (?,?,?,?)");

	$sentencia2 = $conexion2->prepare("UPDATE producto SET cantidadStock = ? where id = '$producto_id'");


	$sentencia->bindParam(1, $cantidad);
	$sentencia->bindParam(2, $fecha);
	$sentencia->bindParam(3, $producto_id);
	$sentencia->bindParam(4, $estado);

	$sentencia2->bindParam(1, $total);
	
	if ($sentencia->execute() && $sentencia2->execute()) {
			// echo "Insertado";
			//header("Location: ../../view_venta.php?id=".$producto_id);

			header("Location: ../../view_venta.php");
	}else{
			 echo "Ocurrio un error";
			//header("Location: index.php");
		} 
		?>
	
