<!DOCTYPE html>
<html>
<head>
  <title>Cargar producto</title>
    <!-- Fuentes De Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Open+Sans|Oswald|Roboto|Shadows+Into+Light+Two|Nunito+Sans" rel="stylesheet">

  <!-- Estilos -->
  <?php include "cosas-generales/links-generales.php"; ?>
  <link rel="stylesheet" href="css/index-estilos.css">
  
</head>
<?php include "cosas-generales/header_usuario.php"; ?>

<?php 
  include "php/conexion.php";

  $conexion = $con;
  $consulta = $conexion->query("SELECT * FROM producto WHERE estado=1");
?>
<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<body>

    <div class="row contenedor-tabla-busqueda">
      <div class="contenedor-busqueda col-md-4">
        <br><br><br>
        <label>Buscar producto: </label>
       <input type="text" id="buscar" placeholder="Nombre ">
       <div id="resultado"></div>
      </div>

      <div class="table-responsive col-md-8">
        <form>
        <table class="table table-hover">
              <thead>
                  <tr>
                      <th scope="col">Referencia</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Marca</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Operacion</th>

                     
                  </tr>
              </thead>
              <h1>Información del Producto</h1>
          <?php 

          foreach ($consulta as $row) { ?>
          
              <tbody>
                  <tr>
                      
                      <td><?php echo $row['referencia'] ?></td><!-- 
                      <td><?php // echo $row['descripcion'] ?></td> -->
                      <td><?php echo $row['nombre'] ?></td>
                      <td><?php echo $row['marca'] ?></td>
                      <td>$<?php echo $row['valor'] ?></td>
                      <td><?php echo $row['cantidadStock'] ?></td>

                      
                      <td><a href="view_venta.php?id=<?php echo $row['id'] ?>"><i class="fa fa-plus">Agregar</a></td>
                     
                  </tr>
              </tbody>
                  
               <?php  } ?>
          </table>
        </form>
      </div>      
    </div>
    <?php include "cosas-generales/footer.php"; ?>
  
    <?php include "cosas-generales/scripts-generales.php"; ?>    


</body>
    <script type="text/javascript">
      $(document).ready(function(e){
          $("#buscar").keyup(function(e){

            var nombre = $("#buscar").val();
            /*
              Capturamos el id del tipo de producto
            */
            $.ajax({
              type: "post",
              url: "buscar_producto.php",
              dataType:"html",
              /*
              Enviamos el id del tipo de producto, junto al nombre digitado en el campo de texto
              */  
              data:{nombre : nombre}, 
              success: function(dato){
                $("#resultado").empty();
                $("#resultado").append(dato);

              }
            });
          });

      });

    </script>
    


</html>
