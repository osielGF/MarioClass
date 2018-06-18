<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaProductosModel($tabla,$idTienda)
	{
			$stmt = Conexion::conectar()->prepare("SELECT id, nombre, precio_compra, precio_venta, stock, categoria, tienda FROM $tabla 
												   WHERE tienda = :tienda");	
			$stmt->bindParam(":tienda", $idTienda, PDO::PARAM_INT);
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
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, precio_compra, precio_venta, stock, categoria, tienda) VALUES (:nombre,:precio_compra,:precio_venta,:stock,:categoria,:tienda)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datosModel["precio_compra"]);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"]);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":tienda", $datosModel["tienda"], PDO::PARAM_INT);
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
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio_compra = :precio_compra, precio_venta = :precio_venta, stock = :stock, categoria = :categoria, tienda = :tienda WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":precio_compra", $datosModel["precio_compra"]);
		$stmt->bindParam(":precio_venta", $datosModel["precio_venta"]);
		$stmt->bindParam(":stock", $datosModel["stock"]);
		$stmt->bindParam(":categoria", $datosModel["categoria"]);
		$stmt->bindParam(":tienda", $datosModel["tienda"]);
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

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaUsuariosModel($tabla,$idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, username, password, email, tienda FROM $tabla WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda", $idTienda, PDO::PARAM_INT);
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#VISTA CATEGORIAS	
	#-------------------------------------
	public static function vistaCategoriasModel($tabla,$idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, tienda FROM $tabla WHERE tienda = :tienda");	
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
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password, email, tienda) VALUES (:username,:password,:email,:tienda)");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":tienda", $datosModel["tienda"], PDO::PARAM_STR);
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
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET username = :username, password = :password, email = :email, tienda = :tienda WHERE id = :id");

		$stmt->bindParam(":username", $datosModel["username"]);
		$stmt->bindParam(":password", $datosModel["password"]);
		$stmt->bindParam(":email", $datosModel["email"]);
		$stmt->bindParam(":tienda", $datosModel["tienda"]);
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

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public static function registroCategoriasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, tienda) VALUES (:nombre,:tienda)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tienda", $datosModel["tienda"], PDO::PARAM_INT);
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

	#EDITAR CATEGORIAS
	#-------------------------------------
	public static function editarCategoriasModel($idPorGet, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idPorGet, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#ACTUALIZAR CATEGORIAS
	#-------------------------------------
	public static function actualizarCategoriasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, tienda = :tienda WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":tienda", $datosModel["tienda"]);
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

	#TRAER TODAS LAS CATEGORIAS EXISTENTES
	#-------------------------------------
	public static function getCategoriasModel($tabla,$idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE tienda = :idTienda");	
		$stmt->bindParam(":idTienda", $idTienda);
		$stmt->execute();
		return $stmt->fetchAll();
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

		if($datosModel["cantidad"]<=$cant["stock"])
		{
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
		else
		{
			echo "no puedes quitar al stock mas de lo que tienes!!!</br>";
		}
		
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

	#REGISTRO DE HISTORIAL
	#-------------------------------------
	public static function registroHistorialModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto,id_usuario,cantidad,fecha,nota,referencia,tienda,tipo) VALUES (:id_producto,:id_usuario,:cantidad,:fecha,:nota,:referencia,:tienda,:tipo)");

		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":nota", $datosModel["nota"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datosModel["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":tienda", $datosModel["tienda"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
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

	#VISTA HISTORIAL
	#-------------------------------------
	public static function vistaHistorialModel($tabla,$idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id_historial,id_producto,id_usuario,cantidad,fecha,nota,referencia,tienda,tipo FROM $tabla WHERE tienda = :tienda");
		$stmt->bindParam(":tienda", $idTienda, PDO::PARAM_INT);
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#ELIMINAR CATEGORIA
	#-------------------------------------
	public static function eliminarCategoriasModel($table,$idCate,$idTienda)
	{
			//Consulta para obtener el nombre de la categoria a borrar
			$statement4 = Conexion::conectar()->prepare("SELECT nombre FROM categorias WHERE id = :idCateg");
			$statement4-> bindParam(":idCateg",$idCate,PDO::PARAM_INT);
			$statement4-> execute();
			$nomCate = $statement4->fetch();
			//Conslta para saber si hay productos con ese nombre de categoria para borrarlos
			$statement5 = Conexion::conectar()->prepare("SELECT count(*) as cant FROM productos WHERE categoria = :nomCateg and tienda=:tien");
			$statement5-> bindParam(":nomCateg",$nomCate["nombre"],PDO::PARAM_STR);
			$statement5-> bindParam(":tien",$idTienda,PDO::PARAM_INT);
			$statement5-> execute();
			$cantidad = $statement5->fetch();

			if($cantidad["cant"]>0)
			{
				//Eliminar de la tabla productos todos los prductos donde su categoria sea la categoria a eliminar
				$statement3 = Conexion::conectar()->prepare("DELETE FROM productos WHERE categoria = :categoria and tienda = :tie");
				$statement3-> bindParam(":categoria",$nomCate["nombre"],PDO::PARAM_STR);
				$statement3-> bindParam(":tie",$idTienda,PDO::PARAM_INT);
				$statement3-> execute();
			}
			//Eliminar de la tabla categorias,la categoria a eliminar
			$statement2 = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :idCate");
			$statement2-> bindParam(":idCate",$idCate,PDO::PARAM_INT);
			$statement2-> execute();
			return "success";
			$statement->close();
	}

	#TRAER TODAS TIENDAS EXISTENTES
	#-------------------------------------
	public static function getTiendasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, direccion, status FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#Traerel nombre de tienda
	#-------------------------------------
	public static function getTiendaProductoModel($idTienda, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT tienda FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $idTienda, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#Traerel ID de tienda
	#-------------------------------------
	public static function getTiendaIdProductoModel($dato)
	{
		$stmt2 = Conexion::conectar()->prepare("SELECT id FROM tiendas WHERE nombre = :nom");
		$stmt2->bindParam(":nom", $dato);	
		$stmt2->execute();
		return $stmt2->fetch();
		$stmt2->close();		
	}

	#VISTA TIENDAS
	#-------------------------------------
	public static function vistaTiendasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id,nombre,direccion,status FROM $tabla");
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#INGRESAR A UNA TIENDA
	#-------------------------------------
	public function getTiendaModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");	
		$stmt->bindParam(":id", $datosModel["id_tienda"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#VISTA VENTAS
	#-------------------------------------
	public static function vistaVentasModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");	
			if($stmt->execute())
			{
				return $stmt->fetchAll();
				$stmt->close();
			}
			else
			{
				echo "no traje nada de la tabla ventas!!!!!!!";
			}
			
	}

	#TRAER TODAS productos EXISTENTES-------------------------------------------------------------------
	#-------------------------------------
	public static function getProductosModel($tabla,$idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda",$idTienda, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetchAll();	
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	#Traer la descripcion de un producto dato
	#-------------------------------------
	public static function getDescripcionProductoModel($idProducto,$table)
	{
		//Obtener de l tabla usuarios, la contraseña en base al nombre de usuario inggresado
		$statement = Conexion::conectar()->prepare("SELECT nombre FROM $table WHERE id = :id");
		$statement->bindParam(":id",$idProducto,PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	#Traer el precio de un producto dato
	#-------------------------------------
	public static function getPrecioProductoModel($idProducto,$table)
	{
		//Obtener de l tabla usuarios, la contraseña en base al nombre de usuario inggresado
		$statement = Conexion::conectar()->prepare("SELECT precio_venta FROM $table WHERE id = :id");
		$statement->bindParam(":id",$idProducto,PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	#REGISTRO DE VENTAS
	#-------------------------------------
	public static function registroVentasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha,id_producto,descripcion_producto,cantidad,total,tienda) VALUES (:fecha,:id_producto,:descripcion,:cantidad,:total,:tienda)");	
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":id_producto", $datosModel["id_producto"]);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"]);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"]);
		$stmt->bindParam(":total", $datosModel["total"]);
		$stmt->bindParam(":tienda", $datosModel["tienda"]);
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

	#TRAER CANTIDAD DE PRODUCTOS DE UNA DETERMINADA TIENDA
	#-------------------------------------
	public static function getCantidadProductosModel($idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM productos WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda",$idTienda, PDO::PARAM_INT);
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	#TRAER CANTIDAD DE CATEGORIAS DE UNA DETERMINADA TIENDA
	#-------------------------------------
	public static function getCantidadCategoriasModel($idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM categorias WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda",$idTienda, PDO::PARAM_INT);
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	#TRAER CANTIDAD DE USUARIOS DE UNA DETERMINADA TIENDA
	#-------------------------------------
	public static function getCantidadUsuariosModel($idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM usuarios WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda",$idTienda, PDO::PARAM_INT);
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	#TRAER EL NOMBRE DE USARIO DE DETERMINADA TIENDA
	#-------------------------------------
	public static function getNombreUsuarioTiendaModel($idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT username FROM usuarios WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda",$idTienda, PDO::PARAM_INT);
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	#TRAER EL NOMBRE DE LA TIENDA
	#-------------------------------------
	public static function getNombreTiendaModel($idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM tiendas WHERE id = :tienda");	
		$stmt->bindParam(":tienda",$idTienda, PDO::PARAM_INT);
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	#REGISTRO DE TIENDAS
	#-------------------------------------
	public static function registroTiendasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, direccion, status) VALUES (:nombre,:direccion,:status)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datosModel["direccion"]);
		$stmt->bindParam(":status", $datosModel["estatus"]);
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