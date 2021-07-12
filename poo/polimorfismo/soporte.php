<?php
include_once("empleado.php");
           // herencia
class Soporte extends Empleado
{
    //Declarar propiedad
    public $asistencias; // integer

    //Declaracion de metodo

    public static function calcularSueldo(){
        return $this->sueldo + ($this->asistencias * 25);
    }

    public function setSueldo($valor){
        $this->sueldo = $valor;
    }
    
}


?>