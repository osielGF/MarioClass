<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistasModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
	}

		#REGISTRO DE ALUMNAS
	#-------------------------------------
	public static function registroAlumnasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, fecha_nac, grupo) VALUES (:nombre,:apellido,:fecha_nac,:grupo)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nac", $datosModel["fecha_nac"]);
		$stmt->bindParam(":grupo", $datosModel["grupo"], PDO::PARAM_STR);
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
	public static function editarAlumnasModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}

	#ACTUALIZAR PRODUCTOS
	#-------------------------------------
	public static function actualizarAlumnasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, fecha_nac = :fecha_nac, grupo = :grupo WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":apellido", $datosModel["apellido"]);
		$stmt->bindParam(":fecha_nac", $datosModel["fecha_nac"]);
		$stmt->bindParam(":grupo", $datosModel["grupo"]);
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

	#BORRAR ALUMNAS
	#------------------------------------
	public static function borrarJSModel($datosModel, $tabla)
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

	#REGISTRO DE GRUPOS
	#-------------------------------------
	public static function registroGruposModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
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

	#TRAER TODAS LOS GRUPOS EXISTENTES
	#-------------------------------------
	public static function getGruposModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}



	#EDITAR PAGOS
	#-------------------------------------
	public static function editarPagosModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}

	#ACTUALIZAR PAGOS
	#-------------------------------------
	public static function actualizarPagosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_grupo = :id_grupo, id_alumno = :id_alumno, nombre_mama = :nombre_mama, apellido_mama = :apellido_mama, fecha_pago = :fecha_pago, fecha_envio = :fecha_envio, imagen_folio = :imagen_folio, folio = :folio WHERE id = :id");

		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"]);
		$stmt->bindParam(":id_alumno", $datosModel["id_alumno"]);
		$stmt->bindParam(":nombre_mama", $datosModel["nombre_mama"]);
		$stmt->bindParam(":apellido_mama", $datosModel["apellido_mama"]);
		$stmt->bindParam(":fecha_pago", $datosModel["fecha_pago"]);
		$stmt->bindParam(":fecha_envio", $datosModel["fecha_envio"]);
		$stmt->bindParam(":imagen_folio", $datosModel["imagen_folio"]);
		$stmt->bindParam(":folio", $datosModel["folio"]);
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

	#TRAER TODAS LOS ALUMNAS EXISTENTES
	#-------------------------------------
	public static function getAlumnasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#REGISTRO DE PAGOS
	#-------------------------------------
	public static function registroPagosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (grupo,alumna,nombre_mama,apellido_mama,fecha_pago,fecha_envio,imagen_folio,folio) VALUES (:grupo,:alumna,:nombre_mama,:apellido_mama,:fecha_pago,:fecha_envio,:imagen_folio,:folio)");	
		$stmt->bindParam(":grupo", $datosModel["grupo"]);
		$stmt->bindParam(":alumna", $datosModel["alumna"]);
		$stmt->bindParam(":nombre_mama", $datosModel["nombre_mama"]);
		$stmt->bindParam(":apellido_mama", $datosModel["apellido_mama"]);
		$stmt->bindParam(":fecha_pago", $datosModel["fecha_pago"]);
		$stmt->bindParam(":fecha_envio", $datosModel["fecha_envio"]);
		$stmt->bindParam(":imagen_folio", $datosModel["imagen_folio"]);
		$stmt->bindParam(":folio", $datosModel["folio"]);
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

	#BORRAR ALUMNAS DE UNA CATEGORIA
	#------------------------------------
	public static function borrarAlumnasDeGrupoTalModel($idGrupo, $tabla)
	{
		$stmt2 = Conexion::conectar()->prepare("SELECT nombre FROM grupos WHERE id = :id");
		$stmt2 -> bindParam(":id", $idGrupo, PDO::PARAM_INT);
		$stmt2 -> execute();
		$nombre = $stmt2-> fetch();

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE grupo = :grupo");
		$stmt -> bindParam(":grupo", $nombre["nombre"], PDO::PARAM_STR);
		
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

	#TRAER E GRUPO QUE TENIA UNA ALUMNA 
	#-------------------------------------
	public static function traerGrupoDeAlumnaModel($idAlumna,$tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT grupo FROM $tabla WHERE id = :id");	
		$stmt -> bindParam(":id", $idAlumna, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetch();	
		}
		$stmt->close();
	}


}
?>