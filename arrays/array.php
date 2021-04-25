<?php

$planetas = array();

$planetas[] = 'Marte';
$planetas[] = 'Tierra';
$planetas[] = 'Venus';

// provocar error de unset
// la única posibilidad seria eliminar el último elemento
unset($planetas[0]);

for($i=0;$i < count($planetas); $i++){
    echo "<br>" . $planetas[$i];
}

