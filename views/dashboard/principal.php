<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taller AK</title>
  <link rel="stylesheet" href="./assets/css/style.css"/>
</head>

<body>

  <header class="header">
    <div class="contenido-header">
      <div class="imagen-logo">
        <img src="./assets/img/logo.png">
      </div>
      <nav class="navegacion-principal">
        <a href="/login">Cerrar Sesión</a>
        <a href="/informacionUsuario"><?php echo $_SESSION['nombre']; ?></a>
      </nav>
    </div>
  </header>

  <h2 class="titulo-servicios">Servicios</h2>

  <section class="container-menu">

    <article class="card-servicio">
      <a class="link" href="#">
        <div class="img-servicio">
          <img src="./assets/img/reparacion vehiculo.jpg">
        </div>
        <div class="info-servicio">
          <h4>Reparación de Vehículos</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="#">
        <div class="img-servicio">
          <img src="./assets/img/cliente.jpg">
        </div>
        <div class="info-servicio">
          <h4>Registro Clientes</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="/inventario">
        <div class="img-servicio">
          <img src="./assets/img/inventario.webp">
        </div>
        <div class="info-servicio">
          <h4>Inventario</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="#">
        <div class="img-servicio">
          <img src="./assets/img/user.png">
        </div>
        <div class="info-servicio">
          <h4>Usuario</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="#">
        <div class="img-servicio">
          <img src="./assets/img/correos.png">
        </div>
        <div class="info-servicio">
          <h4>Correo</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="#">
        <div class="img-servicio">
          <img src="./assets/img/ajustes.jpg">
        </div>
        <div class="info-servicio">
          <h4>Ajustes</h4> 
        </div>
      </a>
    </article>


  </section>

  <footer class="footer">

    <div class="contenido-footer">
      
      <div class="imagen-logo">
        <img src="./assets/img/logoActualAK2.png.png">
      </div>

      <div class="derechos-rese">
        <p>Todos los derechos reservados 2023©</p>
      </div>

      <div class="parr-soporte">
        <p>Soporte al: 8888-8888</p>
      </div>

    </div>

  </footer>


  <script src="./assets/js/principal.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
