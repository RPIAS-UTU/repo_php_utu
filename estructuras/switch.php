<?php

$i = 3;

echo "<br>";
switch ($i) {
    case 0:
        echo "i es igual a 0";
        break;
    case 1:
        echo "i es igual a 1";
        break;
    case 2:
        echo "i es igual a 2";
        break;
    default:
        echo "Ninguno de los anteriores";
        break;
}

echo "<br> ============================================";
echo "<br>  NOTA INGRESADA : " . $i;
echo "<br> ============================================";
switch ($i) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
        echo "<br> Insuficiente";
        break;
    case 7:
    case 8:
    case 9:
        echo "<br> Suficiente";
        break;
    default:
        echo "<br> Nota mal ingresada";
        break;
}
