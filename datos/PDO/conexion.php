<?php

class Conexion extends PDO
{

   // Ver configuracion de un contenedor
   // docker inspect <name-of-container-with-mariadb> | grep IPAdress
   // IP del contenedor mySQL 172.18.0.2

   private $con;
   private const USER = "root";
   private const PASS = "root";
   private const DB = "pruebas_2021";
   private const PORT = "3306";
   private const HOST = "172.22.0.2" . ";port=" . self::PORT;
   private const DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DB;

   public function __CONSTRUCT()
   {
      try {
         if (isset($_SESSION['user_db']))
            parent::__CONSTRUCT(self::DSN, $_SESSION['user_db'], $_SESSION['pass_db'], 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
         else
            parent::__CONSTRUCT(self::DSN, self::USER, self::PASS, 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

      } catch (PDOException $e) {
         throw new Exception('Falló la conexión con la DB: ' . $e->getMessage());
         // echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         // exit;
      }
   }

   // Otra opciòn para devolver la conecciòn
   public static function getConexion($user_db, $pass_db)
   {
      $obj_conexion = null;
      try {
         if ($user_db) {
            $obj_conexion = new PDO(self::DSN, $user_db, $pass_db);
         } else {
           
           $obj_conexion = new PDO(self::DSN, self::USER, self::PASS, 
           array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            
         }

         return  $obj_conexion;
      } catch (PDOException $e) {
         throw new Exception('Falló la conexión con la DB: ' . $e->getMessage());
         // echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         // exit;
      }
   }


   private function conectar()
   {
      try {
         $this->con = new PDO(self::DSN, self::USER, self::PASS, 
         array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
      } catch (PDOException $e) {
         throw new Exception('Falló la conexión con la DB: ' . $e->getMessage());
         // echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         // exit;
      }
   }

   private function convertirUTF8($array)
   {
      array_walk_recursive($array, function (&$item, $key) {
         if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
         }
      });
      return $array;
   }

   // OBTENER DATOS
   public function obtenerDatos($sqlstr)
   {
      $this->conectar();
      $results = $this->con->query($sqlstr);
      $resultArray = array();
      foreach ($results as $key) {
         $resultArray[] = $key;
      }
      return $this->convertirUTF8($resultArray);
   }


   // MODIFICAR
   public function nonQuery($sqlstr)
   {
      $this->conectar();
      $results = $this->con->query($sqlstr);
      return $this->con->affected_rows;
   }


   //INSERTAR 
   public function nonQueryId($sqlstr)
   {
      $this->conectar();
      $results = $this->con->query($sqlstr);
      $filas = $this->con->affected_rows;
      if ($filas >= 1) {
         return $this->con->insert_id;
      } else {
         return 0;
      }
   }

  
 //encriptar

 protected function encriptar($string)
 {
    return md5($string);
 }



}
