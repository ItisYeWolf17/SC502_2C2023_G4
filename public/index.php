<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\InventarioController;
use Controllers\LoginController;
use Controllers\ClienteController;
use Controllers\VehiculoController;
use Model\Usuario;
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

$router->get("/usuarios", [LoginController::class,'usuarios']);
$router->get('/api/usuarios', [APIController::class, 'usuarios']);
$router->post('/api/eliminarUsuario', [APIController::class, 'eliminarUsuario']);

$router->get('/updateUser', [LoginController::class, 'updateUser']);
$router->post('/updateUser', [LoginController::class, 'updateUser']);

//Crear Cuenta
$router ->get('/crear', [LoginController::class, 'crear' ]);
$router ->post('/crear', [LoginController::class, 'crear' ]);

//Confirmar cuenta 
$router ->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router ->get('/mensaje', [LoginController::class, 'mensaje']);

//Dashboard 
$router ->get("/principal", [LoginController::class, 'principal']);

//Inventario
$router->get("/inventario", [InventarioController::class, 'inventario']);
$router->get("/addProducto", [InventarioController::class, 'addProducto']);
$router->post("/crear-producto", [InventarioController::class, 'crear']);
$router->post("/reporte-inventario", [InventarioController::class, 'generarReporte']);

$router->get('/api/inventario', [APIController::class, 'inventario']);
$router->post('/api/eliminarProducto', [APIController::class, 'eliminarProducto']);

$router->get('/updateInventory', [InventarioController::class, 'updateInventory']);
$router->post('/updateInventory', [InventarioController::class, 'updateInventory']);


//Cliente
$router->get("/clientes", [ClienteController::class,'clientes']);
$router->get("/addCliente", [ClienteController::class,'addCliente']);
$router->post('/crear-cliente', [ClienteController::class, 'crear']);
$router->post('/reporte-clientes', [ClienteController::class, 'generarReporte']);
$router->get('/api/clientes', [APIController::class, 'clientes']);

$router->get('/updateClient', [ClienteController::class, 'updateClient']);
$router->post('/updateClient', [ClienteController::class, 'updateClient']);
$router->post('/api/eliminarCliente', [APIController::class, 'eliminarCliente']);


//Vehiculo
$router ->get('/vehiculos', [VehiculoController::class, 'vehiculos']);
$router->get('/addVehiculo', [VehiculoController::class, 'addVehiculo']);
$router->post('/crear-vehiculo', [VehiculoController::class, 'crear']);
$router -> post('/reporte-vehiculos', [VehiculoController::class, 'generarReporte']);
$router->get('/api/vehiculos', [APIController::class, 'vehiculos']);

$router->get('/updateVehicle', [VehiculoController::class, 'updateVehicle']);
$router->post('/updateVehicle', [VehiculoController::class, 'updateVehicle']);
$router->post('/api/eliminar', [APIController::class, 'eliminarVehiculo']);




$router -> comprobarRutas();

