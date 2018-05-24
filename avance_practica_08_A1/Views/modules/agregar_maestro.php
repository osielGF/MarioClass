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
	<title>Registrar - Maestro</title>
</head>
<body>
	<h1>REGISTRAR MAESTRO</h1>
	<form method="post">
		<input type="text" placeholder="numero empleado" name="txtEmpleado" required>
		<input type="text" placeholder="carrera" name="txtCarrera" required>
		<input type="text" placeholder="nombre" name="txtNombre" required>
		<input type="text" placeholder="email" name="txtEmail" required>
		<input type="text" placeholder="password" name="txtPassword" required>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
<?php
	$registro = new MvcController();
	$registro -> registroMaestrosController();
?>


