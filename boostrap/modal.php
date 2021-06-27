<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  
  <title>Probando Boostrap Modal</title>
</head>

<body style="background-image: url('../img/carousel_1/3.jpg');">

  <!-- https://blog.nubecolectiva.com/que-son-los-atributos-data-toggle-data-set-etc-en-html5/ -->


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_ejemplo_1">
    Lanzar mensaje
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal_ejemplo_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Título del mensaje</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ... Contenido del mensaje ...

          <div class="row">

            <!-- Columnas -->
            <div class="col">
              <label for="txt_cedula" class="form-label">Cédula</label>
              <input type="number" class="form-control" id="txt_cedula" name="txt_cedula" placeholder="Ej.: 192459555">
            </div>

            <div class="col">
              <label for="txt_cedula" class="form-label">Credencial Serie</label>
              <input type="number" class="form-control" id="txt_cedula" placeholder="Ej.: 192459555">
            </div>

            <div class="col">
              <label for="txt_cedula" class="form-label">Credencial Nro.</label>
              <input type="number" class="form-control" id="txt_cedula" placeholder="Ej.: 192459555">
            </div>



          </div>

          <div class="row"> &nbsp; &nbsp; </div>

          <div class="row">

            <div class="col">
              <label for="txt_primer_nombre" class="form-label">Primer Nombre</label>
              <input type="text" class="form-control" id="txt_primer_nombre" placeholder="Ingrese primer nombre">
            </div>

            <div class="col">
              <label for="txt_segundo_nombre" class="form-label">Segundo Nombre</label>
              <input type="text" class="form-control" id="txt_segundo_nombre" placeholder="Ingrese segundo nombre">
            </div>

            <div class="col">
              <label for="txt_primer_apellido" class="form-label">Primer Apellido</label>
              <input type="text" class="form-control" id="txt_primer_apellido" placeholder="Ingrese primer apellido">
            </div>

            <div class="col">
              <label for="txt_segundo_apellido" class="form-label">Segundo Apellido</label>
              <input type="text" class="form-control" id="txt_segundo_apellido" placeholder="Ingrese segundo apellido">
            </div>

          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Lanzar mensaje estático
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Título del mensaje</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ... Contenido del mensaje ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>