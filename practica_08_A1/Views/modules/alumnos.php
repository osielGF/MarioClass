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
	<title>Alumnos - Listado</title>
</head>
<body>
	<H1>LISTADO DE ALUMNOS</H1>
	<table border="1">
		<thead>
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Carrera</th>
				<th>Tutor</th>
				<th>Editar?</th>
				<th>Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$vistaAlumno = new MvcController();
				$vistaAlumno -> vistaAlumnosController();
				$vistaAlumno -> borrarAlumnoController();
			?>
		</tbody>
	</table>

</body>
</html>