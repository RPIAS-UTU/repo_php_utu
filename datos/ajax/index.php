<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
 
  
  <title>AJAX - </title>
</head>

<body>
  <div class="container">


  <?php

  $numero = "23";
  echo "Valor :: " . $numero  + 23 . "";

?>
  

    <div class="row">
      <div class="col">&nbsp;</div>
    </div>

    <div class="row">
      <div class="col">
        <label for="txt_cedula" class="form-label">Cédula</label>
        <input type="number" class="form-control" id="txt_cedula" value="" required>
      </div>

      <div class="col">
        <label for="txt_primer_nombre" class="form-label">Primer Nombre</label>
        <input type="text" class="form-control" id="txt_primer_nombre" value="" required>
      </div>

      <div class="col">
        <label for="txt_segundo_nombre" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" id="txt_segundo_nombre" value="" required>
      </div>

      <div class="col">
        <label for="txt_primer_apellido" class="form-label">Primer Apellido</label>
        <input type="text" class="form-control" id="txt_primer_apellido" value="" required>
      </div>

      <div class="col">
        <label for="txt_segundo_apellido" class="form-label">Segundo Apellido</label>
        <input type="text" class="form-control" id="txt_segundo_apellido" value="" required>
      </div>

      <div class="col">
        <label for="txt_fecha_nac" class="form-label">Fecha Nacimiento</label>
        <input type="date" class="form-control" id="txt_fecha_nac" value="" required>
      </div>

    </div>
    <div class="row">  <div class="col">&nbsp;&nbsp; </div> </div>

    <div class="row">
      <div class="col-3">
        <button id="btn_agregar" class="btn btn-primary" type="submit">Agregar Persona</button>
      </div>
      <div class="col-3">
        <button id="btn_modificar" class="btn btn-primary" type="submit">Modificar Persona</button>
      </div>

      <div class="col-3">
        <button id="btn_eliminar" class="btn btn-primary" type="submit">Eliminar Persona</button>
      </div>

    </div>

    <div class="row">  <div class="col">&nbsp;&nbsp; </div> </div>

    <div class="row">
      <div class="col">
        <table id="tabla_personas_jquery" 
        class="table"></table>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <table id="tabla_personas_DataTables" class="table">

        <tr>
    <th>Cédula</th>
    <th>Primer Nombre</th>
    <th>Segundo Nombre</th>
    <th>Primer Apellido</th>
    <th>Segundo Apellido</th>
  </tr>
        </table>
      </div>
    </div>

  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="ajax.js"></script>

</html>