<?php

namespace Controllers;


use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController
{

    public static function principal(Router $router){
        $router->render('dashboard/principal');
    }

    public static function indexIni(Router $router){
        $router->render('dashboard/indexIni');
    }
    public static function login(Router $router){
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                //Comprobar que el usuario exista
                $usuario = Usuario::where('correo', $auth->correo);
                
                if($usuario){
                    //Comprobar si la clave es correcta
                    if($usuario->comprobarPassword($auth->password)){
                    //Autenticar el usuario 
                    session_start();
                    $_SESSION['idRol'] = $usuario->idRol;
                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['nombre'] = $usuario->nombre_usuario. " ". $usuario->apellido_usuario;
                    $_SESSION['correo'] = $usuario->correo;
                    $_SESSION['login'] = true;
 
                    //Redireccionamiento
                    if($usuario->idRol === "1"){
                        
                        header('Location:/principal');
                    }else{
                        header('Location:/principal');
                    }
    
                }

                }else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }

            }

        }
        
        $alertas = Usuario::getAlertas();


        $router->render('auth/login', [
            'auth' => $auth, 
            'alertas' => $alertas
        ]);

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