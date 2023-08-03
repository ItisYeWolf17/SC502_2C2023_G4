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

    public static function agregarCliente(){
        $conn = include_once "./includes/database.php";

        $nombre = $_POST["nombre_propietario"];
        $apellido = $_POST["apellido_propietario"];
        $cedula = $_POST["cedula_propietario"];

        $st = $conn->prepare("INSERT INTO propietarios(nombre_propietario,apellido_propietario,cedula_propietario)
        VALUES
        (?,?,?)");

        $st->bind_param("sss", $nombre, $apellido, $cedula);
        $st->execute();
        header("Location: clientes.php");
        exit();
    }
}