<?php
	require_once('funciones.php');

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	eliminar_venta($id);
	header("location: ventas_listado.php");
?>