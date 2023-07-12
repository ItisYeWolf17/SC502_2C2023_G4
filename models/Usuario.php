<?php

namespace Model;

class Usuario extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id_usuario', 'nombre_usuario',
     'apellido_usuario', 'cedula_usuario', 'roles_id_rol', 'password','correo', 'token'];

     public $id_usuario;
     public $nombre_usuario;
     public $apellido_usuario;
     public $cedula_usuario;
     public $roles_id_rol;
     public $password;
     public $correo;
     public $token;

     public function __construct($args = []){
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->nombre_usuario = $args['nombre_usuario'] ?? '';
        $this->apellido_usuario = $args['apellido_usuario'] ?? '';
        $this->cedula_usuario = $args['cedula_usuario'] ?? '';
        $this->roles_id_rol = $args['roles_id_rol'] ?? 0;
        $this->password = $args['password'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->token = $args['token'] ?? null;
     }

     public function validarNuevaCuenta(){
      if(!$this -> nombre_usuario){
         self::$alertas['error'][] = 'El nombre del usuario es obligatorio';
      }
      if(!$this -> apellido_usuario){
         self::$alertas['error'][] = 'El apellido del usuario es obligatorio';
      }
      if(!$this -> cedula_usuario){
         self::$alertas['error'][] = 'La cedula del usuario es obligatorio';
      }
      if(!$this -> roles_id_rol){
         self::$alertas['error'][] = 'El rol del usuario es obligatorio';
      }
      if(!$this -> password){
         self::$alertas['error'][] = 'La clave del usuario es obligatorio';
      }
      if(strlen($this->password) < 8 ){
         self::$alertas['error'][] = 'La clave debe de contener al menos 8 caracteres';
      }
      if(!preg_match('/[A-Z]/', $this->password)){
         self::$alertas['error'][] = 'La clave debe de contener al menos 1 mayuscula';
      }
      if(!$this -> correo){
         self::$alertas['error'][] = 'El correo del usuario es obligatorio';
      }
      return self::$alertas;
     }

     //Revisa si el usuario ya existe
     public function existeUsuario(){
      $query = "SELECT * FROM " .self::$tabla. " WHERE correo = '" .$this->correo. "' LIMIT 1"; 
      $resultado = self::$db -> query($query);

      if($resultado-> num_rows){
         self::$alertas['error'][] = 'El usuario ya esta registrado';
      }
      return $resultado;

     }

     public function hashPassword(){
      $this->password = password_hash($this -> password,PASSWORD_BCRYPT );
     }

     public function crearToken(){
      $this-> token = uniqid();
     }




}