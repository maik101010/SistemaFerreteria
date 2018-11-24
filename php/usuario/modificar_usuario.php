<?php 

	include "../conexion.php";

	$conexion = $con;
    if (isset($_POST["tipo_usuario"]) && !empty($_POST["tipo_usuario"]) && isset($_POST["email"]) && !empty($_POST["email"])) {

			$id = $_POST["id"];

			$email = $_POST["email"];
			$nombres = $_POST["nombres"];
			$a_paterno = $_POST["a_paterno"];
			$a_materno = $_POST["a_materno"];
			$telefono = $_POST["telefono"];
			$celular = $_POST["celular"];
			$pais = $_POST["pais"];
			$ciudad = $_POST["ciudad"];
			$tipo_usuario = $_POST["tipo_usuario"];



			$sentencia = $conexion->prepare("UPDATE usuario set email = ?, nombres = ?, a_paterno = ?, a_materno = ?, telefono = ?, celular = ?, pais = ?, ciudad = ?, tipo = ? WHERE id = '$id'");
			$sentencia->bindParam(1, $email);
			$sentencia->bindParam(2, $nombres);
			$sentencia->bindParam(3, $a_paterno);
			$sentencia->bindParam(4, $a_materno);
			$sentencia->bindParam(5, $telefono);
			$sentencia->bindParam(6, $celular);
			$sentencia->bindParam(7, $pais);
			$sentencia->bindParam(8, $ciudad);
			$sentencia->bindParam(9, $tipo_usuario);
			
			
			if ($sentencia->execute()) {
					echo "Actualizado";
					header("Location: ../../view_usuario.php");
				
			}else{
					echo "Ocurrio un error";
					header("Location: index.php");
				}
	}else{
		echo "Error";
	}

?>