<?php
use Model\Inventario;

$producto = new Inventario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar productos</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/productos.css" />
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
    <form method="POST" action="/crear-producto">


        <div class="campo">
            <label class="campo__label" for="nombre_producto">Nombre Producto</label>
            <input class="campo__field" type="text" name="nombre_producto" placeholder="Liquido de Frenos"
            id="nombre_producto" value="<?php $producto -> nombre_producto;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="iva_producto">IVA</label>
            <input class="campo__field" type="text" name="iva_producto" placeholder="13" id="iva_producto"
            value="<?php $producto -> iva_producto;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="costo_bruto">Costo sin IVA</label>
            <input class="campo__field" type="text" name="costo_bruto" placeholder="20000" id="costo_bruto"
            value="<?php $producto -> costo_bruto;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="costo_iva">Costo con IVA</label>
            <input class="campo__field" type="text" name="costo_iva" placeholder="25000" id="costo_iva"
            value="<?php $producto -> costo_iva;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="margen_utilidad">Margen de utilidad</label>
            <input class="campo__field" type="text" name="margen_utilidad" placeholder="25" id="margen_utilidad"
            value="<?php $producto -> margen_utilidad;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="margen_utilidad">Precio Cliente</label>
            <input class="campo__field" type="text" name="precio_cliente" placeholder="27000" id="precio_cliente"
            value="<?php $producto -> precio_cliente;?>">
        </div>

        <div class="campo">
            <label class="campo__label" for="cantidad">Cantidad</label>
            <input class="campo__field" type="text" name="cantidad" placeholder="30" id="cantidad"
            value="<?php $producto -> cantidad;?>">
        </div>

        <div class="campo">
                <input type="submit" class="btn-enviar">
        </div>
    </form>

    </div>

    
</body>
</html>