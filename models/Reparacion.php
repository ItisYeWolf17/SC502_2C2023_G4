<?php

namespace Model;

class Reparacion extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'vehiculos_fallas';
    protected static $columnasDB = ['id', 'idFallas','idVehiculos' ];

     public $id;
     public $idFallas;
     public $idVehiculos;



     public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->idFallas = $args['idFallas'] ?? null;
        $this->idVehiculos = $args['idVehiculos'] ?? null;

     }
}