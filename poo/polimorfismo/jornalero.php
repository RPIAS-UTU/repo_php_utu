<?php
class Jornalero extends Empleado implements iEmpleado, iEmpleado2 
{
    //Declarar propiedad
    private $horas_trabajadas;

    // Constructor

    function __construct($sueldo, $horas_trabajadas)
    {
       parent::__construct($sueldo);
       $this->horas_trabajadas = $horas_trabajadas;

    }


    // Polimorfismo
    public function calcularSueldo(){
       return parent::$sueldo + 
       ($this->horas_trabajadas * 1.1);
    }

    // Implementacion de IEmpleado1
    public function calcularSueldo1(){
        return 320;
     }

      // Implementacion de IEmpleado2
     public function calcularSueldo2(){
        return 21;
     }


    



}


?>
