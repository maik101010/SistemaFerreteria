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
        //$valor = $_GET["valorDif"];
        $consulta = $conexion->query("SELECT * from producto where id = '$id'");
      }
        

      ?>


    <h1 class="titulo-principal">Formulario De Venta</h1>
     <div class="contenedor-botones-gestionar-usuarios">
        <a href="cargar_producto.php" class="btn btn-outline-dark btn-instertar-tema"><i class="fa fa-plus"></i>Agregar Producto</a>
    </div>

			<!-- <a href="cargar_producto.php" >Agregar producto</a> -->
			<?php foreach ($consulta as $row) {	?> 
  			<!-- <form action="php/venta/insertarTemp.php" method="post" class="frm-registrarse" id="frm-registrarse" onsubmit="return validacion()"> -->
          <form action="php/venta/insertarTemp.php" method="post" class="frm-registrarse" id="frm-registrarse">
  				<input type="text" class="campo-frm-registrarse" name="id_producto" id="id" value="<?php echo $row['id'] ?>">
  				<input type="text" class="campo-frm-registrarse" placeholder="Referencia:" name="referencia" value="<?php echo $row['referencia'] ?>">
  				<input type="text" class="campo-frm-registrarse" placeholder="Nombre:" name="nombre" id="nombre" value="<?php echo $row['nombre'] ?>">
  		    <input type="text" class="campo-frm-registrarse" placeholder="Valor:" name="valor" id="valor" value="<?php echo $row['valor']?>">
  		    <input type="text" class="campo-frm-registrarse" placeholder="Cantidad:" name="CantidadDisponible" id="cantidadDisponible" value="<?php echo $row['cantidadStock'] ?>">
  		    <input type="text" class="campo-frm-registrarse" placeholder="Cantidad Solicitada:" name="cantidadSolicitada" id="cantidadSolicitada">
  		    <input type="submit" class="btn-registrarse" id="btn-registrarse" value="Insertar">
  		    <input type="reset" class="btn-borrar" value="Borrar">
     		</form>
   		<?php } ?>
     

      <div>
    <?php 
      $conexion1 = $con;
      $consulta = $conexion1->query("SELECT venta_temp.id as id_venta, producto.nombre, producto.marca, producto.valor, venta_temp.cantidadSolicitada  FROM venta_temp INNER JOIN producto on producto.id = venta_temp.producto_id order by producto.nombre");
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
                                    ?>
                                  </td>
                                    <td>
                                      <a href="view_editar_cantidad.php?id=<?php echo $row['id_venta'] ?>">Editar Cantidad</a>
                                    </td>
                              </tr>
                          </tbody>
                              
               <?php  } ?>


          </table>
    
      </div>
   
    <?php include "cosas-generales/footer.php"; ?>

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
  
</body>
</html>