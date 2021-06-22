<?php
class Administrativo extends Empleado implements iEmpleado
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


    



}


?>
