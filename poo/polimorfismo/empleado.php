<?php
abstract class  Empleado 
{
    //Declarar propiedad
    protected $sueldo;

    function __construct($sueldo)
    {
        $this->sueldo = $sueldo;
    }

    //Declaracion de metodo

    public function calcularSueldo(){
        
       return $this->sueldo = $this->sueldo * 1.3;
    }
    
}


?>
