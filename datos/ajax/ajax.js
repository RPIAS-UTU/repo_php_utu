// Solo se ejecutará cuando el DOM (Modelo de Objetos del Documento) esté cargado
// $(document).ready(function() { ... });

// Abreviatura de JQuery para Document.ready
$(function () {

    /*
    var alertList = document.querySelectorAll('.alert')
    var alerts = [].slice.call(alertList).map(function (element) {
        return new bootstrap.Alert(element)
    })
*/
    cargarGrilla();

    // $('#select_unidad').on('change', onSelectUnidadChange);
    // $('#btn_agregar').attr("disabled", false);
    // $('#btn_cerrar').hide();
    //   $('#btn_listar').on('click', onClickBotonListar);

    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')

    function alert(message, type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + 
        message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
        alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
        alertTrigger.addEventListener('click', function () {
            alert('Nice, you triggered this alert message!', 'success')
        })
    }

});


function agregarPersona() {

    var cedula = $("#txt_cedula").val();
    var nombre = $("#txt_nombre").val();
    var apellido = $("#txt_apellido").val();
    var email = $("#txt_email").val();
    var telefono = $("#txt_telefono").val();
    var direccion = $("#txt_direccion").val();
    var unidad = $("#select_unidad").val();

    var data = {
        'cedula': cedula,
        'nombre': nombre,
        'apellido': apellido,
        'email': email,
        'telefono': telefono,
        'direccion': direccion,
        'unidad': unidad
    };

    $.ajax({
        type: 'POST',  // Envío con método POST
        dataType: "json", // Datos devueltos en formato JSON
        url: 'agregar.php',  // Fichero destino (el PHP que trata los datos)
        data: data  // Datos que se envían
    }).done(function (data) {  // Función que se ejecuta si todo ha ido bien
        // Escribimos en el div consola el mensaje devuelto por el servidor
        // El método JSON.stringify() convierte un objeto o valor de JavaScript

}).fail(function (jqXHR, textStatus) {

});
}

function cargarGrilla() {

    $.ajax({
        type: 'POST',  // Envío con método POST
        dataType: "json", // Datos devueltos en formato JSON
        url: 'listar.php'  // Fichero destino (el PHP que trata los datos)
        //data: { nom: pnom, pass: ppass } // Datos que se envían
    }).done(function (data) {  // Función que se ejecuta si todo ha ido bien


        $("#msg_seccess").html("La solicitud se ha completado correctamente.");
        // Escribimos en el div consola el mensaje devuelto por el servidor

        // El método JSON.stringify() convierte un objeto o valor de JavaScript
        // en una cadena de texto JSON, opcionalmente reemplaza valores si se indica 
        // una función de reemplazo, o si se especifican las propiedades mediante un array de reemplazo.
        construirTabla("#tabla_personas_jquery", JSON.stringify(data));

        generar_tabla("#tabla_personas_js", JSON.stringify(data));

        console.log("La solicitud se ha completado correctamente.");

    }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
        // Mostramos en consola el mensaje con el error que se ha producido
        $("#msg_danger").html("Ha ocurrido un error: " + textStatus + " " + errorThrown);
        if (console && console.log) {
            console.log("La solicitud ha fallado: " + textStatus);
        }
    });

}

function construirTabla(selector, datos) {
    var data = JSON.parse(datos);
    var cols = Cabezales(data, selector);

    // Traversing the JSON data
    for (var i = 0; i < data.length; i++) {

        // Crear una nueva fila
        var row = $('<tr/>');

        // Iterar columas
        for (var colIndex = 0; colIndex < cols.length; colIndex++) {
            var val = data[i][cols[colIndex]];
            if (val == null) val = "";
            row.append($('<td/>').html(val));
        }

        // Agrego la fila a la tabla
        $(selector).append(row);
    }
}

function Cabezales(datos, selector) {

    var columns = [];
    var header = $('<tr/>');

    for (var i = 0; i < datos.length; i++) {
        var row = datos[i];

        for (var k in row) {
            if ($.inArray(k, columns) == -1) {
                columns.push(k);

                header.append($('<th/>').html(k));
            }
        }
    }

    $(selector).append(header);
    return columns;
}

function generar_tabla(selector, datos) {

    for (x of datos) {
        console.log(x.cedula + ' ' + x.primer_nombre);

    }

}