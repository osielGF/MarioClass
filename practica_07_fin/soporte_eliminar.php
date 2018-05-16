<?php
	require_once('funciones.php');

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	eliminar_producto($id);
	header("location: listado_productos.php");
?>