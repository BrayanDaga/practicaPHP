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
	<nav class="navbar navbar-light bg-light fixed-top navbar-expand-md">
		<?php include('layout/nav.php');?>
	</nav>

	<?php
		if($_SESSION['user']){
			include_once 'layout/content.php';
		}else{
			// require_once 'layout/content.php';
			include_once 'layout/login.php';
		}
	
	?>
</body>
</html>