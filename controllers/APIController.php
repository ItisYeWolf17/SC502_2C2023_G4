<?php

namespace Controllers;
use Model\Inventario;

class APIController{
    public static function index(){
        $inventario = Inventario::all();

        echo json_encode($inventario);
    }
}