<?php

namespace Model;

class Roles extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'roles';
    protected static $columnasDB = ['id_rol', 'rol_descripcion'];

     public $id_rol;
     public $rol_descripcion;
  

     public function __construct($args = []){
        $this->id_rol = $args['id_rol'] ?? null;
        $this->rol_descripcion = $args['rol_descripcion'] ?? '';
     }
}