<?php
	require_once('funciones.php');

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	eliminar_usuario($id);
	header("location: listado_usuarios.php");
?>