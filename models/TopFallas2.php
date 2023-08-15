<?php

namespace Model;

class TopFallas2 extends ActiveRecord{

    //Conexion a BD
    protected static $tabla = 'fallas';
    protected static $columnasDB = ['id'];
    
    //Variables para Columnas
    public $nombre_sistema;
    public $frecuencia;

    //Funcion tipo constructor

    public function __construct($args = []){

        $this -> nombre_sistema = $args['nombre_sistema'] ?? '';
        $this -> frecuencia = $args['frecuencia'] ?? '';

    }

}