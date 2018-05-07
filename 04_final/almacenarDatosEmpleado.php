<?php
	$E_NoEmpleado = $_POST['txtNoEmpleado'];
	$E_carrera = $_POST['txtCarrera'];
	$E_nombre = $_POST['txtNombre'];
	$E_telefono = $_POST['txtTelefono'];

	$file = fopen("alumnos_maestros.txt", "a+") or die("Problemas al crear el archivo de texto alumnos.txt");
	if($file)
	{
		fwrite($file, "\r\n");
		fwrite($file, "E".$E_NoEmpleado);
		fwrite($file, "\r\n");
		fwrite($file, "E".$E_carrera);
		fwrite($file, "\r\n");
		fwrite($file, "E".$E_nombre);
		fwrite($file, "\r\n");
		fwrite($file, "E".$E_telefono);
		fwrite($file, "\r\n");
	}
	fclose($file);
?>