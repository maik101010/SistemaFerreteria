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
    
    <h1 class="titulo-principal" style="color: red">Gestionar Usuario</h1>   
    <?php 
        include "php/conexion.php";

        $conexion = $con;

        $consulta = $conexion->query("SELECT * from usuario");

        ?>
        <!-- Empieza la tabla             -->
        <div class="table-responsive table-hover container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Operación</th>
                  	</tr>
                </thead>
            <?php 
            foreach ($consulta as $row) { ?>
            
                    <tbody>
                        <tr>
                            <td><?php echo $row['usuario'] ?></td>
                            <td><a href="view_form_usuario.php?id=<?php echo $row["id"] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                    
            <?php  } ?>
            
            </table> 
        </div>
            

    <?php include "cosas-generales/footer.php"; ?>

    <?php include "cosas-generales/scripts-generales.php"; ?>

    
</body>
</html>