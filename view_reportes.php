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
        .btn-instertar-tema {
            margin-left:50;
            margin-bottom: 20px;
        }

         .btn-instertar-tema:hover {
            background: #ddd !important;
            color: #000 !important;
        }

     </style>
      <?php include  "cosas-generales/links-generales.php"; ?>
      <link rel="stylesheet" href="css/view_uinsertar_umodificar_usuario.css">

  <title>Reporte</title>
</head>
<body>
     <?php  include "cosas-generales/header_usuario.php"?>
     <h1 class="titulo-principal" style="color: red">Reportes</h1>
     <div class="contenedor-botones-gestionar-usuarios">
      <center>
       <a href="view_reporte_fecha.php" class="btn btn-outline-dark btn-instertar-tema" style="color: #0041FF; border-color: #3d73a9" target="_blank">Reporte por fecha</a>
       <a href="reporte_productos.php" class="btn btn-outline-dark btn-instertar-tema" style="color: #0041FF; border-color: #3d73a9" target="_blank">Reporte productos</a>
     </center>
          
    </div>
            
   
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
</body>
</html>