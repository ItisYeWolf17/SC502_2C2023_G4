<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\InventarioController;
use Controllers\LoginController;
use Controllers\ClienteController;
use MVC\Router;
$router = new Router();


//Ruta principal 
$router ->get('/', [LoginController::class, 'indexIni']);
//Iniciar Sesion 
$router ->get('/login', [LoginController::class, 'login' ]);
$router ->post('/login', [LoginController::class, 'login' ]);
$router ->get('/logout', [LoginController::class, 'logout' ]);

//Recuperar password 
$router ->get('/olvide', [LoginController::class, 'olvide' ]);
$router ->post('/olvide', [LoginController::class, 'olvide' ]);


//Crear Cuenta
$router ->get('/crear', [LoginController::class, 'crear' ]);
$router ->post('/crear', [LoginController::class, 'crear' ]);

//Confirmar cuenta 
$router ->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router ->get('/mensaje', [LoginController::class, 'mensaje']);

//Dashboard 
$router ->get("/principal", [LoginController::class, 'principal']);


//Restringido 
$router->get("/inventario", [InventarioController::class, 'inventario']);

//Api de inventario 
$router->get('/api/inventario', [APIController::class, 'index']);

//Cliente
$router->get("/clientes", [ClienteController::class,'clientes']);

$router->post('/crear-cliente', [ClienteController::class, 'crear']);

$router->get('/api/clientes', [APIController::class, 'clientes']);




$router -> comprobarRutas();

