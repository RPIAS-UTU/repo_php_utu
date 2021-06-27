<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso PDO</title>
</head>
<body>
<h2>Ingresando Datos en una Bases de Datos</h2>
<br><br>


<?php


// mysqli              HOST       USER    PASS DB_NAME
$mysqli = new mysqli("localhost", "root", "", "pruebas_2021");

$resultado = $mysqli->query("SELECT '¡Hola, querido usuario de MySQL! estas conectado por mysqli' AS _message FROM DUAL");

$fila = $resultado->fetch_assoc();

echo $fila['_message'];

echo "<br><br>";





// PDO                  HOST              DB_NAME     USER    PASS
$pdo_con = new PDO('mysql:host=localhost;dbname=pruebas_2021', 'root', '');

$sql="INSERT INTO persona (cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nac) 
VALUES (:cedula, :n1, :n2, :a1, :a2, :fn)";

//VALUES (?, ?, ?, ?, ?, ?)";

$sql = $pdo_con->prepare($sql);

$cedula = 19259122;
$primer_nombre = "Franco";
$segundo_nombre = "Joaquín";
$primer_apellido = "Machado";
$segundo_apellido = "Rosales";
$fecha_nacimiento = "20000424"; // año mes dia -  Fecha en formato General 

/*
PDO::PARAM_STR se utiliza para cadenas.
PDO::PARAM_INT se utiliza para enteros.
PDO::PARAM_BOOL solo permite valores booleanos (true/false).
PDO::PARAM_NULL solo permite el tipo de datos NULL.
*/

$sql->bindParam(':cedula', $cedula, PDO::PARAM_INT);

$sql->bindParam(':n1', $primer_nombre, PDO::PARAM_STR, 120);
$sql->bindParam(':n2', $segundo_nombre, PDO::PARAM_STR, 120);
$sql->bindParam(':a1', $primer_apellido, PDO::PARAM_STR, 120);
$sql->bindParam(':a2', $segundo_apellido, PDO::PARAM_STR, 120);
$sql->bindParam(':fn', $fecha_nacimiento, PDO::PARAM_STR, 8);

$sql->execute();

/*
$sql->execute([
    'campo1' => "hola",
    'campo2' => "mundo",
    'campo3' => "cruel",
]);
*/

$ultimo_ID_ingresado = $pdo_con->lastInsertId();

if($ultimo_ID_ingresado > 0){

    echo "<div class='content alert alert-primary' > Datos Agregados Correctamente   </div>";
    

}else{

    echo "<div class='content alert alert-danger'> No se pueden agregar datos.   </div>";
    print_r($sql->errorInfo()); 

}

?>

</body>
</html>

