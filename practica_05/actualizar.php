<?php
	//Llamamos a utilities para usar las funciones CRUD
	require_once('utilities.php');
	//Traemos el ID en el que se encentre la pagina
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	//Almacenamos el resultado de los datos obtenidoos por la funcion llamada buscarId quje nos trae los datos de un determinado usuario
	$resultados = buscarId($id);  
?>
<?php require_once('header.php'); //Llamamos al header?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
</head>
<body>
	<div align="center">  
		<h1> ACTUALIZAR </h1>
	</div>
	<?php //Creamos un formulario que mandara los datos ala misma pagina mediante POST ?>
	<form action="./actualizar.php" method="POST"> 
		Nombre: <input type="text" name="txtNombreAc" value="<?php echo $resultados['nombre']?>">
		Correo: <input type="text" name="txtCorreoAc" value="<?php echo $resultados['correo']?>">
		<input type="submit" name="btnActualizar" value="ACTUALIZAR">
	</form>
	<?php
		//Compruenba que el boton btnActualizar halla sido lanzado para proceder a traer los demas campos y sus valores almacenandolos en variables
		if(isset($_POST["btnActualizar"]))
		{
		    if(isset($_POST["txtNombreAc"])) 
		    {
		    	$nombre =  $_POST["txtNombreAc"];
		    }
		    if(isset($_POST["txtCorreoAc"]))
		    {
		    	$correo = $_POST["txtCorreoAc"];
		    }
		    //Llamamos a la funcion update_query y realizamos la actualizacion en la base de datos segun el ID proporcionado
		    update_query($id,$nombre,$correo);
		    //Redireccionamos al inicio
		    header("location: index.php");
		}
	?>
</body>
</html>
<?php require_once('footer.php'); //Llamamos al footer?>