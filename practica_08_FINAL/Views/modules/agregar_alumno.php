<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar - Alumno</title>
</head>
<body>
	<h1>REGISTRAR ALUMNO</h1>
	<form method="post">
		<input type="text" placeholder="matricula" name="txtMatricula" required>
		<input type="text" placeholder="nombre" name="txtNombre" required>
		<input type="text" placeholder="carrera" name="txtCarrera" required>
		<input type="text" placeholder="tutor" name="txtTutor" required>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
<?php
	$registro = new MvcController();
	$registro -> registroAlumnosController();
?>





