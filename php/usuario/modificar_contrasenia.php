<?php 

	include "../conexion.php";

	$conexion = $con;
   	if (isset($_POST["contrasenia"]) && !empty($_POST["contrasenia"]) && isset($_POST["contraseniaRepeat"]) && !empty($_POST["contraseniaRepeat"])) {


			$id = $_POST["id"];

			$contrasenia = $_POST["contrasenia"];
			



			$sentencia = $conexion->prepare("UPDATE usuario set contrasenia = ? WHERE id = '$id'");
			$sentencia->bindParam(1, $contrasenia);
			
			if ($sentencia->execute()) {
					echo "Actualizado";
					header("Location: ../../login.php");
				
			}else{
					echo "Ocurrio un error";
					
				}
	}else{
		echo "Error";
	}

?>