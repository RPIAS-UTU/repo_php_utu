<?php

const USER = "root";
const PASS = "";
const DB = "sigecs";
const HOST = "localhost";

$obj_conexion = mysqli_connect(HOST, USER, PASS, DB);

if (!$obj_conexion) {
  echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
} else {
  echo "<h3>Conexion Exitosa PHP - MySQL - MySQLi</h3><hr><br>";


  /* ejemplo de una consulta */
  $cedula = 19245912;

  //$var_consulta = 'SELECT * FROM personas WHERE cedula = ' . $cedula;

  $var_consulta = 'SELECT * FROM personas';

  $var_resultado = $obj_conexion->query($var_consulta);

  // numero de filas devuelta por la consulta
  if ($var_resultado->num_rows > 0) {

    echo "<table border='1' align='center'>
   <tr bgcolor='#E6E6E6'>
      <th>Cédula</th>
      <th>Primer Nombre</th>
      <th>Segundo Nombre</th>
      <th>Primer Apellido</th>
      <th>Segundo Apellido</th>
  </tr>";

    // por cada pasada se guarda un registro en $var_fila
    while ($var_fila = $var_resultado->fetch_array()) {

      // descomponer en columnas
      //inicio fila
      echo "<tr> ";
      // col 1
      echo "<td>" . $var_fila["cedula"] . "</td>";
      // col 2
      echo "<td>" . $var_fila["primer_nombre"] . "</td>";
      // col ... n
      echo "<td>" . $var_fila["segundo_nombre"] . "</td>";
      echo "<td>" . $var_fila["primer_apellido"] . "</td>";
      echo "<td>" . $var_fila["segundo_apellido"] . "</td>";
      //fin fila
      echo "</tr>";
    }
  } else {
    echo "No hay Registros";
  }
}




