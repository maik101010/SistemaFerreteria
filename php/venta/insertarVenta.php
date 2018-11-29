<?php 

	include "../conexion.php";

	$conexion = $con;
	$estado = 1;

	$gsent = $conexion->prepare('UPDATE venta set estado = ?');
	$gsent->bindParam(1, $estado);

	if ($gsent->execute()){
		echo "<script>alert('Venta realizada con exito');</script>";
		echo "<script>window.location.href = '../../view_venta.php';</script>";
	}else{
		echo "Ocurrio error";
	}




