<?php
	session_start();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar - Alumno</title>
</head>
<body>
	<h1>EDITAR ALUMNO</h1>
	<form method="post">
	<?php
		$editarAlumno = new MvcController();
		$editarAlumno -> editarAlumnoController();
		$editarAlumno -> actualizarAlumnoController();
	?>
</form>
</body>
</html>