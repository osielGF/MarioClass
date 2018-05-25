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
	<title>Registrar - Tutoria</title>
</head>
<body>
	<h1>REGISTRAR TUTORIA</h1>
	<form method="post">
		<input type="text" placeholder="id" name="txtId" required>
		<input type="text" placeholder="alumno" name="txtAlumno" required>
		<input type="text" placeholder="tutor" name="txtTutor" required>
		<input type="date" placeholder="fecha" name="txtFecha" required>
		<input type="time" placeholder="hora" name="txtHora" required>
		<input type="text" placeholder="tipo" name="txtTipo" required>
		<input type="text" placeholder="tutoria" name="txtTutoria" required>
		<input type="submit" name="btnRegistrarTutoria" value="Enviar">
	</form>
</body>
</html>
<?php
	$registro = new MvcController();
	$registro -> registroTutoriasController();
?>





