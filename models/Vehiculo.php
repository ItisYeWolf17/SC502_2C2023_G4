<?php
    namespace Model;

    class Vehiculo extends ActiveRecord{

        protected static $tabla = 'Vehiculos';
        protected static $columnasDB = ['id_vehiculo', 'placa_vehiculo', 'marca_vehiculo', 'year_vehiculo', 'Propietarios_id_propietario'];

        public $id_vehiculo;
        public $placa_vehiculo;
        public $marca_vehiculo;
        public $year_vehiculo;
        public $Propietarios_id_propietario;

        public function __construct($args = []){
            $this -> id_vehiculo = $args['id_vehiculo'] ?? null;
            $this -> placa_vehiculo = $args['placa_vehiculo'] ?? null;
            $this -> marca_vehiculo = $args['marca_vehiculo'] ?? null;
            $this -> year_vehiculo = $args['year_vehiculo'] ?? null;
            $this -> Propietarios_id_propietario = $args['Propietarios_id_propietario'] ?? null;
        }

    }