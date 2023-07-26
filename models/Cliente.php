<?php

namespace Model;

class Cliente extends ActiveRecord{

    //Conexion a BD
    protected static $tabla = 'propietarios';
    protected static $columnas = ['id_propietario', 'nombre_propietario', 'apellido_propietario', 'cedula_propietario'];
    
    //Variables para Columnas
    public $id_cliente;
    public $nombre;
    public $apellido;
    public $cedula;

    //Funcion tipo constructor

    public function __construct($args = []){

        $this -> id_cliente = $args['id_propietario'] ?? null;
        $this -> nombre = $args['nombre_propietario'] ?? null;
        $this -> apellido = $args['apellido_propietario'] ?? null;
        $this -> cedula = $args['cedula_propietario'] ?? null;

    }

}