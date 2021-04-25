<?php


$var = "<br><br>LLEGO :: " . $_SERVER['REQUEST_METHOD'];
$var .= "<br><br>";

if (isset($_REQUEST['txt_nombre']))
    $var .= "recibido: " . $_REQUEST['txt_nombre'];

if ($_SERVER['REQUEST_METHOD'] === 'POST')
    $var .= '<br><br>Llegó algo por POST';
    
echo $var;