<?php

$planetas = array();

$planetas[] = 'Marte';
$planetas[] = 'Tierra';
$planetas[] = 'Venus';
unset($planetas[1]);

for($i=0;$i < count($planetas); $i++){
    echo "<br>" . $planetas[$i];
}