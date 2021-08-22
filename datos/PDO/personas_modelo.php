<?php
include_once("conexion.php");

class Personas_Model extends Conexion
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }
    
    public static function Listar_Personas_Ajax(){
        $resultado = null;
        try {
            
            $con = new Conexion();
            $consulta = "SELECT id_persona, cedula, primer_nombre, 
            segundo_nombre, primer_apellido, segundo_apellido, fecha_nac FROM persona";
            $resultado = $con->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $resultado;
    }


    public static function Listar_Persona_Por_Cedula_Ajax($id_persona){
        $resultado = null;
        try {
            
            $con = new Conexion();
            $consulta = "SELECT * FROM persona WHERE id_persona = '$id_persona'";
            $resultado = $con->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $resultado;
    }

    public static function Listar_Personas(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {
                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<br>==========================================================================";
                echo "<h3> Ejecución de Consulta SQL para obtener datos </h3><hr><br>";
                echo "<br>==========================================================================";
                
        
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
    
    public static function Listar_Personas_SP(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {

                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<br>==========================================================================";
                echo "<h3> Ejecución de un Procedimiento Almacenado para obtener datos </h3><hr><br>";
                echo "<br>==========================================================================";
                
        
                /* ejemplo de una consulta */
        
                $consulta = "CALL sp_obtener_personas()";
                $resultado = $con->query($consulta);
        
                if ($resultado->fetchColumn() > 0) {
                    echo "<table border='1' align='center'>
                        <tr bgcolor='#E6E6E6'>
                            <th>Cédula</th>
                            <th>Nombre Completo</th>
                        </tr>";
        
                    foreach ($resultado as $fila) {
        
                        echo "<tr>
                        <td>" . $fila["cedula"] . "</td>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                    }
                    
                } else {
                    echo "No hay Registros";
                }
            }
            
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

        echo "<br>===============================================================";
        echo "<br>===============================================================";

    }

    public static function Agregar_Persona_SP($cedula, $n1, $n2, $a1, $a2, $fnac)
    {
        try {
            $con = new Conexion();
            $sql = "CALL sp_agregar_persona(?,?,?,?,?,?,?)";
            $insert =  $con->prepare($sql);
            $insert->bindParam(1, $cedula, PDO::PARAM_INT); 
            $insert->bindParam(2, $n1, PDO::PARAM_STR, 50); 
            $insert->bindParam(3, $n2, PDO::PARAM_STR, 50); 
            $insert->bindParam(4, $a1, PDO::PARAM_STR, 50); 
            $insert->bindParam(5, $a2, PDO::PARAM_STR, 50); 
            $insert->bindParam(6, $fnac, PDO::PARAM_STR, 10); 
            $insert->bindParam(7, $idInsert, PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT); 
            $insert->execute();
            return $idInsert;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Agregar_Persona($cedula, $n1, $n2, $a1, $a2, $fnac)
    {

        $sql = "INSERT INTO persona (
            cedula, 
            primer_nombre, 
            segundo_nombre, 
            primer_apellido, 
            segundo_apellido, 
            fecha_nac) VALUES (?,?,?,?,?,?)";
        $insert =  $this->conexion->prepare($sql);
        $arrData = array($cedula, $n1, $n2, $a1, $a2, $fnac);
        $insert->execute($arrData);
        $idInsert =  $this->conexion->lastInsertId();
        return $idInsert;
    }

    public static function Agregar_Persona_Static($cedula, $n1, $n2, $a1, $a2, $fnac)
    {

        $con = new Conexion();
        $sql = "INSERT INTO persona (
            cedula, 
            primer_nombre, 
            segundo_nombre, 
            primer_apellido, 
            segundo_apellido, 
            fecha_nac) VALUES (?,?,?,?,?,?)";
        $insert = $con->prepare($sql);
        $arrData = array($cedula, $n1, $n2, $a1, $a2, $fnac);
        $insert->execute($arrData);
        $idInsert = $con->lastInsertId();
        return $idInsert;
    }

    public static function Modificar_Persona_Static($cedula, $n1, $n2, $a1, $a2, $fnac, $id_persona)
    {
        $con = new Conexion();
        $sql = "UPDATE persona SET 
            cedula = :cedula,
            primer_nombre = :n1, 
            segundo_nombre = :n2, 
            primer_apellido = :a1, 
            segundo_apellido = :a2, 
            fecha_nac = :fnac
            WHERE id_persona = :id_persona";

        $update = $con->prepare($sql);

        $update->bindParam(':cedula', $cedula, PDO::PARAM_INT);
        $update->bindParam(':n1', $n1, PDO::PARAM_STR, 25);
        $update->bindParam(':n2', $n2, PDO::PARAM_STR, 25);
        $update->bindParam(':a1', $a1, PDO::PARAM_STR, 25);
        $update->bindParam(':a2', $a2, PDO::PARAM_STR, 25);
        $update->bindParam(':fnac', $fnac, PDO::PARAM_STR, 25);
        $update->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
            
        return $update->execute();

    }

    public function Modificar_Persona($cedula, $n1, $n2, $a1, $a2, $fnac)
    {

        $con = new Conexion();
        $sql = "UPDATE persona SET 
            primer_nombre = ?, 
            segundo_nombre = ?, 
            primer_apellido = ?, 
            segundo_apellido = ?, 
            fecha_nac = ?
            WHERE cedula = ?";

        $update = $con->prepare($sql);
        $arrData = array($n1, $n2, $a1, $a2, $fnac . $cedula);
        if ($update->execute($arrData))
            $respuesta = true;
        return $respuesta;
    }

    public static function Eliminar_Persona_Static($id_persona)
    {
        $con = new Conexion();
        $sql = "DELETE FROM `persona` WHERE `id_persona`= :id_persona";
        $update = $con->prepare($sql);
        $update->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
        $respuesta = false;
        if ($update->execute())
            $respuesta = true;
        return $respuesta;
    }
}
