<?php
use Model\Sistema;
session_start();


$sistemas = Sistema::all();


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
    <form method="POST" action="/crear-falla">
        <div class="campo">
            <label class="campo__label" for="nombre_falla">Nombre de la falla</label>
            <input class="campo__field" type="text" name="nombre_falla" placeholder="Piston Quebrado"
            id="nombre_falla" >
        </div>

        <div class="campo">
            <label class="campo__label" for="precio_reparacion">Precio de Reparacion sin iva</label>
            <input class="campo__field" type="text" name="precio_reparacion" placeholder="20000"
            id="precio_reparacion" >
        </div>

        <div class="campo">
            <label class="campo__label" for="iva">Cuota IVA</label>
            <input class="campo__field" type="text" name="iva" placeholder="13"
            id="iva" >
        </div>

        <div class="campo">
                <label class="campo__label" for="idSistemas">Sistema Afectado</label>
                <select class="campo__field" name="idSistemas" id="idSistemas">
                    <?php
                    foreach ($sistemas as $sistema): ?>
                        <option value="<?php echo $sistema->id; ?>">
                            <?php echo $sistema->nombre_sistema; ?>
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