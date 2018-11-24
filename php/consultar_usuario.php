<?php 
	
include "conexion.php";

$conexion = $con;
	if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["contrasenia"]) && !empty($_POST["contrasenia"])) {


		$usuario = $_POST["email"];
		$contrasenia = $_POST["contrasenia"];

		$validarEmail = "SELECT * FROM usuario WHERE usuario.usuario = :usuario and usuario.contrasenia = :contrasenia";

		$result = $conexion->prepare($validarEmail);
		$result->bindValue(":usuario", $usuario);
		$result->bindValue(":contrasenia", $contrasenia);
		$result->execute();
		
		$resultados = $result->fetchAll(PDO::FETCH_ASSOC);
		$user="";
		$pass="";
		foreach ($resultados as $row) {
			$user= $row["usuario"];
			$pass = $row["contrasenia"];
						
		}
		
		if ($pass == $contrasenia) {
			$_SESSION["usuario"] = $user;	
			header("location:../index.php");
		}else{
			echo "Invalidado";
		}
	}else{
		echo "Faltan algunos datos";
	}
	

 ?>