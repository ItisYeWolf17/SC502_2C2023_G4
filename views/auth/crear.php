<body>

    <header class="header">
        <div class="login-header contenido-header">
            <img src="./assets/img/logo.png">
        </div>
        <link rel="stylesheet" href="./assets/css/style.css">
    </header>

    <div class="formulario-crear">
        <h2>Crear Cuenta</h2>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
        <form class="formulario" method="POST" action="/crear">
            <div class="campo">
                <label class="campo__label" for="mail">Correo</label>
                <input class="campo__field" type="text" name="correo" id="correo" placeholder="correo@coreo.com" ,
                    value="<?php echo s($usuario->correo); ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="password">Clave</label>
                <input class="campo__field" type="password" name="password" placeholder="Tu clave" id="password"/>
            </div>

            <div class="campo">
                <label class="campo__label" for="nombre_usuario">Nombre</label>
                <input class="campo__field" type="text" name="nombre_usuario" placeholder="Nombre" id="nombre_usuario"
                value="<?php echo s($usuario->nombre_usuario); ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="apellido_usuario">Apellido</label>
                <input class="campo__field" type="text" name="apellido_usuario" placeholder="Apellidos" id="apellido_usuario" ,
                    value="<?php echo s($usuario->apellido_usuario); ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="cedula_usuario">Cedula</label>
                <input class="campo__field" type="text" name="cedula_usuario" placeholder="Cedula" id="cedula_usuario" ,
                    value="<?php echo s($usuario->cedula_usuario); ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="roles_id_rol">Rol</label>
                <input class="campo__field" type="number" name="roles_id_rol" placeholder="rol" id="roles_id_rol"
                value="<?php echo s($usuario->roles_id_rol); ?>">
            </div>
            <div class="campo">
                <input type="submit" class="btn-enviar">
            </div>
            <a class="cambiar-clave" href="/login">Volver Atras</a>

        </form>
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



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>