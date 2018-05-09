<?php
	//Hacemos llamado de utlities porque ahi estan todas las funciones a utilizar CRUD
	require_once('utilities.php');	
?>

<?php require_once('header.php'); //LLamamos al header?>
<!DOCTYPE html>
<html>
<head>
	<title>Guardar</title>
</head>
<body>
	<div align="center">  
		<h1> GUARDAR </h1>
	</div>
	<?php //Aqui creamos un formulario el cual mandara los datos mediante POST  a esta misma pagina para procesarlos ?>
	<form action="./agregar.php" method="POST">  
		Nombre: <input type="text" name="txtNombre" placeholder="Escribe tu nombre">
		Correo: <input type="text" name="txtCorreo" placeholder="Escribe tu correo">
		<input type="submit" name="btnAgregar" value="AGREGAR">
	</form>
	<?php
		//Si el valor btnAgregar traido por $_POST fue encontrado procede a comprobar si los demas campos tambien fueron enviados y los almacena
		if(isset($_POST["btnAgregar"]))
		{
			if(isset($_POST["txtCorreo"])) 
		    {
		      	$correo =  $_POST["txtCorreo"];
		    }
		    if(isset($_POST["txtNombre"]))
		    {
		      	$nombre = $_POST["txtNombre"];
		    }
		    //Manda llamar la fjncion insert_query para realizar una insercion a la base de datos
		    insert_query($nombre,$correo);
		    //Redirecciona al index
		    header("location: index.php");
		}
	?>
</body>
</html>
<?php require_once('footer.php');//LLamamos al footer ?>