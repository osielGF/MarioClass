<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaProductosModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, precio_compra, precio_venta, stock FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public static function registroProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, precio_compra, precio_venta, stock) VALUES (:nombre,:precio_compra,:precio_venta,:stock)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datosModel["precio_compra"]);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"]);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	#EDITAR PRODUCTOS
	#-------------------------------------
	public static function editarProductosModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT nombre, precio_compra, precio_venta, stock FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR PRODUCTOS
	#-------------------------------------
	public static function actualizarProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio_compra = :precio_compra, precio_venta = :precio_venta, stock = :stock WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":precio_compra", $datosModel["precio_compra"]);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"]);
		$stmt->bindParam(":stock", $datosModel["stock"]);
		$stmt->bindParam(":id", $datosModel["id"]);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	#BORRAR PRODUCTO
	#------------------------------------
	public static function borrarProductoModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaUsuariosModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, username, password, email FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#VISTA CATEGORIAS	
	#-------------------------------------
	public static function vistaCategoriasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username");	
		$statement->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

}
?>