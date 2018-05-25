<?php
//MIOOOOOOOOOO--------
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaAlumnosModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, carrera, tutor FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR ALUMNO
	#-------------------------------------
	public static function editarAlumnoModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, carrera, tutor FROM $tabla WHERE matricula = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR ALUMNO
	#-------------------------------------
	public static function actualizarAlumnoModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula = :matricula, nombre = :nombre, carrera = :carrera, tutor = :tutor WHERE matricula = :id");

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["matricula"], PDO::PARAM_STR);
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

	#BORRAR ALUMNO
	#------------------------------------
	public static function borrarAlumnoModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);
		if($stmt->execute())
		{
			echo "siiiii";
			return "success";
		}
		else
		{
			echo "Nooooo";
			return "error";
		}
		$stmt->close();
	}

	#VISTA ALUMNO
	#-------------------------------------
	public static function vistaMaestrosModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, carrera, nombre, email, password FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR MAESTRO
	#-------------------------------------
	public static function editarMaestroModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, carrera, nombre, email, password FROM $tabla WHERE num_empleado = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR MAESTRO
	#-------------------------------------
	public static function actualizarMaestroModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET num_empleado = :num_empleado, carrera = :carrera, nombre = :nombre, email = :email, password = :password WHERE num_empleado = :id");

		$stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_INT);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["num_empleado"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			echo "siiiii";
			return "success";
		}
		else
		{
			echo "noooooooo";
			return "error";
		}
		$stmt->close();
	}

	#BORRAR MESTRO
	#------------------------------------
	public static function borrarMaestroModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE num_empleado = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			echo "siiiii";
			return "success";
		}
		else
		{
			echo "Nooooo";
			return "error";
		}
		$stmt->close();
	}

	#LOGIN MAESTROS
	#-------------------------------------
	public static function ingresoMaestroModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre = :nombre");	
		$statement->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	#REGISTRO DE ALUMNOS
	#-------------------------------------
	public static function registroAlumnosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, carrera, tutor) VALUES (:matricula,:nombre,:carrera,:tutor)");	
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
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

	#REGISTRO DE MAESTROS
	#-------------------------------------
	public static function registroMaestrosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(num_empleado, carrera, nombre, email, password) VALUES (:num_empleado,:carrera,:nombre, :email,:password)");	
		$stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_INT);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
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

	#VISTA CARRERA
	#-------------------------------------
	public static function vistaCarreraModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#EDITAR CARRERA
	#-------------------------------------
	public static function editarCarreraModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR MAESTRO
	#-------------------------------------
	public static function actualizarCarreraModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id = :id, nombre = :nombre WHERE id = :id2");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id2", $datosModel["id"], PDO::PARAM_INT);
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

	#BORRAR CARRERA
	#------------------------------------
	public static function borrarCarreraModel($id, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
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

	#REGISTRO DE  CARRERAS
	#------------------------------------
	public static function registroCarreraModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, nombre) VALUES (:id,:nombre)");	
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
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

	#VISTA TUTORIAS
	#-------------------------------------
	public static function vistaTutoriasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, alumno, tutor, fecha, hora, tipo, tutoria FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#BORRAR TUTORIA
	#------------------------------------
	public static function borrarTutoriaModel($id, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
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

	#REGISTRO DE  TUTORIAS
	#------------------------------------
	public static function registroTutoriaModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, alumno, tutor, fecha, hora, tipo, tutoria) VALUES (:id,:alumno,:tutor, :fecha,:hora,:tipo,:tutoria)");	
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":alumno", $datosModel["alumno"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":hora", $datosModel["hora"]);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":tutoria", $datosModel["tutoria"], PDO::PARAM_STR);
		if($stmt->execute())
		{
			echo 'siiiiiii';
			return "success";
		}
		else
		{
			echo 'noooooooo';
			return "error";
		}
		$stmt->close();
	}
}