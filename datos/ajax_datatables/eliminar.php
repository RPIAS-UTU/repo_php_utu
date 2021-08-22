<?php

include_once('../PDO/personas_modelo.php');

if(isset($_POST["persona_id"]))
{
	$result  = Personas_Model::Eliminar_Persona_Static($_POST["persona_id"]);
	
	if(!empty($result))
	{
		echo $result;
	}
}



?>