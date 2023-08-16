<?php
session_start();
use Model\Fallas;
use Model\Vehiculo;

$vehiculos = Vehiculo::all();
$fallas = Fallas::all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarCliente</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/clientes.css" />
    <link rel="stylesheet" href="./assets/css/table.css" />

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
                <a href="#">
                    <?php echo $_SESSION['nombre']; ?>
                </a>
            </nav>
        </div>
    </header>

    <div class="formulario-crear">
        <form method="POST" action="/crear-reparacion">

            <div class="campo">
                <label class="campo__label" for="idFallas">Falla</label>
                <select class="campo__field" name="idFallas" id="idFallas">
                    <?php
                    foreach ($fallas as $falla): ?>
                        <option value="<?php echo $falla->id; ?>">
                            <?php echo $falla->nombre_falla; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="campo">
                <label class="campo__label" for="idVehiculos">Vehiculo</label>
                <select class="campo__field" name="idVehiculos" id="idVehiculos">
                    <?php
                    foreach ($vehiculos as $vehiculo): ?>
                        <option value="<?php echo $vehiculo->id; ?>">
                            <?php echo $vehiculo->marca_vehiculo; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="campo">
                <input type="submit" class="btn-enviar">
            </div>
        </form>

    </div>

</body>

</html>