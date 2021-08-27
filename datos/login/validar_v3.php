<?php
// https://www.youtube.com/watch?v=4bZ5vXXFrCU
const CLAVE = "6LfwXyMcAAAAAE-FAbhXfj_SJPvux9pa25TpXoE9";

$token = $_POST["token"];
$action = $_POST["action"];
$email = $_POST["txt_email"];
$pass = $_POST["txt_pass"];

$cu = curl_init();
curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($cu, CURLOPT_POST, true);
curl_setopt($cu, CURLOPT_POSTFIELDS, "secret=".CLAVE."&response=".$token);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($cu);
curl_close($cu);

$datos = json_decode($result, true);


//var_dump($datos);

if($datos["success"] == true && $datos["score"] >= 0.9){  // Si el usuario es correcto y el score es mayor o igual a 0.5
   if($datos["action"] ==  $action){  // Si la accion es la misma que la que se envió
        // valido usuarios



}
}else{
    echo "CAPTCHA INVÁLIDO";
}
