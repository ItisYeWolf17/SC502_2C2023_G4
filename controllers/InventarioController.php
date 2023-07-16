<?php 


namespace Controllers;
use MVC\Router;

class InventarioController{
    public static function inventario(Router $router){
        $router->render('servicios/inventario', [

        ]);
    }
}