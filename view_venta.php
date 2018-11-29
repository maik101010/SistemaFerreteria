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
            margin-left: 80%;
            margin-bottom: 20px;
         }
     </style>
      <?php include  "cosas-generales/links-generales.php"; ?>
      <link rel="stylesheet" href="css/view_uinsertar_umodificar_usuario.css">

  <title>Venta</title>
</head>
<body>
     <?php  include "cosas-generales/header_usuario.php"?>

     <?php 

     	include "php/conexion.php";
    	$conexion = $con;
      if (isset($_GET)) {
        $id = $_GET["id"];
        $consulta = $conexion->query("SELECT * from producto where id = '$id'");
      }
        

      ?>


    <h1 class="titulo-principal" style="color: red">Generar Venta</h1>
     <div class="contenedor-botones-gestionar-usuarios">
        <a href="cargar_producto.php" class="btn btn-outline-dark btn-instertar-tema" style="color: #0041FF; border-color: #3d73a9"><i class="fa fa-plus"></i>Agregar Producto</a>
    </div>

			<!-- <a href="cargar_producto.php" >Agregar producto</a> -->
      <?php   $cantidadStock ?>
			<?php foreach ($consulta as $row) {	
          $cantidadStock = $row["cantidadStock"];
        ?> 
          <form action="php/venta/insertarTemp.php" method="post" class="frm-registrarse" id="frm-registrarse">
  				<input type="hidden" class="campo-frm-registrarse" name="id_producto" id="id" value="<?php echo $row['id'] ?>"  >
  				<input type="text" class="campo-frm-registrarse" placeholder="Referencia:" name="referencia" value="<?php echo $row['referencia'] ?>" Disabled>
  				<input type="text" class="campo-frm-registrarse" placeholder="Nombre:" name="nombre" id="nombre" value="<?php echo $row['nombre'] ?>" Disabled>
  		    <input type="text" class="campo-frm-registrarse" placeholder="Valor:" name="valor" id="valor" value="<?php echo $row['valor']?>" Disabled>
  		    <input type="text" class="campo-frm-registrarse" placeholder="Cantidad:" name="CantidadDisponible" id="cantidadDis" value="<?php echo $row['cantidadStock'] ?>" Disabled>
  		    <input type="text" class="campo-frm-registrarse" placeholder="Cantidad Solicitada:" name="cantidadSolicitada" id="cantidadSol">
  		    <input type="submit" class="btn-registrarse" id="btn-registrarse" value="Insertar">
  		    <input type="reset" class="btn-borrar" value="Borrar">
     		</form>
   		<?php } ?>
     

      <div>
    <?php 
      $conexion1 = $con;
      $consulta = $conexion1->query("SELECT venta.id as id_venta, producto.nombre, producto.marca, producto.valor, producto.cantidadStock, venta.cantidadSolicitada, producto.id  as id_producto FROM venta INNER JOIN producto on producto.id = venta.producto_id where venta.estado = 0 order by producto.nombre ");
    ?>
                 <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Cantidad Solicitada</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                            <th scope="col">Operación</th>
                        </tr>

                    </thead>
                    <?php $contVenta = 0; ?>
                  <?php  foreach ($consulta as $row) { ?>
              
                          <tbody>
                              <tr>
                                  <td><?php echo $row['id_venta'] ?></td>
                                  <td><?php echo $row['nombre'] ?></td>
                                  <td><?php echo $row['marca'] ?></td>
                                  <td><?php echo $row['cantidadSolicitada'] ?></td>
                                  <td>$<?php echo $row['valor'] ?></td>                                 
                                 
                                  <td>
                                    <?php 
                                      $cantidad = $row['cantidadSolicitada'];
                                      $valorProducto = $row['valor'];
                                      $total = $valorProducto*$cantidad;
                                      echo "$". $total;

                                      $contVenta = $total+$contVenta;                                    
                                    ?>
                                  </td>
                                  <td>
                                      <a href="view_editar_cantidad.php?id=<?php echo $row['id_venta'] ?>&stock=<?php echo $row['cantidadStock'] ?>&cantidad_antigua=<?php echo $row['cantidadSolicitada'] ?>&id_producto=<?php echo $row['id_producto'] ?>">Editar Cantidad</a>
                                  </td>
                              </tr>
                          </tbody>

                         
                              
               <?php  } ?>
             </table>
              <h5>Total Venta: <?php echo "$ ".$contVenta; ?></h5>
              <style type="text/css">
                .inhabilitado{
                  color:#ccc;
                  cursor:default;
                }
              </style>
              <a href="reporte_venta.php" id="habilitar" class="btn btn-outline-dark btn-instertar-tema" style="color: #0041FF; border-color: #3d73a9" target="_blank">Imprimir Venta</a>
              <a id="boton" href="php/venta/insertarVenta.php" class="btn btn-outline-dark btn-instertar-tema" style="color: #0041FF; border-color: #3d73a9" >Realizar Venta</a>
              
      </div>
   
    <?php include "cosas-generales/scripts-generales.php"; ?>
    <script type="text/javascript">
      function validacion(){
        var cantidad = document.getElementById("cantidadDada").value;
        var cantidadDisponible = document.getElementById("cantidadDisponible").value;
        if (cantidad>cantidadDisponible) {
          alert("No hay productos suficientes");
          return false;
        }else{
          return true;

        }
    }

    </script>

    <script type="text/javascript">
      $("#boton").hide();
      $('#habilitar').click(function(){
        $("#boton" ).show();     
        });
    </script>

    <script type="text/javascript">
      $('#frm-registrarse').submit(function(event) {
        var cantidadSol = parseInt($("#cantidadSol").val());
        var cantidadDis = parseInt($("#cantidadDis").val());
        if (cantidadSol>cantidadDis) {
          alert("La cantidad solicitada no puede ser mayor");
          event.preventDefault();  
        }
        
      });

    </script>
  
</body>
</html>