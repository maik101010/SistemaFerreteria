<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Fuentes De Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Open+Sans|Oswald|Roboto|Shadows+Into+Light+Two|Nunito+Sans" rel="stylesheet">

  <!-- Estilos -->
  <?php include "cosas-generales/links-generales.php"; ?>
  <link rel="stylesheet" href="css/index-estilos.css">

  <title>Inicio</title>
</head>
<body>
    
    <?php// include "cosas-generales/header_usuario.php"; ?>
    <h1 class="titulo-iniciar-sesion" style="color: red">Iniciar Sesión</h1>

    <form action="php/consultar_usuario.php" method="post" class="frm-iniciar-sesion" id="frm-iniciar-sesion">
        <input type="text" class="campo-frm-iniciar-sesion" placeholder="Email: " name="email">
        <input type="password" class="campo-frm-iniciar-sesion" placeholder="Contraseña" name="contrasenia">

        <input type="submit" class="btn-iniciar-sesion" id="btn-entrar-iniciar-sesion" value="Entrar">
        <input type="reset" value="Borrar" class="btn-borrar">
    </form>
    <center>
    <a href="view_recuperar_contrasenia.php">¿Olvidó su contraseña?</a>
    </center>
    
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>


</body>
</html>
