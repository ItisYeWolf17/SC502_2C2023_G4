<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taller AK</title>
  <link rel="stylesheet" href="./assets/css/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <header class="header">
    <div class="contenido-header">
      <div class="imagen-logo">
        <img src="./assets/img/logo.png">
      </div>
      <nav class="navegacion-principal">
        <a href="/login">Cerrar Sesión</a>
        <a href="/informacionUsuario">
          <?php echo $_SESSION['nombre']; ?>
        </a>
      </nav>
    </div>
  </header>

  <h2 class="titulo-servicios">Servicios</h2>

  <section class="container-menu">

    <article class="card-servicio">
      <a class="link" href="/vehiculos">
        <div class="img-servicio">
          <img src="./assets/img/reparacion vehiculo.jpg">
        </div>
        <div class="info-servicio">
          <h4>Registo de Vehículos</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="/clientes">
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
      <a class="link" href="/usuarios">
        <div class="img-servicio">
          <img src="./assets/img/user.png">
        </div>
        <div class="info-servicio">
          <h4>Usuario</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="/sistemas">
        <div class="img-servicio">
          <img src="./assets/img/motor-coche-moderno_40345-420.avif">
        </div>
        <div class="info-servicio">
          <h4>Sistemas</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="/fallas">
        <div class="img-servicio">
          <img src="./assets/img/119-1190741_black-red-warning-svg-clip-arts-warning-icon.png">
        </div>
        <div class="info-servicio">
          <h4>Fallas</h4>
        </div>
      </a>
    </article>

    <article class="card-servicio">
      <a class="link" href="/reparaciones">
        <div class="img-servicio">
          <img src="./assets/img/hombre-abrio-capo-automovil-reparar-vehiculo-coche-averiado-ilustracion-vectorial-plana_124715-1548.avif">
        </div>
        <div class="info-servicio">
          <h4>Fallos en Carros</h4>
        </div>
      </a>
    </article>
  </section>

  <h2 class="titulo-servicios">Graficos</h2>
  <section class="section-graficos">

    <div class="grafico-producto">
      <h2 class="titulo-servicios">Stock Productos</h2>

      <canvas id="myChart">
        <script>
          const ctx = document.getElementById('myChart');
          let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              datasets: [{
                label: 'Stock de productos',
                backgroundColor: ['#6bf1ab', '#63d69f', '#438c6c']
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
          let urlProductos = 'http://localhost:3000/api/inventario';
          fetch(urlProductos)
            .then(response => response.json())
            .then(datos => mostrar(datos))
            .catch(error => console.log(error))

          const mostrar = (productos) => {
            productos.forEach(element => {
              myChart.data['labels'].push(element.nombre_producto)
              myChart.data['datasets'][0].data.push(element.cantidad)
              myChart.update();
            });
          }

        </script>
      </canvas>
    </div>



    <div class="grafico-producto">
      <h2 class="titulo-servicios">Clientes Frecuentes</h2>

      <canvas id="myChart2">
        <script>
          const ctx2 = document.getElementById('myChart2');
          let myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
              datasets: [{
                label: 'Clientes frecuentes',
                backgroundColor: ['#6bf1ab', '#63d69f', '#438c6c']
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
          let urlClientes = 'http://localhost:3000/api/clientes';
          fetch(urlClientes)
            .then(response => response.json())
            .then(datos => mostrarClientes(datos))
            .catch(error => console.log(error))

          const mostrarClientes = (clientes) => {
            clientes.forEach(element => {
              myChart2.data['labels'].push(element.nombre_propietario)
              myChart2.data['datasets'][0].data.push(element.frecuencia)
              myChart2.update();
            });
          }

        </script>

      </canvas>


    </div>

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