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
		echo '<a href="index.php?action=agregar_producto"><input type="button" value="AGREGAR PRODUCTOS" name="btnAgregarProducto"
			class="btn btn-success" title= "Agregar Producto"></a></br>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Precio_compra</th>
						<th>Precio_venta</th>
						<th>Stock</th>
						<th>Categoria</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
						<th>Ver?</th>
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
					<td>'.$item["categoria"].'</td>
					<td> <a href="index.php?action=editar_productos&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <a href="index.php?action=eliminar_producto&id='.$item["id"].'"><button class="btn btn-block btn-danger">Borrar</button></a> </td>
					<td> <a href="index.php?action=ver_producto&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">VER</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table> ';
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
								      "stock"=>$_POST["txtStock"],
								  		"categoria"=>$_POST["select_categorias"]);

			$respuesta = Datos::registroProductosModel($datosController, "productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=productos'
					</script>";
			}
			else
			{
				echo "no jalo";
			}
		}
	}

	#EDITAR PRODUCTOS
	#------------------------------------
	public function editarProductosController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductosModel($datosController, "productos");

		echo'<input type="text" value="'.$respuesta["nombre"].'" name="txtNombre" class="form-control my-colorpicker1">
			</br>	
			 <input type="text" value="'.$respuesta["precio_compra"].'" name="txtPrecioCompra" required class="form-control my-colorpicker1">
			 </br>
			 <input type="text" value="'.$respuesta["precio_venta"].'" name="txtPrecioVenta" required class="form-control my-colorpicker1">
			 </br>
			 <input type="text" value="'.$respuesta["stock"].'" name="txtStock" required class="form-control my-colorpicker1">
			 </br>
			 ';
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductosController()
	{
		if(isset($_POST["btnActualizar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
							          "precio_compra"=>$_POST["txtPrecioCompra"],
				                      "precio_venta"=>$_POST["txtPrecioVenta"],
				                      "id"=>$_GET["id"],
				                      "stock"=>$_POST["txtStock"],
				                  		"categoria"=>$_POST["select_categorias"]);
			
			$respuesta = Datos::actualizarProductosModel($datosController, "productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cambioProducto'
					</script>";
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

	#BORRAR PRODUCTO
	#------------------------------------
	public static function eliminarProductosController()
	{
			if(isset($_POST['btnConfirmacion']))
			{
				$data = array("userId"=>$_SESSION["user"],"password"=>$_POST["txtPassword"]);
				$respuesta = Datos::eliminarProductosModel($data,"productos",$_GET["id"]);
				if($respuesta=="success"){
						echo "<script>
							window.location='index.php?action=productos'

						</script>";
				}else if($respuesta == "fail"){
						echo "<br><h1>Error al Eliminar<h1>";
				}
			}

		}

	#VISTA DE USUARIOS
	#------------------------------------
	public function vistaUsuariosController()
	{
		$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
		echo '<a href="index.php?action=agregar_usuario"><input type="button" value="AGREGAR USUARIO" name="btnAgregarUsuario"
			class="btn btn-success" title= "Agregar Usuario"></a>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
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
					<td> <a href="index.php?action=editar_usuarios&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <a href="index.php?action=eliminar_usuario&id='.$item["id"].'"><button class="btn btn-block btn-danger">Borrar</button></a> </td>
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
		echo '<a href="index.php?action=agregar_categoria"><input type="button" value="AGREGAR CATEGORIA" name="btnAgregarCategoria" class="btn btn-success"></a>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
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
					<td> <a href="index.php?action=editar_categorias&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <a href="index.php?action=categorias&idBorrar='.$item["id"].'"><button class="btn btn-block btn-danger">Borrar</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	public function ingresoUsuarioController()
	{
		if(isset($_POST['btnIngresar']))
		{	
			$datosController = array("username"=>$_POST['txtUsername'],
									"password"=>$_POST['txtPassword']);

			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
			if($respuesta["username"] == $_POST["txtUsername"] && $respuesta["password"] == $_POST["txtPassword"])
			{
				session_start();
				$_SESSION["user"] = $respuesta["id"];
				header("location:index.php?action=productos");
			}
			else
			{
				header("location:index.php");
			}
		}
	}

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuariosController()
	{
		if(isset($_POST["txtUsername"]))
		{
			$datosController = array( "username"=>$_POST["txtUsername"], 
								      "password"=>$_POST["txtPassword"],
								      "email"=>$_POST["txtEmail"]);

			$respuesta = Datos::registroUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=usuarios'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php?action=usuarios'
					</script>";
			}
		}
	}

	#EDITAR USUARIOS
	#------------------------------------
	public function editarUsuariosController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuariosModel($datosController, "usuarios");

		echo'<input type="text" value="'.$respuesta["username"].'" name="txtUsername" class="form-control my-colorpicker1">
			</br>	
			 <input type="text" value="'.$respuesta["password"].'" name="txtPassword" required class="form-control my-colorpicker1">
			 </br>
			 <input type="text" value="'.$respuesta["email"].'" name="txtEmail" required class="form-control my-colorpicker1">
			 </br>
			 <input type="submit" name="btnActualizar" id="btnActualizar" value="ACTUALIZAR">';
	}

	#ACTUALIZAR USUARIOS
	#------------------------------------
	public function actualizarUsuariosController()
	{
		if(isset($_POST["txtUsername"]))
		{
			$datosController = array( "username"=>$_POST["txtUsername"],
							          "password"=>$_POST["txtPassword"],
				                      "id"=>$_GET["id"],
				                      "email"=>$_POST["txtEmail"]);
			
			$respuesta = Datos::actualizarUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cambioUsuario'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#REGISTRO DE CATEGORIAS
	#-------------------------------------
	public function registroCategoriasController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"]);

			$respuesta = Datos::registroCategoriasModel($datosController, "categorias");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=registroCategoria'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php?action=categorias'
					</script>";
			}
		}
	}

	#EDITAR CATEGORIAS
	#------------------------------------
	public function editarCategoriasController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarCategoriasModel($datosController, "categorias");

		echo'<input type="text" value="'.$respuesta["nombre"].'" name="txtNombre" class="form-control my-colorpicker1">
			</br>	
			 <input type="submit" name="btnActualizar" id="btnActualizar" value="ACTUALIZAR">';
	}

	#ACTUALIZAR CATEGORIAS
	#------------------------------------
	public function actualizarCategoriasController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
				                      "id"=>$_GET["id"]);
			
			$respuesta = Datos::actualizarCategoriasModel($datosController, "categorias");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cambioCategoria'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#TRAER TODAS LAS CATEGORIAS EXISTENTES
	#------------------------------------
	public function getCategoriasController()
	{
		$todasCategorias = Datos::getCategoriasModel("categorias");
		
		foreach($todasCategorias as $row => $item)
		{
		echo '
				<option value="'.$item["nombre"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#AGREGAR - QUITAR_ STOCK
	#-------------------------------------
	public function stockController()
	{
		if(isset($_POST["btnAgregarStock"]))
		{
			$datosController = array( "cantidad"=>$_POST["numCantidad"], 
								  		"idProducto"=>$_GET["id"]);

			$respuesta = Datos::agregarStockModel($datosController, "productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=productos'
					</script>";
				//-------------aqui hay que registrar en el historial
				$datosController2 = array("cantidad"=>$_POST["numCantidad"], "id_producto"=>$_GET["id"], "id_usuario"=>$_SESSION["user"],
										"fecha"=>$_POST["txtDate"], "nota"=>$_POST["txtNota"], "referencia"=>$_POST["txtReferencia"]);
				$respuesta2 = Datos::registroHistorialController($datosController2, "historial");
			}
			else
			{
				echo "no jalo";
			}
		}
		else
		if(isset($_POST["btnQuitarStock"]))
		{
			$datosController = array( "cantidad"=>$_POST["numCantidad"], 
								  		"idProducto"=>$_GET["id"]);

			$respuesta = Datos::quitarStockModel($datosController, "productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=productos'
					</script>";
				//-------------aqui hay que registrar en el historial
				$datosController2 = array("cantidad"=>$_POST["numCantidad"], "id_producto"=>$_GET["id"], "id_usuario"=>$_SESSION["user"],
										"fecha"=>$_POST["txtDate"], "nota"=>$_POST["txtNota"], "referencia"=>$_POST["txtReferencia"]);
				$respuesta2 = Datos::registroHistorialController($datosController2, "historial");
			}
			else
			{
				echo "no jalo";
			}
		}
	}

	#ELIMINAR USUARIO
	#------------------------------------
	public static function eliminarUsuariosController()
	{
			if(isset($_POST['btnConfirmacion']))
			{
				$data = array("userId"=>$_SESSION["user"],"password"=>$_POST["txtPassword"]);
				$respuesta = Datos::eliminarUsuariosModel($data,"usuarios",$_GET["id"]);

				if($respuesta=="success")
				{
						echo "<script>
							window.location='index.php?action=usuarios'

						</script>";
				}
				else if($respuesta == "error")
				{
						echo "<br><h1>Error al Eliminar<h1>";
				}
			}

    }

    #REGISTRO DE DATOS PARA EL HISTORIAL
	#-------------------------------------
	public function registroHistorialController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"]);

			$respuesta = Datos::registroCategoriasModel($datosController, "categorias");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=registroCategoria'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php?action=categorias'
					</script>";
			}
		}
	}

	#VISTA DEL HISTORIAL
	#------------------------------------
	public function vistaHistorialController()
	{
		$arrayRespuesta = Datos::vistaHistorialModel("historial");
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id_historial</th>
						<th>Id_producto</th>
						<th>Id_usuario</th>
						<th>Cantidad</th>
						<th>Fecha</th>
						<th>Nota</th>
						<th>Referencia</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id_historial"].'</td>
					<td>'.$item["id_producto"].'</td>
					<td>'.$item["id_usuario"].'</td>
					<td>'.$item["cantidad"].'</td>
					<td>'.$item["fecha"].'</td>
					<td>'.$item["nota"].'</td>
					<td>'.$item["referencia"].'</td>
				</tr>
			</tbody>';
		}
		echo '</table> ';
	}

	
}
?>