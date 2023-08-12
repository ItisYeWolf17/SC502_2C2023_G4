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
                <label class="campo__label" for="nombre_usuario">Nombre del Usuario</label>
                <input class="campo__field" type="text" name="nombre_usuario" placeholder="Alexander"
                    id="nombre_usuario" value="<?php echo s($usuario->nombre_usuario); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="apellido_usuario">Apellido del usuario</label>
                <input class="campo__field" type="text" name="apellido_usuario" placeholder="Cantillo Aguilar"
                    id="apellido_usuario" value="<?php echo s($usuario->apellido_usuario); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="cedula_usuario">Cedula del usuario</label>
                <input class="campo__field" type="text" name="cedula_usuario" placeholder="207530987"
                    id="cedula_usuario" value="<?php echo s($usuario->cedula_usuario); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="idRol">Rol de Usuario</label>
                <input class="campo__field" type="text" name="idRol" placeholder="207530987"
                    id="idRol" value="<?php echo s($usuario->idRol); ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="password">Clave</label>
                <input class="campo__field" type="password" name="password"
                    id="password">
            </div>
            
            <div class="campo">
                <label class="campo__label" for="correo">Correo</label>
                <input class="campo__field" type="text" name="correo" placeholder="207530987"
                    id="correo" value="<?php echo s($usuario->correo); ?>">
            </div>

            <div class="campo">
                <input type="submit" class="btn-enviar">
                <a class="cambiar-clave" href="/usuarios">Volver</a>
            </div>
        </form>

    </div>

</body>

</html>