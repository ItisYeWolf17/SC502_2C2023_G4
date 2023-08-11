<?php

namespace Controllers;
use Model\Inventario;
use Model\Cliente;
use Model\Vehiculo;

class APIController{
    public static function inventario(){
        $inventario = Inventario::all();

        echo json_encode($inventario);
    }

    public static function clientes(){
        $clientes = Cliente::all();

        echo json_encode($clientes);
    }

    public static function vehiculos(){
        $vehiculos = Vehiculo::all();

        echo json_encode($vehiculos);
    }

    public static function guardarCliente(){
        $cliente = new Cliente($_POST);

        $resultado = $cliente -> crear();

        echo json_encode($resultado);

    }

    public static function guardarVehiculo(){
        $vehiculo = new Vehiculo($_POST);

        $resultado = $vehiculo -> crear();

        echo json_encode($resultado);

    }

    
    public static function guardarProducto(){
        $producto = new Inventario($_POST);
        $resultado = $producto -> crear();
        echo json_encode($resultado);

    }

    public static function eliminarProducto(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $producto = Inventario::find($_POST['id']);
            $producto->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
        $producto = new Inventario($_POST);
        $resultado = $producto -> eliminar();
        echo json_encode($resultado);
    }

    
}