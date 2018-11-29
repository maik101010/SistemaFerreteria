<?php 
  include "../conexion.php";

  $conexion = $con;

  $fechaUno = $_POST["fecha_uno"];
  $fechaDos = $_POST["fecha_dos"];

  $consulta = $conexion->query("SELECT producto.referencia, producto.nombre, producto.valor, venta.cantidadSolicitada, venta.fecha
  									FROM venta
									INNER JOIN producto on producto.id = venta.producto_id
									WHERE fecha BETWEEN '$fechaUno' AND '$fechaDos'");
  
  
  foreach ($consulta as $row) { 

  		echo "Nombre: ". $row["nombre"];
  		echo "<br>";


  }

  

                
 ?>