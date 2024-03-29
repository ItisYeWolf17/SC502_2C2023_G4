<?php

namespace Model;

class Inventario extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre_producto', 'iva_producto', "costo_bruto", 'costo_iva', 'margen_utilidad', 'precio_cliente', 'cantidad'];
    public $id; 
    public $nombre_producto;
    public $iva_producto;
    public $costo_bruto;
    public $costo_iva;
    public $margen_utilidad;
    public $precio_cliente;
    public $cantidad;

    public function __construct($args = []){
        $this-> id = $args['id'] ?? null;
        $this-> nombre_producto = $args['nombre_producto'] ?? '';
        $this-> iva_producto = $args['iva_producto'] ?? null;
        $this-> costo_bruto = $args['costo_bruto'] ?? null;
        $this-> costo_iva = $args['costo_iva'] ?? null;
        $this-> margen_utilidad = $args['margen_utilidad'] ?? null;
        $this-> precio_cliente = $args['precio_cliente'] ?? null;
        $this-> cantidad = $args['cantidad'] ?? null;
    }

    public function setCostos($valor){
        $this->costo_iva = $this->costo_bruto * ($this->iva_this / 100 + 1);
        $this->precio_cliente = $this->costo_iva * ($this->margen_utilidad/100+1) ;
        $this->costo_iva = round($this->costo_iva / 5) * 5;
        $this->precio_cliente = round($this->precio_cliente / 5) * 5;
    }
}