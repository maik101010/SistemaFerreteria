<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fuentes De Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Open+Sans|Oswald|Roboto|Shadows+Into+Light+Two|Nunito+Sans" rel="stylesheet">
     <style>
         .btn-instertar-tema {
            margin-left: 80%;
            margin-bottom: 20px;
         }

         .btn-instertar-tema:hover {
            background: #ddd !important;
            color: #000 !important;
        }

         @media screen and (max-width: 750px) {
            .btn-instertar-tema {
                margin-left: 50%;
             }
         }
     </style>
    
    <!-- Estilos -->
    <?php include "cosas-generales/links-generales.php"; ?>
    <link rel="stylesheet" href="css/view_gestionar_tema_estilos.css">

  <title>Tema</title>
</head>
<?php include "cosas-generales/header_usuario.php"; ?>
<body>
    
    <h1 class="titulo-principal">Gestionar Producto</h1>


    <a href="view_producto_insertar.php" class="btn btn-outline-dark btn-instertar-tema">Nuevo registro</a>
    
    <?php 
        include "php/conexion.php";

        $conexion = $con;

        $consulta = $conexion->query("SELECT * from producto");

        ?>
        <!-- Empieza la tabla             -->
        <div class="table-responsive table-hover container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Referencia</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Valor</th>
                                              
                    </tr>
                </thead>
            <?php 
            foreach ($consulta as $row) { ?>
            
                    <tbody>
                        <tr>
                            <td><?php echo $row['referencia'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['marca'] ?></td>
                            <td>$<?php echo $row['cantidadStock'] ?></td>
                            <td>$<?php echo $row['valor'] ?></td>
                                <?php if ($row['estado']==1){ ?>
                                    <td class="contenedor-btn-editar-eliminar">
                                        <a href="view_producto_modificar.php?id=<?php echo $row['id'] ?>" class="btn-editar"><i class="fa fa-edit"></i></a>
                                        <a href="php/producto/eliminar_producto.php?id=<?php echo $row['id']?>" class="btn-eliminar" onclick="return confirm_delete()"><i class="fa fa-trash"></i></a> 
                                        <a href="php/producto/deshabilitar.php?id=<?php echo $row['id']?>" class="btn-eliminar" onclick="return confirm_deshabilitar()">Inhabilitar</a> 
                                    </td>    
                                <?php }else{ ?>
                                    <td class="contenedor-btn-editar-eliminar">
                                        <a href="php/producto/habilitar.php?id=<?php echo $row['id'] ?>" class="btn-editar" onclick="return confirm_habilitar()" >Habilitar</a>
                                    </td>
                                <?php } ?>
                                
                        </tr>
                    </tbody>
                    
            <?php  } ?>
            <!-- Termina la tabla -->
            </table> 
        </div>
          <a href="view_usuario.php" class="btn btn-outline-dark btn-instertar-tema"><i class="fa fa-chevron-left"></i> Regresar</a>
             

    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>

    <script language="JavaScript">
       function confirm_delete() {
        return confirm('¿Esta usted seguro de eliminar el producto?');
        }

        function confirm_deshabilitar() {
        return confirm('¿Esta usted seguro de inhabilitar el producto?');
        }

        function confirm_habilitar() {
        return confirm('¿Esta usted seguro de habilitar el producto?');
        }
    </script>

  
</body>
</html>