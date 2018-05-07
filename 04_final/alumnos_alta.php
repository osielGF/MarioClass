<?php require_once('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<div align="center">
		<h1>ALUMNOS - ALTA</h1>	
	</div>
	<form action="./almacenarDatos.php" method="POST">
	    Matricula: <input id="txtMatricula" type="text" name="txtMatricula" placeholder="Escribe tu Matricula">    
	   	Nombre: <input id="txtNombre" type="text" name="txtNombre" placeholder="Escribe tu Nombre">    
	   	Carrera: <input id="txtCarrera" type="text" name="txtCarrera" placeholder="Escribe tu Carrera">    
	   	E-mail: <input id="txtEmail" type="text" name="txtEmail" placeholder="Escribe tu Email">    
	   	Telefono: <input id="txtTelefono" type="text" name="txtTelefono" placeholder="Escribe tu Telefono">  
	 	<input id="btnGuardar" type="submit" name="btnGuardar" value="GUARDAR">
	 </form>
</body>
</html>
<?php require_once('footer.php'); ?>