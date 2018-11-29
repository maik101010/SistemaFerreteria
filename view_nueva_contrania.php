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

  <title>Recuperar Contraseña</title>
</head>
<body>
     <?php $email = $_GET["email"]; ?>

    <h1 style="color: red" class="titulo-principal">Recuperación de Contraseña</h1>
    <form action="php/usuario/modificar_contrasenia.php" method="post" class="frm-registrarse" id="frm-registrarse">
    	<input type="hidden" name="email" value="<?php echo $email ?>">
  				<input type="text" class="campo-frm-registrarse" name="contra" placeholder="Digitar Nueva Contraseña: ">
  				<input type="submit" class="btn-registrarse" id="btn-registrarse" value="Guardar Nueva Contraseña">
	  		    <input type="reset" class="btn-borrar" value="Borrar">
     		</form>
		<a href="view_recuperar_contrasenia.php" class="btn btn-outline-dark btn-regresar"><i class="fa fa-chevron-left"></i> Regresar</a>
   		   
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
   
</body>
</html>