<body>

    <header class="header">
        <div class="login-header contenido-header">
            <img src="./assets/img/logo.png">
        </div>
    </header>


    <div class="formulario-crear">
        <h2>Ingrese su correo para proceder con el cambio de clave</h2>
        <form class="formulario" method="POST" action="/">
            <div class="campo">
                <label class="campo__label" for="mail">Correo</label>
                <input class="campo__field" type="text" name="mail" id="mail" placeholder="correo@coreo.com">
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

    <script src="../views/assets/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>