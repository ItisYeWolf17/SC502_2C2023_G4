<?php

namespace Model;

class Cliente extends ActiveRecord{

    //Conexion a BD
    protected static $tabla = 'propietarios';
    protected static $columnasDB = ['id', 'nombre_propietario', 'apellido_propietario', 'cedula_propietario'];
    
    //Variables para Columnas
    public $id;
    public $nombre_propietario;
    public $apellido_propietario;
    public $cedula_propietario;

    //Funcion tipo constructor

    public function __construct($args = []){

        $this -> id = $args['id'] ?? null;
        $this -> nombre_propietario = $args['nombre_propietario'] ?? '';
        $this -> apellido_propietario = $args['apellido_propietario'] ?? '';
        $this -> cedula_propietario = $args['cedula_propietario'] ?? '';

    }

}