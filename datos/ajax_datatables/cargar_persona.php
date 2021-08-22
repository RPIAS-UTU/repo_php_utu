<?php

include_once('../PDO/personas_modelo.php');

if(isset($_POST["persona_id"]))
{
	$result =  Personas_Model::Listar_Persona_Por_Cedula_Ajax($_POST["persona_id"]);
	foreach($result as $row)
	{
		$output["id_persona"] = $row["id_persona"];
		$output["cedula"] = $row["cedula"];
        $output["primer_nombre"] = $row["primer_nombre"];
        $output["segundo_nombre"] = $row["segundo_nombre"];
        $output["primer_apellido"] = $row["primer_apellido"];
        $output["segundo_apellido"] = $row["segundo_apellido"];
		$output["fecha_nac"] = date('Y-m-d', strtotime($row["fecha_nac"]));
	}
	echo json_encode($output);
}
?>