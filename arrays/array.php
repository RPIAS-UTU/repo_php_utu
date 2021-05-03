<?php

// Declararlo de esta forma
//$planetas = array();

// o de esta otra forma
$planetas[] = 'Marte';  // 0
$planetas[] = 'Tierra'; //  1
$planetas[] = 'Venus'; // 2
$planetas[] = 'Saturno'; // 3
$planetas[] = 'Urano'; // 4
$planetas[] = 'Neptuo'; // 5

 var_dump($planetas);
 echo "<br><br>";
// print_r($planetas);

// echo "<br><br>";

// for($i=0; $i < count($planetas); $i++){

//     echo "<br>" . $planetas[$i]; 
// }

// otra manera, agregar mas valores
array_push($planetas, 'Mercurio', 'Jupiter');

var_dump($planetas);
echo "<br><br>";

// echo "<br>" . $planetas[5]; // Neptuno

// provocar error de unset
// la única posibilidad seria eliminar el último elemento
unset($planetas[3]);
echo "<br>";
echo "<SELECT>";

foreach ($planetas as $p){
    echo "<OPTION>" . $p . "</OPTION>";
}

echo "</SELECT>";
// $planetas[3] = "";

// for($i=0; $i < count($planetas); $i++){
   
//      echo "<br>" . $planetas[$i]; 
// }
 

//$planetas[4] = 'LUNA';


// $planetas[] = 'MAS ALLA'; // 6


// echo "<br>==============================================";


$datos = [
    ["nombre" => "pepe", "edad" => 25, "peso" => 80], // indice [0]
    ["nombre" => "juan", "edad" => 22, "peso" => 75] // indice [1]
    ];

// como imprimir en pantalla los valores del array multidimensional
echo "<p>" . $datos[0]["nombre"] . " tiene " . $datos[0]["edad"] . " años</p>\n";



 

