<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/clientes.css" />
    <link rel="stylesheet" href="./assets/css/table.css" />
    <script src="https://kit.fontawesome.com/3e4411f84c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
</head>

<body>

    <header class="header">
        <div class="contenido-header">
            <div class="imagen-logo">
                <a href="./principal">
                    <img src="./assets/img/logo.png">
                </a>
            </div>
            <nav class="navegacion-principal">
                <a href="./login.html">Cerrar Sesión</a>
                <a href="#">
                    <?php echo $_SESSION['nombre']; ?>
                </a>
            </nav>
        </div>
    </header>
    <h2 class="titulo-servicios">Estas en el Modulo Clientes</h2>




    <div class="container-table">

        <a class="titulo-servicios abrir-codigo" href="/addCliente">Añadir Cliente</a>

        <form action="/reporte-clientes" method="post">
            <button class="titulo-servicios abrir-codigo">Generar Reporte</button>
        </form>
        <table id="datatable_clientes" class="datatable">

            <thead>
                <tr>
                    <th class="centered">ID</th>
                    <th class="centered ">Nombre</th>
                    <th class="centered">Apellido</th>
                    <th class="centered">Cedula</th>
                    <th class="centered">Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody_clientes"></tbody>
        </table>
    </div>

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

    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!--JS PROPIO-->
    <script src="./assets/js/clientes.js"></script>
</body>

</html>