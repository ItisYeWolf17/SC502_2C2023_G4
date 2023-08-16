<?php

namespace Model;

class Roles extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'roles';
    protected static $columnasDB = ['idRol', 'rol_descripcion'];

     public $id_rol;
     public $rol_descripcion;
  

     public function __construct($args = []){
        $this->id_rol = $args['idRol'] ?? null;
        $this->rol_descripcion = $args['rol_descripcion'] ?? '';
     }
}