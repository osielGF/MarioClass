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
	<title>Maestros - Listado</title>
</head>
<body>
	<H1>LISTADO DE MAESTROS</H1>
	<table border="1">
		<thead>
			<tr>
				<th>No Empleado</th>
				<th>Carrera</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Password</th>
				<th>Editar?</th>
				<th>Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$vistaMaestro = new MvcController();
				$vistaMaestro -> vistaMaestrosController();
				$vistaMaestro -> borrarMaestroController();
			?>
		</tbody>
	</table>

</body>
</html>