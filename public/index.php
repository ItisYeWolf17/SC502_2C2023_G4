<?php

require_once __DIR__ . '/../includes/app.php';

use Controller\LoginController;
use MVC\Router;
$router = new Router();

//Iniciar Sesion 
$router ->get('/', [LoginController::class, 'login' ]);

$router -> comprobarRutas();