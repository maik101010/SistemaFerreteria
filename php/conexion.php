<?php
try{
	$usuario = "root";
	$password = "";
	$con = new PDO('mysql:host=localhost;dbname=ferreteria1', $usuario, $password);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $con->exec("SET CHARACTER SET utf8");
		
}catch(PDOException $e){

    echo "ERROR: " . $e->getMessage();

}

?>
