<?php

namespace Controllers;
use Model\Inventario;
use Model\Cliente;

class APIController{
    public static function index(){
        $inventario = Inventario::all();

        echo json_encode($inventario);
    }

    public static function clientes(){
        $clientes = Cliente::all();

        echo json_encode($clientes);
    }

    public static function guardarCliente(){
        $cliente = new Cliente($_POST);

        $resultado = $cliente -> crear();

        echo json_encode($resultado);

    }

    
}