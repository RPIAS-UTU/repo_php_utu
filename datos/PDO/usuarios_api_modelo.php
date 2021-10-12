<?php
include_once("conexion.php");

class UsuarioAPI extends Conexion
{
    public static function obtenerDatosUsuario($correo){
        $query = "SELECT UsuarioId, Password, Estado FROM usuarios_api WHERE Usuario = '$correo'";
        $datos = parent::obtenerDatos($query);
        if(isset($datos[0]["UsuarioId"])){
            return $datos;
        }else{
            return 0;
        }
    }

    public static function insertarToken($usuarioid){
        $val = true; // se crea para pasar como parametro en la funcion openssl_random... pues no acepta el valor directamente
        $token = bin2hex(openssl_random_pseudo_bytes(16,$val)); 
        $date = date("Y-m-d H:i"); // formato fecha hora del servidor
        $estado = "Activo";
        $query = "INSERT INTO usuarios_token (UsuarioId, Token, Estado, Fecha) VALUES ('$usuarioid', '$token', '$estado', '$date')";
        $verifica = parent::nonQuery($query);
        if($verifica){
            return $token;
        }else{
            return 0;
        }
    }

}