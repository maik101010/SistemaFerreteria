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
<?php include "cosas-generales/header_usuario.php"; ?>
<body>
   
    <h1 class="titulo-principal">Insertar Producto</h1>


  			<form action="php/producto/insertar_producto.php" method="post" class="frm-registrarse" id="frm-registrarse">
					
			        <input type="text" class="campo-frm-registrarse" placeholder="Referencia:" name="referencia" >
			        <input type="text" class="campo-frm-registrarse" placeholder="Nombre:" name="nombre" >
			        <input type="text" class="campo-frm-registrarse" placeholder="Marca:" name="marca">
			        <input type="text" class="campo-frm-registrarse" placeholder="Valor Unitario" name="valor">
              <input type="text" class="campo-frm-registrarse" placeholder="Cantidad" name="cantidad">
			        <input type="submit" class="btn-registrarse" id="btn-registrarse" value="Insertar">
			        <input type="reset" class="btn-borrar" value="Borrar">
    			</form>
    			
			
      <a href="view_producto.php" class="btn btn-outline-dark btn-regresar"><i class="fa fa-chevron-left"></i> Regresar</a>
             
      <!-- <a href="view_consultores.php" class="btn btn-outline-dark btn-instertar-tema">Ver consultores</a> -->
             
   
    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>
  
</body>
</html>