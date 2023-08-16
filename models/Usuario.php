<?php

namespace Model;

class Usuario extends ActiveRecord{
    //Base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre_usuario',
     'apellido_usuario', 'cedula_usuario', 'idRol', 'token', 'correo', 'password' ];

     public $id;
     public $nombre_usuario;
     public $apellido_usuario;
     public $cedula_usuario;
     public $idRol;
     public $password;
     public $correo;
     public $token;

     public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre_usuario = $args['nombre_usuario'] ?? '';
        $this->apellido_usuario = $args['apellido_usuario'] ?? '';
        $this->cedula_usuario = $args['cedula_usuario'] ?? '';
        $this->idRol = $args['idRol'] ?? null;
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
      if(!$this -> idRol){
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


     public function validarLogin(){
         if(!$this->correo){
            self::$alertas['error'][] = 'No email';
         }
         if(!$this->password){
            self::$alertas['error'][] = 'No password';
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

     public function comprobarPassword($password){
      $resultado = password_verify($password, $this->password);
      if(!$resultado){
            self::$alertas['error'][] = 'Password incorrecto';
      }else{
         return true;
      }
     }



}