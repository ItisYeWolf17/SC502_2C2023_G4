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
            $this -> placa_vehiculo = $args['placa_vehiculo'] ?? '';
            $this -> marca_vehiculo = $args['marca_vehiculo'] ?? '';
            $this -> year_vehiculo = $args['year_vehiculo'] ?? '';
            $this -> idPropietario = $args['idPropietario'] ?? '';
        }

    }