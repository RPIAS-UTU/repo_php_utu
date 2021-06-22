<?php
class Jornalero extends Empleado implements iEmpleado, iEmpleado2 
{
    //Declarar propiedad
    private $horas_trabajadas;

    //Declaracion de metodo


    // Polimorfismo
    public function calcularSueldo(){
       $this->horas_trabajadas * 540;
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
