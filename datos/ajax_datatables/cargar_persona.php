<?php

include_once('../PDO/personas_modelo.php');

if(isset($_POST["persona_id"]))
{
	$result =  Personas_Model::Listar_Persona_Por_Cedula_Ajax($_POST["persona_id"]);
	foreach($result as $row)
	{
		$salida["id_persona"] = $row["id_persona"];
		$salida["cedula"] = $row["cedula"];
        $salida["primer_nombre"] = $row["primer_nombre"];
        $salida["segundo_nombre"] = $row["segundo_nombre"];
        $salida["primer_apellido"] = $row["primer_apellido"];
        $salida["segundo_apellido"] = $row["segundo_apellido"];
		$salida["fecha_nac"] = date('Y-m-d', strtotime($row["fecha_nac"]));
	}
	echo json_encode($salida);
}
?>