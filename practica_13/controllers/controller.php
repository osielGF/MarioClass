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
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio_compra</th>
						<th>Precio_venta</th>
						<th>Existencia</th>
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
					<td>'.$item["codigo"].'</td>
					<td>'.$item["descripcion"].'</td>
					<td>'.$item["precio_compra"].'</td>
					<td>'.$item["precio_venta"].'</td>
					<td>'.$item["existencia"].'</td>
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
		if(isset($_POST["txtDescripcion"]))
		{
			$datosController = array( "codigo"=>$_POST["txtCodigo"], 
								      "descripcion"=>$_POST["txtDescripcion"],
								      "precio_compra"=>$_POST["txtPrecioCompra"],
								      "precio_venta"=>$_POST["txtPrecioVenta"],
								      "existencia"=>$_POST["txtExistencia"]);

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

		echo'<input type="text" value="'.$respuesta["codigo"].'" name="txtCodigo" class="form-control my-colorpicker1">
			</br>
			<input type="text" value="'.$respuesta["descripcion"].'" name="txtDescripcion" class="form-control my-colorpicker1">
			</br>	
			 <input type="text" value="'.$respuesta["precio_compra"].'" name="txtPrecioCompra" required class="form-control my-colorpicker1">
			 </br>
			 <input type="text" value="'.$respuesta["precio_venta"].'" name="txtPrecioVenta" required class="form-control my-colorpicker1">
			 </br>
			 <input type="text" value="'.$respuesta["existencia"].'" name="txtExistencia" required class="form-control my-colorpicker1">
			 </br>
			 ';
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductosController()
	{
		if(isset($_POST["btnActualizar"]))
		{
			$datosController = array( "codigo"=>$_POST["txtCodigo"],
										"descripcion"=>$_POST["txtDescripcion"],
							          "precio_compra"=>$_POST["txtPrecioCompra"],
				                      "precio_venta"=>$_POST["txtPrecioVenta"],
				                      "id"=>$_GET["id"],
				                      "existencia"=>$_POST["txtExistencia"]);
			
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
						<th>Email</th>
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
				echo "<script>
						window.location='index.php?action=productos'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php'
					</script>";
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
				echo "no jalo el registro usuario";
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
			 ';
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
				$tiendaDelProducto = Datos::getTiendaProductoModel($_GET["id"], "productos");
				//-------------aqui hay que registrar en el historial
				$datosController2 = array("cantidad"=>$_POST["numCantidad"], "id_producto"=>$_GET["id"], "id_usuario"=>$_SESSION["user"],
										"fecha"=>$_POST["txtDate"], "nota"=>$_POST["txtNota"], "referencia"=>$_POST["txtReferencia"],
										"tienda"=>$_SESSION["id_tienda"]);
				$respuesta2 = Datos::registroHistorialModel($datosController2, "historial");
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
				$tiendaDelProducto = Datos::getTiendaProductoModel($_GET["id"], "productos");
				//-------------aqui hay que registrar en el historial
				$datosController2 = array("cantidad"=>$_POST["numCantidad"], "id_producto"=>$_GET["id"], "id_usuario"=>$_SESSION["user"],
										"fecha"=>$_POST["txtDate"], "nota"=>$_POST["txtNota"], "referencia"=>$_POST["txtReferencia"],
										"tienda"=>$_SESSION["id_tienda"]);
				$respuesta2 = Datos::registroHistorialModel($datosController2, "historial");
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

    #VISTA DE VENTAS
	#------------------------------------
	public function vistaVentasController()
	{
		$arrayRespuesta = Datos::vistaVentasModel("ventas");
		echo '<a href="index.php?action=agregar_venta"><input type="button" value="AGREGAR VENTA" name="btnAgregarVenta"
			class="btn btn-success" title= "Agregar Producto"></a></br>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Codigo_producto</th>
						<th>Descripcion</th>
						<th>Cantidad</th>
						<th>Total</th>
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
					<td>'.$item["fecha"].'</td>
					<td>'.$item["codigo_producto"].'</td>
					<td>'.$item["descripcion"].'</td>
					<td>'.$item["cantidad"].'</td>
					<td>'.$item["total"].'</td>
					<td> <a href="index.php?action=editar_productos&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <a href="index.php?action=eliminar_producto&id='.$item["id"].'"><button class="btn btn-block btn-danger">Borrar</button></a> </td>
					<td> <a href="index.php?action=ver_producto&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">VER</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table> ';
	}

	#REGISTRO DE ventas
	#-------------------------------------
	public function registroVentasController()
	{
		if(isset($_POST["txtCodigo"]))
		{
			$respuesta2 = Datos::getDescripcionProductoModel($_POST["txtCodigo"], "productos");
			$respuesta3 = Datos::getPrecioProductoModel($_POST["txtCodigo"], "productos");
			
			$datosController = array( "codigo"=>$_POST["txtCodigo"],
									  "fecha"=>date("Y/m/d"),
									  "descripcion"=>$respuesta2["descripcion"],
									  "cantidad"=>1,
									  "total"=>$respuesta3["precio_venta"]);

			$respuesta = Datos::registroVentasModel($datosController, "ventas");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=ventas'
					</script>";
			}
			else
			{
				echo "no jalo la ventaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
			}
		}
	}
	
}
?>