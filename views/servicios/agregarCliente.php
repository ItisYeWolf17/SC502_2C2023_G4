<?php
session_start();

use Model\Cliente;

$cliente = new Cliente();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarCliente</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/clientes.css" />
    <link rel="stylesheet" href="./assets/css/table.css"/>
    
    <script src="https://kit.fontawesome.com/3e4411f84c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.cs">
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
                <a href="#"><?php echo $_SESSION['nombre']; ?></a>
            </nav>
        </div>
    </header>

    <div class="formulario-crear">
    <form method="POST" action="/crear-cliente">
        <div class="campo">
            <label class="campo__label" for="nombre_propietario">Nombre del Cliente</label>
            <input class="campo__field" type="text" name="nombre_propietario" placeholder="Alexander"
            id="nombre_propietario" value="<?php $cliente -> nombre_propietario;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="apellido_propietario">Apellido del Cliente</label>
            <input class="campo__field" type="text" name="apellido_propietario" placeholder="Cantillo Aguilar"
            id="apellido_propietario" value="<?php $cliente -> apellido_propietario;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="cedula_propietario">Cedula del Cliente</label>
            <input class="campo__field" type="text" name="cedula_propietario" placeholder="207530987" id="cedula_propietario"
            value="<?php $cliente -> cedula_propietario;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="frecuencia">Frecuencia</label>
            <input class="campo__field" type="text" name="frecuencia" placeholder="207530987" id="frecuencia"
            value="<?php $cliente -> frecuencia;?>">
        </div>

        <div class="campo">
                <input type="submit" class="btn-enviar">
        </div>
    </form>

    </div>

    
</body>
</html>