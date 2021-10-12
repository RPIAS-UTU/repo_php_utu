<?php
include_once("conexion.php");

class Personas_Model extends Conexion
{
    private $conexion;
    private $tabla = "persona";
    private $token = "";

    private $id_persona;
    private $cedula;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $fecha_nacimiento;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

// Inicio API REST

public function api_lista_personas(){
    $query = "SELECT * FROM " . $this->tabla;
    return parent::obtenerDatos($query);
}

public function api_lista_personas_paginado($pagina = 1){
    
    $inicio  = 0 ;
    $cantidad = 10;
    // pagina = 2
    if($pagina > 1){
        //   6   = (5 * (2-1))+1
        $inicio = ($cantidad * ($pagina - 1)) + 1 ;
        //  10      = 5 * 2           
        $cantidad = $cantidad * $pagina;
    }

    $query = "SELECT * FROM " . $this->tabla . " limit $inicio, $cantidad";
    return parent::obtenerDatos($query);
}

public function api_obtener_persona($id){
    $query = "SELECT * FROM " . $this->tabla . " WHERE id_persona = " . $id;
    return parent::obtenerDatos($query);
}

public function api_obtener_persona_nombre($nombre){
    $query = "SELECT * FROM " . $this->tabla . " WHERE primer_nombre LIKE '%" . $nombre . "%'";
    return parent::obtenerDatos($query);
}

public function api_post($json){

    $_respuestas = new respuestas;

    // convierto el json a un array asociativo
    $datos = json_decode($json,true);

    if(!isset($datos['token'])){ // si no viene el token
            return $_respuestas->error_401(); // no tiene permisos
    }else{

        $this->token = $datos['token'];
        $arrayToken = $this->api_buscar_token();

        if($arrayToken){

            // validar campos requeridos
            if(!isset($datos['cedula']) || !isset($datos['primer_nombre']) || !isset($datos['primer_apellido'])){
                return $_respuestas->error_400();
            }else{

                $this->cedula = $datos['cedula'];
                $this->primer_nombre = $datos['primer_nombre'];
                $this->primer_apellido = $datos['primer_apellido'];

                // verificar los no requeridos
                if(isset($datos['segundo_nombre'])) { $this->segundo_nombre = $datos['segundo_nombre']; }
                if(isset($datos['segundo_apellido'])) { $this->segundo_apellido = $datos['segundo_apellido']; }
                if(isset($datos['fecha_nac'])) { $this->fecha_nacimiento = $datos['fecha_nac']; }

                $resp = $this->api_insertar_persona();
                if($resp){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "id_persona" => $resp
                    );
                    return $respuesta;
                }else{
                    return $_respuestas->error_500();
                }
            }

        }else{
            return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        }
    }
}

private function api_insertar_persona(){
    $query = "INSERT INTO " . $this->table . 
    " (cedula, primer_nombre, segundo_nombre, 
    primer_apellido, segundo_apellido, fecha_nac
    ) values ('" . 
    $this->cedula . "','" . 
    $this->primer_nombre . "','" . 
    $this->segundo_nombre ."','" . 
    $this->primer_apellido .  "','" . 
    $this->segundo_apellido . "','" . 
    $this->fecha_nacimiento . "')"; 
    
    $resp = parent::nonQueryId($query);
    if($resp){
         return $resp;
    }else{
        return 0;
    }
}

public function put($json){

    $_respuestas = new respuestas;
    $datos = json_decode($json,true);

    if(!isset($datos['token'])){
        return $_respuestas->error_401();
    }else{
        $this->token = $datos['token'];
        $arrayToken =   $this->api_buscar_token();
        if($arrayToken){
            if(!isset($datos['id_persona'])){
                return $_respuestas->error_400();
            }else{
                $this->id_persona = $datos['id_persona'];
                if(isset($datos['cedula'])) { $this->cedula = $datos['cedula']; }
                if(isset($datos['primer_nombre'])) { $this->primer_nombre = $datos['primer_nombre']; }
                if(isset($datos['segundo_nombre'])) { $this->segundo_nombre = $datos['segundo_nombre']; }
                if(isset($datos['primer_apellido'])) { $this->primer_apellido = $datos['primer_apellido']; }
                if(isset($datos['segundo_apellido'])) { $this->segundo_apellido = $datos['segundo_apellido']; }
                if(isset($datos['fecha_nac'])) { $this->fecha_nacimiento = $datos['fecha_nac']; }
    
                $resp = $this->api_modificar_persona();

                if($resp){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "pacienteId" => $this->pacienteid
                    );
                    return $respuesta;
                }else{
                    return $_respuestas->error_500();
                }
            }

        }else{
            return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        }
    }
}

private function api_modificar_persona(){
    $query = "UPDATE " . $this->table . " SET cedula ='" . $this->cedula . 
    "', primer_nombre = '" . $this->primer_nombre . 
    "', segundo_nombre = '" . $this->segundo_nombre . 
    "', primer_apellido = '" . $this->primer_apellido . 
    "', segundo_apellido = '" . $this->segundo_apellido . 
    "', fecha_nac = '" . $this->fecha_nacimiento . 
    "' WHERE id_persona = " . $this->id_persona;

    $resp = parent::nonQuery($query);
    if($resp >= 1){
         return $resp;
    }else{
        return 0;
    }
}

