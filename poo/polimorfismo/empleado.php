<?php
class Empleado 
{
    //Declarar propiedad
    protected $sueldo;

    //Declaracion de metodo

    public function calcularSueldo(){
        
       return $this->sueldo = $this->sueldo * 1.3;
    }
    
}


?>
