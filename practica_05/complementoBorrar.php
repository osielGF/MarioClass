<?php
	//Aquihacemos llmada de la pagina utilidades ya que en esa estan todas las funciones necesarias CRUD	
	require_once('utilities.php');
	//Traemos el ID mediante $_GET
	$userId = isset( $_GET['id'] ) ? $_GET['id'] : '';
	//Borramos el ujsuario de la tabla de la base dd datos segun el ID en el que se encuentre la pagina
	delete_query($userId);
	//Redireccionamos al inicio 
	header('Location: index.php')
?>