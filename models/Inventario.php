<?php

namespace Model;

class Inventario extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id_producto', 'nombre_producto', 'iva_producto', "costo_bruto", 'costo_iva', 'margen_utilidad', 'precio_cliente', 'cantidad'];
    public $id_producto; 
    public $nombre_producto;
    public $iva_producto;
    public $costo_bruto;
    public $costo_iva;
    public $margen_utilidad;
    public $precio_cliente;
    public $cantidad;

    public function __construct($args = []){
        $this-> id_producto = $args['id_producto'] ?? null;
        $this-> nombre_producto = $args['nombre_producto'] ?? '';
        $this-> iva_producto = $args['iva_producto'] ?? null;
        $this-> costo_bruto = $args['costo_bruto'] ?? null;
        $this-> costo_iva = $args['costo_iva'] ?? null;
        $this-> margen_utilidad = $args['margen_utilidad'] ?? null;
        $this-> precio_cliente = $args['precio_cliente'] ?? null;
        $this-> cantidad = $args['cantidad'] ?? null;

    }
}