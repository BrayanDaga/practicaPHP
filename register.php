<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de users</title>

  <link href="bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="bootstrap-4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="card mx-auto my-5  col-4 py-3">
            <div class="card-header">
                <h3>Register</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="card-foot d-flex justify-content-around">
                <button id="#register" class="btn btn-primary" onclick="register()">register</button>
            <a href="/">Atras</a>
            </div>
            
        </div>
    </div>
	<script>

function register() {
		let registro = {
		name: $('#name').val(),
		email: $('#email').val(),
		password:$('#password').val(),
	};
  $.ajax({
    type: 'POST',
    url: '/api/users/api-users.php?accion=agregar',
    data: registro,
    success: function(msg) {
		alert("Usuario creado con exito");
    },
    error: function() {
      alert("Hay un problema");
    }
  });
}
    </script>
</body>
</html>