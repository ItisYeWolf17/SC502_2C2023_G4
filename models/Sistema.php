<?php

namespace Model;

class Sistema extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'sistemas';
    protected static $columnasDB = ['id', 'nombre_sistema'];

     public $id;
     public $nombre_sistema;
  

     public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre_sistema = $args['nombre_sistema'] ?? '';
     }
}