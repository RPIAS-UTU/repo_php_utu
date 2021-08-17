<?php
include_once '../PDO/personas_modelo.php';

$cedula = $_POST['cedula'];
$n1 = $_POST['primer_nombre'];
$n2 = $_POST['segundo_nombre'];
$a1 = $_POST['primer_apellido'];
$a2 = $_POST['segundo_apellido'];
$fnac =  $_POST['fecha_nac'];

echo json_encode(Personas_Model::Agregar_Persona_Static($cedula, $n2,$n2, $a1, $a2, $fnac));

?>
