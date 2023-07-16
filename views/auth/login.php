<body>

    <header class="header">
        <div class="login-header contenido-header">
            <img src="./assets/img/logo.png">
        </div>
    </header>
    <?php include_once __DIR__ . "/../templates/alertas.php"; ?>
    <div class="formulario-crear">
        <form class="formulario" method="POST" action="/login">
            <div class="campo">
                <label class="campo__label" for="mail">Correo</label>
                <input class="campo__field" type="text" name="correo" id="correo" placeholder="correo@coreo.com" value="<?php echo s($auth->correo);?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="password">Clave</label>
                <input class="campo__field" type="password" name="password" placeholder="Tu clave" id="password">
            </div>
            <div class="campo">
                <input type="submit" class="btn-enviar">
            </div>
            <a class="cambiar-clave" href="olvide">Cambio de Clave</a>
            <a class="cambiar-clave" href="/">Volver Atras</a>
            <a class="cambiar-clave" href="/crear">Crear un usuario</a>
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

    <script src="./assets/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>