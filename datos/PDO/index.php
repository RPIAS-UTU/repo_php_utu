<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probando PDO</title>
</head>
<body>
    
<?php
    include_once("personas_modelo.php");

    if (Personas_Model::Agregar_Persona_Static(19245911, "R", "E", "P", "R", "19751103") > 0)
        echo "<br>Registro ingresado con Éxito";
    else
        echo "<br>ERROR al ingresar registro";


/*
    // Agregar Persona desde SP
       $id = Personas_Model::Agregar_Persona_SP(192416, "Roberto", "Enrique", "Perez", "Rrodriguez", "20051003");
    
    if ($id > 0)
        echo "<br>Registro ingresado con Éxito";
    else
        echo "<br>ERROR al ingresar registro :: " + $id;
*/


/*
    if (Personas_Controller::Modificar_Persona_Static(19245911, "R2", "E2", "P2", "R2", "19751103") == true)
        echo "<br>Registro modificado con Éxito";
    else
        echo "<br>ERROR al modificar registro";
*/
        echo "<br><br>";

        Personas_Model::Listar_Personas();

        echo "<br><br>";

        Personas_Model::Listar_Personas_SP();

        echo "<br><br>";

?>



</body>
</html>