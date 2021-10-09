// Repo de ejemplo
// https://github.com/knysh-irina/Datatables-ajax-php-mysql

$(function () {
  
    $('#btn_agregar').on('click', onClickBotonAgregar);
    $('#btn_salir').on('click', onClickBotonSalir);

    // Listar Personas
    var dataTable = $('#tabla_personas').DataTable({
        "language": { url: 'Spanish.json'},
        "dom": 'Bfrtip',  
        //"dom": 'lrtip',
        //"dom": '<"top"i>rt<"bottom"flp><"clear">',
        //"dom": '<lf<t>ip>',
        //"dom": '<"wrapper"flipt>',
        "buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "pageLength": 5,
        "processing": true, 
        "serverSide": false, 
        "order": [], 
        "ajax": {
            url: "listar.php",
            type: "POST"
        },
        "columnDefs": [{ 
            "targets": [6, 7], 
            "orderable": false 
        }]
    });
    
    // Agregar Persona
    $(this).on('submit', '#frm_persona', function (event) {
        
    
        event.preventDefault();  // Cancela el evento si este es cancelable, sin detener el resto del funcionamiento del evento, es decir, puede ser llamado de nuevo.
        
        var cedula = $('#txt_cedula').val();
        var primer_nombre = $('#txt_primer_nombre').val();
        var primer_apellido = $('#txt_primer_apellido').val();

        //var formData = new FormData($('#frm_persona')[0]); // otra forma de hacerlo
        //var formData = $("#formularioAgregar").serialize();
        // data: new FormData(this), 

        // Requerir campos desde JS
        if (cedula != '' && primer_nombre != '' && primer_apellido != '') {

            $.ajax({
                url: "agregar.php",
                method: 'POST',
                data:$("#frm_persona").serialize(), 
                success: function (data) {
                    
                    $('#frm_persona')[0].reset();
                    $('#personaModal').modal('hide');
                    dataTable.ajax.reload();
                    alert(data);
                   
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        } else {
            alert("Los campos Cedula, Primer Nombre y Primer Apellido son requeridos");
        }
    });


   // Cargar datos de Persona
    $(this).on('click', '.update', function () {
        
        let persona_id = $(this).attr("id"); 
        
        $.ajax({
            url: "cargar_persona.php",
            method: "POST",
            data: {
                persona_id: persona_id
            },
            dataType: "json",
            success: function (data) {
                $('#personaModal').modal('show');

                $('#txt_cedula').val(data.cedula);
                $('#txt_primer_nombre').val(data.primer_nombre);
                $('#txt_segundo_nombre').val(data.segundo_nombre);
                $('#txt_primer_apellido').val(data.primer_apellido);
                $('#txt_segundo_apellido').val(data.segundo_apellido);
                $('#txt_fecha_nac').val(data.fecha_nac);

                $('.modal-title').text("Editar Persona");
                $('#h_persona_id').val(persona_id);
                $('#btn_accion').val("Editar");
                $('#h_operacion').val("Editar");
            }
        })
    });

    // Eliminar Persona
    $(this).on('click', '.delete', function () {
        var persona_id = $(this).attr("id"); 
        
        if (confirm("¿Estas seguro de Eliminar este registro?")) {
           
            $.ajax({
                url: "eliminar.php",
                method: "POST",
                data: {
                    persona_id: persona_id
                },
                success: function (data) {
                    dataTable.ajax.reload();
                }
            });
        } else {
            return false;
        }
    });

});

function onClickBotonAgregar() {

    $('#frm_persona')[0].reset();
    $('.modal-title').text("Agregar Persona");
    $('#btn_accion').val("Agregar");
    $('#h_operacion').val("Agregar");

    // $('#txt_cedula').val("18744756");
    // $('#txt_primer_nombre').val("Juan");
    // $('#txt_primer_apellido').val("Jose");
    // $('#txt_segundo_nombre').val("Laguna");
    // $('#txt_segundo_apellido').val("Amodio");
    // $('#txt_fecha_nac').val("2010-05-21");

}

function onClickBotonSalir(){

    $.ajax({
        url: "salir.php",
        success: function (data) {
            window.location.href = "../login/index_v2.php";
        }
    });

}





