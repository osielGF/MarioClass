<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaProductosModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT id, codigo, descripcion, precio_compra, precio_venta, existencia FROM $tabla ");	
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
	}

	#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public static function registroProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,descripcion,precio_compra,precio_venta,existencia) VALUES (:codigo,:descripcion,:precio_compra,:precio_venta,:existencia)");	
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datosModel["precio_compra"]);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"]);
		$stmt->bindParam(":existencia", $datosModel["existencia"], PDO::PARAM_INT);
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
		$stmt =Conexion::conectar()->prepare("SELECT codigo, descripcion, precio_compra, precio_venta, existencia FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR PRODUCTOS
	#-------------------------------------
	public static function actualizarProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, descripcion = :descripcion, precio_compra = :precio_compra, precio_venta = :precio_venta, existencia = :existencia WHERE id = :id");

		$stmt->bindParam(":codigo", $datosModel["codigo"]);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"]);
		$stmt->bindParam(":precio_compra", $datosModel["precio_compra"]);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"]);
		$stmt->bindParam(":existencia", $datosModel["existencia"]);
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
		$stmt->bindParam(":tienda", $idTienda, PDO::PARAM_INT);
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
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

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public static function registroUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password, email) VALUES (:username,:password,:email)");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
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

	#EDITAR USUARIOS
	#-------------------------------------
	public static function editarUsuariosModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT username, password, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR USUARIOS
	#-------------------------------------
	public static function actualizarUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET username = :username, password = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":username", $datosModel["username"]);
		$stmt->bindParam(":password", $datosModel["password"]);
		$stmt->bindParam(":email", $datosModel["email"]);
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

	#ELIMINAR PRODUCTO
	#-------------------------------------
	public static function eliminarProductosModel($data,$table,$idProduct)
	{
		//Obtener de l tabla usuarios, la contraseña en base al nombre de usuario inggresado
		$statement = Conexion::conectar()->prepare("SELECT password FROM usuarios WHERE id = :userId");
		$statement->bindParam(":userId",$data['userId'],PDO::PARAM_INT);
		$statement->execute();
		$password = $statement->fetch();
				
		if($password['password'] == $data["password"])
		{
			$statement2 = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");
			$statement2->bindParam(":id",$idProduct,PDO::PARAM_INT);
			$statement2->execute();
			return "success";
		}
		else
		{
			return "error";
		}
		$statement->close();
			
	}

	#AGREGAR STOCK PRODUCTOS
	#-------------------------------------
	public static function agregarStockModel($datosModel, $tabla)
	{
		$stmt0 = Conexion::conectar()->prepare("SELECT stock FROM $tabla WHERE id = :idS");
		$stmt0->bindParam(":idS", $datosModel["idProducto"]);
		$stmt0->execute();
		$cant = $stmt0->fetch();

		$suma = $cant['stock']+$datosModel["cantidad"];
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock WHERE id = :id");
		$stmt->bindParam(":stock", $suma);
		$stmt->bindParam(":id", $datosModel["idProducto"]);

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

	#QUITAR STOCK PRODUCTOS
	#-------------------------------------
	public static function quitarStockModel($datosModel, $tabla)
	{
		$stmt0 = Conexion::conectar()->prepare("SELECT stock FROM $tabla WHERE id = :idS");
		$stmt0->bindParam(":idS", $datosModel["idProducto"]);
		$stmt0->execute();
		$cant = $stmt0->fetch();

		$suma = $cant['stock']-$datosModel["cantidad"];
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock WHERE id = :id");
		$stmt->bindParam(":stock", $suma);
		$stmt->bindParam(":id", $datosModel["idProducto"]);

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

	#ELIMINAR USUARIO
	#-------------------------------------
	public static function eliminarUsuariosModel($data,$table,$idUser)
	{
		//Obtener de l tabla usuarios, la contraseña en base al nombre de usuario inggresado
		$statement = Conexion::conectar()->prepare("SELECT password FROM usuarios WHERE id = :userId");
		$statement->bindParam(":userId",$data['userId'],PDO::PARAM_INT);
		$statement->execute();
		$password = $statement->fetch();
				
		if($password['password'] == $data["password"])
		{
			$statement2 = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");
			$statement2->bindParam(":id",$idUser,PDO::PARAM_INT);
			$statement2->execute();
			return "success";
		}
		else
		{
			return "error";
		}
		$statement->close();
	}

	#VISTA VENTAS
	#-------------------------------------
	public static function vistaVentasModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");	
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
	}

	#REGISTRO DE VENTAS
	#-------------------------------------
	public static function registroVentasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha,codigo_producto,descripcion_producto,cantidad,total) VALUES (:fecha, :codigo,:descripcion,:cantidad,:total)");	
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":codigo", $datosModel["codigo"]);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"]);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"]);
		$stmt->bindParam(":total", $datosModel["total"]);
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

	#Traer la descripcion de un producto dato
	#-------------------------------------
	public static function getDescripcionProductoModel($codigo,$table)
	{
		//Obtener de l tabla usuarios, la contraseña en base al nombre de usuario inggresado
		$statement = Conexion::conectar()->prepare("SELECT descripcion FROM $table WHERE codigo = :code");
		$statement->bindParam(":code",$codigo,PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	#Traer el precio de un producto dato
	#-------------------------------------
	public static function getPrecioProductoModel($codigo,$table)
	{
		//Obtener de l tabla usuarios, la contraseña en base al nombre de usuario inggresado
		$statement = Conexion::conectar()->prepare("SELECT precio_venta FROM $table WHERE codigo = :code");
		$statement->bindParam(":code",$codigo,PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

}
?>