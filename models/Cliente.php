<?php

namespace Model;

class Cliente extends ActiveRecord{

    //Conexion a BD
    protected static $tabla = 'propietarios';
    protected static $columnas = ['id_propietario', 'nombre_propietario', 'apellido_propietario', 'cedula_propietario'];
    
    //Variables para Columnas
    public $id_propietario;
    public $nombre_propietario;
    public $apellido_propietario;
    public $cedula_propietario;

    //Funcion tipo constructor

    public function __construct($args = []){

        $this -> id_propietario = $args['id_propietario'] ?? null;
        $this -> nombre_propietario = $args['nombre_propietario'] ?? null;
        $this -> apellido_propietario = $args['apellido_propietario'] ?? null;
        $this -> cedula_propietario = $args['cedula_propietario'] ?? null;

    }

}