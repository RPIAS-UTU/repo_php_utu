<?php
class Administrativo extends Empleado implements iEmpleado
{
    //Declarar propiedad
    private $antiguedad;

    //Constructor
    function __construct($sueldo, $antiguedad)
    {
       parent::__construct($sueldo);
       $this->horas_trabajadas = $antiguedad;
       
    }

    // Polimorfismo
    public function calcularSueldo(){
       return parent::$sueldo + ($this->antiguedad * 540);
    }

    // Implementacion de IEmpleado1
    public function calcularSueldo1(){
        return 320;
     }


    



}


?>
