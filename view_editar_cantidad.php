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
     <?php  include "cosas-generales/header_usuario.php"?>

     <?php
 		include "php/conexion.php";
		$conexion = $con;      
        $id = $_GET["id"];
        $id_producto = $_GET["id_producto"];

        $stockActual = $_GET["stock"];
        $cantidad_antigua = $_GET["cantidad_antigua"];
        $consulta = $conexion->query("SELECT * from venta_temp where id = '$id'");	      
      ?>


    <h1 class="titulo-principal">Editar Cantidad</h1>
 		<?php foreach ($consulta as $row) {?>
			<form action="php/venta/editarCantidad.php" method="post" class="frm-registrarse">
     	      <input class="campo-frm-registrarse" type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input class="campo-frm-registrarse" type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
            <input class="campo-frm-registrarse" type="hidden" name="cantidad_antigua" value="<?php echo $cantidad_antigua ?>">
            <input class="campo-frm-registrarse" type="hidden" name="stockActual" value="<?php echo $stockActual ?>">
            <input class="campo-frm-registrarse" type="text" style="text-align: center; margin:0px auto; display:block;"  placeholder="Cantidad:" name="cantidad" value="<?php echo $row['cantidadSolicitada'] ?>">
                
  		    	<input type="submit" class="btn-registrarse" id="btn-registrarse" value="Insertar">
            </form>
		<?php } ?>

   
   
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
   
</body>
</html>