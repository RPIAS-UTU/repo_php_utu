<?php
    include_once '../PDO/personas_modelo.php';
    echo json_encode(Personas_Model::Listar_Personas_Ajax());
?>

