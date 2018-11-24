<?php 
  include "../conexion.php";

  $conexion = $con;
  //$id_tipo = $_POST["id_tipo_producto"];
  $consulta = $conexion->query("SELECT * FROM producto where estado=1");
?>
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
    <div class="row contenedor-tabla-busqueda">
      <div class="contenedor-busqueda col-md-4">
       <input type="text" id="buscar" placeholder="Buscar Producto">
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

                      <!-- <th scope="col">Operaciones</th> -->
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

                      
                      <td><a href="../../view_venta.php?id=<?php echo $row['id'] ?>">Agregar<i class="fa fa-eye"></i></a></td>
                     
                      <!-- <td> -->
                         
                          
                      <!-- </td> -->
                  </tr>
              </tbody>
                  
               <?php  } ?>
          </table>
        </form>
      </div>      
    </div>
    

    <script type="text/javascript">
      $(document).ready(function(e){
          $("#buscar").keyup(function(e){

            var nombre = $("#buscar").val();
            /*
              Capturamos el id del tipo de producto
            */
            $.ajax({
              type: "post",
              url: "php/producto/buscar_producto.php",
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
    

