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
	<title>Maestros - Listado</title>
</head>
<body>
	<H1>LISTADO DE MAESTROS</H1>
	<?php
		$vistaMaestro = new MvcController();
		$vistaMaestro -> vistaMaestrosController();
		$vistaMaestro -> borrarMaestroController();
	?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#maestro').DataTable();
	});