<?php
	//Index que muestra al usuario la salida de las vistas y a traves de el enviaremos las diferentes acciones del usario al controlador

	//Invocar el controlador que tendra control sobre todos los procesos
	require_once("Controllers/controller.php");

	//Invocamos a los enlaces que sabran a que vista irse
	require_once("Models/enlaces.php");

	//Llamar el modelo para las operaciones con la base de datos
	require_once("Models/crud.php");

	//Para poder ver el template o plantilla, se hace una peticionmediante un controlador 
	//Creamos elobjeto
	$mvc = new MvcController();

	//Muestra la funcion "plantilla" que seencuentra en "Controllers/Controller"
	$mvc -> plantilla();

?>