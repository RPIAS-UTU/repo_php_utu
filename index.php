<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    
<h1>Bienvenido al Sitio </h1>

<p>
<h1>Fecha de Hoy </h1>

<!-- 
https://www.php.net/manual/es/function.getdate.php 
https://unipython.com/obtener-la-fecha-actual-con-php/
-->

<?php
$hoy = getdate();
print_r($hoy);

//Establecer la información local en castellano de España
setlocale(LC_TIME,"es_ES");

 // Obteniendo la fecha actual del sistema con PHP
 $fechaActual = date('d-m-Y');
 echo "<br><br>";
 echo $fechaActual;
 $fechaActual = date('d/m/Y');
 echo "<br><br>";
 echo $fechaActual;





?>
</p>

</body>
</html>

