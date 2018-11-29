 <header class="header" id="header">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
 <nav class="menu">
    <div class="logo">
      <img src="img/logo.png" alt="">
    </div>
    
      <div class="contenedor-btn-menu-responsive">
        <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars"></i></a>
      </div>

      <div class="enlaces" id="enlaces">
            <a href="view_reportes.php"><i class="fa fa-bar-chart"></i>Reportes</a>
            <a href="view_venta.php"><i class="fa fa-tags"></i>Gestionar Venta</a>
            <!-- Mostramos la sesión del usuario -->
            <a href='view_producto.php'> <span class="glyphicon glyphicon-info-sign"></span>Gestionar Producto</a>
            <a href='view_usuario.php'><i class="fa fa-user" aria-hidden="true"></i>Gestionar Usuario</a>
           
            
			<a href="php/cerrar_sesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>

      </div>
    </nav>
</header>
