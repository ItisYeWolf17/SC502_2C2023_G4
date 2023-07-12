<?php

namespace Controllers;


use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController
{

    public static function principal(Router $router)
    {
        $router->render('dashboard/indexIni');
    }
    public static function login(Router $router)
    {
        $router->render('auth/login');
    }
    public static function logout()
    {
        echo "Desde logout";
    }
    public static function olvide(Router $router)
    {
        $router->render('auth/olvide');
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario($_POST);

        //Alertas vacias 
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //Revisar si ya existe
            if (empty($alertas)) {
                //Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear los password 
                    $usuario->hashPassword();
                    //Crea tokens
                    $usuario->crearToken();
                    //Envia un email 
                    $email = new Email($usuario->nombre_usuario, $usuario->correo, $usuario->token);
                    $email -> enviarConfirmacion();

                    //Crear un usuario 
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header('Location: /login');
                    }

                }
            }
        }

        $router->render('auth/crear', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }
}