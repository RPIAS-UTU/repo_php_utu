<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctico 1</title>
</head>
<body>
<h2>Conectando Bases de Datos</h2>
<br><br>


<?php


// mysqli              HOST       USER    PASS DB_NAME
$mysqli = new mysqli("localhost", "root", "", "pruebas_2021");

$resultado = $mysqli->query("SELECT '¡Hola, querido usuario de MySQL! estas conectado por mysqli' AS _message FROM DUAL");

$fila = $resultado->fetch_assoc();

echo $fila['_message'];

echo "<br><br>";


// PDO                  HOST              DB_NAME     USER    PASS
$pdo = new PDO('mysql:host=localhost;dbname=pruebas_2021', 'root', '');

$sentencia = $pdo->query("SELECT '¡Hola, querido usuario de MySQL! estas conectado por PDO' AS _message FROM DUAL");

$fila = $sentencia->fetch(PDO::FETCH_ASSOC);

echo htmlentities($fila['_message']);

echo "<br><br>";


// OBSOLETO llego hasta 5.5
//  $con = mysql_connect("localhost", "root", "");
//  mysql_select_db("sigecs");
//  $resultado = mysql_query("SELECT '¡Hola, querido usuario de MySQL!' AS _message FROM DUAL");
//  $fila = mysql_fetch_assoc($resultado);
//  echo htmlentities($fila['_message']);



?>

</body>
</html>