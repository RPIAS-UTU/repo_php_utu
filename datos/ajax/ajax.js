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

    // $('#select_unidad').on('change', onSelectUnidadChange);
    // $('#btn_agregar').attr("disabled", false);
    // $('#btn_cerrar').hide();


    
   //  $('#select_unidad') igual a  document.getElementById('txt_cedula')


    $('#btn_agregar').on('click', onClickBotonAgregar);

    activarMensajes();

    cargarGrilla();
 
     aplicarDataTables();

});

function aplicarDataTables() {
  
    $('#tabla_personas_DataTables').dataTable({
       ajax: 'listar.php',
       "columns": [
        { "data": "cedula" },
        { "data": "primer_nombre" },
        { "data": "segundo_nombre" },
        { "data": "primer_apellido" },
        { "data": "segundo_apellido" },
        { "data": "fecha_nac" }
    ]
    });

}

function activarMensajes() {

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

}

function onClickBotonAgregar() {

    let cedula = $("#txt_cedula").val();
    var n1 = $("#txt_primer_nombre").val();
    var n2 = $("#txt_segundo_nombre").val();
    var a1 = $("#txt_primer_apellido").val();
    var a2 = $("#txt_segundo_apellido").val();
    var fnac = $("#txt_fecha_nac").val();

    var datos_entrada = {
        'cedula': cedula,
        'primer_nombre': n1,
        'segundo_nombre': n2,
        'primer_apellido': a1,
        'segundo_apellido': a2,
        'fecha_nac': fnac
    };


    // {
    //     "primer_nombre": "Juan",
    //         "primer_apellido": "Smith",
    //             "direccion": {
    //                      "calle": "21 de Setiembre",
    //                      "ciudad": "Montevideo",
    //                      "barrio": "Pocitos",
    //                     "codigo_postal": 10021
    //     },
    //     "telefonos": [
    //         "099732123",
    //         "646123456"
    //     ]
    // }


    $.ajax({
        type: 'POST',  // Envío con método POST
        dataType: "json", // Datos devueltos en formato JSON
        url: 'agregar.php',  // Fichero destino (el PHP que trata los datos)
        data: datos_entrada // Datos que se envían
    }).done(function (data_salida) {  // Función que se ejecuta si todo ha ido bien
        // Escribimos en el div consola el mensaje devuelto por el servidor
        // El método JSON.stringify() convierte un objeto o valor de JavaScript
        var dataJSON = JSON.parse(JSON.stringify(data_salida));
        alert(dataJSON);
        cargarGrilla();


    }).fail(function (jqXHR, textStatus) {
        alert("ERROR:: " + textStatus + " - " + jqXHR.status);

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

       // construirTabla("#tabla_personas_DataTables", JSON.stringify(data));

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

