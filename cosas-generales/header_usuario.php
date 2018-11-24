 <header class="header" id="header">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
 <nav class="menu">
  <div class="logo">
      <img src="img/logo.jpg" alt="">
    </div>
    
      <div class="contenedor-btn-menu-responsive">
        <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars"></i></a>
      </div>

      <div class="enlaces" id="enlaces">
            <a href="view_venta.php"><i class="fa fa-tags"></i> Gestionar Venta</a>
            <!-- Mostramos la sesión del usuario -->
            <a href='view_producto.php'>Gestionar Producto</a>
            <a href='view_usuario.php'>Usuario</a>
           
            
			<a href="php/cerrar_sesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>

      </div>
    </nav>
</header>
