<?php
class Transporte 
{
    //Declarar propiedad
    private $largo = 'algo';
    private $ancho;
    private $peso;
    private $color;
    private $capacidad_de_carga;
    private $tipo_carga;
    private $combustible;
    private $recorrido;
    private $medio;
    private $tipo;
    private $motor;
    private $hp;
    private $velocidad_max;
    //Declaracion de metodo

    public function mostrarFunction(){
        echo $this->largo;
    }
    
}
$mostrar = new Transporte();
$mostrar->mostrarFunction();
?>
