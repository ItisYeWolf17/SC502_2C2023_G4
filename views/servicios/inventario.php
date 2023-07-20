<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller AK</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/table.css" />

    <!-- Bootstrap-->
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">
        <div class="contenido-header">
            <div class="imagen-logo">
                <img src="./assets/img/logo.png">
            </div>
            <nav class="navegacion-principal">
                <a href="./login.html">Cerrar Sesión</a>
                <a href="#">Bryan Cantillo</a>

            </nav>
        </div>
    </header>

    <h2 class="titulo-servicios">Estas en el modulo Inventario</h2>



    
    <div class="container-table">
 
        <a class="titulo-servicios abrir-codigo" href="#">Abrir un código para articulos</a>
        <table id="datatable_users" class="datatable">
            
            <thead>
                
                <tr>
                    <th class="centered">Codigo</th>
                    <th class="centered ">Nombre</th>
                    <th class="centered">Costo IVA</th>
                    <th class="centered">Stock</th>
                    <th class="centered acciones">Precio Cliente</th>
                    <th class="centered acciones">Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody_users"></tbody>
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

    <!--Script Propio-->
    <script src="./assets/js/App.js"></script>
    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>