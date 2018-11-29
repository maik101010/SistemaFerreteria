<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

  <title>Reporte</title>
</head>
<body>
     <?php  include "cosas-generales/header_usuario.php"?>
	    <h1 class="titulo-principal">Seleccionar Fecha</h1>
      	<form action="reporte_fecha.php" method="post" class="frm-registrarse" id="frm-registrarse">
  				<input type="date" class="campo-frm-registrarse" name="fecha_uno" id="id">
  				<input type="date" class="campo-frm-registrarse" name="fecha_dos" id="id">
  				<input type="submit" class="btn-registrarse" value="Visualizar">
  		    <input type="reset" class="btn-borrar" value="Borrar">
     		</form>

     		 <a href="view_reportes.php" class="btn btn-outline-dark btn-regresar"><i class="fa fa-chevron-left"></i> Regresar</a>
            
   
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
</body>
</html>