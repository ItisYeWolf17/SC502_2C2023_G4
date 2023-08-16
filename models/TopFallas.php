<?php

namespace Model;

class TopFallas extends ActiveRecord{

    //Conexion a BD
    protected static $tabla = 'fallas';
    protected static $columnasDB = ['id'];
    
    //Variables para Columnas
    public $nombre_falla;
    public $frecuencia;

    //Funcion tipo constructor

    public function __construct($args = []){

        $this -> nombre_falla = $args['nombre_falla'] ?? '';
        $this -> frecuencia = $args['frecuencia'] ?? '';

    }

}