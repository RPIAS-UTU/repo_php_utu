$(document).ready(function () {
        $('#btn_enviar').click(function () {
       
        //e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('6LfwXyMcAAAAAFjKfYOZC78paS1wbLNEU2zNGeBA', { 
                action: 'validar_usuario' 
            }).then(function (token) {
                $('#frm_login').prepend('<input type="hidden" name="token" value="' + token + '"/>');
                $('#frm_login').prepend('<input type="hidden" name="action" value="validar_usuario"/>');
                $('#frm_login').submit();
            });
        });
    });
});


    // var usuario = $('#usuario').val();
    // var clave = $('#clave').val();
    // var data = {
    //     usuario: usuario,
    //     clave: clave
    // }
    // $.ajax({
    //     url: 'login/login.php',
    //     type: 'POST',
    //     data: data,
    //     success: function(respuesta){
    //         if (respuesta == '1') {
    //             window.location.href = 'index.php';
    //         }else{
    //             alert('Usuario o contraseña incorrectos');
    //         }
    //     }
    // });