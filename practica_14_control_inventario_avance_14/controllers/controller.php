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
		$arrayRespuesta = Datos::vistaProductosModel("productos",$_SESSION['id_tienda']);
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
						<th>Tienda</th>
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
					<td>'.$item["tienda"].'</td>
					<td> <a href="index.php?action=editar_productos&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <button onClick="borrar();" class="btn btn-danger" title= "Eliminar tienda"> 
					<i class="fa fa-trash"></i> </button></center> </td>
					<td> <a href="index.php?action=ver_producto&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">VER</button></a> </td>
				</tr>
			</tbody>
			';
		}
		echo '
		<tfoot>
                <tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Precio_compra</th>
						<th>Precio_venta</th>
						<th>Stock</th>
						<th>Categoria</th>
						<th>Tienda</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
						<th>Ver?</th>
					</tr>
                </tfoot></table> ';
		echo '<script type="text/javascript">
        var password="'.$_SESSION["password"].'";
        function borrar(){
          swal("Ingrese su contraseña:", {
            content: "input",
          })
          .then((value) => 
          {
              if (value==password) 
              {
                swal("Contraseña correcta", "Producto eliminado", "success");
                window.location.href = "index.php?action=productos&idBorrar='.$item["id"].'";
              }
              else
              {
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
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
								      "tienda"=>$_SESSION["id_tienda"],
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
				                      "tienda"=>$_SESSION["id_tienda"],
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
		$arrayRespuesta = Datos::vistaUsuariosModel("usuarios",$_SESSION["id_tienda"]);
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
						<th>Tienda</th>
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
					<td>'.$item["tienda"].'</td>
					<td> <a href="index.php?action=editar_usuarios&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <button onClick="borrar();" class="btn btn-danger" title= "Eliminar tienda"> 
					<i class="fa fa-trash"></i> </button></center> </td>
				</tr>
			</tbody>';
		}
		echo '<tfoot>
					<tr>
						<th>Id</th>
						<th>Username</th>
						<th>Password</th>
						<th>Email</th>
						<th>Tienda</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</tfoot>
		</table>';
		echo '<script type="text/javascript">
        var password="'.$_SESSION["password"].'";
        function borrar(){
          swal("Ingrese su contraseña:", {
            content: "input",
          })
          .then((value) => {
              if (value==password) {
                swal("Contraseña correcta", "Usuario eliminado", "success");
                window.location.href = "index.php?action=usuarios&idBorrar='.$item["id"].'";

              }else{
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
	}

	#VISTA DE CATEGORIAS
	#------------------------------------
	public function vistaCategoriasController()
	{
		$arrayRespuesta = Datos::vistaCategoriasModel("categorias",$_SESSION["id_tienda"]);
		echo '<a href="index.php?action=agregar_categoria"><input type="button" value="AGREGAR CATEGORIA" name="btnAgregarCategoria" class="btn btn-success"></a>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Tienda</th>
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
					<td>'.$item["tienda"].'</td>
					<td> <a href="index.php?action=editar_categorias&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <button onClick="borrar();" class="btn btn-danger" title= "Eliminar tienda"> 
					<i class="fa fa-trash"></i> </button></center> </td>
				</tr>
			</tbody>';
		}
		echo '
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Tienda</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</tfoot>
				</table>';
		echo '<script type="text/javascript">
        var password="'.$_SESSION["password"].'";
        function borrar(){
          swal("Ingrese su contraseña:", {
            content: "input",
          })
          .then((value) => {
              if (value==password) {
                swal("Contraseña correcta", "Categoria eliminada", "success");
                window.location.href = "index.php?action=categorias&idBorrar='.$item["id"].'";

              }else{
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
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
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["id_tienda"] = $respuesta["tienda"];

				echo "<script>
						window.location='index.php?action=dashboard'
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
								      "tienda"=>$_POST["txtTienda"],
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
							          "tienda"=>$_SESSION["id_tienda"],
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
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "tienda"=>$_SESSION["id_tienda"]);

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
			';
	}

	#ACTUALIZAR CATEGORIAS
	#------------------------------------
	public function actualizarCategoriasController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "tienda"=>$_SESSION["id_tienda"],
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
		$todasCategorias = Datos::getCategoriasModel("categorias",$_SESSION['id_tienda']);
		
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
				$tiendaDelProducto = Datos::getTiendaProductoModel($_GET["id"], "productos");
				$tipo_de_accion="AUMENTÓ STOCK";
				//-------------aqui hay que registrar en el historial
				$datosController2 = array("cantidad"=>$_POST["numCantidad"], "id_producto"=>$_GET["id"], "id_usuario"=>$_SESSION["user"],
										"fecha"=>date("Y/m/d"), "nota"=>$_POST["txtNota"], "referencia"=>$_POST["txtReferencia"],
										"tienda"=>$_SESSION["id_tienda"], "tipo"=>$tipo_de_accion);
				$respuesta2 = Datos::registroHistorialModel($datosController2, "historial");
			}
			else
			{
				echo "no se aumento al stock";
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
				$tipo_de_accion="DISMINUYÓ STOCK";
				//-------------aqui hay que registrar en el historial
				$datosController2 = array("cantidad"=>$_POST["numCantidad"], "id_producto"=>$_GET["id"], "id_usuario"=>$_SESSION["user"],
										"fecha"=>date("Y/m/d"), "nota"=>$_POST["txtNota"], "referencia"=>$_POST["txtReferencia"],
										"tienda"=>$_SESSION["id_tienda"], "tipo"=>$tipo_de_accion);
				$respuesta2 = Datos::registroHistorialModel($datosController2, "historial");
			}
			else
			{
				echo "no se disminuyó al stock ";
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
		$arrayRespuesta = Datos::vistaHistorialModel("historial",$_SESSION["id_tienda"]);
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
						<th>Tipo</th>
						<th>Tienda</th>
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
					<td>'.$item["tipo"].'</td>
					<td>'.$item["tienda"].'</td>
				</tr>
			</tbody>';
		}
		echo '</table> ';
	}

	#ELIMINAR CATEGORIAS
	#------------------------------------
	public static function eliminarCategoriasController()
	{
			if(isset($_POST['btnConfirmacion']))
			{
				$data = array("userId"=>$_SESSION["user"],"password"=>$_POST["txtPassword"]);
				$respuesta = Datos::eliminarCategoriasModel($data,"categorias",$_GET["id"]);

				if($respuesta=="success")
				{
						echo "<script>
							window.location='index.php?action=categorias'

						</script>";
				}
				else if($respuesta == "error")
				{
						echo "<br><h1>Error al Eliminar<h1>";
				}
			}
    }

    #TRAER TODAS LAS TIENDAS
	#------------------------------------
	public function getTiendasController()
	{
		$todasCategorias = Datos::getTiendasModel("tiendas");
		
		foreach($todasCategorias as $row => $item)
		{
		echo '
				<option value="'.$item["nombre"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#Traer la tienda segun el usuario este en sesion
	#------------------------------------
	public function getTiendaController()
	{
		//Aunque el metodo se llame productosmodel,en realidad te trae la tienda de cualquier cosa, a sea producto o usario, es dinamica
		$respuesta = $_SESSION["id_tienda"];

		echo'</br>	
		Tienda: <input type="text" value="'.$_SESSION["id_tienda"].'" name="txtTienda" class="form-control my-colorpicker1" readOnly>
			</br>	
			 ';
	}

	#VISTA DEL LAS TEINDAS
	#------------------------------------
	public function vistaTiendasController()
	{
		$arrayRespuesta = Datos::vistaTiendasModel("tiendas");
		echo '<a href="index.php?action=agregar_tienda"><input type="button" value="AGREGAR TIENDA" name="btnAgregarTienda"
			class="btn btn-success" title= "Agregar Tienda"></a></br>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Status</th>
						<th>Ver?</th>
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
					<td>'.$item["direccion"].'</td>
					<td>'.$item["status"].'</td>
					<td> <button onClick="borrar();" class="btn btn-danger" title= "Eliminar tienda"> 
					<i class="fa fa-trash"></i> </button></center> </td>
					<td> <a href="index.php?action=tiendas&idTienda='.$item["id"].'" ><button class="btn btn-primary btn-block btn-flat" >Acceder</button></a> </td> 

				</tr>
			</tbody>';
		}
		echo '</table> ';
		echo '<script type="text/javascript">
        var password="'.$_SESSION["password"].'";
        function borrar(){
          swal("Ingrese su contraseña:", {
            content: "input",
          })
          .then((value) => {
              if (value==password) {
                window.location.href = "index.php?action=tiendas&idBorrar='.$item["id"].'";
              }else{
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
	}

	#ENTRAR TIENDA
	#------------------------------------
	public function accederTiendaController()
	{
		if(isset($_GET["idTienda"]))
		{
			$_SESSION["id_tienda"] = $_GET["idTienda"];
			//$datosController2 = array("id_tienda"=>$_SESSION["id_tienda"]);
			//$respuesta2 = Datos::getTiendaModel($datosController2, "tiendas");
			//$_SESSION["nombre_tienda"] = $respuesta2["nombre"];
			//echo $_SESSION["id_tienda"];
			//header("location:index.php?action=dashboard");
			echo "<script>
					window.location='index.php?action=dashboard'
				</script>";
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
						<th>Id_producto</th>
						<th>Descripcion</th>
						<th>Cantidad</th>
						<th>Total</th>
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
					<td>'.$item["fecha"].'</td>
					<td>'.$item["id_producto"].'</td>
					<td>'.$item["descripcion_producto"].'</td>
					<td>'.$item["cantidad"].'</td>
					<td>'.$item["total"].'</td>
					<td> <a href="index.php?action=editar_productos&id='.$item["id"].'"><button class="btn btn-primary btn-block btn-flat">Editar</button></a> </td>
					<td> <button onClick="borrar();" class="btn btn-danger" title= "Eliminar tienda"> 
					<i class="fa fa-trash"></i> </button></center> </td>
				</tr>
			</tbody>';
		}
		echo '<tfoot>
					<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Id_producto</th>
						<th>Descripcion</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</tfoot>
		</table> ';
		echo '<script type="text/javascript">
        var password="'.$_SESSION["password"].'";
        function borrar(){
          swal("Ingrese su contraseña:", {
            content: "input",
          })
          .then((value) => {
              if (value==password) {
                swal("Contraseña correcta", "Venta eliminada", "success");
                window.location.href = "index.php?action=ventas&idBorrar='.$item["id"].'";

              }else{
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
	}

	#TRAER TODAS LOS PRODUCTOS-------------------------------------------
	#------------------------------------
	public function getProductosController()
	{
		$todosProductos = Datos::getProductosModel("productos",$_SESSION["id_tienda"]);
		
		foreach($todosProductos as $row => $item)
		{
		echo '
				<option value="'.$item["id"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#REGISTRO DE VENTAS
	#-------------------------------------
	public function registroVentasController()
	{
		if(isset($_POST["registrar"]))
		{
			//Traer el nombre del producto seleccionado en el select
			$respuesta2 = Datos::getDescripcionProductoModel($_POST["select_productos"], "productos");
			//Traer el precio de dicho producto
			$respuesta3 = Datos::getPrecioProductoModel($_POST["select_productos"], "productos");

			//Almacenar en estae array el ide del producto para mandarselo al model quitar del stock si se realiza kiere decir ke si ay productos
			$datosId = array("idProducto" => $_POST["select_productos"], "cantidad"=>$_POST["txtCantidad"]);
			$respuestaA = Datos::quitarStockModel($datosId, "productos");
			if($respuestaA=="success")
			{
				//Array con los datos necesarios para almacenar la venta
				$datosController = array( "id_producto"=>$_POST["select_productos"],
									  "fecha"=>date("Y/m/d"),
									  "descripcion"=>$respuesta2["nombre"],
									  "cantidad"=>$_POST["txtCantidad"],
									  "tienda"=>$_SESSION["id_tienda"],
									  "total"=>($respuesta3["precio_venta"]*$_POST["txtCantidad"]));

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
			else
			{
				echo "No hay STOCK suficiente";
			}

			
		}
	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoJSController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=productos'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioJSController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"usuarios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=usuarios'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR CATEGORIA
	#------------------------------------
	public function borrarCategoriaJSController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::eliminarCategoriasModel("categorias",$_GET["idBorrar"], $_SESSION["id_tienda"]);
			
			//$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"categorias");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=categorias'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR VENTA
	#------------------------------------
	public function borrarVentaJSController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"ventas");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=ventas'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#TRAER LA CANTIDAD DE PRODUCTOS DE DETERMINADA TIENDA
	#------------------------------------
	public function getCantidadProductosController()
	{
		$cantidad_productos = Datos::getCantidadProductosModel($_SESSION["id_tienda"]);
		echo '<h3>'.$cantidad_productos["cantidad"].'</h3>';
	}

	#TRAER LA CANTIDAD DE CATEGORIAS DE DETERMINADA TIENDA
	#------------------------------------
	public function getCantidadCategoriasController()
	{
		$cantidad_categorias = Datos::getCantidadCategoriasModel($_SESSION["id_tienda"]);
		echo '<h3>'.$cantidad_categorias["cantidad"].'</h3>';
	}

	#TRAER LA CANTIDAD DE USUARIOS DE DETERMINADA TIENDA
	#------------------------------------
	public function getCantidadUsuariosController()
	{
		$cantidad_usuarios = Datos::getCantidadUsuariosModel($_SESSION["id_tienda"]);
		echo '<h3>'.$cantidad_usuarios["cantidad"].'</h3>';
	}

	#TRAER EL NOMBRE DEL USUARIO y el nombre de la tienda EN DETERMINADA TIENDA
	#------------------------------------
	public function getNombreUsuarioYTiendaController()
	{
		$nombre_usuario = Datos::getNombreUsuarioTiendaModel($_SESSION["id_tienda"]);
		$nombre_tienda = Datos::getNombreTiendaModel($_SESSION["id_tienda"]);
		echo "USER: [".$nombre_usuario["username"]."]</br>";
		echo "STORE: [".$nombre_tienda["nombre"]."]";
	}

	#REGISTRO DE TIENDAS
	#-------------------------------------
	public function registroTiendasController()
	{
		if(isset($_POST["btnRegistrarTienda"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"], 
								      "direccion"=>$_POST["txtDireccion"],
								      "estatus"=>$_POST["txtEstatus"]);

			$respuesta = Datos::registroTiendasModel($datosController, "tiendas");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=tiendas'
					</script>";
			}
			else
			{
				echo "no jalo";
			}
		}
	}


	
}
?>