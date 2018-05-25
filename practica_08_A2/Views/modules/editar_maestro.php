<?php
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar - Maestro</title>
</head>
<body>
	<h1>EDITAR MAESTRO</h1>
	<form method="post">
	<?php
		$editarAlumno = new MvcController();
		$editarAlumno -> editarMaestroController();
		$editarAlumno -> actualizarMaestroController();
	?>
</form>
</body>
</html>