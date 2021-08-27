<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../ajax_datatables/estilos.css" />
    <title>Login usuario</title>
</head>
<body>

<div class="container box login">

<form id="frm_login" action="validar.php" method="POST">
  <div class="row mb-3">
    <label for="txt_email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="txt_email" id="txt_email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="txt_pass" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="txt_pass" id="txt_pass">
    </div>
  </div>

  <!--  -->

   <button type="button" id="btn_enviar" class="btn btn-primary">Login</button> 


</form>


</div>

    
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/date-1.1.1/kt-2.6.2/r-2.2.9/sl-1.3.3/datatables.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=6LfwXyMcAAAAAFjKfYOZC78paS1wbLNEU2zNGeBA"></script>

<script type="text/javascript" src="ajax_v3.js" language="javascript"></script>


</html>