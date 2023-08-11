<?php
    namespace Model;

    class Vehiculo extends ActiveRecord{

        protected static $tabla = 'Vehiculos';
        protected static $columnasDB = ['id', 'placa_vehiculo', 'marca_vehiculo', 'year_vehiculo', 'idPropietario'];

        public $id;
        public $placa_vehiculo;
        public $marca_vehiculo;
        public $year_vehiculo;
        public $idPropietario;

        public function __construct($args = []){
            $this -> id = $args['id'] ?? null;
            $this -> placa_vehiculo = $args['placa_vehiculo'] ?? null;
            $this -> marca_vehiculo = $args['marca_vehiculo'] ?? null;
            $this -> year_vehiculo = $args['year_vehiculo'] ?? null;
            $this -> idPropietario = $args['idPropietario'] ?? null;
        }

    }