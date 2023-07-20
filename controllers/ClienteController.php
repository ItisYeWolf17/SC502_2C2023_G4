<?php 


namespace Controllers;
use MVC\Router;

class ClienteController{
    public static function clientes(Router $router){
        $router->render('servicios/clientes', [

        ]);
    }
}