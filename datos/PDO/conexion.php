<?php

class Conexion extends PDO
{
   private const USER = "root";
   private const PASS = "";
   private const DB = "pruebas_2021";
   private const PORT = "3306";
   private const HOST = "localhost" . ":" . self::PORT;
   private const DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8";

   public function __CONSTRUCT()
   {
      try {
         if (isset($_SESSION['user_db']))
         parent::__CONSTRUCT(self::DSN, $_SESSION['user_db'], $_SESSION['pass_db']);
         else
         parent::__CONSTRUCT(self::DSN, self::USER, self::PASS);
           
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
            $obj_conexion = new PDO(self::DSN, self::USER, self::PASS);
         }

         return  $obj_conexion;
      } catch (PDOException $e) {
         throw new Exception('Falló la conexión con la DB: ' . $e->getMessage());
         // echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         // exit;
      }
   }
}
