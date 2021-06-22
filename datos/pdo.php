<?php

const USER = "root";
const PASS = "";
const DB = "pruebas_2021";
const HOST = "localhost";
const DSN = "mysql:host=" . HOST . ";dbname=" . DB;

try {

    $obj_conexion = new PDO(DSN, USER, PASS);

    if (!$obj_conexion) {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    } else {
        echo "<h3>Conexion Exitosa PHP - MySQL - PDO </h3><hr><br>";

        /* ejemplo de una consulta */

        $consulta = "SELECT * FROM persona";
        $resultado = $obj_conexion->query($consulta);

        if ($resultado->fetchColumn() > 0) {
            echo "<table border='1' align='center'>
                <tr bgcolor='#E6E6E6'>
                    <th>Cédula</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                </tr>";

            foreach ($resultado as $fila) {

                echo "<tr>
                <td>" . $fila["cedula"] . "</td>";
                echo "<td>" . $fila["primer_nombre"] . "</td>";
                echo "<td>" . $fila["segundo_nombre"] . "</td>";
                echo "<td>" . $fila["primer_apellido"] . "</td>";
                echo "<td>" . $fila["segundo_apellido"] . "</td></tr>";
            }
            
        } else {
            echo "No hay Registros";
        }
    }
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