public function delete($json){
    $_respuestas = new respuestas;
    $datos = json_decode($json,true);

    if(!isset($datos['token'])){
        return $_respuestas->error_401();
    }else{
        $this->token = $datos['token'];
        $arrayToken =   $this->api_buscar_token();
        if($arrayToken){

            if(!isset($datos['id_persona'])){
                return $_respuestas->error_400();
            }else{
                $this->pacienteid = $datos['id_persona'];

                $resp = $this->api_eliminar_persona();
                
                if($resp){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "pacienteId" => $this->pacienteid
                    );
                    return $respuesta;
                }else{
                    return $_respuestas->error_500();
                }
            }

        }else{
            return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        }
    }
}

private function api_eliminar_persona(){
    $query = "DELETE FROM " . $this->table . " WHERE id_persona = " . $this->id_persona;
    $resp = parent::nonQuery($query);
    if($resp >= 1 ){
        return $resp;
    }else{
        return 0;
    }
}

private function api_buscar_token(){
    $query = "SELECT  TokenId, UsuarioId, Estado from usuarios_token WHERE Token = '" . $this->token . "' AND Estado = 'Activo'";
    $resp = parent::obtenerDatos($query);
    if($resp){
        return $resp;
    }else{
        return 0;
    }
}

private function api_actualizar_token($tokenid){
    $date = date("Y-m-d H:i");
    $query = "UPDATE usuarios_token SET Fecha = '$date' WHERE TokenId = '$tokenid' ";
    $resp = parent::nonQuery($query);
    if($resp >= 1){
        return $resp;
    }else{
        return 0;
    }
}

// Fin API REST

    public static function Listar_Personas_Ajax()
    {
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

    public static function Listar_Persona_Por_Cedula_Ajax($id_persona)
    {
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

    public static function Listar_Personas()
    {
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

    public static function Listar_Personas_SP()
    {
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
            $insert->bindParam(7, $idInsert, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT);
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
        try {
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
        } catch (PDOException $e) {
            return new Exception($e->getMessage());
        }
    }

    public static function Modificar_Persona_Static($cedula, $n1, $n2, $a1, $a2, $fnac, $id_persona)
    {

        try {
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
        } catch (PDOException $e) {
            return new Exception($e->getMessage());
        }
    }

    public function Modificar_Persona($cedula, $n1, $n2, $a1, $a2, $fnac, $id_persona)
    {
        try {
            $con = new Conexion();
            $sql = "UPDATE persona SET 
                    cedula = ?,
                    primer_nombre = ?, 
                    segundo_nombre = ?, 
                    primer_apellido = ?, 
                    segundo_apellido = ?, 
                    fecha_nac = ?
                    WHERE id_persona = ?";

            $update = $con->prepare($sql);

            $arrData = array($cedula, $n1, $n2, $a1, $a2, $fnac, $id_persona);

            return $update->execute($arrData);

        } catch (PDOException $e) {
            return new Exception($e->getMessage());
        }
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

    /**
     * Get the value of primer_nombre
     */ 
    public function getPrimer_nombre()
    {
        return $this->primer_nombre;
    }

    /**
     * Set the value of primer_nombre
     *
     * @return  self
     */ 
    public function setPrimer_nombre($primer_nombre)
    {
        $this->primer_nombre = $primer_nombre;

        return $this;
    }

    /**
     * Get the value of segundo_nombre
     */ 
    public function getSegundo_nombre()
    {
        return $this->segundo_nombre;
    }

    /**
     * Set the value of segundo_nombre
     *
     * @return  self
     */ 
    public function setSegundo_nombre($segundo_nombre)
    {
        $this->segundo_nombre = $segundo_nombre;

        return $this;
    }

    /**
     * Get the value of primer_apellido
     */ 
    public function getPrimer_apellido()
    {
        return $this->primer_apellido;
    }

    /**
     * Set the value of primer_apellido
     *
     * @return  self
     */ 
    public function setPrimer_apellido($primer_apellido)
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }

    /**
     * Get the value of segundo_apellido
     */ 
    public function getSegundo_apellido()
    {
        return $this->segundo_apellido;
    }

    /**
     * Set the value of segundo_apellido
     *
     * @return  self
     */ 
    public function setSegundo_apellido($segundo_apellido)
    {
        $this->segundo_apellido = $segundo_apellido;

        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Get the value of id_persona
     */ 
    public function getId_persona()
    {
        return $this->id_persona;
    }

    /**
     * Set the value of id_persona
     *
     * @return  self
     */ 
    public function setId_persona($id_persona)
    {
        $this->id_persona = $id_persona;

        return $this;
    }

    /**
     * Get the value of cedula
     */ 
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set the value of cedula
     *
     * @return  self
     */ 
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }
}
