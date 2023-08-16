<?php

namespace Model;

class Fallas extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'fallas';
    protected static $columnasDB = ['id', 'nombre_falla','precio_reparacion', 'iva', 'precio_reparacion_iva', 'idSistemas'  ];

     public $id;
     public $nombre_falla;
     public $precio_reparacion;
     public $iva;
     public $precio_reparacion_iva;
     public $idSistemas;
     public $nombre_sistema;


     public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre_falla = $args['nombre_falla'] ?? '';
        $this->precio_reparacion = $args['precio_reparacion'] ?? '';
        $this->iva = $args['iva'] ?? '';
        $this->precio_reparacion_iva = $args['precio_reparacion_iva'] ?? '';
        $this->idSistemas = $args['idSistemas'] ?? null;
     }

     public function setCostos($valor){
      $this->precio_reparacion_iva = $this->precio_reparacion * ($this->iva / 100 + 1);
      $this->precio_reparacion_iva = round($this->precio_reparacion_iva /5)*5;
     }
     
}