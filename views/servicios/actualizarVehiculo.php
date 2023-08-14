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
                <a href="/login">Cerrar Sesión</a>
                <a href="#">
                    <?php echo $_SESSION['nombre']; ?>
                </a>
            </nav>
        </div>
    </header>

    <div class="formulario-crear">

        <form method="POST">
            <div class="campo">
                <label class="campo__label" for="placa_vehiculo">Placa del Vehiculo</label>
                <input class="campo__field" type="text" name="placa_vehiculo" placeholder="SSD-213" id="placa_vehiculo"
                    value="<?php echo s($vehiculo->placa_vehiculo); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="marca_vehiculo">Marca y Modelo</label>
                <input class="campo__field" type="text" name="marca_vehiculo" placeholder="Cevrolet Camaro"
                    id="marca_vehiculo" value="<?php echo s($vehiculo->marca_vehiculo); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="year_vehiculo">Año</label>
                <input class="campo__field" type="text" name="year_vehiculo" placeholder="2024" id="year_vehiculo"
                    value="<?php echo s($vehiculo->year_vehiculo); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="idPropietario">Propietario</label>
                <select class="campo__field" name="idPropietario" id="idPropietario">
                    <?php foreach ($propietarios as $propietario): ?>
                        <option value="<?php echo $propietario->id; ?>" <?php echo $propietario->id == $selectedPropietarioId ? 'selected' : ''; ?>>
                            <?php echo $propietario->nombre_propietario . ' ' . $propietario->apellido_propietario; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="campo">
                <input type="submit" class="btn-enviar">
                <a class="cambiar-clave" href="/vehiculos">Volver</a>
            </div>
        </form>

    </div>

</body>

</html>