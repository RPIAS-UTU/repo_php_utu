
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Envío de Email con PHPMail</title>
</head>
<body>

<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

if(isset($_POST['txt_nombre']) && isset($_POST['txt_email']) && isset($_POST['txt_mensaje'])){

    $datos = [
        "nombre_remitente" => $_POST['txt_nombre'],
        "email_remitente" => $_POST['txt_email'],
        "password" => $_POST['txt_password'],
        "mensaje" => $_POST['txt_mensaje'],
        "email_destinatario" => $_POST['txt_destinatario'],
        "host" => $_POST['txt_host'],
        "puerto" => $_POST['txt_puerto'],
    ];

    print_r($datos);    
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 1;  // Sacar esta línea para no mostrar salida debug
        $mail->isSMTP();
        $mail->Host = $datos["host"];  // Host de conexión SMTP
        $mail->SMTPAuth = true;
        $mail->Username = $datos["email_remitente"];  // Usuario SMTP
        $mail->Password =  $datos["password"];   // Password SMTP
        $mail->SMTPSecure = 'tls';     // Activar seguridad TLS
        $mail->Port = $datos["puerto"];        // Puerto SMTP

        #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];  // Descomentar si el servidor SMTP tiene un certificado autofirmado
        #$mail->SMTPSecure = false;		// Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
        #$mail->SMTPAutoTLS = false;	// Descomentar si se requiere desactivar completamente TLS (sin cifrado)
    
        $mail->setFrom($datos["email_remitente"]);		// Mail del remitente
        $mail->addAddress($datos["email_destinatario"]);     // Mail del destinatario
    
        $mail->isHTML(true);
        $mail->Subject = 'Prueba de envío de correo enciada por: ' . $datos["email_remitente"];  // Asunto del mensaje
        $mail->Body    = 'Este es el contenido del mensaje <b>en negrita!</b>' . $datos["mensaje"];    // Contenido del mensaje (acepta HTML)
        $mail->AltBody = 'Este es el contenido del mensaje en texto plano' . $datos["mensaje"];    // Contenido del mensaje alternativo (texto plano)
    
        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
    }
}

?>

<form class="container" action="" method="POST">

    <div class="row"> <div class="col">&nbsp;&nbsp;</div></div>

    <div class="row">

        <div class="col">
            <label for="txt_nombre" class="form-label">Nombre Remitente</label>
            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Juan Pérez">
        </div>

        <div class="col">
            <label for="txt_email" class="form-label">Email remitente</label>
            <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="name@example.com">
        </div>

        <div class="col">
            <label for="txt_password" class="form-label">Password</label>
            <input type="password" class="form-control" id="txt_password" name="txt_password">
        </div>
    </div>

    <div class="row">

        <div class="col">
            <label for="txt_host" class="form-label">Servidor SMTP</label>
            <input type="text" class="form-control" id="txt_host" name="txt_host" placeholder="smtp.gmail.com">
        </div>

        <div class="col">
            <label for="txt_puerto" class="form-label">Puerto Servidor SMTP</label>
            <input type="text" class="form-control" id="txt_puerto" name="txt_puerto" placeholder="465">
        </div>


    </div>

    <div class="row">
        <div class="col">
            <label for="txt_destinatario" class="form-label">Email destinatario</label>
            <input type="email" class="form-control" id="txt_destinatario" name="txt_destinatario" placeholder="name@example.com">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="txt_mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="txt_mensaje" name="txt_mensaje" rows="3"></textarea>
        </div>
    </div>

    <div class="row"> <div class="col">&nbsp;&nbsp;</div></div>

    <div class="row">
        <div class="col">  
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </div>
</form>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>

