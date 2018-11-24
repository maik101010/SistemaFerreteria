<?php
      include "../conexion.php";

      /*
            Capturamos los datos enviados por ajax del archivo cargar_productos.php
      */
      $valor = $_POST['nombre'];
      //$id = $_POST['id'];


       
      if(!empty($valor)) {
            $conexion = $con;
            $consulta = $conexion->query("SELECT * FROM producto WHERE estado= 1 AND nombre LIKE '%". $valor. "%'");
?>

                 <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Operaciones</th>
                        </tr>
                    </thead>
                  <?php  foreach ($consulta as $row) { ?>
          
                          <tbody>
                              <tr>
                                  <!-- <td><?php //echo $row['id'] ?></td> -->
                                  <td><?php echo $row['nombre'] ?></td><!-- 
                                  <td><?php // echo $row['descripcion'] ?></td> -->
                                 
                                  <td>
                                      <a href="view_venta.php?id=<?php echo $row['id'] ?>">Agregar</a>
                                      
                                  </td>
                              </tr>
                          </tbody>
                              
               <?php  } ?>
          </table>


                      <!--   $nombre = $row['nombre'];
                        $id = $row['id'];
                        echo $id." - ".$nombre."<br /><br />";   
 -->
                 <?php } ?>  
      

       
