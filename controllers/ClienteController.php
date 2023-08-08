<?php 


namespace Controllers;
use MVC\Router;
use Model\Cliente;


class ClienteController{
    public static function clientes(Router $router){
        $router->render('servicios/clientes',[

        ]);
    }
    
    public static function crear(){
        $cliente = new Cliente($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cliente -> sincronizar($_POST);
            $resultado = $cliente -> guardar();
            if($resultado){
                header('Location: /clientes');
            }
        }
    }
}
