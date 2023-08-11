<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar vehiculos</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/vehiculos.css" />
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
    <form method="POST" action="/crear-vehiculo">

        <div class="campo">
            <label class="campo__label" for="placa_vehiculo">Placa del vehiculo</label>
            <input class="campo__field" type="text" name="placa_vehiculo" placeholder="BXD-002"
            id="placa_vehiculo" value="<?php echo s($vehiculo -> placa_vehiculo);?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="marca_vehiculo">Marca del Vehiculo</label>
            <input class="campo__field" type="text" name="marca_vehiculo" placeholder="Toyota"
            id="marca_vehiculo" value="<?php echo s($vehiculo -> marca_vehiculo);?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="year_vehiculo">Año del Vehiculo</label>
            <input class="campo__field" type="text" name="year_vehiculo" placeholder="2013" id="year_vehiculo"
            value="<?php echo s($vehiculo -> year_vehiculo);?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="idPropietario">Dueño del Vehiculo</label>
            <input class="campo__field" type="texy" name="idPropietario" placeholder="2" id="idPropietario"
            value="<?php echo s($vehiculo -> idPropietario);?>">
        </div>

        <div class="campo">
                <input type="submit" class="btn-enviar">
        </div>
    </form>

    </div>

    
</body>
</html>