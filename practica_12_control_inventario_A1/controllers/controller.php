<?php
//MIOOOOOOO------
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	public function pagina()
	{	
		include "views/template.php";
	}

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController()
	{
		if(isset( $_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	#VISTA DE ALUMNOS
	#------------------------------------
	public function vistaProductosController()
	{
		$arrayRespuesta = Datos::vistaProductosModel("productos");
		echo '<a href="index.php?action=agregar_producto"><input type="button" value="AGREGAR PRODUCTOS" name="btnAgregarProducto"></a>';
		echo '<table border="1" id="producto">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Precio_compra</th>
						<th>Precio_venta</th>
						<th>Stock</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["precio_compra"].'</td>
					<td>'.$item["precio_venta"].'</td>
					<td>'.$item["stock"].'</td>
					<td> <a href="index.php?action=editar_productos&id='.$item["id"].'"><button>Editar</button></a> </td>
					<td> <a href="index.php?action=productos&idBorrar='.$item["id"].'"><button>Borrar</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public function registroProductosController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"], 
								      "precio_compra"=>$_POST["txtPrecioCompra"],
								      "precio_venta"=>$_POST["txtPrecioVenta"],
								      "stock"=>$_POST["txtStock"]);

			$respuesta = Datos::registroProductosModel($datosController, "productos");
			if($respuesta == "success")
			{
				header("location:index.php?action=registroProducto");
			}
			else
			{
				header("location:index.php");
			}
		}
	}

	#EDITAR PRODUCTOS
	#------------------------------------
	public function editarProductosController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductosModel($datosController, "productos");

		echo'<input type="text" value="'.$respuesta["nombre"].'" name="txtNombre">
			 <input type="text" value="'.$respuesta["precio_compra"].'" name="txtPrecioCompra" required>
			 <input type="text" value="'.$respuesta["precio_venta"].'" name="txtPrecioVenta" required>
			 <input type="text" value="'.$respuesta["stock"].'" name="txtStock" required>
			 <input type="submit" name="btnActualizar" id="btnActualizar" value="btnActualizarProd">';
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductosController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
							          "precio_compra"=>$_POST["txtPrecioCompra"],
				                      "precio_venta"=>$_POST["txtPrecioVenta"],
				                      "id"=>$_GET["id"],
				                      "stock"=>$_POST["txtStock"]);
			
			$respuesta = Datos::actualizarProductosModel($datosController, "productos");
			if($respuesta == "success")
			{
				header("location:index.php?action=cambioProducto");
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarAlumnoController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");
			if($respuesta == "success")
			{
				header("location:index.php?action=alumnos");
			}
			else
			{
				echo "error";
			}
		}
	}

	#VISTA DE USUARIOS
	#------------------------------------
	public function vistaUsuariosController()
	{
		$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
		echo '<a href="index.php?action=agregar_usuario"><input type="button" value="AGREGAR USUARIO" name="btnAgregarUsuario"></a>';
		echo '<table border="1" id="producto">
				<thead>
					<tr>
						<th>Id</th>
						<th>Username</th>
						<th>Password</th>
						<th>email</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["username"].'</td>
					<td>'.$item["password"].'</td>
					<td>'.$item["email"].'</td>
					<td> <a href="index.php?action=editar_usuarios&id='.$item["id"].'"><button>Editar</button></a> </td>
					<td> <a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	#VISTA DE CATEGORIAS
	#------------------------------------
	public function vistaCategoriasController()
	{
		$arrayRespuesta = Datos::vistaCategoriasModel("categorias");
		echo '<a href="index.php?action=agregar_categoria"><input type="button" value="AGREGAR CATEGORIA" name="btnAgregarCategoria"></a>';
		echo '<table border="1" id="producto">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["nombre"].'</td>
					<td> <a href="index.php?action=editar_categoria&id='.$item["id"].'"><button>Editar</button></a> </td>
					<td> <a href="index.php?action=categorias&idBorrar='.$item["id"].'"><button>Borrar</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	public function ingresoUsuarioController()
	{
		if(isset($_POST['ingresar']))
		{	
			$datosController = array("username"=>$_POST['txtUsername'],
									"password"=>$_POST['txtPassword']);

			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
			if($respuesta["username"] == $_POST["username"] && $respuesta["password"] == $_POST["password"])
			{
				session_start();
				$_SESSION["u"] = true;
				header("location:index.php?action=productos");
			}
			if($_POST["nombre"]=="superadmin" && $_POST["password"]=="superadmin"){
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=productos");
			}
		}
	}
	
}
?>