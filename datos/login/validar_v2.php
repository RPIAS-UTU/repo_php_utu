<?php
// https://www.youtube.com/watch?v=5o7Q4qvimWM

include_once '../PDO/usuarios_modelo.php';

const CLAVE = "6LfxVyMcAAAAAPm4HumpS5HuXYgdcfuhuUsqEHUg";

if (isset($_POST["g-recaptcha-response"])) { // Si existe el campo del recaptcha

    $token = $_POST["g-recaptcha-response"];    // guardamos el token en una variable
    $action = $_POST["action"];                // guardamos la acción en una variable
    $email = $_POST["txt_email"];           // guardamos el email en una variable
    $pass = $_POST["txt_pass"];          // guardamos la contraseña en una variable
    $host = $_SERVER["REMOTE_ADDR"];    // guardamos la ip en una variable

    // creamos la url para verificar el token
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . CLAVE . "&response=$token&remoteip=$host";
    $respuesta = file_get_contents($url);   // obtenemos la respuesta de la url
    $datos = json_decode($respuesta);       // decodificamos la respuesta en json

    // print_r($fire);
    // echo "<BR>";
    // print_r($datos);

    if ($datos->success == true && $action == 'validar_usuario') {  // Si pasa pruebas de verificación de recaptcha y la acción es validar_usuario

        $pass_hash =  hash('sha256', $pass);
        
        $usu = Usuario::getUsuarioLogin($email, $pass_hash);

        if ($usu != null) {

            if ($usu->getHabilitado() == 1) { // login :: login

                session_start();    // Iniciamos la sesión
                $_SESSION['usuario_logueado'] = $usu->getUsuario();
                $_SESSION['id_rol_logueado'] = $usu->getRol()->getRol();
                $_SESSION['user_db'] = $usu->getrol()->getUser_db();
                $_SESSION['pass_db'] = $usu->getrol()->getPass_db();

                // echo "Usuario Logueado :: " . $_SESSION['usuario_logueado'];
                // echo "Rol Logueado :: " . $_SESSION['id_rol_logueado'];
                // echo "Usuario DB :: " . $_SESSION['user_db'];
                // echo "PASS DB :: " . $_SESSION['pass_db'];

                header("Location: ../ajax_datatables/index.php");
            }else{
                 header("Location: index_v2.php?error=2");
            }
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    } else {
        header("Location: index_v2.php?error=1");
    }
}
