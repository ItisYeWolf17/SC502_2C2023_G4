<?php
    namespace Controllers;

    use MVC\Router;

    class VehiculoController{
        public static function vehiculos(Router $router){
            $router -> render('servicios/vehiculos', []);
        }
    }

    