<?php require_once('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<h1>MAESTROS - ALTA</h1>	
	</div>
	<form action="./almacenarDatosEmpleado.php" method="POST">
		Numero de empleado: <input id="txtNoEmpleado" type="text" name="txtNoEmpleado" placeholder="Escribe tu Numero de Empleado">
		Carrera: <input id="txtCarrera" type="text" name="txtCarrera" placeholder="Escribe tu Carrera">
		Nombre: <input id="txtNombre" type="text" name="txtNombre" placeholder="Escribe tu Nombre">
		Telefono: <input id="txtTelefono" type="text" name="txtTelefono" placeholder="Escribe tu Telefono">
		<input id="btnGuardar" type="submit" name="btnGuardar" value="GUARDAR">
	</form>
</body>
</html>
<?php require_once('footer.php'); ?>