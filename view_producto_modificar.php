<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fuentes De Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Open+Sans|Oswald|Roboto|Shadows+Into+Light+Two|Nunito+Sans" rel="stylesheet">
     <style>
       form select {
          width: 100%;
          padding: 10px;
          border-radius: 5px;
          border: 2px solid #ccc;
          color: #757575;
        }
     </style>

      <?php include  "cosas-generales/links-generales.php"; ?>
      <link rel="stylesheet" href="css/view_uinsertar_umodificar_usuario.css">

  <title>Tema</title>
</head>
<body>

    <h1 class="titulo-principal">Modificar Tipo de Producto</h1>
    
    <?php 

    	include "php/conexion.php";
    	$conexion = $con;
        $id = $_GET["id"];
        $consulta = $conexion->query("SELECT * from producto WHERE producto.id = '$id'");

        	// ---- inicio for
			foreach ($consulta as $row) {	?>
			<?php // print_r($row); ?>
				<form action="php/producto/modificar_producto.php" method="post" class="frm-registrarse" id="frm-registrarse">
					<input type="hidden" class="campo-frm-registrarse" name="id" value="<?php echo $row['id']; ?>">
			         <input type="text" class="campo-frm-registrarse" placeholder="Referencia:" name="referencia" value="<?php echo $row['referencia']; ?>">
              <input type="text" class="campo-frm-registrarse" placeholder="Nombre:" name="nombre" value="<?php echo $row['nombre']; ?>"> 
              <input type="text" class="campo-frm-registrarse" placeholder="Marca:" name="marca" value="<?php echo $row['marca']; ?>">
              <input type="text" class="campo-frm-registrarse" placeholder="Valor Unitario" name="valor" value="<?php echo $row['valor']; ?>">
              <input type="text" class="campo-frm-registrarse" placeholder="Cantidad" name="cantidad" value="<?php echo $row['cantidadStock']; ?>">

			        <input type="submit" class="btn-registrarse" id="btn-registrarse" value="Modificar">
			        <input type="reset" class="btn-borrar" value="Borrar">
    			</form>
    			
			<!-- /// fin for -->
			<?php } ?>

         <a href="view_producto.php" class="btn btn-outline-dark btn-regresar"><i class="fa fa-chevron-left"></i> Regresar</a>
             
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
  
</body>
</html>