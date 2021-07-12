<?php

include_once("conexion.php");

class controller_pdo
{

    public static function ListarPersonas(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {
                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<h3>Conexion Exitosa PHP - MySQL - PDO </h3><hr><br>";
        
                /* ejemplo de una consulta */
        
                $consulta = "SELECT * FROM persona";
                $resultado = $con->query($consulta);
        
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

    }
  
}

