<?php

namespace Controllers;

use Model\Fallas;
use Model\Inventario;
use Model\Cliente;
use Model\Sistema;
use Model\Usuario;
use Model\Vehiculo;
use Model\Reparacion;



class APIController
{


    public static function inventario()
    {
        $inventario = Inventario::all();

        echo json_encode($inventario);
    }

    public static function sistemas()
    {
        $sistemas = Sistema::all();
        echo json_encode($sistemas);
    }

    public static function fallas()
    {
        $consulta = "SELECT a.id, a.nombre_falla, a.precio_reparacion, a.iva, a.precio_reparacion_iva, a.idSistemas, b.nombre_sistema
        FROM Fallas a 
        INNER JOIN Sistemas b
        ON a.idSistemas = b.id;";

        $fallas = Fallas::SQL($consulta);
        echo json_encode($fallas);
    }

    public static function reparaciones()
    {
        $inventario = Reparacion::all();

        echo json_encode($inventario);
    }

    public static function clientes()
    {
        $clientes = Cliente::all();

        echo json_encode($clientes);
    }

    public static function vehiculos()
    {

        $consulta = "SELECT A.id, A.placa_vehiculo, A.marca_vehiculo, A.year_vehiculo, A.idPropietario, CONCAT(B.nombre_propietario, ' ', B.apellido_propietario) AS 'propietario' FROM vehiculos A INNER JOIN propietarios b  WHERE a.idPropietario = b.id;";
        $vehiculos = Vehiculo::SQL($consulta);

        echo json_encode($vehiculos);

    }

    public static function usuarios()
    {
        $usuarios = Usuario::all();
        echo json_encode($usuarios);
    }

    public static function guardarCliente()
    {
        $cliente = new Cliente($_POST);

        $resultado = $cliente->crear();

        echo json_encode($resultado);

    }

    public static function guardarVehiculo()
    {
        $vehiculo = new Vehiculo($_POST);

        $resultado = $vehiculo->crear();

        echo json_encode($resultado);

    }


    public static function guardarProducto()
    {
        $producto = new Inventario($_POST);
        $resultado = $producto->crear();
        echo json_encode($resultado);

    }

    public static function eliminarProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $producto = Inventario::find($_POST['id']);
            $producto->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $producto = new Inventario($_POST);
        $resultado = $producto->eliminar();
        echo json_encode($resultado);
    }


    public static function eliminarCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cliente = Cliente::find($_POST['id']);
            $cliente->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $cliente = new Cliente($_POST);
        $resultado = $cliente->eliminar();
        echo json_encode($resultado);
    }

    public static function eliminarVehiculo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vehiculo = Vehiculo::find($_POST['id']);
            $vehiculo->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $resultado = $vehiculo->eliminar();
        echo json_encode($resultado);
    }

    public static function eliminarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = Usuario::find($_POST['id']);
            $usuario->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $resultado = $usuario->eliminar();
        echo json_encode($resultado);
    }

    public static function eliminarFalla()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $falla = Fallas::find($_POST['id']);
            $falla->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $resultado = $falla->eliminar();
        echo json_encode($resultado);
    }



    public static function eliminarSistema()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $sistema = Sistema::find($_POST['id']);
            $sistema->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $resultado = $sistema->eliminar();
        echo json_encode($resultado);
    }

    public static function eliminarReparacion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $sistema = Reparacion::find($_POST['id']);
            $sistema->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $resultado = $sistema->eliminar();
        echo json_encode($resultado);
    }


 


}