<?php   

// Constantes
const NAME_APP = "MI PRIMER APP en PHP";
const MIN_VALUE = "11111";       
const MAX_VALUE = "999999";  

define('MI_App', "MI PRIMER CONSTANTE - DEFINE");
const MI_APP = "dddddd";
const mi_app = "en minusculas";

echo "<br>";
echo NAME_App;

echo "<br>";
echo MIN_VALUE;

echo "<br>";
echo MAX_VALUE;


echo "<br>";
echo MI_APP;





if(MIN_VALUE == "111111")
    echo "<br>ENTRE EN EL IF";
else if (MIN_VALUE == "2")
    echo "<br>ENTRE EN EL ELSE IF";
else
    echo "<br>ENTRE EN EL ELSE";


    switch (MIN_VALUE) {
        case "0";
            echo "i es igual a 0";
            break;
        case "":
            echo "i es igual a 1";
            break;
        case "":
            echo "i es igual a 2";
            break;
        default :
            echo "";
    }
    




echo "<br>";



$valor = "HOLA";

$valor2 = "MUNDO";

// Concateno variables en PHP
echo $valor . " - " . $valor2;

$v1 = 5;
$v2 = 8;


echo "<br>La suma de estos es : " . ($v1 + $v2);

$var = "<br>Roberto";
$Var = "Juan";

echo "$var - $Var";

echo "<br>";

 // Variables por referencia

 

$nombre = 'Rodrigo';     // 1) c512485b = 'Rodrigo'          
$bar = &$nombre;         // 2) $bar -> c512485b      
$aux = &$bar;            // 3)  $aux -> c512485b 

$aux = " <br> Mi nombre es $bar";  //  c512485b = <br> Mi nombre es $bar

echo "<br>". $bar;
echo "<br>". $nombre;
echo "<br>". $aux;

echo "<br>";


 







