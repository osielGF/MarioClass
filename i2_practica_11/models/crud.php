<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaLibrosModel($tabla,$idUsuario)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario"); 
		$stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getCantidadLibrosModel($tabla,$idUsuario)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla WHERE id_usuario = :id_usuario"); 
		$stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function registroLibrosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo,autor,descripcion,id_usuario) VALUES (:titulo, :autor, :descripcion, :id_usuario)");	
		$stmt->bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
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

	public static function registroUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,username,password) VALUES (:nombre, :username, :password)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
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

	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username and password = :password");	
		$statement->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$statement->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

 	public static function editarLibrosModel($idLibro,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_libro = :id_libro");
 		$stm->bindParam(":id_libro", $idLibro, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

	public static function getDatosUsuarioModel()
	{
		$stm = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
 		$stm->bindParam(":id_usuario", $_SESSION["id"], PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
	} 	

	public static function actualizarLibrosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, autor = :autor, descripcion = :descripcion, id_usuario = :id_usuario WHERE id_libro = :id_libro");	
		$stmt->bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_libro", $datosModel["id_libro"], PDO::PARAM_INT);
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

	public static function actualizarPerfilModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, username = :username, password = :password WHERE id_usuario = :id_usuario");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
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

	public static function borrarLibrosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_libro = :id_libro");	
		$stmt->bindParam(":id_libro", $datosModel, PDO::PARAM_INT);
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



	




}
?>