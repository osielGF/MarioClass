<?php

session_start();

if(isset($_SESSION["m"])){	
	$id = $_SESSION["m"];
	header("location:index.php?action=alumnos");
	exit();
}else if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Carreras - Listado</title>
</head>
<body>
	<H1>LISTADO DE CARRERAS</H1>
	<?php
		$vistaCarrera = new MvcController();
		$vistaCarrera -> vistaCarreraController();
		$vistaCarrera -> borrarCarreraController();
	?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#carreras').DataTable();
	});