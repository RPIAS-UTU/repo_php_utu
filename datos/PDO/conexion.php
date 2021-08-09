<?php

class Conexion extends PDO
{
 private const USER = "root";
 private const PASS = "root";
 private const DB = "pruebas_2021";
 private const HOST = "localhost:3309";
 private const DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8";
  
 public function __CONSTRUCT() {

    try{
       parent::__CONSTRUCT(self::DSN, self::USER, self::PASS);
    }catch(PDOException $e){
       echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
       exit;
    }
 } 

    public static function getConexion(){

        return  $obj_conexion = new PDO(self::DSN, self::USER, self::PASS);

    }
}