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
      if (isset($_GET)) {
        $id = $_GET["id"];
        //---Cargamos el valor diferido de la venta
        $consulta = $conexion->query("SELECT * from usuario where id = '$id'");
      }
        

      ?>


    <h1 class="titulo-principal">Editar Contraseña</h1>
    <?php foreach ($consulta as $row) {
    	# code...
    } ?>
		   <form action="php/usuario/modificar_contrasenia.php" method="post" class="frm-registrarse" id="frm-registrarse">
  				<input type="hidden" class="campo-frm-registrarse"  name="id" id="id" value="<?php echo $row['id'] ?>">
  				<input type="text" class="campo-frm-registrarse" disabled value="<?php echo $row['contrasenia'] ?>">
  				<input type="text" class="campo-frm-registrarse" placeholder="Nueva Contraseña"  name="contrasenia" value="">
                <input type="password" class="campo-frm-registrarse" placeholder="Repetir contraseña" id="contraseniaRepeat"  name="contraseniaRepeat" >

  				<input type="submit" class="btn-registrarse" id="btn-registrarse" value="Insertar">
  		    <input type="reset" class="btn-borrar" value="Borrar">
     		</form>
   		   
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
   
</body>
</html>