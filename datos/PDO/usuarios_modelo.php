<?php
include_once("conexion.php");

class Usuario extends Conexion
{

    private $conexion;

    private $usuario;
    private $password;
    private $habilitado;
    
    public function __construct()
    {
        $this->conexion = new Conexion();
    }


    public function getUsuarioLogin($login, $pass)
    {
        $resultado = null;
        try {

            $con = new Conexion();
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$login' AND pass='$pass'";
            $resultado = $con->query($consulta)->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $resultado;
    }



    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of habilitado
     */ 
    public function getHabilitado()
    {
        return $this->habilitado;
    }

    /**
     * Set the value of habilitado
     *
     * @return  self
     */ 
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }
}