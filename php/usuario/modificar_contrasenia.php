<?php 

	include "../conexion.php";

	$conexion = $con;
   	if (isset($_POST["contrasenia"]) && !empty($_POST["contrasenia"])) {


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
	/*
		
		Modificamos la contraseña desde afuera del aplicativo
	*/
	}
	
	else if (isset($_POST["contra"])) {
	
	
		$correo = $_POST["email"];
		$contrasenia = $_POST["contra"];
		$sentencia = $conexion->prepare("UPDATE usuario set contrasenia = ? WHERE usuario = '$correo'");
		$sentencia->bindParam(1, $contrasenia);
		if ($sentencia->execute()) {
			echo "Ejecutado";
			header("Location: ../../login.php");
		}else{
			echo "Error";
		}
	}	else{
		echo "Error";
	}

?>