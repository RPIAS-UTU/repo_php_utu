<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>AJAX - </title>
</head>

<body>
  <div class="container">
  
    <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>

  

    <div class="row">
      <div class="col">&nbsp;</div>
    </div>

    <div class="row">
      <div class="col">

        <form class="row g-3">

          <div class="col-md-4">
            <label for="txt_cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control is-valid" id="txt_cedula" value="" required>
            <div class="valid-feedback">
              Bien!
            </div>
          </div>

          <div class="col-md-4">
            <label for="txt_primer_nombre" class="form-label">Primer Nombre</label>
            <input type="text" class="form-control is-valid" id="txt_primer_nombre" value="" required>
            <div class="valid-feedback">
              Bien!
            </div>
          </div>

          <div class="col-md-4">
            <label for="txt_segundo_nombre" class="form-label">Segundo Nombre</label>
            <input type="text" class="form-control is-valid" id="txt_segundo_nombre" value="" required>
            <div class="valid-feedback">
              Bien!
            </div>
          </div>

          <div class="col-md-4">
            <label for="validationServerUsername" class="form-label">Username</label>
            <div class="input-group has-validation">

              <span class="input-group-text" id="inputGroupPrepend3">@</span>

              <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>

              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationServer03" class="form-label">City</label>
            <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
            <div id="validationServer03Feedback" class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-3">
            <label for="validationServer04" class="form-label">State</label>
            <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
              <option selected disabled value="">Choose...</option>
              <option>...</option>
            </select>
            <div id="validationServer04Feedback" class="invalid-feedback">
              Please select a valid state.
            </div>
          </div>
          <div class="col-md-3">
            <label for="validationServer05" class="form-label">Zip</label>
            <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
            <div id="validationServer05Feedback" class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
              <label class="form-check-label" for="invalidCheck3">
                Agree to terms and conditions
              </label>
              <div id="invalidCheck3Feedback" class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>

      </div>
    </div>

    <div class="row">
      <div class="col">
        <table id="tabla_personas_jquery" class="table"></table>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <table id="tabla_personas_js" class="table"></table>
      </div>
    </div>

  </div>







</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="ajax.js"></script>

</html>