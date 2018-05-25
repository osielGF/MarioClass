<?php
session_start();
if(!$_SESSION["validar"])
{
	header("location:index.php?action=ingresar");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar - Carrera</title>
</head>
<body>
	<h1>REGISTRAR CARRERA</h1>
	<form method="post">
		<input type="text" placeholder="id" name="txtId">
		<input type="text" placeholder="nombre" name="txtNombre">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
<?php
	$registro = new MvcController();
	$registro -> registroCarreraController();
?>


